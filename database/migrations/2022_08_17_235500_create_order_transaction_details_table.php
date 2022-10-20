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
        Schema::create('order_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('unitmodelname');
            $table->string('brandname');
            $table->string('brandrate');
            $table->integer('unitmodelprice');
            $table->integer('initial_price'); //with discount
            $table->integer('unitmodeldownpayment');
            $table->integer('monthlypayment');
            $table->string('monthsinstallment');
            $table->string('paymentdate');
            $table->timestamps();

            $table->foreignId('order_id')
                        ->constrained()
                        ->onDelete('cascade');
                        
            $table->index('order_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_transaction_details');
    }
};
