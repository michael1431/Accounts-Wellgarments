<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForeignFromJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropForeign(['dr_ledger_group_id']);
            $table->dropForeign(['cr_ledger_group_id']);
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
            $table->foreign('dr_ledger_group_id')->references('id')->on('ledger_groups');
            $table->foreign('cr_ledger_group_id')->references('id')->on('ledger_groups');
        });
    }
}
