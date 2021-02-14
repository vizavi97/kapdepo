<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    //
    protected $table = 'companies_detail';
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }


    public function data()
    {
        $d = date("Y-m-d",mktime(0,0,0,date('m'), date('d'), date('Y'))) ;

        return $this->hasMany('App\CompanyData', 'company_id', 'company_id')->where('date', date('Y-m-d'));

    }

    public function month()
    {
        $d = date("Y-m-d",mktime(0,0,0,date('m')-1, date('d'), date('Y'))) ;
        $d_2 = date("Y-m-d", mktime(23,59,59,date('m'), date('d'), date('Y'))) ;

        return $this->hasMany('App\CompanyData', 'company_id', 'company_id')->whereBetween('date',[$d , $d_2])->orderBy('timestamp','asc');

    }
}
