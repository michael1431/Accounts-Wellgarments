<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignForPrincipleIdToLedgerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledger_groups', function (Blueprint $table) {
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
        Schema::table('ledger_groups', function (Blueprint $table) {
            $table->dropForeign(['principle_id']);
        });
    }
}



