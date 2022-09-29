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
        Schema::create('customer_co_makers', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->integer('Age')->nullable();
            $table->string('Sex')->nullable();
            $table->string('Address');
            $table->integer('CoMakeTelNumber')->nullable();
            $table->string('Residence')->nullable();
            $table->string('ResidenceProvidedBy')->nullable();
            $table->string('CivilStatus')->nullable();
            $table->string('Relationship')->nullable();
            $table->date('BirthDate')->nullable();
            $table->integer('Tin')->nullable();
            $table->integer('MobileNo');
            $table->string('Employer');
            $table->date('CoMakeDateEmployed')->nullable();
            $table->string('Position');
            $table->integer('TelNo')->nullable();
            $table->string('EmployerAddress');
            $table->string('EmploymentStatus')->nullable();
            $table->string('CreditReference1')->nullable();
            $table->string('CreditReference2')->nullable();
            $table->string('CreditReference3')->nullable();
            $table->string('Sketch')->nullable(); 
            $table->string('Signature')->nullable();
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
        Schema::dropIfExists('customer_co_makers');
    }
};
