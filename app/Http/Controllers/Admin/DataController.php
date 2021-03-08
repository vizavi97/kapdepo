<?php

namespace App\Http\Controllers\Admin;

use App\CompanyAnalysis;
use App\CompanyInfo;
use App\CompanyKey;
use Defuse\Crypto\Key;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Str;
use Storage;
use App\Imports\BrokerImport;
use Excel;
use App\Data;
use App\Company;
use App\CompanyData;
use App\CompanyPreference;
use App\Report;
use Carbon\Carbon;

use App\Helpers\Helper;

class DataController extends Controller
{
    // Data   and Preference
    public function listData(Request $request)
    {

        if ($request->has('pref')) {
            $data = CompanyPreference::orderBy('id', 'desc')->paginate(30);
            $type = 'Preference';
        } else {
            $data = CompanyData::orderBy('id', 'desc')->paginate(30);
            $type = '';
        }
//        dd('yes');
        return view('admin.data.list')->with([
            'comps' => Company::get(),
            'datas' => $data,
            'type' => $type,
        ]);
    }

    public function createDataSingle(Request $request)
    {
        $rules = [
            'image' => 'mimes:xlsx,xls',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = Excel::toArray(new BrokerImport(), $request->file('image'));

        for ($i = 1; $i < count($data[0]); $i++) {
            if (!empty($data[0][$i][2])) {
                if ($request->has('pref')) {
                    $model = new CompanyPreference();
                } else {
                    $model = new CompanyData();
                }
                $comp_data = $model;
                $comp_data->company_id = $request->comp_id;
                $comp_data->last_price = $data[0][$i][2];
                $comp_data->volume = $data[0][$i][4];
                $comp_data->time = $data[0][$i][0] . ':00';
                $comp_data->timestamp = strtotime(date(str_replace('.', '-', $data[0][$i][1]) . ' ' . $data[0][$i][0] . ':00'));
                $comp_data->date = date('Y-m-d', $comp_data->timestamp);
//                $comp_data->date = str_replace('.','-', $data[0][$i][1]);
                $comp_data->save();
            }
        }
        $message = 'Добавлено';
        if ($request->has('pref')) {
            return redirect()->route('data.list', 'pref=1')->with('message', $message);
        }
        return redirect()->route('data.list')->with('message', $message);
    }

    public function deleteData(Request $request, $id)
    {
        $message = 'Удалено';

        if ($request->has('pref')) {
            CompanyPreference::find($id)->delete();
            return redirect()->route('data.list', 'pref=1')->with('message', $message);

        }
        CompanyData::find($id)->delete();
        return redirect()->route('data.list')->with('message', $message);


    }

    // Reports Finance dict
    public function getReports()
    {
        $reports = Report::orderBy('id', 'desc')->paginate(50);
        return view('admin.data.dict.fin-list')->with('reports', $reports);
    }

    public function createReport(Request $request)
    {
        if ($request->isMethod('get')) {
            $comps = Company::get();
            return view('admin.data.dict.fin-create')->with('comps', $comps);
        } else {

            $rules = [
                'body' => 'required',
                'company' => 'required|numeric',
                'kvartal' => 'required|numeric',
                'date' => 'required|date_format:d/m/Y',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }
//            dd($request->all());
            $new = new Report();
            $new->type = $request->type;
            $new->company_id = $request->company;
            $new->date = $request->date;
            $new->year = date('Y', strtotime(str_replace('/', '.', $request->date)));
            $new->quarter = $request->kvartal;
            $new->body = $request->body;
            $new->save();
            $message = 'Успешно добавлен';

            return redirect()->route('report.list')->with('message', $message);

        }
    }

    public function editReport(Request $request, $id)
    {
        $report = Report::find($id);
        $comps = Company::get();
        if ($request->isMethod('get')) {
//            dd(strtotime($report->date));
            return view('admin.data.dict.fin-edit')->with(['report' => $report, 'comps' => $comps]);
        } else {
            $rules = [
                'body' => 'required',
                'company' => 'required|numeric',
                'kvartal' => 'required|numeric',
                'date' => 'required|date_format:d/m/Y',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }
            $report->update([
                'type' => $request->type,
                'body' => $request->body,
                'company_id' => $request->company,
                'quarter' => $request->kvartal,
                'year' => date('Y', strtotime(str_replace('/', '.', $request->date))),
                'date' => $request->date,
            ]);
            $message = 'Успешно обновлено';

            return redirect()->route('report.list')->with('message', $message);

        }
    }

    public function deleteReport($id)
    {
        $fin = Report::find($id);
        $fin->delete();
        $message = 'Успешно удален';
        return redirect()->back()->with('message', $message);
//        dd($fin);
    }


    //      Company
    public function listCompany(Request $request)
    {
        $comps = Company::where('id', "!=", null);
        if (isset($request->status) && $request->status != "") {
            $comps->where("status", $request->status);
        }
        return view('admin.data.company')->with('comps', $comps->paginate(15));
    }

    public function createCompany(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.data.company-create');
        } else {
            $rules = [
                'title' => 'required',
                'isin' => 'required',
                'issuer' => 'required',
                'status' => 'required',
                'image' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
//            dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('company', 'public');

            $company = new Company();
            $company->title = $request->title;
            $company->isin = $request->isin;
            $company->issuer = $request->issuer;
            $company->image = $name;
            $company->status = $request->status;
            $company->kdindex = isset($request->kdindex) ? true : false;
            $company->save();

            $company->details()->create();


            $info = new CompanyInfo();
            $info->company_id = $company->id;
            $info->lang = $request->lang;
            $info->desc = $request->body ? $request->body : null;
            $info->site = $request->site ? $request->site : null;
            $info->address = $request->address ? $request->address : null;
            $info->phone = $request->phone ? $request->phone : null;
            $info->sector = $request->sector ? $request->sector : null;
            $info->industry = $request->industry ? $request->industry : null;
            $info->save();
            $message = 'Успешно добавлен';

            return redirect()->route('data.list.comp')->with('message', $message);
        }
    }

    public function editCompany(Request $request, $id)
    {
        $company = Company::where('id', $id)->with(['info' => function ($query) {
            $query->where('lang', 'ru');
        }])->first();
        if ($request->isMethod('get')) {
            return view('admin.data.company-edit')->with('company', $company);
        } else {
            $rules = [
                'title' => 'required',
                'isin' => 'required',
                'issuer' => 'required',
                'image' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }
//            $company = Company::find($id);

            if ($request->file('image')) {
                $name = $request->file('image')->store('company', 'public');
            } else {
                $name = $company->image;
            }
            $company->update([
                'title' => $request->title,
                'isin' => $request->isin,
                "status" => $request->status,
                'kdindex' => isset($request->kdindex) ? true : false,
                'issuer' => $request->issuer,
                'image' => $name,
            ]);
            CompanyInfo::where(['company_id' => $id, 'lang' => $request->lang])->update(
                [
                    'desc' => $request->body,
                    'site' => $request->site,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'sector' => $request->sector,
                    'industry' => $request->industry,
                ]
            );

            $message = 'Успешно обновлено';

            return redirect()->route('data.list.comp')->with('message', $message);
        }
    }

    public function translateCompany($id, $lang)
    {
//        $trans = CompanyInfo::trans($id,$lang);
//        dd($trans);
        $trans = CompanyInfo::where(['company_id' => $id, 'lang' => $lang])->with('parent')->first();
        if ($trans) {

//            dd($trans);
            return view('admin.data.company-translate')->with('company', $trans);
        } else {
            $new = new CompanyInfo();
            $new->company_id = $id;
            $new->lang = $lang;
            $new->desc = 'test';
            $new->site = 'test';
            $new->phone = 'test';
            $new->address = 'test';
            $new->sector = 'test';
            $new->industry = 'test';
            $new->save();
            return view('admin.data.company-translate')->with('company', $new->with('parent')->first());
        }

    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);
        $company->anlysis()->delete();
        $company->keys()->delete();
        $company->market_reports()->delete();
        $company->delete();

        $message = 'Удалена';
        return redirect()->back()->with('message', $message);
    }

    public function changeCompanyDetail(Request $request, $id)
    {
//        Helper::Procent(1, 1);
        $rules = [];
        $company = Company::find($id);
        $company->details()->update([
            'common_stocks' => str_replace(',', '.', $request->common_stocks),
            'p_e' => str_replace(',', '.', $request->p_e),
            'p_b' => str_replace(',', '.', $request->p_b),
            'dividend' => $request->dividend ? str_replace(',', '.', $request->dividend) : $company->details->dividend,
            'capitalization' => str_replace(',', '.', $request->capitalization),
            'preference' => $request->preference ? str_replace(',', '.', $request->preference) : null,
            // 'preference' => $request->preference ? str_replace(',', '.', $request->preference) : $company->details->preference,

            'face' => str_replace(',', '.', $request->face),
            'free_procent' => str_replace(',', '.', $request->free_procent),
            'free_quantity' => Helper::Procent($request->common_stocks, $request->free_procent),
        ]);
        $message = 'Данные обновлены';
//        dd($id);
        return redirect()->route('data.list.comp')->with('message', $message);
    }


//     Key Executives

    public function listKey()
    {
        $key = CompanyKey::where('lang', 'ru')->with('info')->paginate(10);
//        dd($key);
        return view('admin.data.key.list')->with('keys', $key);
    }

    public function createKey(Request $request)
    {
//        dd($request->all());
        if ($request->isMethod('get')) {
            $comp = Company::get();
            return view('admin.data.key.create')->with('comps', $comp);
        } else {
//            dd($request->all());
            $key = new CompanyKey();
            $key->company_id = $request->company;
            $key->name = $request->name;
            $key->position = $request->position;
            $key->lang = $request->lang;
            $key->save();
            $message = 'Успешно добавлен';
            return redirect()->route('data.list.key')->with('message', $message);
        }
    }

    public function editKey(Request $request, $id)
    {
        $key = CompanyKey::find($id);
        if ($request->isMethod('get')) {
            $comp = Company::get();
            return view('admin.data.key.edit')->with(['key' => $key, 'comps' => $comp]);
        } else {
            $key->update([
                'company_id' => $request->company,
                'name' => $request->name,
                'position' => $request->position,
            ]);
            $message = 'Успешно обновлено';
            return redirect()->route('data.list.key')->with('message', $message);
        }
    }

    public function deleteKey(Request $request, $id)
    {
        $keys = CompanyKey::where('company_id', $id)->get();
        foreach ($keys as $item) {

            $item->delete();
        }
        $message = 'Успешно удалено';
        return redirect()->route('data.list.key')->with('message', $message);
//        dd($id);
    }

    public function translateKey(Request $request, $id, $lang)
    {
        $original = CompanyKey::find($id);
        $key = CompanyKey::where(['parent_id' => $id, 'lang' => $lang])->first();
        $comp = Company::get();
        if ($key) {
            return view('admin.data.key.edit')->with(['key' => $key, 'comps' => $comp]);
        } else {
            $key = CompanyKey::where(['company_id' => $id, 'lang' => $lang])->first();
            $new = new CompanyKey();
            $new->name = $original->name . $lang;
            $new->position = $original->position . $lang;
            $new->lang = $lang;
            $new->company_id = $original->company_id;
            $new->parent_id = $id;
            $new->save();
            return view('admin.data.key.edit')->with(['key' => $new, 'comps' => $comp]);

        }
    }


    public function listAnalysis()
    {
        $analysis = CompanyAnalysis::where('lang', 'ru')->with('info')->paginate(10);
        return view('admin.data.analysis.list')->with('analysis', $analysis);
    }

    public function createAnalysis(Request $request)
    {
        if ($request->isMethod('get')) {
            $comps = Company::get();
            return view('admin.data.analysis.create')->with('comps', $comps);
        } else {
            $rules = [
                'body' => 'required',
                'image' => 'required|max:1024|mimes:pdf',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }
            $name = $request->file('image')->store('analysis', 'public');

            $new = new CompanyAnalysis();
            $new->title = $request->title;
            $new->image = $name;
            $new->company_id = $request->company;
            $new->desc = $request->body;
            $new->lang = $request->lang;
            $new->save();

            $message = 'Успешно добавлено';

            return redirect()->route('data.list.analysis')->with('message', $message);
//            dd($request->all());
        }
    }

    public function editAnalysis(Request $request, $id)
    {
        $analysis = CompanyAnalysis::find($id);
        if ($request->isMethod('get')) {
            $comps = Company::get();

            return view('admin.data.analysis.edit')->with(['comps' => $comps, 'analysis' => $analysis]);
        } else {
            $rules = [
                'body' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('er', 'hello')->withErrors($validator);
            }

            $analysis->update([
                'company_id' => $request->company,
                'title' => $request->title,
                'desc' => $request->body,
            ]);
            $message = 'Успешно обновлено';

            return redirect()->route('data.list.analysis')->with('message', $message);
        }
    }

    public function deleteAnalysis($id)
    {
        $analysis = CompanyAnalysis::where('company_id', $id)->get();
        foreach ($analysis as $item) {

            $item->delete();
        }
        $message = 'Успешно удалено';
        return redirect()->route('data.list.analysis')->with('message', $message);

    }

    public function translateAnalysis(Request $request, $id, $lang)
    {
        $analysis = CompanyAnalysis::where(['company_id' => $id, 'lang' => $lang])->first();
        $comps = Company::get();
        if ($analysis) {

            return view('admin.data.analysis.edit')->with(['comps' => $comps, 'analysis' => $analysis]);
        } else {
            $analysis = CompanyAnalysis::where(['company_id' => $id, 'lang' => 'ru'])->first();

            $new = new CompanyAnalysis();
            $new->company_id = $analysis->company_id;
            $new->image = $analysis->image;
            $new->title = $analysis->title . $lang;
            $new->desc = $analysis->desc . $lang;
            $new->lang = $lang;
            $new->save();
            return view('admin.data.analysis.edit')->with(['comps' => $comps, 'analysis' => $new]);

        }
    }

}
