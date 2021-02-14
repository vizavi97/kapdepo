<?php

namespace App\Http\Controllers;

//use App\Buy;
//use App\Sell;
use App\Pnl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\User;
use App\InfoStock;
use Str;
use Excel;
use App\Imports\BrokerImport;
use Paycom\Application;
use DB;
use Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;




class UserController extends Controller
{
    // main
    public function index()
    {

        return view('cabinet.main');
    }
//    changePass
    public function changePass(Request $request)
    {
        if($request->isMethod('get')){

            return view('cabinet.change-pass');
        }else{
            $rules = [
                'current_pass' => ['required', 'string', 'min:8'],
                'new_password' => ['required', 'string', 'min:8', 'confirmed' ,'different:current_pass'],
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->withErrors($validator);
            }

            if(Hash::check($request->current_pass, Auth::user()->password)){
                $user = User::find(Auth::user()->id);
                $user->update(['password' => Hash::make($request->new_password)]);
                $message = __('Пароль обновлён');
                return redirect()->back()->with('message',$message);
            }
        }
    }

    // for PAYme
    public function refill(Request $request)
    {
        if($request->isMethod('get')){

            return view('cabinet.pay');
        }else{
            $amount = $request->amount;
            $phone = $request->phone;
//            $config = [];
//            $config['login'] = 'Paycom';
//            $config['key'] = 'wyS9S03Mw%X6RyDX54T5bcCWud4YREdb3qQh';
//            $url = route('refill-test');
//            $user_id = Auth::user()->id;
            $order = DB::table('orders')->insertGetId([
                'product_ids' => '{1}',
                'amount' => $amount,
                'state' => 1,
                'user_id' => Auth::user()->id,
                'phone' => $phone,
            ]);
            return response()->json($order);
//            dd($url);

//            $headers = [
//                "Content-Type" => "text/json; charset=UTF-8",
//                "Accept" => "text/json; charset=UTF-8",
//                'Authorization' => 'Basic '.base64_encode($config['login']. ":" .$config['key']),
//            ];
//
//            $client = new \GuzzleHttp\Client([
//                'headers' => $headers
//            ]);
//            try {
//                $response = $client->request('POST', $url, [
//                    'json' => [
//                        "method" => "CheckPerformTransaction",
//                        "params" => [
//                            "amount" =>   intval($amount)*100,
//                            "account" => [
//                                "order_id" => $order,
//                                "phone" => ".$phone."
//                            ]
//                        ]
//                    ]
//                ]);
//                $data = json_decode($response->getBody()->getContents(), true);
////                dd($data);
//            } catch (\Exception $e) {
//                throw new \Exception($e->getResponse()->getBody()->getContents());
//            }

//            2 SECOND CreateTransaction
//            $headers = [
//                "Content-Type" => "text/json; charset=UTF-8",
//                "Accept" => "text/json; charset=UTF-8",
//                'Authorization' => 'Basic '.base64_encode($config['login']. ":" .$config['key']),
//            ];
//
//            $client = new \GuzzleHttp\Client([
//                'headers' => $headers
//            ]);
//            try {
//                $response = $client->request('POST', $url, [
//                    'json' => [
//                        "method" => "PerformTransaction",
//                        "params" => [
//                            "amount" =>   intval($amount)*100,
//                            "time" => time(),
//                            "id" => '5e68e4c335ac93546bc7f43a',
//                            "account" => [
//                                "order_id" => $order,
//                                "phone" => ".$phone."
//                            ]
//                        ]
//                    ]
//                ]);
//                $data = json_decode($response->getBody()->getContents(), true);
//                dd($data);
//            } catch (\Exception $e) {
//                throw new \Exception($e->getResponse()->getBody()->getContents());
//            }
        }
    }
    public function refillTest(Request $request)
    {

//        dd($request->all());
        // Enable to debug
        error_reporting(E_ALL);
        ini_set('display_errors', 1);


//        require_once 'vendor/autoload.php';
//        require_once 'functions.php';
        require __DIR__ .'/../../../payme/vendor/autoload.php';
        require __DIR__ .'/../../../payme/functions.php';

        $paycomConfig = [
            // Get it in merchant's cabinet in cashbox settings
            'merchant_id' => '597b33e0db0c690e08708d37',

            // Login is always "Paycom"
            'login'       => 'Paycom',

            // File with cashbox key (key can be found in cashbox settings)
            'keyFile'     => '2rFMBFoCTdY&aOUo9j%rKjKnIAqijDSDvAd8',

            // Your database settings
            'db'          => [
                'host'     => 'localhost',
                'database' => 'kapdepo',
                'username' => 'kapdepo',
                'password' => 'pdJg2i!LVWm6',
            ]];

        // load configuration
//        $paycomConfig = CONFIG_FILE;

        $application = new Application($paycomConfig);
        $application->run();

    }
//  refill
    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }

// PNL
    public function getPNL()
    {

        $buy = Pnl::buy(Auth::user()->name)->get()->groupBy('isin')->map(function ($row) {
            return [
                'buy_items_sum' => $row->sum('quantity_items'),
                'buy_net_sum' => $row->sum('net_sum')
            ] ;
        });
        $sell = Pnl::sell(Auth::user()->name)->get()->groupBy('isin')->map(function ($row) {
            return [
                'sell_items_sum' => $row->sum('quantity_items'),
                'sell_net_sum' => $row->sum('net_sum')
            ] ;
        });


//        dd($buy->all());
//        dd($sell->all());
//        NEW
        $origin = [];
        $gen_sum_invest = 0;
        $gen_sum_pl = 0;
        $gen_sum_total = 0;
        $temp = 0;

        foreach ($buy as $key => $item){
            $stock = InfoStock::where('isin', $key)->first();
            $w = isset($sell[$key]['sell_items_sum']) ? $sell[$key]['sell_items_sum'] : 0;
            $current = $item['buy_items_sum'] - $w;
            if($stock && $current > 0){
                $sum_sell = isset($sell[$key]['sell_net_sum']) ? $sell[$key]['sell_net_sum'] : 0;
                $difference = $sum_sell - $item['buy_net_sum'];

                $origin[$temp]['name'] = $stock->title;
//                $origin[$temp]['type_paper'] = 'Акции';
                $origin[$temp]['isin'] = $key;
                $origin[$temp]['image'] = $stock->image ?  $stock->image : null;
                $origin[$temp]['current_count_items'] = $current;
                $origin[$temp]['sum_buy'] = $item['buy_net_sum'];
                $origin[$temp]['sum_sell'] = $sum_sell;
                $origin[$temp]['current_price'] = $stock->current_price;
                $proc = ($stock->current_price*$origin[$temp]['current_count_items']) + $difference;
                $te = ($proc*1.66)/100;

//                $origin[$temp]['pl_$'] = ($stock->current_price*$origin[$temp]['current_count_items']) + $difference;
                $origin[$temp]['pl_$'] =  $proc - $te;

                $origin[$temp]['pl_%'] = number_format(($item['buy_net_sum'] + $origin[$temp]['pl_$'])/$origin[$temp]['pl_$'], 2, '.', '');
                if($difference < 0){
                    $origin[$temp]['payback_price'] = number_format((-1)*($difference/$origin[$temp]['current_count_items']), 2, '.', '');
                }else{
                    $origin[$temp]['payback_price'] = 'Вы полностью окупили инвестицию';
                }

                $gen_sum_invest += $item['buy_net_sum'];
                $gen_sum_pl += $origin[$temp]['pl_$'];
                $gen_sum_total += $item['buy_net_sum'] + $origin[$temp]['pl_$'];

            }

            $temp++;
        }

        return view('cabinet.pnl')->with([
            'data' => $origin,
            'gen_sum_invest' => $gen_sum_invest,
            'gen_sum_pl' => $gen_sum_pl,
            'gen_sum_total' => $gen_sum_total,
        ]);
    }

//     FOR ADMIN

    public function list()
    {
        $users = User::where('is_admin', 0)->paginate(20);
        return view('admin.users.list')->with('users', $users);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.users.create');
        }else{
            $rules = [
                'kzl' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'firstName' => ['required', 'string', 'max:255'],
                'surName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'integer'],
                'agreement' => ['required', 'string', 'max:255'],
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $key = Str::random(5);
            $pass = $request->kzl . $key;
            $user = new User();
            $user->name = $request->kzl;
            $user->password = Hash::make($pass);
            $user->email = $request->email;
            $user->first_name = $request->firstName;
            $user->surname = $request->surName;
            $user->lastname = $request->lastName;
            $user->phone = $request->phone;
            $user->agreement = $request->agreement;
            $user->value = $key;
            $user->save();
//            dd($request->all());
            $message = 'Успешно добавлен';
            return redirect()->route('users.list')->with('message', $message);
        }
    }
    public function edit(Request $request, $id)
    {
        $client = User::find($id);
        if($request->isMethod('get')){
            return view('admin.users.edit')->with('client', $client);
        }else{
//            dd($request->all());
            $rules  = [
                'kzl' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'firstName' => ['required', 'string', 'max:255'],
                'surName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'phone' => ['required'],
                'agreement' => ['required', 'string', 'max:255'],
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return redirect()->back()->with('er','hello')->withErrors($validator);
            }
            $client->update([
                'name' => $request->kzl,
                'email' => $request->email,
                'agreement' => $request->agreement,
                'first_name' => $request->firstName,
                'surname' => $request->surName,
                'lastname' => $request->lastName,
                'phone' => $request->phone,
            ]);
            $message = 'Успешно обновлено';
            return redirect()->route('users.list')->with('message', $message);
        }
    }

    public function stocksList()
    {
        $stocks = InfoStock::paginate(50);
        return view('admin.users.stocks')->with('stocks', $stocks);
    }
    public function stocksListUpdateLink()
    {
        $url_stocks = 'https://uzse.uz/tickers.xml';

        try {
            $xml = XmlParser::load($url_stocks);
            foreach ($xml->getContent() as $value) {
                $stock = InfoStock::where('isin', $value->isu_cd)->first();
                if ($stock) {
                    $price = str_replace(' ', '', $value->clsprc);
                    $price = str_replace(',', '.', $price);
                    $stock->update([
                        'current_price' => $price,
                    ]);
                } else {
                    $new = new InfoStock();
                    $new->title = $value->isu_abbrv;
                    $new->isin = $value->isu_cd;
                    $price = str_replace(' ', '', $value->clsprc);
                    $price = str_replace(',', '.', $price);
                    $new->current_price = $price;
                    $new->save();
                }
            }
            $message = 'Успешно обновлено';
        } catch (\Throwable $e) {
            echo 'data error tickers';
            $message = 'Проблема с источником';

        }

        return redirect()->route('users.stocks.list')->with('message', $message);
    }
    public function stocksAdd(Request $request)
    {
        if ($request->isMethod('get')){
            return view('admin.users.stocks-add');
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'isin' => 'required',
                'price' => 'required|numeric',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image') ? $request->file('image')->store('stocks', 'public') : null;

            $new = new InfoStock();
            $new->title = $request->title;
            $new->isin = $request->isin;
            $new->current_price = $request->price;
            $new->image = $name;
            $new->save();

            $message = 'Успешно обновлено';

            return redirect()->route('users.stocks.list')->with('message', $message);
        }
    }
    public function stocksEdit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $stock = InfoStock::find($id);
            return view('admin.users.stocks-edit')->with('stock', $stock);
        }else{
            $rules = [
                'title' => 'required',
                'isin' => 'required',
                'price' => 'required|numeric',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $stock = InfoStock::find($id);

            $name = $request->file('image') ? $request->file('image')->store('stocks', 'public') : $stock->image;

            $stock->update([
                'title' => $request->title,
                'isin' => $request->isin,
                'current_price' => $request->price,
                'image' => $name,
            ]);
            $message = 'Успешно обновлено';
            return redirect()->route('users.stocks.list')->with('message', $message);
        }
    }
    public function stocksDelete($id)
    {
        $stock = InfoStock::find($id);

        $image = $stock->image ? 'public/' . $stock->image : null;
        Storage::delete($image);
        $stock->delete();
        $message = 'Удалено';
        return redirect()->back()->with('message', $message);
    }

    public function importData(Request $request)
    {
        if($request->isMethod('get')){

            return view('admin.users.import.import');
        }else{
            $rules = [
                'image' => 'mimes:xlsx,xls',
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $data = Excel::toArray(new BrokerImport(),$request->file('image'));
//            dd($data);
//            dd($data[0][1][0]);
                for ($i = 1; $i < count($data[0]); $i++){

                        $new_pnl = new Pnl();
                        $new_pnl->kzl = $data[0][$i][0];
                        $new_pnl->isin = $data[0][$i][4];
                        $new_pnl->date =  str_replace('/', '-', $data[0][$i][8]);
                        $new_pnl->quantity_items = str_replace(',', '', $data[0][$i][12]);
                        $new_pnl->price_items = str_replace(',', '', $data[0][$i][13]);
                        $new_pnl->net_sum = str_replace(',', '', $data[0][$i][21]);
                        if($data[0][$i][3] == 'Продажа'){
                            $new_pnl->action = 'sell';
                        }else{
                            $new_pnl->action = 'buy';
                        }
                        $new_pnl->save();

//                    if($data[0][$i][3] == 'Продажа'){
//                        $new_sell = new Sell();
//                        $new_sell->kzl = $data[0][$i][0];
//                        $new_sell->isin = $data[0][$i][4];
//                        $new_sell->date =  str_replace('/', '-', $data[0][$i][8]);
//                        $new_sell->quantity_items = $data[0][$i][12];
//                        $new_sell->price_items = str_replace(',', '', $data[0][$i][13]);
//                        $new_sell->save();
//                    }else{
//                        $new_buy = new Buy();
//                        $new_buy->kzl = $data[0][$i][0];
//                        $new_buy->isin = $data[0][$i][4];
//                        $new_buy->date =  str_replace('/', '-', $data[0][$i][8]);
//                        $new_buy->quantity_items = $data[0][$i][12];
//                        $new_buy->price_items = str_replace(',', '', $data[0][$i][13]);
//                        $new_buy->save();
//                    }
                }
            }

            $message = 'Добавлены';
        return redirect()->back()->with('message',$message);
    }
    public function importList()
    {
        $pnl = Pnl::orderBy('created_at','desc')->paginate(20);
        return view('admin.users.import.list')->with('pnl', $pnl);
    }
    public function importDelete($id)
    {
//        dd($id);
        Pnl::find($id)->delete();
        $message = 'Успешно удалено';
        return redirect()->route('users.import.list')->with('message', $message);
    }



}

