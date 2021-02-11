<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccessLog extends Model
{
    protected $connection = 'admin';
    protected $fillable = ['user_id','user_name','module_id','login_time','logout_time','date'];
}
