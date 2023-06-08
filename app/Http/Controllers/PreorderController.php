<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Preorder;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerSpouse;
use App\Models\CustomerParent;
use App\Models\CustomerAddress;
use App\Models\CustomerCoMaker;
use App\Models\CustomerDependent;
use App\Models\CustomerPersonalReference;
use App\Models\CustomerCreditReference;
use Illuminate\Support\Facades\Storage;

class PreorderController extends Controller
{

    public function buyproduct($id){
        if (auth()->check()) {
            if(auth()->user()->userrole == "Customer" || auth()->user()->userrole == "Applicant"){
                Preorder::create([
                    'customer_id' => auth()->user()->customer->id,
                    'unit_id' => $id,
                ]);

                return back()->with('preorder_save', 'You successfully added unit in your preorder!');
            }
            return back()->with('preorder_save', 'Who are you??, you are not customer');
            // dd(auth()->user()->customer->id );
        }else{
            return view('guessbuy', ['id' => $id]);
        }
    }

    public function registerguest(Request $request){
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',

            'FillOutDate' => 'nullable|date',
            'FirstName' => 'required|string',
            'MiddleName' => 'required|string',	
            'LastName' => 'required|string',	
            'Sex' => 'required|in:Male,Female',	
            'Age' => 'required|integer',	
            'Citizenship' => 'required|string',	
            'BirthDate' => 'required|date',	
            'Religion' => 'required|string',	
            'CivilStatus' => 'required|string',	
            'TinNo' => 'nullable|integer',
            'id_ResNo' => 'nullable|integer',
            'IssueDate' => 'nullable|date',
            'PlaceIssue' => 'nullable|string',		
            'HomePhoneNumber' => 'nullable|integer',
            'OfficePhoneNumber' => 'nullable|integer',
            'MobileNumber' => 'required|regex:/(^(\+639)\d{9}$)/u',
            'email' => 'nullable|email',
            'NumberDependents'	=> 'nullable|integer|max:4|min:0',
            'NumberCreditRef'	=> 'nullable|integer|max:4|min:0',
            'SourceIncome' => 'required|string',	
            'ProvidedBy' => 'nullable|string',	
            'EmployerName' => 'required|string',	
            'WorkPosition' => 'required|string',	
            'WorkAddress' => 'required|string',	
            'WorkTelNumber' => 'nullable|integer',
            'DateEmployed' => 'required|date',	
            'Salary' => 'required|integer',
            'UnitToBeUsedFor' => 'required|string',
            'ModeOfPayment' => 'nullable|string',
            'ApplicantSketch' => 'required|image',
            'ApplicantSignature' => 'required|image',

            //spouse
            'Spouse' => 'nullable|string',
            'SpouseAge' => 'nullable|integer',
            'SpouseProvincialAddress' => 'nullable|string',
            'SpouseMobileNumber' => 'nullable|regex:/(^(\+639)\d{9}$)/u',
            'SpouseEmail' => 'nullable|email',
            'SpouseEmployer' => 'nullable|string',
            'SpousePosition' => 'nullable|string',
            'SpouseJobAddress' => 'nullable|string',
            'SpouseWorkTelNum' => 'nullable|integer',
            'SpouseDateEmployed' => 'nullable|date',
            'SpouseSalary' => 'nullable|integer',
            'SpouseSignature' => 'required|image',

            //parents
            'Father' => 'nullable|string',
            'Mother' => 'nullable|string',
            'ParentAddresss' => 'nullable|string',
            'ParentNumber' => 'nullable|string',

            //address
            'PresentAddress' => 'required|string',	
            'LengthOfStay' => 'required|string',	
            'HouseStatus' => 'required|string',	
            'HouseProvidedBy' => 'nullable|string',	
            'LotStatus' => 'required|string',	
            'LotProvidedBy' => 'nullable|string',
            'OtherPropertiesTV' => 'nullable|boolean',
            'OtherPropertiesRef' => 'nullable|boolean',
            'OtherPropertiesStereoComponent' => 'nullable|boolean',
            'OtherPropertiesGasRange' => 'nullable|boolean',
            'OtherPropertiesMotorcycle' => 'nullable|boolean',
            'OtherPropertiesComputer' => 'nullable|boolean',
            'OtherPropertiesFarmlot' => 'nullable|boolean',
            'FarmLotAddress' => 'nullable|string',	
            'FarmLotSize' => 'nullable|string',	
            'ProvincialAddress' => 'required|string',
            
            //co-maker
            'CoMakerName' => 'required|string',	
            'CoMakerAge' => 'nullable|integer',
            'CoMakerSex' => 'nullable|string',
            'CoMakerAddress' => 'required|string',	
            'CoMakeTelNumber' => 'nullable|integer',
            'CoMakerResidence' => 'nullable|string',
            'CoMakerResidenceProvidedBy' => 'nullable|string',
            'CoMakerCivilStatus' => 'nullable|string',
            'CoMakerRelationship' => 'nullable|string',
            'CoMakerBirthDate' => 'nullable|date',
            'CoMakerTin' => 'nullable|integer',
            'CoMakerMobileNo' => 'required|regex:/(^(\+639)\d{9}$)/u',
            'CoMakerEmployer' => 'required|string',	
            'CoMakeDateEmployed' => 'nullable|date',
            'CoMakerPosition' => 'required|string',	
            'CoMakerTelNo' => 'nullable|integer',
            'CoMakerEmployerAddress' => 'required|string',	
            'EmploymentStatus' => 'nullable|string',
            'CoMakerCreditReference1' => 'nullable|string',
            'CoMakerCreditReference2' => 'nullable|string',
            'CoMakerCreditReference3' => 'nullable|string',
            'CoMakerSketch' => 'required|image',
            'CoMakerSignature' => 'required|image',
            
            //dependencies
            'DependentName1' => 'nullable|string',
            'DependentAge1' => 'nullable|integer',
            'DependentGradeOcc1' => 'nullable|string',
            'DependentSchoolComp1' => 'nullable|string',
            'DependentName2' => 'nullable|string',
            'DependentAge2' => 'nullable|integer',
            'DependentGradeOcc2' => 'nullable|string',
            'DependentSchoolComp2' => 'nullable|string',
            'DependentName3' => 'nullable|string',
            'DependentAge3' => 'nullable|integer',
            'DependentGradeOcc3' => 'nullable|string',
            'DependentSchoolComp3' => 'nullable|string',
            'DependentName4' => 'nullable|string',
            'DependentAge4' => 'nullable|integer',
            'DependentGradeOcc4' => 'nullable|string',
            'DependentSchoolComp4' => 'nullable|string',

            //Personal References
            'PersonalReferenceName1' => 'required|string',	
            'PersonalReferenceRelationship1' => 'required|string',	
            'PersonalReferenceNumber1' => 'nullable|integer',
            'PersonalReferenceAddress1' => 'required|string',	
            'PersonalReferenceName2' => 'required|string',	
            'PersonalReferenceRelationship2' => 'required|string',	
            'PersonalReferenceNumber2' => 'nullable|integer',
            'PersonalReferenceAddress2' => 'required|string',	
            'PersonalReferenceName3' => 'required|string',	
            'PersonalReferenceRelationship3' => 'required|string',	
            'PersonalReferenceNumber3' => 'nullable|integer',
            'PersonalReferenceAddress3' => 'required|string',

            //credit reference
            'StoreBank1' => 'nullable|string',
            'ItemLoadAmount1' => 'nullable|integer',
            'Term1' => 'nullable|string',
            'CreditDate1' => 'nullable|date',
            'CreditBalance1' => 'nullable|integer',
            'StoreBank2' => 'nullable|string',
            'ItemLoadAmount2' => 'nullable|integer',
            'Term2' => 'nullable|string',
            'CreditDate2' => 'nullable|date',
            'CreditBalance2' => 'nullable|integer',
            'StoreBank3' => 'nullable|string',
            'ItemLoadAmount3' => 'nullable|integer',
            'Term3' => 'nullable|string',
            'CreditDate3' => 'nullable|date',
            'CreditBalance3' => 'nullable|integer',
            'StoreBank4' => 'nullable|string',
            'ItemLoadAmount4' => 'nullable|integer',
            'Term4' => 'nullable|string',
            'CreditDate4' => 'nullable|date',
            'CreditBalance4' => 'nullable|integer',
        ]);


        // dd($request->all());
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'userrole' => 'Applicant',
        ]);

        $imagePathApplicantSketch = request('ApplicantSketch')->store('uploads', 'public');
        $imagePathApplicantSignature = request('ApplicantSignature')->store('uploads', 'public');

        $customer = Customer::create([
            'IsSubscriber' => '0',
            'NumberOfDependencies' => $request->input('NumberDependents'),
            'NumberofCreditReference' => $request->input('NumberCreditRef'),
            'first_time_login' => TRUE,
            'FillOutDate' => $request->input('FillOutDate'),
            'FirstName' => $request->input('FirstName'),
            'MiddleName' => $request->input('MiddleName'),	
            'LastName' => $request->input('LastName'),	
            'Sex' => $request->input('Sex'),	
            'Age' => $request->input('Age'),	
            'Citizenship' => $request->input('Citizenship'),	
            'BirthDate' => $request->input('BirthDate'),	
            'Religion' => $request->input('Religion'),	
            'CivilStatus' => $request->input('CivilStatus'),	
            'TinNo' => $request->input('TinNo'),
            'id_ResNo' => $request->input('id_ResNo'),
            'IssueDate' => $request->input('IssueDate'),
            'PlaceIssue' => $request->input('PlaceIssue'),	
            'HomePhoneNumber' => $request->input('HomePhoneNumber'),
            'OfficePhoneNumber' => $request->input('OfficePhoneNumber'),
            'MobileNumber' => $request->input('MobileNumber'),
            'email' => $request->input('email'),
            'SourceIncome' => $request->input('SourceIncome'),	
            'ProvidedBy' => $request->input('ProvidedBy'),
            'EmployerName' => $request->input('EmployerName'),	
            'WorkPosition' => $request->input('WorkPosition'),	
            'WorkAddress' => $request->input('WorkAddress'),	
            'WorkTelNumber' => $request->input('WorkTelNumber'),
            'DateEmployed' => $request->input('DateEmployed'),	
            'Salary' => $request->input('Salary'),
            'UnitToBeUsedFor' => $request->input('UnitToBeUsedFor'),
            'ModeOfPayment' => $request->input('ModeOfPayment'),
            'ApplicantSignature' => $imagePathApplicantSignature,
            'ApplicantSketch' => $imagePathApplicantSketch,	
            

            'user_id' => $user->id
            
        ]);

        $imagePathSpouseSignature = request('SpouseSignature')->store('uploads', 'public');
        if($request->Spouse != ""){
            CustomerSpouse::create([
                'Name' => $request->input('Spouse'),
                'Age' => $request->input('SpouseAge'),
                'ProvincialAddress' => $request->input('SpouseProvincialAddress'),
                'MobileNumber' => $request->input('SpouseMobileNumber'),
                'Email' => $request->input('SpouseEmail'),
                'Employer' => $request->input('SpouseEmployer'),
                'Position' => $request->input('SpousePosition'),
                'JobAddress' => $request->input('SpouseJobAddress'),
                'WorkTelNum' => $request->input('SpouseWorkTelNum'),
                'DateEmployed' => $request->input('SpouseDateEmployed'),
                'Salary' => $request->input('SpouseSalary'),
                'SpouseSignature' => $imagePathSpouseSignature,

                'customer_id' => $customer->id
            ]);
        }

        if($request->Father != "" || $request->Mother != ""){
            CustomerParent::create([
                'Father' => $request->input('Father'),
                'Mother' => $request->input('Mother'),
                'Addresss' => $request->input('ParentAddresss'),
                'MobileNumber' => $request->input('ParentNumber'),

                'customer_id' => $customer->id

             ]);
        }   

        CustomerAddress::create([
            'PresentAddress' => $request->input('PresentAddress'),	
            'LengthOfStay' => $request->input('LengthOfStay'),	
            'HouseStatus' => $request->input('HouseStatus'),	
            'HouseProvidedBy' => $request->input('HouseProvidedBy'),	
            'LotStatus' => $request->input('LotStatus'),	
            'LotProvidedBy' => $request->input('LotProvidedBy'),
            'OtherPropertiesTV' => $request->input('OtherPropertiesTV'),
            'OtherPropertiesRef' => $request->input('OtherPropertiesRef'),
            'OtherPropertiesStereoComponent' => $request->input('OtherPropertiesStereoComponent'),
            'OtherPropertiesGasRange' => $request->input('OtherPropertiesGasRange'),
            'OtherPropertiesMotorcycle' => $request->input('OtherPropertiesMotorcycle'),
            'OtherPropertiesComputer' => $request->input('OtherPropertiesComputer'),
            'OtherPropertiesFarmlot' => $request->input('OtherPropertiesFarmlot'),
            'FarmLotAddress' => $request->input('FarmLotAddress'),	
            'FarmLotSize' => $request->input('FarmLotSize'),	
            'ProvincialAddress' => $request->input('ProvincialAddress'),
            'customer_id' => $customer->id	
        ]);

        $imagePathCoMakerSketch = request('CoMakerSketch')->store('uploads', 'public');
        $imagePathCoMakerSignature = request('CoMakerSignature')->store('uploads', 'public');

        CustomerCoMaker::create([
            'Name' => $request->input('CoMakerName'),	
            'Age' => $request->input('CoMakerAge'),
            'Sex' => $request->input('CoMakerSex'),
            'Address' => $request->input('CoMakerAddress'),	
            'CoMakeTelNumber' => $request->input('CoMakeTelNumber'),
            'Residence' => $request->input('CoMakerResidence'),
            'ResidenceProvidedBy' => $request->input('CoMakerResidenceProvidedBy'),
            'CivilStatus' => $request->input('CoMakerCivilStatus'),
            'Relationship' => $request->input('CoMakerRelationship'),
            'BirthDate' => $request->input('CoMakerBirthDate'),
            'Tin' => $request->input('CoMakerTin'),
            'MobileNo' => $request->input('CoMakerMobileNo'),
            'Employer' => $request->input('CoMakerEmployer'),	
            'CoMakeDateEmployed' => $request->input('CoMakeDateEmployed'),
            'Position' => $request->input('CoMakerPosition'),	
            'TelNo' => $request->input('CoMakerTelNo'),
            'EmployerAddress' => $request->input('CoMakerEmployerAddress'),	
            'EmploymentStatus' => $request->input('EmploymentStatus'),
            'CreditReference1' => $request->input('CoMakerCreditReference1'),
            'CreditReference2' => $request->input('CoMakerCreditReference2'),
            'CreditReference3' => $request->input('CoMakerCreditReference3'),
            'Sketch' => $imagePathCoMakerSketch,
            'Signature' => $imagePathCoMakerSignature,

            'customer_id' => $customer->id
        ]);

        if($request->DependentName1 != "" && $request->DependentAge1 != "" && $request->DependentGradeOcc1 != "" && $request->DependentSchoolComp1 != ""){
            CustomerDependent::create([
                'Name' => $request->input('DependentName1'),
                'Age' => $request->input('DependentAge1'),
                'GradeOcc' => $request->input('DependentGradeOcc1'),
                'SchoolComp' => $request->input('DependentSchoolComp1'),
                'customer_id' => $customer->id
            ]);
        }
        
        if($request->DependentName2 != "" && $request->DependentAge2 != "" && $request->DependentGradeOcc2 != "" && $request->DependentSchoolComp2 != ""){
            CustomerDependent::create([
                'Name' => $request->input('DependentName2'),
                'Age' => $request->input('DependentAge2'),
                'GradeOcc' => $request->input('DependentGradeOcc2'),
                'SchoolComp' => $request->input('DependentSchoolComp2'),
                'customer_id' => $customer->id
            ]);
        }
        
        if($request->DependentName3 != "" && $request->DependentAge3 != "" && $request->DependentGradeOcc3 != "" && $request->DependentSchoolComp3 != ""){
            CustomerDependent::create([
                'Name' => $request->input('DependentName3'),
                'Age' => $request->input('DependentAge3'),
                'GradeOcc' => $request->input('DependentGradeOcc3'),
                'SchoolComp' => $request->input('DependentSchoolComp3'),
                'customer_id' => $customer->id
            ]);	
        }
        
        if($request->DependentName4 != "" && $request->DependentAge4 != "" && $request->DependentGradeOcc4 != "" && $request->DependentSchoolComp4 != ""){
            CustomerDependent::create([
                'Name' => $request->input('DependentName4'),
                'Age' => $request->input('DependentAge4'),
                'GradeOcc' => $request->input('DependentGradeOcc4'),
                'SchoolComp' => $request->input('DependentSchoolComp4'),
                'customer_id' => $customer->id
            ]);	
        }

        CustomerPersonalReference::create([
            'PersonalReferenceName' => $request->input('PersonalReferenceName1'),	
            'PersonalReferenceRelationship' => $request->input('PersonalReferenceRelationship1'),	
            'PersonalReferenceNumber' => $request->input('PersonalReferenceNumber1'),
            'PersonalReferenceAddress' => $request->input('PersonalReferenceAddress1'),	
            'customer_id' => $customer->id	
        ]);
        CustomerPersonalReference::create([
            'PersonalReferenceName' => $request->input('PersonalReferenceName1'),	
            'PersonalReferenceRelationship' => $request->input('PersonalReferenceRelationship1'),	
            'PersonalReferenceNumber' => $request->input('PersonalReferenceNumber1'),
            'PersonalReferenceAddress' => $request->input('PersonalReferenceAddress1'),	
            'customer_id' => $customer->id	
        ]);
        CustomerPersonalReference::create([
            'PersonalReferenceName' => $request->input('PersonalReferenceName1'),	
            'PersonalReferenceRelationship' => $request->input('PersonalReferenceRelationship1'),	
            'PersonalReferenceNumber' => $request->input('PersonalReferenceNumber1'),
            'PersonalReferenceAddress' => $request->input('PersonalReferenceAddress1'),	
            'customer_id' => $customer->id	
        ]);

        
        if($request->StoreBank1 != "" || $request->ItemLoadAmount1 != "" || $request->Term1 != "" || $request->CreditDate1 != "" || $request->CreditBalance1 != ""){
            CustomerCreditReference::create([
                'StoreBank' => $request->input('StoreBank1'),
                'ItemLoadAmount' => $request->input('ItemLoadAmount1'),
                'Term' => $request->input('Term1'),
                'CreditDate' => $request->input('CreditDate1'),
                'CreditBalance' => $request->input('CreditBalance1'),
                'customer_id' => $customer->id	
            ]);
        }

        if($request->StoreBank2 != "" || $request->ItemLoadAmount2 != "" || $request->Term2 != "" || $request->CreditDate2 != "" || $request->CreditBalance2 != ""){
            CustomerCreditReference::create([
                'StoreBank' => $request->input('StoreBank2'),
                'ItemLoadAmount' => $request->input('ItemLoadAmount2'),
                'Term' => $request->input('Term2'),
                'CreditDate' => $request->input('CreditDate2'),
                'CreditBalance' => $request->input('CreditBalance2'),
                'customer_id' => $customer->id	
            ]);
        }
        
        if($request->StoreBank3 != "" || $request->ItemLoadAmount3 != "" || $request->Term3 != "" || $request->CreditDate3 != "" || $request->CreditBalance3 != ""){
            CustomerCreditReference::create([
                'StoreBank' => $request->input('StoreBank3'),
                'ItemLoadAmount' => $request->input('ItemLoadAmount3'),
                'Term' => $request->input('Term3'),
                'CreditDate' => $request->input('CreditDate3'),
                'CreditBalance' => $request->input('CreditBalance3'),
                'customer_id' => $customer->id	
            ]);
        } 

        if($request->StoreBank4 != "" || $request->ItemLoadAmount4 != "" || $request->Term4 != "" || $request->CreditDate4 != "" || $request->CreditBalance4 != ""){
            CustomerCreditReference::create([
                'StoreBank' => $request->input('StoreBank4'),
                'ItemLoadAmount' => $request->input('ItemLoadAmount4'),
                'Term' => $request->input('Term4'),
                'CreditDate' => $request->input('CreditDate4'),
                'CreditBalance' => $request->input('CreditBalance4'),
                'customer_id' => $customer->id	
            ]);
        }
        
        Preorder::create([
            'customer_id' => $customer->id,
            'unit_id' => $request->unit_id,
        ]);


        return redirect()->route('welcome');
        
    }

    public function PreorderDelete($id){
        // $userrole = auth()->user()->userrole;
        // dd($userrole);
        $preorder = Preorder::find($id);
        $preorder->delete();
        
        // if($userrole == "Admin" || $userrole == "Super Admin"){
        //     return redirect()->route('admin.admincustomer.customerPreorder'); 
        // }else{
        //     return redirect()->route('customer.Preorder'); 
        // }

        
    }
}
