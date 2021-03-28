<?php


namespace App\Http\Controllers\Tim;

use App\Company;
use App\Http\Controllers\Controller;
use App\KDIdeas;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KDIdeasController extends Controller
{
    public function edit(Request $request)
    {

        if ($request->isMethod('get')) {
            $kd = KDIdeas::where("id", $request->id)->first();
            $comps = Company::all();
            return view('admin.tim.kd-ideas.edit')->with('kd', $kd)->with('comps', $comps);
        } else {
            try {
                $kd = $comps = KDIdeas::find($request->id);
                $kd->company_id = $request->company_id;
                $kd->kd_number = $request->kd_number;
                $kd->share_count = $request->share_count;
                $kd->date = $request->date;
                $kd->box_dividends = $request->box_dividends;
                $kd->save();
                return redirect()->route('kd-ideas.list')->with("message", "KD-ideas successfully updated");
            } catch (Exception $e) {

                return new Exception($e);
            }

        }
    }

    public function list()
    {
        $kds = KDIdeas::with('getCompany')->get();
        return view("admin.tim.kd-ideas.list")->with('kds', $kds);
    }

    public function create(Request $request, Response $response)
    {
        if ($request->isMethod('get')) {

            $comps = Company::all();
            return view('admin.tim.kd-ideas.create')->with('comps', $comps);
        } else {

            $kd = new KDIdeas();
            $kd->company_id = $request->company_id;
            $kd->share_count = $request->share_count;
            $kd->kd_number = $request->kd_number;
            $kd->kd_price = $request->kd_price;
            $kd->date = $request->date;
            $kd->box_dividends = $request->box_dividends;
            $kd->save();

            $message = 'Успешно добавлен';
            return redirect()->route('kd-ideas.list')->with('message', $message);
        }
    }

    public function delete(Request $request)
    {

        KDIdeas::where("id", $request->id)->first()->delete();
        return redirect()->route('kd-ideas.list')->with('message', "KD-IDEAS successfully deleted");
    }

    public function get()
    {
        $companies = [];
        $kds = KDIdeas::all();
        foreach ($kds as $comp) {
            $company = \App\Company::where('id', $comp->company_id)->with('last_price_default')->first();
            $max_year = \App\CompanyDataApi::where('company_id', $comp->company_id)->max('year');
            $max_quarter = \App\CompanyDataApi::where('company_id', $comp->company_id)->where('year', $max_year)->max('quarter');
            $target = \App\CompanyDataApi::where('company_id', $comp->company_id)->where('year', $max_year)->where('quarter', $max_quarter)->max('target');
            $companies[$comp->kd_number][$comp->id] = ["company" => $company, "target" => $target, "kd-ideas" => $comp];
        }
        ksort($companies);
        return view('tim.kd-ideas.page')->with('kds', $companies);

    }
}