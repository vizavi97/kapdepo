<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAnalysis extends Model
{
    //
    protected $table = 'analysises';
    protected $guarded = [];

    public function info()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
