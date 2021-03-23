<?php


namespace App\Http\Controllers\Tim;


use App\Company;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function getCompanyPageInformation()
    {

        return view('admin.tim.md-company.md-company');
    }

    public function getCompanyDataDescPage($issuer)
    {
        $company = Company::where('issuer', $issuer)->with([
            'data',
        ])->first();

        return view('tim.market-data.company', compact('company','company'));

    }
}