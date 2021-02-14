<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyKey extends Model
{
    //
    protected $table = 'keys';
    protected $guarded = [];
    public function info()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
