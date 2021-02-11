<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupPrincipleIdToLedgerGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledger_groups', function (Blueprint $table) {
             $table->unsignedInteger('sub_principle_id')->nullable()->after('group_id');;
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
            $table->dropColumn(['sub_principle_id']);
        });
    }
}
