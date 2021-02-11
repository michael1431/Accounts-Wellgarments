<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcSubChildHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_sub_child_heads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('note')->nullable();
            $table->unsignedInteger('ac_sub_head_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ac_sub_child_heads');
    }
}
