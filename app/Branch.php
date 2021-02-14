<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //

    protected  $table = 'branches';

    protected $guarded = [
    ];
    protected $primaryKey = 'id';

    public function translations()
    {
        return $this->hasMany('App\Branch', 'branch_id', 'id');

    }
}
