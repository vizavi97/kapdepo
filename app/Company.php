<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'companies';
    protected $guarded = [];

//    public function translations()
//    {
//        return $this->hasMany('App\Company', 'parent_id', 'id');
//
//    }

    public function info()
    {
        return $this->hasOne('App\CompanyInfo', 'company_id', 'id');
    }

    public function keys()
    {
        return $this->hasMany('App\CompanyKey', 'company_id', 'id');

    }

    public function details()
    {
        return $this->hasOne('App\CompanyDetail', 'company_id', 'id');

    }

    public function data()
    {
        return $this->hasOne('App\CompanyData', 'company_id', 'id')->orderBy('timestamp', 'desc');
    }

    public function max()
    {
        return $this->hasOne('App\CompanyData', 'company_id', 'id')->where('date', date('Y-m-d'))->orderBy('last_price', 'desc')->latest();

    }

    public function min()
    {
        return $this->hasOne('App\CompanyData', 'company_id', 'id')->where('date', date('Y-m-d'))->orderBy('last_price', 'asc')->latest();;

    }

    public function last_month()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')));
        return $this->hasOne('App\CompanyData', 'company_id', 'id')->where('date', $d)->orderBy('timestamp', 'desc');
    }

    public function curr_month()
    {
//        $d = date("Y-m-d",mktime(0,0,0,date('m'), 01, date('Y')));

        return $this->hasOne('App\CompanyData', 'company_id', 'id')->where('date', date('Y-m-d'))->orderBy('timestamp', 'desc');
    }

    public function last_year()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        return $this->hasOne('App\CompanyData', 'company_id', 'id')->where('date', $d)->orderBy('timestamp', 'desc');
    }

    private function getArrWeekends()
    {
        $min = \App\CompanyData::min('date');
        $carbon = \Carbon\CarbonPeriod::between($min, now())->filter('isWeekend');

        $dates = [];
        foreach ($carbon as $carbonItem) {
            $dates[] = $carbonItem->format('Y-m-d');
        }
        return $dates;
    }

    public function volume()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        return $this->hasMany('App\CompanyData', 'company_id', 'id')
            ->where('date', '>=', $d)
            ->whereNotIn('date', $this->getArrWeekends());
    }

    public function preference_volume()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        return $this->hasMany('App\CompanyPreference', 'company_id', 'id')
            ->where('date', '>=', $d)
            ->whereNotIn('date', $this->getArrWeekends());
    }


    public function week_range_max()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));
//        strtotime($d)
        return $this->hasMany('App\CompanyData', 'company_id', 'id')
            ->whereBetween('date', [$d, $d_2])
            ->orderBy('last_price', 'desc');

    }

    public function month_range_max()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')));
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));

        return $this->hasOne('App\CompanyData', 'company_id', 'id')
            ->whereBetween('date', [$d, $d_2])
            ->orderBy('last_price', 'desc');

    }


    public function month_volume()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')));
        return $this->hasMany('App\CompanyData', 'company_id', 'id')->where('date', '>=', $d);
    }

    public function year_volume()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        return $this->hasMany('App\CompanyData', 'company_id', 'id')->where('date', '>=', $d);
    }


    public function detail()
    {
        return $this->hasOne('App\CompanyDetail', 'company_id', 'id');
    }

    public function deta()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')));

        return $this->hasMany('App\CompanyData', 'company_id', 'id')->where('date', date('Y-m-d'));
    }

    public function last_day()
    {
        $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')));
        return $this->hasMany('App\CompanyData', 'company_id', 'id')->where('date', '=', $d);
    }

//    For stock map
    public function last_price_default()
    {
        return $this->hasOne('App\CompanyData', 'company_id', 'id')->orderBy('timestamp', 'desc');

    }

    public function last_price_preference()
    {
        return $this->hasOne('App\CompanyPreference', 'company_id', 'id')->orderBy('timestamp', 'desc');

    }

    public function bonds()
    {
        return $this->hasMany('App\Bond', 'company_id', 'id');
    }

    public function anlysis()
    {
        return $this->hasMany('App\CompanyAnalysis', 'company_id', 'id');
    }

    public function market_reports()
    {
        return $this->hasMany('App\Report', 'company_id', 'id');
    }

}
