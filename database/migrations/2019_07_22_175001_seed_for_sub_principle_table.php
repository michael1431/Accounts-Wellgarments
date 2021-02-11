<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedForSubPrincipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_principles', function (Blueprint $table) {
            $items = [
                //Under Assets
                ['id' => 1, 'name' => 'Intercompany & Associates','principle_id'=>1],
                ['id' => 2, 'name' => 'Current Assets','principle_id'=>1],
                ['id' => 3, 'name' => 'Fixed assets','principle_id'=>1],

                //Under Liabilities
                ['id' => 4, 'name' => 'Capital Account','principle_id'=>2],
                ['id' => 5, 'name' => 'Current Liabilities','principle_id'=>2],

                ['id' => 6, 'name' => 'Direct Income','principle_id'=>3],
                ['id' => 7, 'name' => 'Indirect Income','principle_id'=>3],

                ['id' => 8, 'name' => 'Direct Expenses','principle_id'=>4],
                ['id' => 9, 'name' => 'Indirect Expenses','principle_id'=>4],

                //Under Income

                //Under Expense
            ];

            foreach ($items as $item) {
                \App\Account\Principle\SubPrinciple::query()->create($item);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_principles', function (Blueprint $table) {
            //
        });
    }
}
