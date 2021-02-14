<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPreference extends Model
{
    //
    protected $table = 'preference_data';
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
