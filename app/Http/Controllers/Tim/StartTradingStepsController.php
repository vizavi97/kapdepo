<?php

namespace App\Http\Controllers\Tim;

use App\StartTradingSteps;
use http\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartTradingStepsController extends Controller
{
    //
    public function list()
    {
        $steps = StartTradingSteps::all();
        return view("admin.tim.start-trading-steps.list")->with('steps', $steps);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $comps = StartTradingSteps::where("id", $request->id)->get();
            return view('admin.tim.start-trading-steps.create')->with('comps', $comps);
        } else {

            $steps = new StartTradingSteps();
            $steps->position = $request->position;
            $steps->title = $request->title;
            $steps->text = $request->text;
            $steps->lang = $request->lang;
            $steps->save();

            $message = 'Успешно добавлен';
            return redirect()->route('start-trading.list')->with('message', $message);
        }
    }

    public function edit(Request $request)
    {

        if ($request->isMethod('get')) {
            $step = StartTradingSteps::where("id", $request->id)->first();
            return view('admin.tim.start-trading-steps.edit')->with('step', $step);
        } else {
            try {
                $step = StartTradingSteps::find($request->route("id"));

                $step->position = $request->position;
                $step->title = $request->title;
                $step->text = $request->text;
                $step->lang = $request->lang;
                $step->save();
                return redirect()->route('start-trading.list')->with("message", "faq successfully updated");
            } catch (\Error $e) {

                return new \Error($e);
            }

        }
    }

    public function delete(Request $request)
    {

        StartTradingSteps::where("id", $request->id)->first()->delete();

        return redirect()->route('start-trading.list')->with('message', "Faq successfully deleted");

    }
}
