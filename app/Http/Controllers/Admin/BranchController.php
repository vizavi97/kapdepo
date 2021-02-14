<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use Validator;
use Str;
use Storage;

class BranchController extends Controller
{
    //

    public function list()
    {
        $branches = Branch::where('branch_id', null)->paginate(15);
        return view('admin.branch.list')->with('branches', $branches);
    }
    public function create(Request $request){
        if($request->isMethod('get')){
            return view('admin.branch.create');
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required',
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'phone_one' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $branch = new Branch();
            $branch->title = $request->title;
            $branch->latitude = $request->latitude;
            $branch->longitude = $request->longitude;
            $branch->address = $request->address;
            $branch->phone_one = $request->phone_one;
            $branch->phone_two = $request->phone_two ? $request->phone_two : null;
            $branch->lang = $request->lang;
            $branch->link = $request->link ? $request->link : null;
            $branch->save();
            $message = 'Успешно добавлен';

            return redirect()->route('branches.list')->with('message',$message);
        }
    }
    public function edit(Request $request, $id){

        if($request->isMethod('get')){
            $branch = Branch::where('id',$id)->first();
            return view('admin.branch.edit')->with('branch',$branch);
        }else{
            $rules = [
                'title' => 'required',
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'phone_one' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }

            $branch = Branch::find($id);
            $branch->update([
                'title' => $request->title,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'link' => $request->link ? $request->link : null,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two ? $request->phone_two : null,
            ]);
            $message = 'Успешно обновлён';

            return redirect()->route('branches.list')->with('message',$message);
        }
    }

    public function translate($id, $lang)
    {
        $branch = Branch::where(['branch_id' => $id, 'lang' => $lang])->first();
        if($branch){
            return view('admin.branch.translate')->with('branch', $branch);
        }else{
            $parent = Branch::find($id);
            $new = new Branch();
            $new->title = $parent->title.' ' . $lang;
            $new->address = $parent->address.' ' . $lang;
            $new->lang = $lang;
            $new->branch_id = $id;
            $new->longitude = $parent->longitude;
            $new->latitude = $parent->latitude;
            $new->phone_one = $parent->phone_one;
            $new->phone_two = $parent->phone_two;
            $new->link = $parent->link;
            $new->save();
            return view('admin.branch.translate')->with('branch', $new);
        }
    }
    public function delete($id){
        $branch = Branch::find($id);

        $branch->translations()->delete();
        $branch->delete();

        $message = 'Успешно удалён';

        return redirect()->route('branches.list')->with('message',$message);

    }
}

