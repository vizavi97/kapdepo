<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\History;
use Validator;
use Storage;

class HistoryController extends Controller
{
    //
    public function  list()
    {
        $stories  = History::where('his_id', null)->paginate(15);
        return view('admin.history.list')->with('stories',$stories);
    }
    public function  create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.history.create');
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'year' => 'required',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
                'desc' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('history', 'public');

            $story = new History();

            $story->title = $request->title;
            $story->image = $name;
            $story->lang = $request->lang;
            $story->year = $request->year;
            $story->desc = $request->desc;

            $story->save();

            $message = 'Успешно добавлена';

            return redirect()->route('history.list')->with('message',$message);

        }
    }
    public function  edit(Request $request, $id){
        if($request->isMethod('get')){
            $story = History::find($id);
            return view('admin.history.edit')->with('story', $story);
        }else{
            $rules = [
                'title' => 'required',
                'year' => 'required',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
                'desc' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $story = History::find($id);

            if($request->file('image')){
                $name = $request->file('image')->store('news', 'public');
            } else{
                $name = $story->image;
            }

            $story->update([
                'title' => $request->title,
                'image' => $name,
                'year' =>$request->year,
                'desc' =>$request->desc,
            ]);
            History::where('his_id', $id)->update([
                'image' => $name,
            ]);

            $message = 'Успешно обновлёна';

            return redirect()->route('history.list')->with('message',$message);
        }
    }
    public function  delete($id)
    {
        $story =  History::find($id);
        $file = 'public/' . $story->image;
//        dd($file);
        Storage::delete($file);
        $story->translations()->delete();
        $story->delete();
        $message = 'Удалена';
        return redirect()->back()->with('message', $message);
    }
    public function  translate($id, $lang)
    {
        $story = History::where(['his_id' => $id, 'lang' => $lang])->first();
        if($story){
            return view('admin.history.translate')->with('story', $story);

        }else{
            $parent = History::find($id);
            $new = new History();
            $new->title = $parent->title.' ' . $lang;
            $new->lang = $lang;
            $new->image = $parent->image;
            $new->year = $parent->year;
            $new->desc = $parent->desc;
            $new->his_id = $id;
            $new->save();
            return view('admin.history.translate')->with('story', $new);
        }
    }
}
