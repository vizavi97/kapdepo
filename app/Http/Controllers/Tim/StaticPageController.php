<?php


namespace App\Http\Controllers\Tim;


use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function getCompanyPageInformation() {

        return view('admin.tim.md-company.md-company');
    }
}