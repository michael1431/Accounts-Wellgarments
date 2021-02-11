<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameConlumnNameFromJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->renameColumn('dr_ledger_group_id', 'dr_ledger_id');
            $table->renameColumn('cr_ledger_group_id', 'cr_ledger_id');
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
            $table->renameColumn('dr_ledger_id', 'dr_ledger_group_id');
            $table->renameColumn('cr_ledger_id', 'cr_ledger_group_id');
        });
    }
}
