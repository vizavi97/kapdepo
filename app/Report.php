<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'market_reports';
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }

    public static function type($type)
    {
        return Report::where(['type' => $type]);
    }

}
