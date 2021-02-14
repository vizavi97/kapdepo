<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    //
    protected $table = 'companies_data';
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }

    public function detail()
    {
        return $this->hasOne('App\CompanyDetail', 'company_id', 'company_id');
    }

    public function kdindex()
    {
        return $this->hasMany('App\Company', 'id', 'company_id')->where('kdindex',true);

    }


}
