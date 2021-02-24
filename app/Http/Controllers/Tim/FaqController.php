<?php


namespace App\Http\Controllers\Tim;

use App\FAQ;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Lang;


class FaqController extends Controller
{
    public function get()
    {
        $data = FAQ::all()->where('lang', Lang::getLocale());
        return view('tim.faq.faq')->with('faqs', $data);
    }

    public function edit(Request $request)
    {

        if ($request->isMethod('get')) {
            $faq = FAQ::where("id", $request->id)->first();
            return view('admin.tim.faq.edit')->with('faq', $faq);
        } else {
            try {
                $faq = $comps = FAQ::find($request->id);
                $faq->question = $request->question;
                $faq->answer = $request->answer;
                $faq->save();
                return redirect()->route('faq.list')->with("message", "faq successfully updated");
            } catch (Exception $e) {

                return new Exception($e);
            }

        }
    }

    public function list()
    {
        $faqs = FAQ::all();
        return view("admin.tim.faq.list")->with('faqs', $faqs);
    }

    public function create(Request $request, Response $response)
    {
        if ($request->isMethod('get')) {
            $comps = FAQ::where("id", $request->id)->get();
            return view('admin.tim.faq.create')->with('comps', $comps);
        } else {

            $faq = new FAQ();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->lang = $request->lang;
            $faq->save();

            $message = 'Успешно добавлен';
            return redirect()->route('faq.list')->with('message', $message);
        }
    }

    public function delete(Request $request)
    {

        FAQ::where("id", $request->id)->first()->delete();

        return redirect()->route('faq.list')->with('message', "Faq successfully deleted");

    }
}