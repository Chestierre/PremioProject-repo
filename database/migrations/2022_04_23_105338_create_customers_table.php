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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            
            $table->date('FillOutDate')->nullable();
            $table->string('FirstName');
            $table->string('MiddleName');
            $table->string('LastName');
            $table->string('Sex');
            $table->integer('Age');
            $table->string('Citizenship');
            $table->date('BirthDate');
            $table->string('Religion');
            $table->string('CivilStatus');
            $table->integer('TinNo')->nullable();
            $table->integer('id_ResNo')->nullable();
            $table->date('IssueDate')->nullable();
            $table->string('PlaceIssue')->nullable();
            $table->string('OtherProperties1')->nullable();
            $table->string('OtherProperties2')->nullable();
            $table->string('OtherProperties3')->nullable();
            $table->string('OtherProperties4')->nullable();
            $table->string('OtherProperties5')->nullable();
            $table->string('OtherProperties6')->nullable();
            $table->string('OtherProperties7')->nullable();
            $table->string('FarmLotAddress')->nullable();
            $table->string('FarmLotSize')->nullable();
            $table->integer('NumberOfDependencies');
            $table->integer('NumberofCreditReference');
            $table->string('ProvincialAddress');
            $table->integer('HomePhoneNumber')->nullable();
            $table->integer('OfficePhoneNumber')->nullable();
            $table->integer('MobileNumber');
            $table->string('email')->nullable();            
            $table->string('SourceIncome')->nullable();
            $table->string('ProvidedBy')->nullable();
            $table->string('EmployerName');
            $table->string('WorkPosition');
            $table->string('WorkAddress');
            $table->integer('WorkTelNumber')->nullable();
            $table->date('DateEmployed');
            $table->integer('Salary');
            $table->string('UnitToBeUsedFor');
            $table->string('ModeOfPayment')->nullable();
            $table->string('ApplicantSketch')->nullable();
            $table->string('ApplicantSignature')->nullable();
            $table->timestamps();


            $table->index('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
