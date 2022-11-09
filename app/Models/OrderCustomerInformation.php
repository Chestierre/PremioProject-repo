<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomerInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',

        'FillOutDate',
        'FirstName',
        'MiddleName',
        'LastName',
        'Sex',
        'Age',
        'Citizenship',
        'BirthDate',
        'Religion',
        'CivilStatus',
        'TinNo',
        'id_ResNo',
        'IssueDate',
        'PlaceIssue',
        'NumberOfDependencies',
        'NumberofCreditReference',
        'HomePhoneNumber',
        'OfficePhoneNumber',
        'MobileNumber',
        'email',
        'SourceIncome',
        'ProvidedBy',
        'EmployerName',
        'WorkPosition',
        'WorkAddress',
        'WorkTelNumber',
        'DateEmployed',
        'Salary',
        'UnitToBeUsedFor',
        'ModeOfPayment',
        'ApplicantSketch',
        'ApplicantSignature',
        
        'PresentAddress',
        'LengthOfStay',
        'HouseStatus',
        'HouseProvidedBy',
        'LotStatus',
        'LotProvidedBy',
        'OtherPropertiesTV',
        'OtherPropertiesRef',
        'OtherPropertiesStereoComponent',
        'OtherPropertiesGasRange',
        'OtherPropertiesMotorcycle',
        'OtherPropertiesComputer',
        'OtherPropertiesFarmlot',
        'FarmLotAddress',
        'FarmLotSize',
        'ProvincialAddress',


        'Spouse',
        'SpouseAge',
        'SpouseProvincialAddress',
        'SpouseMobileNumber',
        'SpouseEmail',
        'SpouseEmployer',
        'SpousePosition',
        'SpouseJobAddress',
        'SpouseWorkTelNum',
        'SpouseDateEmployed',
        'SpouseSalary',
        'SpouseSignature',

        'CoMakerName',
        'CoMakerAge',
        'CoMakerSex',
        'CoMakerAddress',
        'CoMakeTelNumber',
        'CoMakerResidence',
        'CoMakerResidenceProvidedBy',
        'CoMakerCivilStatus',
        'CoMakerRelationship',
        'CoMakerBirthDate',
        'CoMakerTin',
        'CoMakerMobileNo',
        'CoMakerEmployer',
        'CoMakeDateEmployed',
        'CoMakerPosition',
        'CoMakerTelNo',
        'CoMakerEmployerAddress',
        'EmploymentStatus',
        'CoMakerCreditReference1',
        'CoMakerCreditReference2',
        'CoMakerCreditReference3',
        'CoMakerSketch',
        'CoMakerSignature',

        'Father',
        'Mother',
        'ParentAddresss',
        'ParentNumber',

        'PersonalReferenceName1',
        'PersonalReferenceRelationship1',
        'PersonalReferenceNumber1',
        'PersonalReferenceAddress1',
        'PersonalReferenceName2',
        'PersonalReferenceRelationship2',
        'PersonalReferenceNumber2',
        'PersonalReferenceAddress2',
        'PersonalReferenceName3',
        'PersonalReferenceRelationship3',
        'PersonalReferenceNumber3',
        'PersonalReferenceAddress3',    

        'DependentName1',
        'DependentAge1',
        'DependentGradeOcc1',
        'DependentSchoolComp1',
        'DependentName2',
        'DependentAge2',
        'DependentGradeOcc2',
        'DependentSchoolComp2',
        'DependentName3',
        'DependentAge3',
        'DependentGradeOcc3',
        'DependentSchoolComp3',
        'DependentName4',
        'DependentAge4',
        'DependentGradeOcc4',
        'DependentSchoolComp4',
 
        'StoreBank1',
        'ItemLoadAmount1',
        'Term1',
        'CreditDate1',
        'CreditBalance1',
        'StoreBank2',
        'ItemLoadAmount2',
        'Term2',
        'CreditDate2',
        'CreditBalance2',
        'StoreBank3',
        'ItemLoadAmount3',
        'Term3',
        'CreditDate3',
        'CreditBalance3',
        'StoreBank4',
        'ItemLoadAmount4',
        'Term4',
        'CreditDate4',
        'CreditBalance4',
     
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
