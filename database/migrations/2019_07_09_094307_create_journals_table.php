<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_journals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();

            //this is for debit account name
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

            $table->string('journal_no')->nullable();
            $table->string('dr_accounts')->nullable();
            $table->string('cr_accounts')->nullable();
            $table->bigInteger('dr_amount')->nullable();
            $table->bigInteger('cr_amount')->nullable();
            $table->longText('event')->nullable();
            $table->date('date')->nullable()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ac_journals');
    }
}
