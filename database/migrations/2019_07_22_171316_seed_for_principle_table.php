<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedForPrincipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('principles', function (Blueprint $table) {
            $items = [
                ['id' => 1, 'name' => 'Assets'],
                ['id' => 2, 'name' => 'Liabilities'],
                ['id' => 3, 'name' => 'Income'],
                ['id' => 4, 'name' => 'Expense'],
            ];

            foreach ($items as $item) {
                \App\Account\Principle\Principle::create($item);
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
        Schema::table('principles', function (Blueprint $table) {
            //
        });
    }
}
