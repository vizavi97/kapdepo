<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    //
    protected $table = 'companies_info';
    protected $guarded = [];

    public static function  trans($id,$lang)
    {
        return CompanyInfo::where(['lang'=>$lang , 'company_id' => $id])->first();
    }

    public function parent()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
