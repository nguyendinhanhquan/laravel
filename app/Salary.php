<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    Protected $table = "salary_tbl";

    protected $fillable = ['user_id','basic_salary'];

    public $timestamps = false;

}
