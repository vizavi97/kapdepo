<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teammate;
use Validator;
use Str;
use Storage;

class TeamController extends Controller
{
    //
    public function list()
    {
        $team = Teammate::where(['person_id' => null])->paginate(15);
        return view('admin.team.list')->with('team', $team);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){

            return view('admin.team.create');
        }else{
//            dd($request->all());
            $rules = [
                'surname' => 'required',
                'name' => 'required',
                'desc' => 'required',
                'position' => 'required',
                'order' => 'required|numeric',
                'phone_one' => 'required',
                'email' => 'required|email',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('team', 'public');

            $team = new Teammate();
            $team->surname = $request->surname;
            $team->name = $request->name;
            $team->patronymic = $request->patronymic ? $request->patronymic : null;
            $team->position = $request->position;
            $team->position = $request->desc;
            $team->photo = $name;
            $team->order = $request->order;
            $team->phone_one = $request->phone_one;
            $team->phone_two = $request->phone_two ? $request->phone_two : null;
            $team->email = $request->email;
            $team->lang = $request->lang;
            $team->public = $request->publish ? true : false;
            $team->save();

            $message = 'Успешно добавлен';

            return redirect()->route('team.list')->with('message',$message);
        }
    }
    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $person = Teammate::find($id);
            return view('admin.team.edit')->with('person', $person);
        }else{
            $rules = [
                'surname' => 'required',
                'name' => 'required',
                'position' => 'required',
                'desc' => 'required',
                'phone_one' => 'required',
                'email' => 'required|email',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $team = Teammate::find($id);

            if($request->file('image')){
                $name = $request->file('image')->store('team', 'public');
            } else{
                $name = $team->photo;
            }


            $team->update([
                'surname' => $request->surname,
                'name' => $request->name,
                'patronymic' => $request->patronymic,
                'position' => $request->position,
                'description' => $request->desc,
                'photo' => $name,
                'email' => $request->email,
                'order' => $request->order,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two ? $request->phone_two :  null,
                'public' => $request->publish ? true :  false,
            ]);
            Teammate::where('person_id', $id)->update([
                'photo' => $name,
            ]);
            $message = 'Успешно обновлён';

            return redirect()->route('team.list')->with('message',$message);
        }
    }

    public function translate(Request $request, $id, $lang)
    {
        $team = Teammate::where(['person_id' => $id, 'lang' => $lang])->first();
//        dd($team);
        if($team){
            return view('admin.team.translate')->with('person', $team);
        }else{
            $parent = Teammate::find($id);
            $new = new Teammate();
            $new->surname = $parent->surname.' ' . $lang;
            $new->name = $parent->name.' ' . $lang;
            $new->patronymic = $parent->patronymic.' ' . $lang;
            $new->lang = $lang;
            $new->person_id = $parent->id;
            $new->position = $parent->position;
            $new->description = $parent->description;
            $new->email = $parent->email;
            $new->photo = $parent->photo;
            $new->phone_one = $parent->phone_one;
            $new->phone_two = $parent->phone_two;
            $new->public = $parent->public;
            $new->order = $parent->order;
            $new->save();
            return view('admin.team.translate')->with('person', $new);
        }
    }
    public function delete($id){
        $message = 'Успешно удалён';
        $team = Teammate::find($id);
        $file = 'public/' . $team->photo;
        Storage::delete($file);
        $team->translations()->delete();
        $team->delete();
        return redirect()->route('team.list')->with('message',$message);
    }
}
