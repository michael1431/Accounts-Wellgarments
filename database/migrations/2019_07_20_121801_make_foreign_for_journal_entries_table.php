<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeForeignForJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->foreign('ac_journal_id')->references('id')->on('ac_journals');
            $table->foreign('dr_ledger_group_id')->references('id')->on('ledger_groups');
            $table->foreign('cr_ledger_group_id')->references('id')->on('ledger_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropForeign(['ac_journal_id']);
            $table->dropForeign(['dr_ledger_group_id']);
            $table->dropForeign(['cr_ledger_group_id']);
        });
    }
}



