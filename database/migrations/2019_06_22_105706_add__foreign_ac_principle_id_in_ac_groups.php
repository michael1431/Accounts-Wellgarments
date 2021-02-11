<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignAcPrincipleIdInAcGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_groups', function (Blueprint $table) {
            //$table->foreign('ac_principle_id')->references('id')->on('ac_principles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ac_groups', function (Blueprint $table) {
            $table->dropForeign(['ac_principle_id']);
        });
    }
}
