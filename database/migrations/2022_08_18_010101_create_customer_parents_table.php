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
        Schema::create('customer_parents', function (Blueprint $table) {
            $table->id();

            $table->string('Father')->nullable();
            $table->string('Mother')->nullable();
            $table->string('Addresss')->nullable();
            $table->string('MobileNumber')->nullable();

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
        Schema::dropIfExists('customer_parents');
    }
};
