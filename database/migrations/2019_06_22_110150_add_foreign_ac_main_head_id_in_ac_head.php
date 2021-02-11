<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignAcMainHeadIdInAcHead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_heads', function (Blueprint $table) {
            //$table->foreign('ac_main_head_id')->references('id')->on('ac_main_heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ac_heads', function (Blueprint $table) {
            $table->dropForeign(['ac_main_head_id']);
        });
    }
}
