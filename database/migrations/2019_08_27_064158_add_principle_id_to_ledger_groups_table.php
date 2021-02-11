<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrincipleIdToLedgerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledger_groups', function (Blueprint $table) {
            $table->unsignedInteger('principle_id')->nullable()->after('group_id');;
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
            $table->dropColumn(['principle_id']);
        });
    }
}



