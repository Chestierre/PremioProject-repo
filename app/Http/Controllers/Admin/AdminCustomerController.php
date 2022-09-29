<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\User;
use App\Models\CustomerSpouse;
use App\Models\CustomerParent;
use App\Models\CustomerAddress;
use App\Models\CustomerCoMaker;
use App\Models\CustomerDependent;
use App\Models\CustomerPersonalReference;
use App\Models\CustomerCreditReference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    public function createCustomer(User $user){
        return view('FillOutform', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        dd($user);
        $request->validate([
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
            'FarmLotAddress' => 'nullable|string',	
            'FarmLotSize' => 'nullable|string',	
            'ProvincialAddress' => 'required|string',	
            'HomePhoneNumber' => 'nullable|integer',
            'OfficePhoneNumber' => 'nullable|integer',
            'MobileNumber' => 'required|integer',
            'email' => 'nullable|email',
            'NumberDependents'	=> 'nullable|integer|max:4|min:0',
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
        ]);

        Customer::create([
                'NumberOfDependencies' => $request->input('NumberDependents'),
                'NumberofCreditReference' => $request->input('NumberDependents'),
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
                'FarmLotAddress' => $request->input('FarmLotAddress'),	
                'FarmLotSize' => $request->input('FarmLotSize'),	
                'ProvincialAddress' => $request->input('ProvincialAddress'),	
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
                'user_id' => $user->id
                
            ]);

            

            return redirect()->route('admin.user.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admincustomer)
    {
        // $this->authorize('edit', $user);
        // dd($admincustomer);
        $admincustomer->load('customer.spouse','customer.comaker','customer.address','customer.parent', 'customer.dependent', 'customer.personalreference','customer.creditreference');
        // dd($admincustomer);
        // dd($admincustomer);
        return view('admin.admincustomer.edit', compact('admincustomer')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admincustomer)
    {   
        $admincustomer->load('customer.spouse','customer.comaker','customer.address','customer.parent', 'customer.dependent', 'customer.personalreference','customer.creditreference');
        //   dd($request->all());
        // dd($admincustomer);
        // dd($admincustomer);

        $request->validate([
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
            'FarmLotAddress' => 'nullable|string',	
            'FarmLotSize' => 'nullable|string',	
            'ProvincialAddress' => 'required|string',	
            'HomePhoneNumber' => 'nullable|integer',
            'OfficePhoneNumber' => 'nullable|integer',
            'MobileNumber' => 'required|integer',
            'email' => 'nullable|email',
            'NumberOfDependencies'	=> 'nullable|integer|max:4|min:0',
            'NumberofCreditReference'	=> 'nullable|integer|max:4|min:0',
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
            'ApplicantSketch' => 'nullable|image',
            'ApplicantSignature' => 'nullable|image',

            //spouse
            'SpouseName' => 'nullable|string',
            'SpouseAge' => 'nullable|integer',
            'SpouseProvincialAddress' => 'nullable|string',
            'SpouseMobileNumber' => 'nullable|integer',
            'SpouseEmail' => 'nullable|email',
            'SpouseEmployer' => 'nullable|string',
            'SpousePosition' => 'nullable|string',
            'SpouseJobAddress' => 'nullable|string',
            'SpouseWorkTelNum' => 'nullable|integer',
            'SpouseDateEmployed' => 'nullable|date',
            'SpouseSalary' => 'nullable|integer',
            'SpouseSignature' => 'nullable|image',

            //parents
            'Father' => 'nullable|string',
            'Mother' => 'nullable|string',
            'ParentAddresss' => 'nullable|string',
            'ParentNumber' => 'nullable|integer',

            //address
            'PresentAddress' => 'required|string',	
            'LengthOfStay' => 'required|string',	
            'HouseStatus' => 'required|string',	
            'HouseProvidedBy' => 'nullable|string',	
            'LotStatus' => 'required|string',	
            'LotProvidedBy' => 'nullable|string',
            
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
            'CoMakerMobileNo' => 'required|integer',
            'CoMakerEmployer' => 'required|string',	
            'CoMakeDateEmployed' => 'nullable|date',
            'CoMakerPosition' => 'required|string',	
            'CoMakerTelNo' => 'nullable|integer',
            'CoMakerEmployerAddress' => 'required|string',	
            'EmploymentStatus' => 'nullable|string',
            'CoMakerCreditReference1' => 'nullable|string',
            'CoMakerCreditReference2' => 'nullable|string',
            'CoMakerCreditReference3' => 'nullable|string',
            'CoMakerSketch' => 'nullable|image',
            'CoMakerSignature' => 'nullable|image',
            
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

        $admincustomer-> customer() -> update([
            'NumberOfDependencies' => $request->NumberOfDependencies,
            'NumberofCreditReference' => $request->NumberofCreditReference,
            'FirstName' => $request->FirstName,
            'MiddleName' => $request->MiddleName,	
            'LastName' => $request->LastName,	
            'Sex' => $request->Sex,	
            'Age' => $request->Age,	
            'Citizenship' => $request->Citizenship,	
            'BirthDate' => $request->BirthDate,	
            'Religion' => $request->Religion,	
            'CivilStatus' => $request->CivilStatus,	
            'TinNo' => $request->TinNo,
            'id_ResNo' => $request->id_ResNo,
            'IssueDate' => $request->IssueDate,
            'PlaceIssue' => $request->PlaceIssue,
            'FarmLotAddress' => $request->FarmLotAddress,	
            'FarmLotSize' => $request->FarmLotSize,	
            'ProvincialAddress' => $request->ProvincialAddress,	
            'HomePhoneNumber' => $request->HomePhoneNumber,
            'OfficePhoneNumber' => $request->OfficePhoneNumber,
            'MobileNumber' => $request->MobileNumber,
            'email' => $request->email,
            'SourceIncome' => $request->SourceIncome,	
            'ProvidedBy' => $request->ProvidedBy,
            'EmployerName' => $request->EmployerName,	
            'WorkPosition' => $request->WorkPosition,	
            'WorkAddress' => $request->WorkAddress,	
            'WorkTelNumber' => $request->WorkTelNumber,
            'DateEmployed' => $request->DateEmployed,	
            'Salary' => $request->Salary,
            'UnitToBeUsedFor' => $request->UnitToBeUsedFor,
            'ModeOfPayment' => $request->ModeOfPayment,
            'ApplicantSignature' => $request->ApplicantSignature,
            'ApplicantSketch' => $request->ApplicantSketch,	
        ]);

        $admincustomer-> customer -> spouse() -> update([
            'Name' => $request->SpouseName,
            'Age' => $request->SpouseAge,
            'ProvincialAddress' => $request->SpouseProvincialAddress,
            'MobileNumber' => $request->SpouseMobileNumber,
            'Email' => $request->SpouseEmail,
            'Employer' => $request->SpouseEmployer,
            'Position' => $request->SpousePosition,
            'JobAddress' => $request->SpouseJobAddress,
            'WorkTelNum' => $request->SpouseWorkTelNum,
            'DateEmployed' => $request->SpouseDateEmployed,
            'Salary' => $request->SpouseSalary,
            'SpouseSignature' => $request->SpouseSignature,
        ]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
    public function storeCustomer(Request $request, User $user)
    {
        // dd($user);
        $request->validate([
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
            'FarmLotAddress' => 'nullable|string',	
            'FarmLotSize' => 'nullable|string',	
            'ProvincialAddress' => 'required|string',	
            'HomePhoneNumber' => 'nullable|integer',
            'OfficePhoneNumber' => 'nullable|integer',
            'MobileNumber' => 'required|integer',
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
            'ApplicantSketch' => 'nullable|image',
            'ApplicantSignature' => 'nullable|image',

            //spouse
            'Spouse' => 'nullable|string',
            'SpouseAge' => 'nullable|integer',
            'SpouseProvincialAddress' => 'nullable|string',
            'SpouseMobileNumber' => 'nullable|integer',
            'SpouseEmail' => 'nullable|email',
            'SpouseEmployer' => 'nullable|string',
            'SpousePosition' => 'nullable|string',
            'SpouseJobAddress' => 'nullable|string',
            'SpouseWorkTelNum' => 'nullable|integer',
            'SpouseDateEmployed' => 'nullable|date',
            'SpouseSalary' => 'nullable|integer',
            'SpouseSignature' => 'nullable|image',

            //parents
            'Father' => 'nullable|string',
            'Mother' => 'nullable|string',
            'ParentAddresss' => 'nullable|string',
            'ParentNumber' => 'nullable|integer',

            //address
            'PresentAddress' => 'required|string',	
            'LengthOfStay' => 'required|string',	
            'HouseStatus' => 'required|string',	
            'HouseProvidedBy' => 'nullable|string',	
            'LotStatus' => 'required|string',	
            'LotProvidedBy' => 'nullable|string',
            
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
            'CoMakerMobileNo' => 'required|integer',
            'CoMakerEmployer' => 'required|string',	
            'CoMakeDateEmployed' => 'nullable|date',
            'CoMakerPosition' => 'required|string',	
            'CoMakerTelNo' => 'nullable|integer',
            'CoMakerEmployerAddress' => 'required|string',	
            'EmploymentStatus' => 'nullable|string',
            'CoMakerCreditReference1' => 'nullable|string',
            'CoMakerCreditReference2' => 'nullable|string',
            'CoMakerCreditReference3' => 'nullable|string',
            'CoMakerSketch' => 'nullable|image',
            'CoMakerSignature' => 'nullable|image',
            
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

        $customer = Customer::create([
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
                'FarmLotAddress' => $request->input('FarmLotAddress'),	
                'FarmLotSize' => $request->input('FarmLotSize'),	
                'ProvincialAddress' => $request->input('ProvincialAddress'),	
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
                'ApplicantSignature' => $request->input('ApplicantSignature'),
                'ApplicantSketch' => $request->input('ApplicantSketch'),	
                

                'user_id' => $user->id
                
            ]);

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
                    'SpouseSignature' => $request->input('SpouseSignature'),
    
                    'customer_id' => $customer->id
                ]);
            }

            if($request->Father != "" || $request->Mother != ""){
                CustomerParent::create([
                    'Father' => $request->input('Father'),
                    'Mother' => $request->input('Mother'),
                    'Addresss' => $request->input('ParentAddresss'),
                    'MobileNumber ' => $request->input('ParentNumber'),

                    'customer_id' => $customer->id

                 ]);
            }

            CustomerAddress::create([
                'PresentAddress' => $request->input('PresentAddress'),	
                'LengthOfStay' => $request->input('LengthOfStay'),	
                'HouseStatus' => $request->input('HouseStatus'),	
                'HouseProvidedBy' => $request->input('HouseProvidedBy'),	
                'LotStatus' => $request->input('LotStatus'),	
                'LotStatus' => $request->input('LotProvidedBy'),

                'customer_id' => $customer->id	
            ]);

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
                'Sketch' => $request->input('CoMakerSketch'),
                'Signature' => $request->input('CoMakerSignature'),

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


            return redirect()->route('admin.user.index');
    }
}
