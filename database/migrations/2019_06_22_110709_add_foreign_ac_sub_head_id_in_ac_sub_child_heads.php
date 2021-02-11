<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignAcSubHeadIdInAcSubChildHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_sub_child_heads', function (Blueprint $table) {
            //$table->foreign('ac_sub_head_id')->references('id')->on('ac_sub_heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ac_sub_child_heads', function (Blueprint $table) {
            $table->dropForeign(['ac_sub_head_id']);
        });
    }
}
