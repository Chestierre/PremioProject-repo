<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brandname')->unique();
            $table->float('sixMonthRate');
            $table->float('twelveMonthRate');
            $table->float('eigthteenMonthRate');
            $table->float('twentyfourMonthRate');
            $table->float('thirtyMonthRate');
            $table->float('thirtysixMonthRate');
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
        Schema::dropIfExists('brands');
    }
};
