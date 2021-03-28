<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KDIdeas extends Model
{
    //
    protected $guarded = [];
    protected $table = 'kd_ideas';

    public function getCompany()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }

    public function getTarget()
    {
//            $year = \App\CompanyDataApi::where('company_id', 11)->max('year');
//            $quarter = \App\CompanyDataApi::where('company_id', 11)->where('year', $year)->max('quarter');
//            $data = \App\CompanyDataApi::where('company_id', 11)->where('year', $year)->where('quarter', $quarter)->first();
//            dump($data);
        return $this->hasMany('App\CompanyDataApi', 'company_id', "company_id");
    }

}
