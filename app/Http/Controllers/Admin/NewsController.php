<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewIt;
use App\Image;
use Validator;
use Str;
use Storage;

class NewsController extends Controller
{
    //
    public function list()
    {
        $news = NewIt::where(['parent_id' => null])->paginate(15);
        return view('admin.news.list')->with('news', $news);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.news.create');
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required:news,title|unique:news,title',
                'body' => 'required',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
//                'files.*' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('news', 'public');

            $new = new NewIt();
            $new->title = $request->title;
            $new->slug = Str::slug($request->title);
            $new->desc = $request->desc ? $request->desc : null;
            $new->body = $request->body;
            $new->image = $name;
            $new->lang = $request->lang;
            $new->category_id = $request->category_id;
            $new->public = $request->publish ? true : false;
            $new->save();

//            if($request->file('files')){
//                foreach ($request->file('files') as $file){
//                    $name = $file->store('news/images', 'public');
//                    $image = new Image();
//                    $image->type = 'news';
//                    $image->item_id = $new->id;
//                    $image->file = $name;
//                    $image->save();
//                }
//            }

            $message = 'Успешно добавлена';

            return redirect()->route('new.list')->with('message',$message);
        }
    }
    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $new = NewIt::where('id', $id)->with('files')->first();
//            dd($new);
            return view('admin.news.edit')->with('new', $new);
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'body' => 'required',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $new = NewIt::find($id);

            if($request->file('image')){
                $name = $request->file('image')->store('news', 'public');
            } else{
                $name = $new->image;
            }
            $new->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'desc' => $request->desc ? $request->desc : null,
                'body' => $request->body,
                'image' => $name,
                'category_id' => $request->category_id,
                'public' => $request->publish ? true :  false,
            ]);
            NewIt::where('parent_id', $id)->update([
                'image' => $name,
            ]);

            $message = 'Успешно обновлён';

            return redirect()->route('new.list')->with('message',$message);
        }
    }
    public function translate($id, $lang)
    {
        $original = NewIt::where(['parent_id' => $id, 'lang' => $lang])->first();
        if($original){
            return view('admin.news.translate')->with('new', $original);
        }else{
            $parent = NewIt::find($id);
            $new = new NewIt();
            $new->title = $parent->title.' ' . $lang;
            $new->slug = $parent->slug.'-'.$lang;
            $new->desc = $parent->desc;
            $new->body = $parent->body;
            $new->image = $parent->image;
            $new->lang = $lang;
            $new->category_id = $parent->category_id;
            $new->parent_id = $id;
            $new->public = $parent->public;
            $new->save();
            return view('admin.news.translate')->with('new', $new);
        }
    }
    public function delete($id)
    {
        $new = Newit::find($id);
//        $images = Image::where(['type' => 'news', 'item_id' => $id])->get();
        $file = 'public/' . $new->image;
        Storage::delete($file);
//        foreach ($images as $image){
//
//            $file = 'public/' . $image->file;
//            Storage::delete($file);
//
//        }
//        Image::where(['type' => 'news', 'item_id' => $id])->delete();
//        $images->delete();

        $new->translations()->delete();
        $new->delete();
//        dd($file);
        $message = 'Удалено';
        return redirect()->back()->with('message', $message);
    }
}
