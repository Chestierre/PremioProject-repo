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
        Schema::create('customer_credit_references', function (Blueprint $table) {
            $table->id();
            $table->string('StoreBank');
            $table->integer('ItemLoadAmount');
            $table->string('Term');
            $table->date('CreditDate');
            $table->integer('CreditBalance');
            $table->timestamps();
            $table->foreignId('customer_id')
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');

            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_credit_references');
    }
};
