<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected  $table = 'banners';

    protected $fillable = [
        'title',
        'link',
        'lang',
        'published',
    ];
    protected $primaryKey = 'id';

    public function translations()
    {
        return $this->hasMany('App\Banner', 'ban_id', 'id');

    }
}
