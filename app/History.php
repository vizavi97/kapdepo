<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $guarded = [];
    protected $table = 'stories';

    public function translations()
    {
        return $this->hasMany('App\History', 'his_id', 'id');

    }
}
