<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Statistic;
use App\Setting;
use App\Social;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Str;
use Validator;





class AdminController extends Controller
{
    //
     public function index()
     {
         return view('admin.dashboard');
     }

     public function getStats(Request $request)
     {
//         dd($stat);
         if ($request->isMethod('get')){
             $stat = Statistic::find(1);
             if($stat){
                 return view('admin.stats.edit')->with('stat',$stat);
             }else{
                 $stat = new Statistic();
                 $stat->save();
                 return view('admin.stats.edit')->with('stat',$stat);
             }
         }else{
             $stat = Statistic::find(1);
             $stat->update([
                 'fond' => $request->fond ? $request->fond : null,
                 'transactions' => $request->transactions ? $request->transactions: null,
                 'years' => $request->years ? $request->years : null,
                 'clients' => $request->clients ? $request->clients : null,
                 'clients_count' => $request->clients_count ? $request->clients_count : null,
             ]);

             $message = 'Обновлено';

             return redirect()->back()->with('message',$message);
         }
     }

     public function getXml()
     {
         $url = 'https://uzse.uz/cps.xml';

         $xml = XmlParser::load($url);
         $temp = 0;
         $te = $xml->getContent();
//         dd($te['common_purses_uzs']);
         foreach ($xml->getContent() as $key => $value){
            if($key == 'common_purses_uzs'){
                foreach ($value as $t){
                    if($t->mbr_no == '00443'){
                        $temp = $t->amount;
                    }
                }

            }
         }
         $a = str_replace(' ', '', $temp);
         $a = Str::before($a, ',');
         $stat = Statistic::find(1);
         $stat->update([
             'fond' => $a
         ]);

         return redirect()->route('stat.edit')->with('message', 'Обновлено');
//         dd($a);
//         dd($xml);

     }

     public function settings(Request $request)
     {
         if($request->isMethod('get')) {
             $setting = Setting::find(1);
             $socials = Social::find(1);
             if (!$setting) {
                 $setting = new Setting();
                 $setting->sitename = 'test';
                 $setting->email = 'test@test.com';
                 $setting->phone = 'Some phone';
                 $setting->address_ru = 'Some address ru';
                 $setting->address_uz = 'Some address uz';
                 $setting->address_en = 'Some address en';
                 $setting->foot_ru = 'Some text';
                 $setting->foot_uz = 'Some text';
                 $setting->foot_en = 'Some text';
                 $setting->save();
             }
             if (!$socials) {
                 $socials = new Social();
                 $socials->facebook = '#';
                 $socials->twitter = '#';
                 $socials->instagram = '#';
                 $socials->google = '#';
                 $socials->save();
             }
             return view('admin.settings')->with(['setting' => $setting, 'socials' => $socials]);
         }else{

             $rules = [
                 'sitename' => 'required',
                 'phone' => 'required',
                 'email' => 'required|email',
                 'address_ru' => 'required',
                 'address_uz' => 'required',
                 'address_en' => 'required',
                 'foot_ru' => 'required',
                 'foot_en' => 'required',
                 'foot_uz' => 'required',
             ];
//             $name = null;
             if(!empty($request->file('file'))){
//                 dd($request->file('file'));
                 $name = 'storage/'.$request->file('file')->store('tariff', 'public');
             }else{
                 $setting = Setting::find(1);
                 $name = $setting->file ? $setting->file : null;
             }

             $validator = Validator::make($request->all(), $rules);
             if($validator->fails()){
                 return back()->with('er','hello')->withErrors($validator);
             }



             $setting = Setting::find(1)->update([
                 'sitename' => $request->sitename,
                 'phone' => $request->phone,
                 'email' => $request->email,
                 'file' => $name,
                 'address_ru' => $request->address_ru,
                 'address_uz' => $request->address_uz,
                 'address_en' => $request->address_en,
                 'foot_ru' => $request->foot_ru,
                 'foot_en' => $request->foot_en,
                 'foot_uz' => $request->foot_uz,
             ]);

             $socials = Social::find(1)->update([
                 'facebook' => $request->facebook,
                 'twitter' => $request->twitter,
                 'instagram' => $request->instagram,
                 'google' => $request->google,
             ]);
             $message = 'Обновлено';
             return redirect()->route('settings')->with(['message' => $message , 'setting' => $setting, 'socials' => $socials]);
         }
     }

//      seo
    public function SeoList()
    {
        return view('admin.seo.list');
    }

    public function SeoCreate(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.seo.create');
        }else{
            return redirect()->route('seo.list');
        }
    }
}
