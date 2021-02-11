<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignForSubPrincipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_principles', function (Blueprint $table) {
            $table->foreign('principle_id')->references('id')->on('principles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_principles', function (Blueprint $table) {
            $table->dropForeign(['principle_id']);
        });
    }
}
