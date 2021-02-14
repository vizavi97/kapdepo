<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    //
    protected $guarded = [];
    protected $table = 'tariff';

    protected $primaryKey = 'id';

    public function translations()
    {
        return $this->hasMany('App\Tariff', 'tar_id', 'id');

    }
}
