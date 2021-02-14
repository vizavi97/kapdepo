<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    //
    protected $table = 'analytics';
    protected $guarded = [];

    public function translations(){
        return $this->hasMany('App\Analytic', 'parent_id', 'id');
    }
}
