<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $connection = 'admin';

    protected $fillable=['name','description'];
}