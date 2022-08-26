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
        Schema::create('order_customer_information', function (Blueprint $table) {
            $table->id();
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
            $table->string('PresentAddress');
            $table->string('LengthOfStay');
            $table->string('HouseStatus');
            $table->string('HouseProvidedBy')->nullable();
            $table->string('LotStatus');
            $table->string('OtherProperties1')->nullable();
            $table->string('OtherProperties2')->nullable();
            $table->string('OtherProperties3')->nullable();
            $table->string('OtherProperties4')->nullable();
            $table->string('OtherProperties5')->nullable();
            $table->string('OtherProperties6')->nullable();
            $table->string('OtherProperties7')->nullable();
            $table->string('LotProvidedBy')->nullable();
            $table->string('FarmLotAddress')->nullable();
            $table->string('FarmLotSize')->nullable();
            $table->string('ProvincialAddress');
            $table->integer('HomePhoneNumber')->nullable();
            $table->integer('OfficePhoneNumber')->nullable();
            $table->integer('MobileNumber');
            $table->string('email')->nullable();

            $table->string('Spouse')->nullable();
            $table->integer('SpouseAge')->nullable();	
            $table->string('SpouseProvincialAddress')->nullable();
            $table->integer('SpouseMobileNumber')->nullable();
            $table->string('SpouseEmail')->nullable();
            $table->string('SpouseEmployer')->nullable();
            $table->string('SpousePosition')->nullable();
            $table->string('SpouseJobAddress')->nullable();
            $table->integer('SpouseWorkTelNum')->nullable();
            $table->date('SpouseDateEmployed')->nullable();
            $table->integer('SpouseSalary')->nullable();

            $table->string('DependentName1')->nullable();
            $table->integer('DependentAge1')->nullable();
            $table->string('DependentGradeOcc1')->nullable();
            $table->string('DependentSchoolComp1')->nullable();

            $table->string('DependentName2')->nullable();
            $table->integer('DependentAge2')->nullable();
            $table->string('DependentGradeOcc2')->nullable();
            $table->string('DependentSchoolComp2')->nullable();

            $table->string('DependentName3')->nullable();
            $table->integer('DependentAge3')->nullable();
            $table->string('DependentGradeOcc3')->nullable();
            $table->string('DependentSchoolComp3')->nullable();

            $table->string('DependentName4')->nullable();
            $table->integer('DependentAge4')->nullable();
            $table->string('DependentGradeOcc4')->nullable();
            $table->string('DependentSchoolComp4')->nullable();

            $table->string('Father')->nullable();
            $table->string('Mother')->nullable();
            $table->string('ParentAddresss')->nullable();
            $table->integer('ParentNumber')->nullable();
            $table->string('SourceIncome')->nullable();
            $table->string('ProvidedBy')->nullable();
            $table->string('StoreBank1')->nullable();
            $table->integer('ItemLoadAmount1')->nullable();
            $table->string('Term1')->nullable();
            $table->date('CreditDate1')->nullable();
            $table->integer('CreditBalance1')->nullable();
            $table->string('StoreBank2')->nullable();
            $table->integer('ItemLoadAmount2')->nullable();
            $table->string('Term2')->nullable();
            $table->date('CreditDate2')->nullable();
            $table->integer('CreditBalance2')->nullable();
            $table->string('StoreBank3')->nullable();
            $table->integer('ItemLoadAmount3')->nullable();
            $table->string('Term3')->nullable();
            $table->date('CreditDate3')->nullable();
            $table->integer('CreditBalance3')->nullable();
            $table->string('StoreBank4')->nullable();
            $table->integer('ItemLoadAmount4')->nullable();
            $table->string('Term4')->nullable();
            $table->date('CreditDate4')->nullable();
            $table->integer('CreditBalance4')->nullable();
            $table->string('PersonalReferenceName1');
            $table->string('PersonalReferenceRelationship1');
            $table->integer('PersonalReferenceNumber1');
            $table->string('PersonalReferenceAddress1');
            $table->string('PersonalReferenceName2');
            $table->string('PersonalReferenceRelationship2');
            $table->integer('PersonalReferenceNumber2');
            $table->string('PersonalReferenceAddress2');
            $table->string('PersonalReferenceName3');
            $table->string('PersonalReferenceRelationship3');
            $table->integer('PersonalReferenceNumber3');
            $table->string('PersonalReferenceAddress3');
            $table->string('EmployerName');
            $table->string('WorkPosition');
            $table->string('WorkAddress');
            $table->integer('WorkTelNumber')->nullable();
            $table->date('DateEmployed');
            $table->integer('Salary');
            $table->string('UnitToBeUsedFor');
            $table->string('ModeOfPayment')->nullable();
            
            $table->string('CoMakerName');
            $table->integer('CoMakerAge')->nullable();
            $table->string('CoMakerSex')->nullable();
            $table->string('CoMakerAddress');
            $table->integer('CoMakeTelNumber')->nullable();
            $table->string('CoMakerResidence')->nullable();
            $table->string('CoMakerResidenceProvidedBy')->nullable();
            $table->string('CoMakerCivilStatus')->nullable();
            $table->string('CoMakerRelationship')->nullable();
            $table->date('CoMakerBirthDate')->nullable();
            $table->integer('CoMakerTin')->nullable();
            $table->integer('CoMakerMobileNo');
            $table->string('CoMakerEmployer');
            $table->date('CoMakeDateEmployed')->nullable();
            $table->string('CoMakerPosition');
            $table->integer('CoMakerTelNo')->nullable();
            $table->string('CoMakerEmployerAddress');
            $table->string('EmploymentStatus')->nullable();
            $table->string('CoMakerCreditReference1')->nullable();
            $table->string('CoMakerCreditReference2')->nullable();
            $table->string('CoMakerCreditReference3')->nullable();

            $table->string('ApplicantSketch')->nullable();
            $table->string('CoMakerSketch')->nullable();
            $table->string('CoMakerSignature')->nullable();
            $table->string('SpouseSignature')->nullable();
            $table->string('ApplicantSignature')->nullable();

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
        Schema::dropIfExists('order_customer_information');
    }
};
