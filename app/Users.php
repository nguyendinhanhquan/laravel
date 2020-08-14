<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    Protected $table = "users_tbl";
    public $timestamps = false;

    // public function UserAndDayoff()
    // {
    //     return $this->hasMany('App\Dayoff','user_id','id');
    // }

    public function overtime()
    {
        return $this->hasMany('App\Overtime','user_id','id');
    }

}
