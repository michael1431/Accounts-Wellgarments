<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnFromAcJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ac_journals', function (Blueprint $table) {
            $table->dropColumn(['dr_ac_principle_id']);
            $table->dropColumn(['dr_ac_group_id']);
            $table->dropColumn(['dr_ac_main_head_id']);
            $table->dropColumn(['dr_ac_head_id']);
            $table->dropColumn(['dr_ac_sub_head_id']);
            $table->dropColumn(['dr_ac_sub_child_head_id']);

            $table->dropColumn(['cr_ac_principle_id']);
            $table->dropColumn(['cr_ac_group_id']);
            $table->dropColumn(['cr_ac_main_head_id']);
            $table->dropColumn(['cr_ac_head_id']);
            $table->dropColumn(['cr_ac_sub_head_id']);
            $table->dropColumn(['cr_ac_sub_child_head_id']);

            $table->dropColumn(['dr_accounts']);
            $table->dropColumn(['cr_accounts']);
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
            $table->integer('dr_ac_principle_id')->nullable();
            $table->integer('dr_ac_group_id')->nullable();
            $table->integer('dr_ac_main_head_id')->nullable();
            $table->integer('dr_ac_head_id')->nullable();
            $table->integer('dr_ac_sub_head_id')->nullable();
            $table->integer('dr_ac_sub_child_head_id')->nullable();

            //this is for credit account name
            $table->integer('cr_ac_principle_id')->nullable();
            $table->integer('cr_ac_group_id')->nullable();
            $table->integer('cr_ac_main_head_id')->nullable();
            $table->integer('cr_ac_head_id')->nullable();
            $table->integer('cr_ac_sub_head_id')->nullable();
            $table->integer('cr_ac_sub_child_head_id')->nullable();

            $table->string('dr_accounts')->nullable();
            $table->string('cr_accounts')->nullable();
        });
    }
}
