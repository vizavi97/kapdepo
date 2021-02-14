<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dividend extends Model
{
    //
    protected $table = 'dividends';
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
