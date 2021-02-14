<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stock;
use Illuminate\Validation\Rules\In;
use Validator;
use Storage;
use App\Index;
use App\Analytic;
use Orchestra\Parser\Xml\Facade as XmlParser;


class KdController extends Controller
{
    //
    public function list()
    {
        $stocks = Stock::where('stock_id', null)->paginate(30);
        return view('admin.kd.list')->with('stocks', $stocks);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.kd.create');

        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'isin' => 'required',
                'weight' => 'required|numeric',
                'issuer' => 'required',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = null;
            if ($request->file('image')){

                $name = $request->file('image')->store('stocks', 'public');
            }
//            dd($request->all());

            $stock = new Stock();
            $stock->title = $request->title;
            $stock->isin = $request->isin;
            $stock->issuer = $request->issuer;
            $stock->weight = $request->weight;
            $stock->lang = $request->lang;
            $stock->desc = $request->desc ? $request->desc : null;
            $stock->public = $request->public ? true :  false ;
            $stock->save();

            $message = 'Успешно добавлена';

            return redirect()->route('stocks.list')->with('message',$message);
        }
    }
    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $stock = Stock::find($id);
            return view('admin.kd.edit')->with('stock', $stock);
        }else{
            $rules = [
                'title' => 'required',
                'isin' => 'required',
                'weight' => 'required|numeric',
                'issuer' => 'required',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $stock = Stock::find($id);

            if($request->file('image')){
                $name = $request->file('image')->store('stocks', 'public');
            } else{
                $name = $stock->image ? $stock->image : null ;
            }
            $stock->update([
                'title' => $request->title,
                'isin' => $request->isin,
                'issuer' => $request->issuer,
                'weight' => $request->weight,
                'desc' => $request->desc ? $request->desc : null,
                'image' => $name,
                'public' => $request->public ? true :  false,
            ]);
            Stock::where('stock_id', $id)->update([
                'image' => $name,
            ]);

            $message = 'Успешно обновлён';

            return redirect()->route('stocks.list')->with('message',$message);
        }
    }
    public function delete($id)
    {

    }
    public function translate($id, $lang)
    {
        $original = Stock::where(['stock_id' => $id, 'lang' => $lang])->first();
        if($original){
            return view('admin.kd.translate')->with('stock', $original);
        }else{
            $parent = Stock::find($id);
            $new = new Stock();
            $new->title = $parent->title.' ' . $lang;
            $new->desc = $parent->desc;
            $new->isin = $parent->isin;
            $new->issuer = $parent->issuer;
            $new->weight = $parent->weight;
            $new->image = $parent->image;
            $new->lang = $lang;
            $new->stock_id = $id;
            $new->public = $parent->public;
            $new->save();
            return view('admin.kd.translate')->with('stock', $new);
        }
    }


    public function test()
    {
        $url = 'https://uzse.uz/tickers.xml';
        $test = [];

        $stocks = Stock::where('stock_id',null)->select('isin')->get();
        try {
            $xml = XmlParser::load($url);
        } catch (\Throwable $e) {
            $xml = 'error';
        }

//        dd('no');
//        dd($xml);
        $temp = 0;
        $te = $xml->getContent();
//        dd($te);

        foreach ($stocks as $stock){
            $test[$temp]['isin'] = $stock->isin;
            foreach ($te as $value){
                if ($stock->isin == $value->isu_cd){
//                    dd($value->isu_cd);
                    $t = str_replace(' ', '', $value->clsprc);
                    $price = str_replace(',', '.', $t);
                    $test[$temp]['price'] = $price;
                    $test[$temp]['koef'] = (1000/$price);
                }
            }
            $temp++;
        }
        $index = 0;
        for ($i = 0; $i < count($test); $i++){
            $index += $test[$i]['koef']*$test[$i]['price'];
        }
        $new = new Index();
        $new->date = date('d.m.Y');
        $new->index = ($index/count($test));
        $new->save();
//        dd($index);
        return redirect()->back();
    }



//     Analytics

    public function listAnalytics()
    {
        $analytics = Analytic::where('parent_id', null)->paginate(30);
        return view('admin.kd.list')->with('data', $analytics);
    }
    public function createAnalytics(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.kd.create');

        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'name' => 'required',
                'desc' => 'required',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
                'pdf' => 'required|max:1024|mimes:pdf',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
                $image = $request->file('image')->store('analytics', 'public');
                $pdf = $request->file('pdf')->store('analytics', 'public');

            $analytic = new Analytic();
            $analytic->title = $request->title;
            $analytic->name = $request->name;
            $analytic->body = $request->desc;
            $analytic->file = $pdf;
            $analytic->ava = $image;
            $analytic->lang = $request->lang;
            $analytic->save();
//
            $message = 'Успешно добавлена';
//
            return redirect()->route('analytics.list')->with('message',$message);
        }
    }
    public function editAnalytics(Request $request, $id)
    {
        $analytic = Analytic::find($id);

        if($request->isMethod('get')){
            return view('admin.kd.edit')->with('analytic', $analytic);
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'name' => 'required',
                'desc' => 'required',
            ];
//
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $analytic->update([
                'title' => $request->title,
                'name' => $request->name,
                'body' => $request->desc,
            ]);


            $message = 'Успешно обновлён';

            return redirect()->route('analytics.list')->with('message',$message);
        }
    }
    public function deleteAnalytics($id)
    {

        $banner =  Analytic::find($id);
        $file = 'public/' . $banner->file;
        $file_2 = 'public/' . $banner->ava;
//        dd($file);
        Storage::delete($file);
        Storage::delete($file_2);
        $banner->translations()->delete();
        $banner->delete();
        $message = 'Удалена';
        return redirect()->back()->with('message', $message);
    }
    public function translateAnalytics($id, $lang)
    {
        $original = Analytic::where(['parent_id' => $id, 'lang' => $lang])->first();
        if($original){
            return view('admin.kd.edit')->with('analytic', $original);
        }else{
            $parent = Analytic::find($id);
            $new = new Analytic();
            $new->title = $parent->title.' ' . $lang;
            $new->body = $parent->body;
            $new->name = $parent->name;
            $new->file = $parent->file;
            $new->ava = $parent->ava;
            $new->file = $parent->file;
            $new->lang = $lang;
            $new->parent_id = $id;
            $new->save();
            return view('admin.kd.edit')->with('analytic', $new);
        }
    }
}
