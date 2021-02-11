<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLedgerGroupIdToAcJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_journals', function (Blueprint $table) {
            $table->unsignedInteger('dr_ledger_group_id')->nullable();
            $table->unsignedInteger('cr_ledger_group_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ac_journals', function (Blueprint $table) {
            $table->dropColumn(['cr_ledger_group_id']);
            $table->dropColumn(['dr_ledger_group_id']);
        });
    }
}
