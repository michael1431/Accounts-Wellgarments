<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignAcGroupIdInAcMainHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_main_heads', function (Blueprint $table) {
            //$table->foreign('ac_group_id')->references('id')->on('ac_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ac_main_heads', function (Blueprint $table) {
            $table->dropForeign(['ac_group_id']);
        });
    }
}
