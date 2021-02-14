<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected  $table = 'menu';

    protected $guarded = [
    ];
    protected $primaryKey = 'id';

    public function children(){
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('order', 'asc');
    }

}
