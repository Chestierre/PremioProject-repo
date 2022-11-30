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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('modelname')->unique();
            $table->string('modelcaption');
            $table->string('modeldescription')->nullable();
            $table->integer('price');
            $table->integer('modeldownpayment');
            $table->integer('modelDiscount')->nullable();
            $table->timestamps();

            $table->foreignId('brand_id')
                        ->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->nullOnDelete();

            $table->index('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
