<?php


namespace App\Http\Controllers\Tim;


use App\Company;
use App\Http\Controllers\Controller;
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
                    "link" => route('market.company', $model->issuer),
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
}