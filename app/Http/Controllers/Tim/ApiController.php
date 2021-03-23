<?php


namespace App\Http\Controllers\Tim;


use App;
use App\Company;
use App\CompanyDataApi;
use App\CompanyKey;
use App\Dividend;
use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getMarketData(Response $response)
    {

        $USD = json_decode(file_get_contents('https://cbu.uz/ru/arkhiv-kursov-valyut/json/'))[0]->Rate;

        $company = Company::with([
            'month_volume',
            'details',
            'last_price_default',
            'last_month',
            'curr_month',
            'last_price_preference',
        ])
            ->orderBy('id', 'asc')
            ->get()->map(function ($model) use ($USD) {
//                dd($model->last_price_default->last_price);

                $common = $model->details->common_stocks;
                $price_def = isset($model->last_price_default->last_price) ? $model->last_price_default->last_price : 0;
//                dd($price_def);

                $pref_stock = !empty($model->details->preference) ? $model->details->preference : 0;
                $pref_last_price = isset($model->last_price_preference->last_price) ? $model->last_price_preference->last_price : 0;

                $last = isset($model->last_month->last_price) ? $model->last_month->last_price : 1;
                $curr = isset($model->curr_month->last_price) ? $model->curr_month->last_price : 1;

                $change = $curr - $last;


                return [
                    'data' => $model,
                    "link" => route('market-data-company', $model->issuer),
                    'volume' => $model->month_volume->sum('volume'),
                    'market_cap' => ($common * $price_def) + ($pref_stock * $pref_last_price),
                    'market_cap_USD' => (($common * $price_def) + ($pref_stock * $pref_last_price)) / (int)$USD,
                    'change_1' => $change,
                    'change_2' => number_format(($change * 100) / $curr, 3, '.', ''),
                    'ticker' => $model->issuer,
                    'title' => $model->title
                ];
            });
        return response()->json($company);

    }

    public function getCompanyData(Response $response)
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function getCompanyInformation($issuer)
    {
        $company = Company::where('issuer', $issuer)->with([
            'bonds',
            'min',
            'max',
            'data',
            'week_range_max',
            'volume',
            'month_volume',
            'details',
            'last_day',
            'last_price_default',
            'last_month',
            'last_year',
            'curr_month',
            'last_price_preference',
        ])->first();
        $company->year_volume = $company->with('year_volume')->get();
        $company->quarters = CompanyDataApi::where('company_id', $company->id)->get();
        $company->last_quarter = CompanyDataApi::where('company_id', $company->id)->orderBy('year', 'desc')->first();
        $company->common = $company->details->common_stocks;
        $company->price_def = isset($company->last_price_default->last_price) ? $company->last_price_default->last_price : 0;
        $company->pref_stock = !empty($company->details->preference) ? $company->details->preference : 0;
        $company->pref_last_price = isset($company->last_price_preference->last_price) ? $company->last_price_preference->last_price : 0;
        $company->last_month = isset($company->last_month->last_price) ? $company->last_month->last_price : 1;
        $company->last_year = isset($company->last_year->last_price) ? $company->last_year->last_price : 1;
        $company->curr = isset($company->curr_month->last_price) ? $company->curr_month->last_price : 1;
        $company->one_year_volume = $company->volume->sum('volume');
        $company->min_week = isset($company->week_range_max->last()->last_price) ? $company->week_range_max->last()->last_price : null;
        $company->max_week = isset($company->week_range_max->first()->last_price) ? $company->week_range_max->first()->last_price : null;
        $company->change_month = number_format((($company->curr - $company->last_month) * 100) / $company->last_month, 3, '.', '');
        $company->change_year = number_format((($company->curr - $company->last_month) * 100) / $company->last_month, 3, '.', '');
        $company->info = Company::where('issuer', $issuer)->with(['info' => function ($query) {
            $query->where('lang', App::getLocale());
        }])->first();
        $company->balance = Report::type('balance')->where('company_id', $company->id)->get();
        $company->keys = CompanyKey::where(['lang' => App::getLocale(), 'company_id' => $company->id])->get(); 
        $company->div = Dividend::where('company_id', $company->id)->orderBy('year', 'desc')->take(5)->get();
        return response()->json($company);
    }
}