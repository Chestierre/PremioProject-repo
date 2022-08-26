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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            //relationships
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();

            //dynamic
            $table->integer('balance');
            $table->integer('currentmonth');
            $table->integer('monthspaid');
            $table->integer('monthone');
            $table->integer('monthtwo');
            $table->integer('monththree');
            $table->integer('monthfour');
            $table->integer('monthfive');
            $table->integer('monthsix');
            $table->integer('monthseven')->nullable();
            $table->integer('montheight')->nullable();
            $table->integer('monthnine')->nullable();
            $table->integer('monthten')->nullable();
            $table->integer('montheleven')->nullable();
            $table->integer('monthtwelve')->nullable();
            $table->integer('monththirteen')->nullable();
            $table->integer('monthfourteen')->nullable();
            $table->integer('monthfifteen')->nullable();
            $table->integer('monthsixteen')->nullable();
            $table->integer('monthseventeen')->nullable();
            $table->integer('montheigthteen')->nullable();
            $table->integer('monthnineteen')->nullable();
            $table->integer('monthtwenty')->nullable();
            $table->integer('monthtwentyone')->nullable();
            $table->integer('monthtwentytwo')->nullable();
            $table->integer('monthtwentythree')->nullable();
            $table->integer('monthtwentyfour')->nullable();
            $table->integer('monthtwentyfive')->nullable();
            $table->integer('monthtwentysix')->nullable();
            $table->integer('monthtwentyseven')->nullable();
            $table->integer('monthtwentyeight')->nullable();
            $table->integer('monthtwentynine')->nullable();
            $table->integer('monththirthy')->nullable();
            $table->integer('monththirthyone')->nullable();
            $table->integer('monththirthytwo')->nullable();
            $table->integer('monththirthythree')->nullable();
            $table->integer('monththirthyfour')->nullable();
            $table->integer('monththirthyfive')->nullable();
            $table->integer('monththirthysix')->nullable();

            //timestamps + indexing
            $table->timestamps();
            $table->index('customer_id');
            $table->index('unit_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
