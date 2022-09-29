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
        Schema::create('customer_spouses', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->integer('Age')->nullable();	
            $table->string('ProvincialAddress')->nullable();
            $table->integer('MobileNumber')->nullable();
            $table->string('Email')->nullable();
            $table->string('Employer')->nullable();
            $table->string('Position')->nullable();
            $table->string('JobAddress')->nullable();
            $table->integer('WorkTelNum')->nullable();
            $table->date('DateEmployed')->nullable();
            $table->integer('Salary')->nullable();
            $table->string('SpouseSignature')->nullable(); //not nullable

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
        Schema::dropIfExists('customer_spouses');
    }
};
