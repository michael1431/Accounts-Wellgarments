<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignAcHeadIdInAcSubHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_sub_heads', function (Blueprint $table) {
            //$table->foreign('ac_head_id')->references('id')->on('ac_heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ac_sub_heads', function (Blueprint $table) {
            $table->dropForeign(['ac_head_id']);
        });
    }
}
