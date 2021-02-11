<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignForLedgerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledger_groups', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('ledger_groups');
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
            $table->dropForeign(['group_id']);
        });
    }
}
