<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Achiev;
use Validator;
use Storage;

class AchievController extends Controller
{
    //
    public function list()
    {
        $data = Achiev::paginate(15);

        return view('admin.achiev.list')->with('items', $data);
    }
    public function create(Request  $request)
    {
        if($request->isMethod('get')){
            return view('admin.achiev.create');
        }else{
            $rules = [
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('achievments', 'public');


            $certificate = new Achiev();

            $certificate->title = $request->title ? $request->title : null;
            $certificate->image = $name;
            $certificate->save();

            $message = 'Успешно добавлен';

            return redirect()->route('achiev.list')->with('message',$message);
        }
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $certificate = Achiev::find($id);
            return view('admin.achiev.edit')->with('item', $certificate);
        }else{
//            dd($request->all());
            $rules = [
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }


            $certificate = Achiev::find($id);
            if($request->file('image')){
                $name = $request->file('image')->store('achievments', 'public');
            }else{
                $name = $certificate->image;
            }
            $certificate->update([
                'title' => $request->title ? $request->title : null,
                'image' => $name,
            ]);

            $message = 'Успешно обновлён';

            return redirect()->route('achiev.list')->with('message',$message);
        }
    }
    public function delete($id)
    {
        $certificate =  Achiev::find($id);
        $file = 'public/' . $certificate->path;
//        dd($file);
        Storage::delete($file);
        $certificate->delete();
        $message = 'Удалено';
        return redirect()->back()->with('message', $message);
    }
}
