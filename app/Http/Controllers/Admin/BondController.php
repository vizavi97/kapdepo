<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bond;
use Validator;
use Storage;

class BondController extends Controller
{
    //

    public function list()
    {
        $bonds = Bond::latest()->paginate(10);
        return view('admin.bonds.list')->with(['bonds' => $bonds]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {

            $comps = Company::get();
            return view('admin.bonds.create')->with('comps', $comps);
        } else {
            $rules = [
                'title' => 'required',
                'issuer' => 'required',
/*                'date_in' => 'required',
                'date_out' => 'required',*/
                'price' => 'required',
                "date_posting" => "required",
                "date_maturity" => "required",
                "term_circulation" => "required",
                "denomination" => "required",
                "cb_count" => "required",
                'percent' => 'required',
                'image' => 'required|max:1024|mimes:jpg,jpeg,png',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('bonds', 'public');


            $new = new Bond();
            $new->title = $request->title;
            $new->issuer = $request->issuer;
/*            $new->date_in = $request->date_in;
            $new->date_out = $request->date_out;*/
            $new->date_posting = $request->date_posting;
            $new->date_maturity = $request->date_maturity;
            $new->term_circulation = $request->term_circulation;
            $new->denomination = $request->denomination;
            $new->cb_count = $request->cb_count;
            $new->price = $request->price;
            $new->percent = $request->percent;
            $new->image = $name;
            $new->company_id = $request->company_id ? $request->company_id : null;
            $new->save();

            $message = 'Успешно добавлено';

            return redirect()->route('bonds.list')->with('message', $message);
        }
    }

    public function edit(Request $request, $id)
    {
        $bond = Bond::find($id);

        if ($request->isMethod('get')) {
            $comps = Company::get();
//            dd($bond);
            return view('admin.bonds.edit')->with(['comps' => $comps, 'bond' => $bond]);
        } else {

            $rules = [
                'title' => 'required',
                'issuer' => 'required',
/*                'date_in' => 'required',
                'date_out' => 'required',*/
                'price' => 'required',
                'percent' => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }

            $bond->update([
                'title' => $request->title,
                'issuer' => $request->issuer,
/*                'date_in' => $request->date_in,
                'date_out' => $request->date_out,*/
                'date_posting' => $request->date_posting,
                'date_maturity' => $request->date_maturity,
                'term_circulation' => $request->term_circulation,
                'denomination' => $request->denomination,
                'cb_count' => $request->cb_count,
                'price' => $request->price,
                'percent' => $request->percent,
                'company_id' => $request->company_id ? $request->company_id : null,
            ]);
            $message = 'Успешно обнавлена';

            return redirect()->route('bonds.list')->with('message', $message);
        }
    }

    public function delete($id)
    {
        $bond = Bond::find($id);

        $file = 'public/' . $bond->image;
//        dd($file);
        Storage::delete($file);

        $bond->delete();
        $message = 'Удалена';
        return redirect()->route('bonds.list')->with('message', $message);
    }
}
