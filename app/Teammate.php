<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teammate extends Model
{
    //
    protected $guarded = [];
    protected  $table = 'team';
    protected $primaryKey = 'id';

    public function translations()
    {
        return $this->hasMany('App\Teammate', 'person_id', 'id');

    }

}
