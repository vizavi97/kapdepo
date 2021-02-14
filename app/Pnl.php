<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pnl extends Model
{
    //
    protected $table = 'pnl_data';
    protected $guarded = [];

    public static function buy($kzl){
        return Pnl::where(['kzl' => $kzl,'action' => 'buy']);
    }
    public static function sell($kzl){
        return Pnl::where(['kzl' => $kzl,'action' => 'sell']);
    }
}
