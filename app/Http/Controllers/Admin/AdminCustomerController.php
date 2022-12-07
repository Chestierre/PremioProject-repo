<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\User;
use App\Models\Unit;
use App\Models\Order;
use App\Models\Preorder;
use App\Models\OrderTransactionDetails;
use App\Models\CustomerSpouse;
use App\Models\CustomerParent;
use App\Models\CustomerAddress;
use App\Models\CustomerCoMaker;
use App\Models\CustomerDependent;
use App\Models\CustomerPersonalReference;
use App\Models\CustomerCreditReference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


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
            'MobileNumber' => 'required|regex:/(^(\+639)\d{9}$)/u',
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
    public function show(User $admincustomer)
    {
        // $admincustomer->load('customer.spouse','customer.comaker','customer.address','customer.parent', 'customer.dependent', 'customer.personalreference','customer.creditreference');
        // return view('admin.admincustomer.edit', compact('admincustomer')); 
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
        $admincustomer->load('customer.spouse','customer.comaker','customer.address','customer.parent', 'customer.dependent', 'customer.personalreference','customer.creditreference', 'customer.order.ordercustomerinformation');
        $sorted = $admincustomer->customer->order->sortBy('created_at')->last();
        // dd($admincustomer);
        // dd($sorted->ordercustomerinformation);
        


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
            'HomePhoneNumber' => 'nullable|integer',
            'OfficePhoneNumber' => 'nullable|integer',
            'MobileNumber' => 'required|regex:/(^(\+639)\d{9}$)/u',
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
            'SpouseMobileNumber' => 'nullable|regex:/(^(\+639)\d{9}$)/u',
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
            'ParentAddress' => 'nullable|string',
            'ParentMobileNumber' => 'nullable|string',

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
            'CoMakerEmployerAddress' => 'nullable|string',
            'CoMakerCreditReference1' => 'nullable|string',
            'CoMakerCreditReference2' => 'nullable|string',
            'CoMakerCreditReference3' => 'nullable|string',
            'CoMakerSketch' => 'nullable|image',
            'CoMakerSignature' => 'nullable|image',
            

            //dependencies
            'Dependent1_Name' => 'nullable|string',
            'Dependent1_Age' => 'nullable|integer',
            'Dependent1_GradeOcc' => 'nullable|string',
            'Dependent1_SchoolComp' => 'nullable|string',
            'Dependent2_Name' => 'nullable|string',
            'Dependent2_Age' => 'nullable|integer',
            'Dependent2_GradeOcc' => 'nullable|string',
            'Dependent2_SchoolComp' => 'nullable|string',
            'Dependent3_Name' => 'nullable|string',
            'Dependent3_Age' => 'nullable|integer',
            'Dependent3_GradeOcc' => 'nullable|string',
            'Dependent3_SchoolComp' => 'nullable|string',
            'Dependent4_Name' => 'nullable|string',
            'Dependent4_Age' => 'nullable|integer',
            'Dependent4_GradeOcc' => 'nullable|string',
            'Dependent4_SchoolComp' => 'nullable|string',

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

        $imagePathApplicantSketch = ($admincustomer->customer->ApplicantSketch)?$admincustomer->customer->ApplicantSketch:"";
        $imagePathApplicantSignature = ($admincustomer->customer->ApplicantSignature)?$admincustomer->customer->ApplicantSignature:"";
        // dd($request->ApplicantSketch);
        if ($request->ApplicantSketch != NULL){
            if($sorted !=NULL){
                if ($sorted->ordercustomerinformation->ApplicantSketch != $admincustomer->customer->ApplicantSketch && $admincustomer->customer->ApplicantSketch){
                    if(Storage::disk('public')->exists($admincustomer->customer->ApplicantSketch )){
                        Storage::disk('public')->delete($admincustomer->customer->ApplicantSketch);
                    }else{
                        dd("storage not working");
                    }
                }
            }

            $imagePathApplicantSketch = request('ApplicantSketch')->store('uploads', 'public');
        }
        if ($request->ApplicantSignature != NULL) {
            if($sorted !=NULL){
                if($sorted->ordercustomerinformation->ApplicantSignature != $admincustomer->customer->ApplicantSignature && $admincustomer->customer->ApplicantSignature){
                    if(Storage::disk('public')->exists($admincustomer->customer->ApplicantSignature )){
                        Storage::disk('public')->delete($admincustomer->customer->ApplicantSignature);
                    }else{
                        dd("storage not working");
                    }
                }
            }

            $imagePathApplicantSignature = request('ApplicantSignature')->store('uploads', 'public');
        }
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
            'ApplicantSketch' => $imagePathApplicantSketch,
            'ApplicantSignature' => $imagePathApplicantSignature	
        ]);

        
        
        $imagePathSpouseSignature = ($admincustomer->customer->spouse->SpouseSignature)?$admincustomer->customer->spouse->SpouseSignature:"";
        
        if ($request->SpouseSignature != NULL) {
            if($sorted !=NULL){
                if($sorted->ordercustomerinformation->SpouseSignature != $admincustomer->customer->spouse->SpouseSignature && $admincustomer->customer->spouse->SpouseSignature){
                    if(Storage::disk('public')->exists($admincustomer->customer->spouse->SpouseSignature )){
                        Storage::disk('public')->delete($admincustomer->customer->spouse->SpouseSignature);
                    }else{
                        dd("storage not working");
                    }
                }
            }

            $imagePathSpouseSignature = request('SpouseSignature')->store('uploads', 'public');
        }
            
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
                'SpouseSignature' => $imagePathSpouseSignature
            ]);

        
        $imagePathCoMakerSketch = ($admincustomer->customer->comaker->Sketch)?$admincustomer->customer->comaker->Sketch:"";
        $imagePathCoMakerSignature = ($admincustomer->customer->comaker->Signature)?$admincustomer->customer->comaker->Signature:"";

        if ($request->CoMakerSketch != NULL){ 
            if($sorted !=NULL){
                if($sorted->ordercustomerinformation->CoMakerSketch != $admincustomer->customer->comaker->Sketch && $admincustomer->customer->comaker->Sketch){
                    if(Storage::disk('public')->exists($admincustomer->customer->comaker->Sketch )){
                        Storage::disk('public')->delete($admincustomer->customer->comaker->Sketch);
                    }else{
                        dd("storage not working");
                    }
                } 
            }


            $imagePathCoMakerSketch = request('CoMakerSketch')->store('uploads', 'public');

        }
        if ($request->CoMakerSignature != NULL) {
            if ($sorted !=NULL){
                if($sorted->ordercustomerinformation->CoMakerSignature != $admincustomer->customer->comaker->Signature && $admincustomer->customer->comaker->Signature){
                    if(Storage::disk('public')->exists($admincustomer->customer->comaker->Signature )){
                        Storage::disk('public')->delete($admincustomer->customer->comaker->Signature);
                    }else{
                        dd("storage not working");
                    }
                }
            

            }


            $imagePathCoMakerSignature = request('CoMakerSignature')->store('uploads', 'public');
        }
            
            
        $admincustomer-> customer -> comaker() -> update([
            'Name' => $request->CoMakerName,	
            'Age' => $request->CoMakerAge,
            'Sex' => $request->CoMakerSex,
            'Address' => $request->CoMakerAddress,	
            'CoMakeTelNumber' => $request->CoMakeTelNumber,
            'Residence' => $request->CoMakerResidence,
            'ResidenceProvidedBy' => $request->CoMakerResidenceProvidedBy,
            'CivilStatus' => $request->CoMakerCivilStatus,
            'Relationship' => $request->CoMakerRelationship,
            'BirthDate' => $request->CoMakerBirthDate,
            'Tin' => $request->CoMakerTin,
            'MobileNo' => $request->CoMakerMobileNo,
            'Employer' => $request->CoMakerEmployer,	
            'CoMakeDateEmployed' => $request->CoMakeDateEmployed,
            'Position' => $request->CoMakerPosition,	
            'TelNo' => $request->CoMakerTelNo,
            'EmployerAddress' => $request->CoMakerEmployerAddress,	
            'EmploymentStatus' => $request->CoMakerEmploymentStatus,
            'CreditReference1' => $request->CoMakerCreditReference1,
            'CreditReference2' => $request->CoMakerCreditReference2,
            'CreditReference3' => $request->CoMakerCreditReference3,
            'Sketch' => $imagePathCoMakerSketch,
            'Signature' => $imagePathCoMakerSignature
        ]);
        

       

        $admincustomer-> customer -> parent() -> update([
            'Father' => $request->Father,
            'Mother' => $request->Mother,
            'Addresss' => $request->ParentAddress,
            'MobileNumber' => $request->ParentMobileNumber,

         ]);

         $admincustomer-> customer -> address() -> update([
            'PresentAddress' => $request->PresentAddress,	
            'LengthOfStay' => $request->LengthOfStay,	
            'HouseStatus' => $request->HouseStatus,	
            'HouseProvidedBy' => $request->HouseProvidedBy,
            'LotStatus' => $request->LotStatus,	
            'LotProvidedBy' => $request->LotProvidedBy,
            'OtherPropertiesTV' => $request->OtherPropertiesTV,
            'OtherPropertiesRef' => $request->OtherPropertiesRef,
            'OtherPropertiesStereoComponent' => $request->OtherPropertiesStereoComponent,
            'OtherPropertiesGasRange' => $request->OtherPropertiesGasRange,
            'OtherPropertiesMotorcycle' => $request->OtherPropertiesMotorcycle,
            'OtherPropertiesComputer' => $request->OtherPropertiesComputer,
            'OtherPropertiesFarmlot' => $request->OtherPropertiesFarmlot,
            'FarmLotAddress' => $request->FarmLotAddress,	
            'FarmLotSize' => $request->FarmLotSize,
            'ProvincialAddress' => $request->ProvincialAddress,			

        ]);

        switch($request->NumberOfDependencies){
            case '4':
                if ($admincustomer-> customer -> dependent -> slice(3, 1) -> first() && $admincustomer -> customer -> dependent -> count() == 4){
                    $admincustomer-> customer -> dependent -> slice(3, 1) -> first() -> update
                    ([
                        'Name' => $request->Dependent4_Name,
                        'Age' => $request->Dependent4_Age,
                        'GradeOcc' => $request->Dependent4_GradeOcc,
                        'SchoolComp' => $request->Dependent4_SchoolComp,
                    ]);
                }
                else
                {
                    CustomerDependent::create([
                        'Name' => $request->input('Dependent4_Name'),
                        'Age' => $request->input('Dependent4_Age'),
                        'GradeOcc' => $request->input('Dependent4_GradeOcc'),
                        'SchoolComp' => $request->input('Dependent4_SchoolComp'),
                        'customer_id' => $admincustomer -> customer->id
                    ]);	
                }
                
            case '3':
                if ($admincustomer-> customer -> dependent -> slice(2, 1) -> first() && $admincustomer -> customer -> dependent -> count() <= 4){
                $admincustomer-> customer -> dependent -> slice(2, 1) -> first() -> update([
                    'Name' => $request->Dependent3_Name,
                    'Age' => $request->Dependent3_Age,
                    'GradeOcc' => $request->Dependent3_GradeOcc,
                    'SchoolComp' => $request->Dependent3_SchoolComp,
                ]);
                }
                else
                {
                    CustomerDependent::create([
                        'Name' => $request->input('Dependent3_Name'),
                        'Age' => $request->input('Dependent3_Age'),
                        'GradeOcc' => $request->input('Dependent3_GradeOcc'),
                        'SchoolComp' => $request->input('Dependent3_SchoolComp'),
                        'customer_id' => $admincustomer -> customer->id
                    ]);	
                }


	
            case '2':
                if ($admincustomer-> customer -> dependent -> slice(1, 1) -> first() && $admincustomer -> customer -> dependent -> count() <= 4){
                        $admincustomer-> customer -> dependent -> slice(1, 1) -> first() -> update([
                            'Name' => $request->Dependent2_Name,
                            'Age' => $request->Dependent2_Age,
                            'GradeOcc' => $request->Dependent2_GradeOcc,
                            'SchoolComp' => $request->Dependent2_SchoolComp,
                    ]);	
                    }
                    else
                    {
                        CustomerDependent::create([
                            'Name' => $request->input('Dependent2_Name'),
                            'Age' => $request->input('Dependent2_Age'),
                            'GradeOcc' => $request->input('Dependent2_GradeOcc'),
                            'SchoolComp' => $request->input('Dependent2_SchoolComp'),
                            'customer_id' => $admincustomer -> customer->id
                        ]);	
                    }


            case '1':
                if ($admincustomer-> customer -> dependent -> slice(0, 1) -> first() && $admincustomer -> customer -> dependent -> count() <= 4){
                    $admincustomer-> customer -> dependent -> slice(0, 1) -> first() -> update([
                        'Name' => $request->Dependent1_Name,
                        'Age' => $request->Dependent1_Age,
                        'GradeOcc' => $request->Dependent1_GradeOcc,
                        'SchoolComp' => $request->Dependent1_SchoolComp,
                    ]);	
                }
                else
                {
                    CustomerDependent::create([
                        'Name' => $request->input('Dependent1_Name'),
                        'Age' => $request->input('Dependent1_Age'),
                        'GradeOcc' => $request->input('Dependent1_GradeOcc'),
                        'SchoolComp' => $request->input('Dependent1_SchoolComp'),
                        'customer_id' => $admincustomer -> customer->id
                    ]);	
                }
            default:
                ;
        };

        // dd($admincustomer-> customer -> personalreference -> slice(0, 1) -> first());

        $admincustomer-> customer -> personalreference -> slice(0, 1) -> first() -> update([
            'PersonalReferenceName' => $request->PersonalReferenceName1,
            'PersonalReferenceRelationship' => $request->PersonalReferenceRelationship1,
            'PersonalReferenceNumber' => $request->PersonalReferenceNumber1,
            'PersonalReferenceAddress' => $request->PersonalReferenceAddress1,
        ]);	

        $admincustomer-> customer -> personalreference -> slice(1, 1) -> first() -> update([
            'PersonalReferenceName' => $request->PersonalReferenceName2,
            'PersonalReferenceRelationship' => $request->PersonalReferenceRelationship2,
            'PersonalReferenceNumber' => $request->PersonalReferenceNumber2,
            'PersonalReferenceAddress' => $request->PersonalReferenceAddress2,
        ]);

        $admincustomer-> customer -> personalreference -> slice(2, 1) -> first() -> update([
            'PersonalReferenceName' => $request->PersonalReferenceName3,
            'PersonalReferenceRelationship' => $request->PersonalReferenceRelationship3,
            'PersonalReferenceNumber' => $request->PersonalReferenceNumber3,
            'PersonalReferenceAddress' => $request->PersonalReferenceAddress3,
        ]);




        switch($request->NumberofCreditReference){
            case '4':
                if ($admincustomer-> customer -> creditreference -> slice(3, 1) -> first() && $admincustomer -> customer -> creditreference -> count() == 4){
                    $admincustomer-> customer -> creditreference -> slice(3, 1) -> first() -> update
                    ([
                        'StoreBank' => $request->StoreBank4,
                        'ItemLoadAmount' => $request->ItemLoadAmount4,
                        'Term' => $request->Term4,
                        'CreditDate' => $request->CreditDate4,
                        'CreditBalance' => $request->CreditBalance4
                    ]);
                }
                else
                {
                    
                    CustomerCreditReference::create([
                        'StoreBank' => $request->input('StoreBank4'),
                        'ItemLoadAmount' => $request->input('ItemLoadAmount4'),
                        'Term' => $request->input('Term4'),
                        'CreditDate' => $request->input('CreditDate4'),
                        'CreditBalance' => $request->input('CreditBalance4'),
                        'customer_id' => $admincustomer -> customer->id	
                    ]);

                }
                
            case '3':
                if ($admincustomer-> customer -> creditreference -> slice(2, 1) -> first() && $admincustomer -> customer -> creditreference -> count() <= 4){
                    $admincustomer-> customer -> creditreference -> slice(2, 1) -> first() -> update
                    ([
                        'StoreBank' => $request->StoreBank3,
                        'ItemLoadAmount' => $request->ItemLoadAmount3,
                        'Term' => $request->Term3,
                        'CreditDate' => $request->CreditDate3,
                        'CreditBalance' => $request->CreditBalance3
                    ]);
                }
                else
                {
                    CustomerCreditReference::create([
                        'StoreBank' => $request->input('StoreBank3'),
                        'ItemLoadAmount' => $request->input('ItemLoadAmount3'),
                        'Term' => $request->input('Term3'),
                        'CreditDate' => $request->input('CreditDate3'),
                        'CreditBalance' => $request->input('CreditBalance3'),
                        'customer_id' => $admincustomer -> customer->id	
                    ]);
                }


	
            case '2':
                if ($admincustomer-> customer -> creditreference -> slice(1, 1) -> first() && $admincustomer -> customer -> creditreference -> count() <= 4){
                    $admincustomer-> customer -> creditreference -> slice(1, 1) -> first() -> update
                    ([
                        'StoreBank' => $request->StoreBank2,
                        'ItemLoadAmount' => $request->ItemLoadAmount2,
                        'Term' => $request->Term2,
                        'CreditDate' => $request->CreditDate2,
                        'CreditBalance' => $request->CreditBalance2
                    ]);
                    }
                    else
                    {
                        CustomerCreditReference::create([
                            'StoreBank' => $request->input('StoreBank2'),
                            'ItemLoadAmount' => $request->input('ItemLoadAmount2'),
                            'Term' => $request->input('Term2'),
                            'CreditDate' => $request->input('CreditDate2'),
                            'CreditBalance' => $request->input('CreditBalance2'),
                            'customer_id' => $admincustomer -> customer->id	
                        ]);
                    }


            case '1':
                if ($admincustomer-> customer -> creditreference -> slice(0, 1) -> first() && $admincustomer -> customer -> creditreference -> count() <= 4){
                    $admincustomer-> customer -> creditreference -> slice(0, 1) -> first() -> update
                    ([
                        'StoreBank' => $request->StoreBank1,
                        'ItemLoadAmount' => $request->ItemLoadAmount1,
                        'Term' => $request->Term1,
                        'CreditDate' => $request->CreditDate1,
                        'CreditBalance' => $request->CreditBalance1
                    ]);
                }
                else
                {
                    CustomerCreditReference::create([
                        'StoreBank' => $request->input('StoreBank1'),
                        'ItemLoadAmount' => $request->input('ItemLoadAmount1'),
                        'Term' => $request->input('Term1'),
                        'CreditDate' => $request->input('CreditDate1'),
                        'CreditBalance' => $request->input('CreditBalance1'),
                        'customer_id' => $admincustomer -> customer->id	
                    ]);
                }
            default:
                ;
        };



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
        // dd($request->all());
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

        $imagePathApplicantSketch = request('ApplicantSketch')->store('uploads', 'public');
        $imagePathApplicantSignature = request('ApplicantSignature')->store('uploads', 'public');

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


            return redirect()->route('admin.user.index');
    }
    public function customerOrder(User $user)
    {
        
        $unit = Unit::all();
        $user->load('customer.spouse', 'customer.order','customer.comaker','customer.address','customer.parent', 'customer.dependent', 'customer.personalreference','customer.creditreference');
        return view('admin.admincustomer.orders', compact('user', 'unit')); 
    }
    public function customerPreorder(User $user)
    {
        $customer = Customer::with('preorder.unit.unitimage', 'user')->find($user->customer->id);
        return view('admin.admincustomer.preorder', compact('customer'));
      
    }

    public function printPdf($id){
        
    }

    public function pdfAdminCustomerOrders(User $user){
        $user->load('customer.order.ordercustomerinformation');

        $pdf = Pdf::loadView('admin.admincustomer.pdfAdminCustomerOrder', compact('user'));

        return $pdf->download('All Orders for '. $user->customer->FirstName. $user->customer->LastName.'.pdf');
    }

    public function pdfAdminCustomerOrdersbyDate(User $user, Request $request)
    {
        // dd($user);
        // $user->load('customer.order.ordertransactiondetails');
        // $order = User::find($user->id)->with(['customer.order' => function($query){$query->where('created_at', '>=', '2022-11');}])->get();
        
        // dd($order);
        


        if($request->methodtype == "ByMonth"){
            // $order = Order::with('orderhistory','ordertransactiondetails', 'customer.user')->where('created_at', '>=', $request->dateafter)->get();
            $order = Order::where('created_at', '>=', $request->dateafter)->with(['customer.user' => function($query) use ($user){$query->where('id', $user->id);}, 'ordertransactiondetails'] )->get();
            // $order = $user->customer->order()->where('created_at', '>=', $request->dateafter)->get();
        }elseif($request->methodtype == "ByDate"){

            // $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->whereBetween('date_created', [$datebefore, $dateafter])->get();
            $order = Order::whereBetween('created_at', [$request->datebefore, $request->dateafter])->with(['customer.user' => function($query) use ($user){$query->where('id', $user->id);}, 'ordertransactiondetails'] )->get();
            // $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->whereBetween('created_at', [$request->datebefore, $request->dateafter])->get();
            // dd($order);
        }
        // dd($request->all()); 
        $flag = array("dateafter" => $request->dateafter, "methodtype" => $request->methodtype, "datebefore" => $request->datebefore);
        $pdf = Pdf::loadView('admin.admincustomer.pdfAdminCustomerOrder', compact('order', 'user','flag'));
        
        return $pdf->download('All orders for'.$user->customer->FirstName. $user->customer->LastName. $request->dateafter.'.pdf');
    }
    public function preorderindex(){
        $preorders = Preorder::with('customer.user', 'unit.unitimage')->get();
        return view('admin.admincustomer.preorderindex', compact('preorders'));
    }

    public function preorderDeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("preorders")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Preorders Deleted successfully."]);
    }
}
