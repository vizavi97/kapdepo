<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Validator;
use Str;
use Storage;

class BannerController extends Controller
{
    //
    public function __construct(){}

    public function list()
    {
        $banners = Banner::where('ban_id', null)->paginate(15);
//        dd($banners);
        return view('admin.banner.list')->with('banners', $banners);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.banner.create');
        }else{
            $rules = [
                'title' => 'required',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('banners', 'public');

            $banner = new Banner();

            $banner->title = $request->title;
            $banner->path = $name;
            $banner->lang = $request->lang;
            $banner->published = $request->publish ? true : false;
            $banner->link = $request->link ? $request->link :  null;
            $banner->save();

            $message = 'Успешно добавлен';

            return redirect()->route('banner.list')->with('message',$message);

        }
    }
    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $banner = Banner::find($id);
            return view('admin.banner.edit')->with('banner',$banner);
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
             Banner::find($id)->update([
                'title' => $request->title,
                'link' => $request->link ? $request->link : null,
                'published' => $request->publish ? true : false,
             ]);
//            NewIt::where('parent_id', $id)->update([
//                'image' => $name,
//            ]);

            $message = 'Успешно обнавлён';

            return redirect()->route('banner.list')->with('message',$message);
        }
    }
    public function delete($id)
    {
//        dd($id);
        $banner =  Banner::find($id);
        $file = 'public/' . $banner->path;
//        dd($file);
        Storage::delete($file);
        $banner->translations()->delete();
        $banner->delete();
        $message = 'Удалена';
        return redirect()->back()->with('message', $message);
    }

    public function translate($id, $lang)
    {
//        dd($id);
        $banner = Banner::where(['ban_id' => $id, 'lang' => $lang])->first();
        if($banner){
            return view('admin.banner.translate')->with('banner', $banner);
        }else{
            $parent = Banner::find($id);
            $new = new Banner();
            $new->title = $parent->title.' ' . $lang;
            $new->lang = $lang;
            $new->path = $parent->path;
            $new->ban_id = $id;
            $new->published = $parent->published;
            $new->save();
            return view('admin.banner.translate')->with('banner', $new);
        }
    }
}
