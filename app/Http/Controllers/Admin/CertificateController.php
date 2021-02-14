<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Certificate;
use Validator;
use Str;
use Storage;

class CertificateController extends Controller
{
    //

    public function list()
    {
        $certificates = Certificate::paginate(15);
        return view('admin.certificate.list')->with('certificates',$certificates);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.certificate.create');
        }else{
            $rules = [
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('certificates', 'public');


            $certificate = new Certificate();

            $certificate->title = $request->title ? $request->title : null;
            $certificate->image = $name;
            $certificate->public = $request->publish ? true : false;
            $certificate->save();

            $message = 'Успешно добавлен';

            return redirect()->route('certificates.list')->with('message',$message);
        }
    }
    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $certificate = Certificate::find($id);
            return view('admin.certificate.edit')->with('certificate', $certificate);
        }else{
//            dd($request->all());
            $rules = [
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('er','hello')->withErrors($validator);
            }


            $certificate = Certificate::find($id);
            if($request->file('image')){
                $name = $request->file('image')->store('certificates', 'public');
            }else{
                $name = $certificate->image;
            }
            $certificate->update([
                'title' => $request->title ? $request->title : null,
                'image' => $name,
                'public' => $request->publish ? true : false,
            ]);

            $message = 'Успешно обновлён';

            return redirect()->route('certificates.list')->with('message',$message);
        }
    }
    public function delete($id)
    {
        $certificate =  Certificate::find($id);
        $file = 'public/' . $certificate->path;
//        dd($file);
        Storage::delete($file);
        $certificate->delete();
        $message = 'Удалено';
        return redirect()->back()->with('message', $message);
    }
}
