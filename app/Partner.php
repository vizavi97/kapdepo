<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //
    protected  $table = 'partners';

    protected $guarded = [];
    protected $primaryKey = 'id';

    public function translations(){
        return $this->hasMany('App\Partner', 'par_id', 'id');
    }
}
