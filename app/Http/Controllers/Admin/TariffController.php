<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Tariff;


class TariffController extends Controller
{
    //

    public function list()
    {

        $tariffs = Tariff::where('lang', 'ru')->paginate(15);
        return view('admin.tariff.list')->with('tariffs', $tariffs);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){

            return view('admin.tariff.create');
        }else{
            $rules = [
                'title' => 'required',
                'desc' => 'required',
                'comm' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $tariff = new Tariff();
            $tariff->title = $request->title;
            $tariff->desc = $request->desc;
            $tariff->commission = $request->comm;
            $tariff->lang = $request->lang;
            $tariff->order = $request->order;
            $tariff->note = $request->note ? $request->note : null;
            $tariff->public = $request->public ? true : false;
            $tariff->save();

            $message = 'Успешно добавлен';

            return redirect()->route('tariff.list')->with('message',$message);
        }
    }
    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $tariff = Tariff::find($id);
            return view('admin.tariff.edit')->with('tariff', $tariff);
        }else{
            $rules = [
                'title' => 'required',
                'desc' => 'required',
                'comm' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $tariff = Tariff::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'order' => $request->order,
                'commission' => $request->comm,
                'note' => $request->note ? $request->note : null,
                'public' => $request->public ? true : false,
            ]);
            $message = 'Успешно обновлён';

            return redirect()->route('tariff.list')->with('message',$message);
        }
    }

    public function delete($id)
    {
        $tariff =  Tariff::find($id);
        $tariff->translations()->delete();
        $tariff->delete();
        $message = 'Удален';
        return redirect()->back()->with('message', $message);
    }

    public function translate($id, $lang)
    {
        $tariff = Tariff::where(['tar_id' => $id, 'lang' => $lang])->first();
        if($tariff){
            return view('admin.tariff.translate')->with('tariff', $tariff);
        }else{
            $parent = Tariff::find($id);
            $new = new Tariff();
            $new->title = $parent->title.' ' . $lang;
            $new->lang = $lang;
            $new->desc = $parent->desc;
            $new->order = $parent->order;
            $new->commission = $parent->commission;
            $new->note = $parent->note ? $parent->note : null;
            $new->tar_id = $id;
            $new->public = $parent->public;
            $new->save();
            return view('admin.tariff.translate')->with('tariff', $new);
        }
//        return view('admin.tariff.translate');
    }
}
