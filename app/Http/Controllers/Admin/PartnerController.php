<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use Validator;
use Str;
use Storage;


class PartnerController extends Controller
{
    //

    public function list()
    {
        $partners = Partner::where('par_id', null)->paginate(15);
        return view('admin.partners.list')->with('partners', $partners);
    }

    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.partners.create');
        }else{
//            dd($request->all());

            $rules = [
                'title' => 'required',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('partners', 'public');

            $partner = new Partner();

            $partner->title = $request->title;
            $partner->image = $name;
            $partner->lang = $request->lang;
            $partner->desc = $request->desc ? $request->desc : null;
            $partner->link = $request->link ?  $request->link : null;
            $partner->public = $request->publish ? true : false;
            $partner->save();

            $message = 'Успешно добавлен';

            return redirect()->route('partners.list')->with('message',$message);
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $partner = Partner::find($id);

            return view('admin.partners.edit')->with('partner', $partner);
        }else{
            $rules = [
                'title' => 'required',
            ];
            if($request->file('image')){
                $rules['image'] = 'required|max:1024|mimes:jpeg,jpg,png';
            }
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $partner = Partner::find($id);
            if($request->file('image')){
                $name = $request->file('image')->store('partners', 'public');
            }else{
                $name = $partner->image;

            }

            $partner->update([
                'title' => $request->title,
                'image' => $name,
                'desc' => $request->desc ? $request->desc : null,
                'link' => $request->link ? $request->link : null,
                'public' => $request->publish ? true : false,
            ]);
            Partner::where('par_id', $id)->update([
                'image' => $name,
            ]);

//            dd($request->all());
            $message = 'Успешно обновлён';

            return redirect()->route('partners.list')->with('message',$message);
        }
    }

    public function translate($id, $lang)
    {
        $partner = Partner::where(['par_id' => $id, 'lang' => $lang])->first();
        if($partner){
            return view('admin.partners.translate')->with('partner', $partner);
        }else{
            $parent = Partner::find($id);
            $new = new Partner();
            $new->title = $parent->title.' ' . $lang;
            $new->image = $parent->image;
            $new->desc = $parent->desc ?  $parent->desc : null;
            $new->lang = $lang;
            $new->link = $parent->link ? $parent->link : null;
            $new->par_id = $id;
            $new->public = $parent->public;
            $new->save();
            return view('admin.partners.translate')->with('partner', $new);
        }
    }

    public function delete($id){
        $partner =  Partner::find($id);
        $file = 'public/' . $partner->image;
//        dd($file);
        Storage::delete($file);
        $partner->translations()->delete();

        $partner->delete();
        $message = 'Удалено';
        return redirect()->back()->with('message', $message);
    }
}
