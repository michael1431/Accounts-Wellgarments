<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/12/2017
 * Time: 6:31 PM
 */

namespace App\Repositories;


use App\Accessories;
use App\AccessoriesCategory;

class AccessoriesRepository
{

    public function accessoriesCategories()
    {
        /** @noinspection PhpUndefinedClassInspection */
        return AccessoriesCategory::all()->pluck('name','id');
    }

    public function accessories()
    {
        return Accessories::all()->pluck('name','id');
    }

}