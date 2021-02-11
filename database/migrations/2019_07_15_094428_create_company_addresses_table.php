<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAddressesTable extends Migration
{

    public function up()
    {
        Schema::create('company_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('company_addresses');
    }
}
