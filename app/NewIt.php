<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewIt extends Model
{
    //
    protected $guarded = [];
    protected $table  = 'news';
    protected $primaryKey = 'id';


    public function files(){
        return $this->hasMany('App\Image','item_id', 'id')->where('type','news');
    }

    public function translations(){
        return $this->hasMany('App\NewIt', 'parent_id', 'id');
    }
}
