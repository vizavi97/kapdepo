<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dividend;
use Validator;

class DividendController extends Controller
{
    //
    public function list()
    {
        $datas = Dividend::orderBy('created_at','desc')->paginate(15);
        return view('admin.data.dividend.list')->with('datas', $datas);
    }
    public function create(Request $request)
    {
        if ($request->isMethod('get')){
            $comps = Company::get();
            return view('admin.data.dividend.create')->with('comps', $comps);
        }else{

            $new = new Dividend();
            $new->company_id = $request->company_id;
            $new->year = $request->year;
            $new->sum = $request->sum;
            $new->procent = $request->procent;
            $new->preference = $request->preference;
            $new->preferencePercent = $request->preferencePercent;
            $new->save();
            $message = 'Успешно добавлено';
            return  redirect()->route('dividend.list')->with('message', $message);
        }
    }
    public function edit(Request  $request , $id)
    {
        $data = Dividend::find($id);
        if($request->isMethod('get')){

            $comps = Company::get();

            return view('admin.data.dividend.edit')->with(['data'=>$data , 'comps' => $comps]);
        }else{
            $data->update([
                'company_id' => $request->company_id,
                'year' => $request->year,
                'sum' => $request->sum,
                'procent' => $request->procent,
                'preference' => $request->preference,
                'preferencePercent' => $request->preferencePercent,
            ]);
            $message = 'Успешно обновлено';
            return  redirect()->route('dividend.list')->with('message', $message);
        }
    }
    public function delete($id)
    {
        $item = Dividend::find($id);
        $item->delete();
        $message = 'Успешно удалено';
        return  redirect()->route('dividend.list')->with('message', $message);
    }
}
