<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Bond;
use App\Comment;
use App\CompanyAnalysis;
use App\CompanyData;
use App\CompanyPreference;
use App\CompanyDetail;
use App\CompanyKey;
use App\Dividend;
use App\FinDict;
use App\Report;
use App\Setting;
use App\Achiev;
use App\StartTradingSteps;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use Lang;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Session;
use App\Partner;
use App\NewIt;
use App\Statistic;
use App\Branch;
use App\Teammate;
use App\Certificate;
use App\History;
use App\Index;
use App\Tariff;
use App\Company;
use App\Data;
use Storage;
use SimpleXMLElement;
use App\Http\Helpers\Helper;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function testXML(Request $request)
    {
        $method_name = null;
        $full_name = null;
        $count = 0;
        $data = file_get_contents('php://input');
        $data = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $data);
        $xml = new SimpleXMLElement($data);
        $body = $xml->xpath('//soapenvBody')[0];
        $array = json_decode(json_encode((array)$body), TRUE);
//            dd($array);
        foreach ($array as $key => $item) {
//                dd(substr($key, 3));
            if ($count == 0) {

                $method_name = substr($key, 3);
                $full_name = $key;
            }
        }
//            dd($method_name);
        switch ($method_name) {
            case 'PerformTransactionArguments':
                $response = Helper::PerformTran($full_name, $array);
//                    dd($response);
                break;
            case 'CancelTransactionArguments':
                $response = Helper::CancelTran($full_name, $array);
                break;
            case 'CheckTransactionArguments':
                $response = Helper::CheckTran($full_name, $array);
                break;
            case 'GetStatementArguments':
                $response = Helper::GetStat($full_name, $array);
                break;
            case 'GetInformationArguments':
                $response = Helper::GetInfo($full_name, $array);
                break;

        }
//            dd($response);


        return response($response)->withHeaders([
            'Content-Type' => 'text/xml',

        ]);
    }

    public function index()
    {
        $lang = App::getLocale();
        $partners = Partner::where(['lang' => $lang])->get();
        $news = NewIt::where(['public' => true, 'lang' => $lang])->latest()->take(3)->get();
        $stats = Statistic::find(1);
        return view('home')->with(['partners' => $partners, 'news' => $news, 'stats' => $stats]);
    }

//    News
    public function getNews($category)
    {
        $cat_id = 1;
        if ($category == 'Uzbekistan') {
            $cat_id = 2;
        }
        $lang = App::getLocale();
        $news = NewIt::where(['public' => true, 'lang' => $lang, 'category_id' => $cat_id])->latest()->paginate(15);
        return view('templates.news.page')->with(['news' => $news, 'cat' => $category]);
    }

    public function getNewsItem($category, $slug)
    {
        $item = NewIt::where('slug', $slug)->first();
        $comments = Comment::where('parent_slug', 'news')->where('categories_id', $item->id)->get();
        return view('templates.news.item')->with(['item' => $item, "comments" => $comments, "parent" => "news"]);

    }

//    Private
    public function getPrivate()
    {

        $tariff = Tariff::where(['public' => true, 'lang' => App::getLocale()])->take(4)->orderBy('order', 'asc')->get();
        return view('templates.private.page')->with([
            'tariff' => $tariff,
            'settings' => Setting::find(1),

        ]);
    }

    public function getPrivateStocks()
    {
        return view('templates.private.stocks-page');
    }

    public function getPrivateStocksData()
    {
        $data = Company::with(['details', 'last_price_default', 'last_month', 'curr_month', 'last_price_preference'])->get();
//        dd($data);
        $data = $data->map(function ($model) {

            $common = $model->details->common_stocks;
            $price_def = isset($model->last_price_default->last_price) ? $model->last_price_default->last_price : 0;

            $pref_stock = !empty($model->details->preference) ? $model->details->preference : 0;
            $pref_last_price = isset($model->last_price_preference->last_price) ? $model->last_price_preference->last_price : 0;

            $last = isset($model->last_month->last_price) ? $model->last_month->last_price : 1;
            $curr = isset($model->curr_month->last_price) ? $model->curr_month->last_price : 1;

            $change = $curr - $last;

            return [
                'name' => $model->issuer,
                'children' => [
                    [
                        "rate" => number_format(($change * 100) / $curr, 3, '.', ''),
                        "name" => "SUNTV",
                        "value" => ($common * $price_def) + ($pref_stock * $pref_last_price)
                    ]
                ]
            ];
        });
//        dd($data);
        $test = [
            "name" => "test",
            "children" => $data
        ];

        return json_encode($test);
    }

    public function getPrivateBonds()
    {
        $bonds = Bond::paginate(15);
        return view('templates.private.bonds-page')->with('bonds', $bonds);
    }

    public function getPrivateTrade()
    {
        $data = StartTradingSteps::all()->where('lang', Lang::getLocale());
        return view('templates.private.start-trade-page')->with('steps', $data);
    }

//    Corporate
    public function getCorporate()
    {
        return view('templates.corporate.page');
    }

//    KD-IDEAS
    public function getKd()
    {
        $analytics = Analytic::where(['lang' => App::getLocale()])->latest()->take(4)->get();
        $comments = Comment::where('parent_slug', 'analytics')->get();
        return view('templates.kd.page')->with(['analytics' => $analytics, "comments" => $comments, "parent" => "analytics"]);
    }

    public function getKdIndex(Request $request)
    {

        return view('templates.kd.index-page');
    }

    public function getKdIndexData(Request $request)
    {
        if ($request->year == 1) {
            $year = 1;
            $data = Helper::Month(1);
        } else {
            $data = Helper::Month(0);
        }

        return $data;
    }


//    Partners
    public function getPartnersPage()
    {
        $partners = Partner::where(['public' => true, 'lang' => App::getLocale()])->get();

        return view('templates.partners')->with('partners', $partners);
    }

//    Compliance
    public function getCompliancePage()
    {
        return view('templates.compliance');
    }

//    Appeal
    public function getAppealPage()
    {
        return view('templates.appeal');
    }

//    Disclosure
    public function getDisclosurePage()
    {
        return view('templates.info-disclosure');
    }

//    CONTACTS
    public function getContactsPage()
    {
        $settings = Setting::find(1);
        return view('templates.contacts')->with('settings', $settings);
    }

//    About Us
    public function getAbout()
    {
        $story = History::where('lang', App::getLocale())->orderBy('year', 'asc')->get();
        $certs = Certificate::where('public', true)->get();
        $stats = Statistic::find(1);
        $team = Teammate::where(['public' => true, 'lang' => App::getLocale()])->orderBy('order', 'asc')->get();

        $items = Achiev::all();
        return view('templates.about-us.about')->with([
            'stats' => $stats,
            'team' => $team,
            'story' => $story,
            'certs' => $certs,
            'achievs' => $items,
        ]);
    }

    public function getTeamPage()
    {
        $director = Teammate::where(['order' => 1, 'lang' => App::getLocale()])->first();
        $team = Teammate::where('order', '!=', 1)->where(['lang' => App::getLocale(), 'public' => true])->orderBy('order', 'asc')->get();
        return view('templates.about-us.team-page')->with(['team' => $team, 'director' => $director]);
    }

    public function getResumePage()
    {
        $settings = Setting::find(1);
        return view('templates.about-us.resume-page')->with('settings', $settings);
    }

//    Open Account
    public function getOpenAccount($type = null)
    {
        if ($type == 'physical') {
            return view('templates.open-account.page')->with('type', $type);
        } elseif ($type == 'law') {
            return view('templates.open-account.page')->with('type', $type);
        }
        return view('templates.open-account.page')->with('type', $type);
    }

// Localization
    public function setLang($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

//    Branches
    public function branchesRequest(Request $request)
    {
        $branches = Branch::where('lang', App::getLocale())->get();
        $data['type'] = "FeatureCollection";

        foreach ($branches as $key => $branch) {
            $title = $branch->title;
            $address = $branch->address;
            $tel = $branch->phone_one;
            $tel_2 = $branch->phone_two;
            $link = $branch->link;
            $data['features'][$key] = [
                "type" => "Feature",
                "id" => $branch->id,
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [$branch->latitude, $branch->longitude]
                ],
                "properties" => [
                    "balloonContent" => "<div class='data-loc'>
                        <h5>" . $title . "</h5>
                        <p>" . __('Адрес') . ': ' . $address . "</p>
                        <p>" . __('Телефон') . ': ' . $tel . '; ' . $tel_2 . "</p>
                        <a href='$link' target='_blank'> <i class='fas fa-map-marked-alt'></i>" . __('как проехать') . "</a>
                        <p></p>
                        </div>
                    ",
                ],
                "options" => [
                    "iconLayout" => 'default#image',
                    "iconImageHref" => 'marker.png',
                    "iconImageSize" => [40, 57],
                    "iconImageOffset" => [-40, -60]
                ]
            ];
        }
//        dd($data);
        return response()->json($data);
    }


//    MARKET DATA

    public function getMarketData()
    {

        $company = Company::with([
            'month_volume',
            'details',
            'last_price_default',
            'last_month',
            'curr_month',
            'last_price_preference',
        ])
            ->orderBy('id', 'asc')
            ->get()->map(function ($model) {
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
                    'volume' => $model->month_volume->sum('volume'),
                    'market_cap' => ($common * $price_def) + ($pref_stock * $pref_last_price),
                    'change_1' => $change,
                    'change_2' => number_format(($change * 100) / $curr, 3, '.', ''),
                ];
            });
//        dd($company);
        return view('market-data.page')->with('comps', $company);
    }

    public function getMarketDataJson(Request $request, $id)
    {

        $d = date("Y-m-d", mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')));
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));


        $data = CompanyData::select(['timestamp', 'last_price'])
            ->where('company_id', $id)
            ->whereBetween('date', [$d, $d_2])
            ->orderBy('timestamp', 'asc')->get()
            ->map(function ($model) {
                return [$model->timestamp, $model->last_price];
            })
            ->toArray();

        return response()->json($data);
    }

    public function getMarketCompanyJson(Request $request, $id)
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));


        $data = CompanyData::select(['timestamp', 'last_price', 'date', 'volume'])
            ->where('company_id', $id)
            ->whereBetween('date', [$d, $d_2])
            ->orderBy('timestamp', 'asc')->get();
        $market = $data->map(function ($model) {
            return [$model->timestamp, $model->last_price];
        })
            ->toArray();
        $volume = $data->groupBy('date')->map(function ($model) {
            return [$model->last()->timestamp, $model->sum('volume')];
        })->toArray();

        $volume = array_values($volume);

        return response()->json(['market' => $market, 'volume' => $volume]);
    }

    public function getMarketCompanyPrefJson(Request $request, $id)
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));


        $data = CompanyPreference::select(['timestamp', 'last_price', 'date', 'volume'])
            ->where('company_id', $id)
            ->whereBetween('date', [$d, $d_2])
            ->orderBy('timestamp', 'asc')->get();
        $market = $data->map(function ($model) {
            return [$model->timestamp, $model->last_price];
        })
            ->toArray();
        $volume = $data->groupBy('date')->map(function ($model) {
            return [$model->last()->timestamp, $model->sum('volume')];
        })->toArray();

        $volume = array_values($volume);

        return response()->json(['market' => $market, 'volume' => $volume]);
    }

//for test
    public function getMarketDataJsonGet()
    {
//
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));
//        $d = date("Y-m-d",mktime(0,0,0,12, 07, 2020)) ;
//        $d_2 = date("Y-m-d", mktime(23,59,59,12, 07, 2020)) ;


        $test = CompanyData::select('company_id', 'date', 'time', 'last_price', 'timestamp')->whereBetween('date', [$d, $d_2])->whereHas('kdindex')->with('detail')->orderBy('timestamp', 'desc')->get();
        $wow = $test->groupBy('date');
//        dd($wow);
        $wow = $wow->map(function ($model, $key) {
            $y = $model->unique('company_id');
            $t = $y->map(function ($query) {
                return [
                    'comp_id' => $query->company_id,
                    'cap' => $query->last_price * $query->detail->free_quantity,
                    'last_price' => $query->last_price,
                    'free_quant' => $query->detail->free_quantity
                ];
            });
//          dd( $t->sum('cap'));
            return ['cap' => $t->sum('cap'), 'comp' => $t->toArray()];
        });
//        dd($wow);

        $temp = [];
        $q = 0;
//        dd($wow);
        foreach ($wow as $key => $item) {
            $v = 0;


            foreach ($item['comp'] as $t) {
                $v += $t['last_price'] / ($t['cap'] / $item['cap']);
            }
            $temp[$q] = [strtotime($key) * 1000, $v / 10000];
            $q++;
        }
        dd($temp, date('d-m-Y', 1607367600));
        return $temp;


    }


    public function getMarketCompany($issuer)
    {
//        dd(Route::current()->uri);
        $company = Company::where('issuer', $issuer)->with([
            'bonds',
            'min',
            'max',
            'data',
            'week_range_max',
            'volume',
            'month_volume',
            'details',
            'last_price_default',
            'last_month',
            'last_year',
            'curr_month',
            'last_price_preference',
        ])->first();

        $common = $company->details->common_stocks;
        $price_def = isset($company->last_price_default->last_price) ? $company->last_price_default->last_price : 0;

        $pref_stock = !empty($company->details->preference) ? $company->details->preference : 0;
        $pref_last_price = isset($company->last_price_preference->last_price) ? $company->last_price_preference->last_price : 0;

        $last_month = isset($company->last_month->last_price) ? $company->last_month->last_price : 1;
        $last_year = isset($company->last_year->last_price) ? $company->last_year->last_price : 1;
        $curr = isset($company->curr_month->last_price) ? $company->curr_month->last_price : 1;


        $div = Dividend::where('company_id', $company->id)->orderBy('year', 'desc')->take(5)->get();

//        dd($company->curr_month->last_price,$curr, $last_year);
        return view('market-data.page-company')->with([
            'issuer' => $issuer,
            'min_week' => isset($company->week_range_max->last()->last_price) ? $company->week_range_max->last()->last_price : null,
            'max_week' => isset($company->week_range_max->first()->last_price) ? $company->week_range_max->first()->last_price : null,
            'volume' => $company->volume->sum('volume'),
            'market' => ($common * $price_def) + ($pref_stock * $pref_last_price),
            'change_month' => number_format((($curr - $last_month) * 100) / $curr, 3, '.', ''),
            'change_year' => number_format((($curr - $last_year) * 100) / $curr, 3, '.', ''),
            'comp' => $company,
            'pref' => $pref_stock * $pref_last_price,
            'dividends' => $div
        ]);
    }

    public function getMarketBalance(Request $request, $issuer)
    {
        $id = Company::where('issuer', $issuer)->first();

        if ($request->has('year')) {
            $report = Report::type('balance')->where([
                'company_id' => $id->id,
                'year' => $request->year,
                'quarter' => $request->quarter
            ])->first();

            return view('market-data.page-company')->with(['issuer' => $issuer, 'report' => $report, 'comp' => $id]);
        }
        $report = Report::type('balance')->where('company_id', $id->id)->latest()->first();
//            dd($report);
        return view('market-data.page-company')->with(['issuer' => $issuer, 'report' => $report, 'comp' => $id]);
    }

    public function getMarketFinancial(Request $request, $issuer)
    {
        $id = Company::where('issuer', $issuer)->first();

        if ($request->has('year')) {
            $report = Report::type('finance')->where([
                'company_id' => $id->id,
                'year' => $request->year,
                'quarter' => $request->quarter
            ])->first();

            return view('market-data.page-company')->with(['issuer' => $issuer, 'report' => $report, 'comp' => $id]);
        }

        $report = Report::type('finance')->where('company_id', $id->id)->latest()->first();
        return view('market-data.page-company')->with(['issuer' => $issuer, 'report' => $report, 'comp' => $id]);
    }

    public function getMarketAnalysis($issuer)
    {
        $comp = Company::where('issuer', $issuer)->first();
        $analysis = CompanyAnalysis::where(['company_id' => $comp->id, 'lang' => App::getLocale()])->get();
        return view('market-data.page-company')->with(['issuer' => $issuer, 'analysis' => $analysis, 'comp' => $comp]);
    }

    public function getMarketProfile($issuer)
    {
        $comp = Company::where('issuer', $issuer)->with(['info' => function ($query) {
            $query->where('lang', App::getLocale());
        }])->first();
        $keys = CompanyKey::where(['lang' => App::getLocale(), 'company_id' => $comp->id])->get();
//            dd($comp);
        return view('market-data.page-company')->with(['issuer' => $issuer, 'comp' => $comp, 'keys' => $keys, 'comp' => $comp]);
    }


//     OUR OFFERS
    public function getOffersPage()
    {
        $tariff = Tariff::where(['public' => true, 'lang' => App::getLocale()])->take(4)->orderBy('order', 'asc')->get();

        return view('templates.our-offers.page')->with([
            'tariff' => $tariff,
            'settings' => Setting::find(1)
        ]);
    }
}
