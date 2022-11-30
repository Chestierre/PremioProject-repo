<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\User;
use App\Models\CustomerSpouse;
use App\Models\CustomerParent;
use App\Models\CustomerAddress;
use App\Models\CustomerCoMaker;
use App\Models\CustomerDependent;
use App\Models\CustomerPersonalReference;
use App\Models\CustomerCreditReference;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with('user')->get();
        $brand = Brand::all();
        return view('customer.index', compact('brand'));
        //return view('/');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            // 'PresentAddress' => 'required|string',	
            // 'LengthOfStay' => 'required|string',	
            // 'HouseStatus' => 'required|string',	
            // 'HouseProvidedBy' => 'nullable|string',	
            // 'LotStatus' => 'required|string',	
            // 'LotProvidedBy' => 'nullable|string',	
            'FarmLotAddress' => 'nullable|string',	
            'FarmLotSize' => 'nullable|string',	
            'ProvincialAddress' => 'required|string',	
            'HomePhoneNumber' => 'nullable|integer',
            'OfficePhoneNumber' => 'nullable|integer',
            'MobileNumber' => 'required|numeric',
            'email' => 'nullable|email',
            // 'Spouse' => 'nullable|string',
            // 'SpouseAge' => 'nullable|integer',
            // 'SpouseProvincialAddress' => 'nullable|string',
            // 'SpouseMobileNumber' => 'nullable|integer',
            // 'SpouseEmail' => 'nullable|email',
            // 'SpouseEmployer' => 'nullable|string',
            // 'SpousePosition' => 'nullable|string',
            // 'SpouseJobAddress' => 'nullable|string',
            // 'SpouseWorkTelNum' => 'nullable|integer',
            // 'SpouseDateEmployed' => 'nullable|date',
            // 'SpouseSalary' => 'nullable|integer',
            'NumberDependents'	=> 'nullable|integer|max:4|min:0',
            // 'DependentName1' => 'nullable|string',
            // 'DependentAge1' => 'nullable|integer',
            // 'DependentGradeOcc1' => 'nullable|string',
            // 'DependentSchoolComp1' => 'nullable|string',
            // 'DependentName2' => 'nullable|string',
            // 'DependentAge2' => 'nullable|integer',
            // 'DependentGradeOcc2' => 'nullable|string',
            // 'DependentSchoolComp2' => 'nullable|string',
            // 'DependentName3' => 'nullable|string',
            // 'DependentAge3' => 'nullable|integer',
            // 'DependentGradeOcc3' => 'nullable|string',
            // 'DependentSchoolComp3' => 'nullable|string',
            // 'DependentName4' => 'nullable|string',
            // 'DependentAge4' => 'nullable|integer',
            // 'DependentGradeOcc4' => 'nullable|string',
            // 'DependentSchoolComp4' => 'nullable|string',
            // 'Father' => 'nullable|string',
            // 'Mother' => 'nullable|string',
            // 'ParentAddresss' => 'nullable|string',
            // 'ParentNumber' => 'nullable|integer',
            'SourceIncome' => 'required|string',	
            'ProvidedBy' => 'nullable|string',
            // 'NumberCreditRef' => 'nullable|integer|max:4|min:0',
            // 'StoreBank1' => 'nullable|string',
            // 'ItemLoadAmount1' => 'nullable|integer',
            // 'Term1' => 'nullable|string',
            // 'CreditDate1' => 'nullable|date',
            // 'CreditBalance1' => 'nullable|integer',
            // 'StoreBank2' => 'nullable|string',
            // 'ItemLoadAmount2' => 'nullable|integer',
            // 'Term2' => 'nullable|string',
            // 'CreditDate2' => 'nullable|date',
            // 'CreditBalance2' => 'nullable|integer',
            // 'StoreBank3' => 'nullable|string',
            // 'ItemLoadAmount3' => 'nullable|integer',
            // 'Term3' => 'nullable|string',
            // 'CreditDate3' => 'nullable|date',
            // 'CreditBalance3' => 'nullable|integer',
            // 'StoreBank4' => 'nullable|string',
            // 'ItemLoadAmount4' => 'nullable|integer',
            // 'Term4' => 'nullable|string',
            // 'CreditDate4' => 'nullable|date',
            // 'CreditBalance4' => 'nullable|integer',
            // 'PersonalReferenceName1' => 'required|string',	
            // 'PersonalReferenceRelationship1' => 'required|string',	
            // 'PersonalReferenceNumber1' => 'nullable|integer',
            // 'PersonalReferenceAddress1' => 'required|string',	
            // 'PersonalReferenceName2' => 'required|string',	
            // 'PersonalReferenceRelationship2' => 'required|string',	
            // 'PersonalReferenceNumber2' => 'nullable|integer',
            // 'PersonalReferenceAddress2' => 'required|string',	
            // 'PersonalReferenceName3' => 'required|string',	
            // 'PersonalReferenceRelationship3' => 'required|string',	
            // 'PersonalReferenceNumber3' => 'nullable|integer',
            // 'PersonalReferenceAddress3' => 'required|string',	
            'EmployerName' => 'required|string',	
            'WorkPosition' => 'required|string',	
            'WorkAddress' => 'required|string',	
            'WorkTelNumber' => 'nullable|integer',
            'DateEmployed' => 'required|date',	
            'Salary' => 'required|integer',
            'UnitToBeUsedFor' => 'required|string',
            'ModeOfPayment' => 'nullable|string',
            // 'CoMakerName' => 'required|string',	
            // 'CoMakerAge' => 'nullable|integer',
            // 'CoMakerSex' => 'nullable|string',
            // 'CoMakerAddress' => 'required|string',	
            // 'CoMakeTelNumber' => 'nullable|integer',
            // 'CoMakerResidence' => 'nullable|string',
            // 'CoMakerResidenceProvidedBy' => 'nullable|string',
            // 'CoMakerCivilStatus' => 'nullable|string',
            // 'CoMakerRelationship' => 'nullable|string',
            // 'CoMakerBirthDate' => 'nullable|date',
            // 'CoMakerTin' => 'nullable|integer',
            // 'CoMakerMobileNo' => 'required|integer',
            // 'CoMakerEmployer' => 'required|string',	
            // 'CoMakeDateEmployed' => 'nullable|date',
            // 'CoMakerPosition' => 'required|string',	
            // 'CoMakerTelNo' => 'nullable|integer',
            // 'CoMakerEmployerAddress' => 'required|string',	
            // 'EmploymentStatus' => 'nullable|string',
            // 'CoMakerCreditReference1' => 'nullable|string',
            // 'CoMakerCreditReference2' => 'nullable|string',
            // 'CoMakerCreditReference3' => 'nullable|string',
            // 'ApplicantSketch' => 'nullable|image',	
            // 'CoMakerSketch' => 'nullable|image',
            // 'CoMakerSignature' => 'nullable|image',
            // 'SpouseSignature' => 'nullable|image',
            // 'ApplicantSignature' => 'nullable|image'	
        ]);
        $userId = Auth::id();
        // dd($userId);
        // dd($request);

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
                // 'PresentAddress' => $request->input('PresentAddress'),	
                // 'LengthOfStay' => $request->input('LengthOfStay'),	
                // 'HouseStatus' => $request->input('HouseStatus'),	
                // 'HouseProvidedBy' => $request->input('HouseProvidedBy'),	
                // 'LotStatus' => $request->input('LotStatus'),	
                // 'LotProvidedBy' => $request->input('LotProvidedBy'),	
                'FarmLotAddress' => $request->input('FarmLotAddress'),	
                'FarmLotSize' => $request->input('FarmLotSize'),	
                'ProvincialAddress' => $request->input('ProvincialAddress'),	
                'HomePhoneNumber' => $request->input('HomePhoneNumber'),
                'OfficePhoneNumber' => $request->input('OfficePhoneNumber'),
                'MobileNumber' => $request->input('MobileNumber'),
                'email' => $request->input('email'),
                // 'Spouse' => $request->input('Spouse'),
                // 'SpouseAge' => $request->input('SpouseAge'),
                // 'SpouseProvincialAddress' => $request->input('SpouseProvincialAddress'),
                // 'SpouseMobileNumber' => $request->input('SpouseMobileNumber'),
                // 'SpouseEmail' => $request->input('SpouseEmail'),
                // 'SpouseEmployer' => $request->input('SpouseEmployer'),
                // 'SpousePosition' => $request->input('SpousePosition'),
                // 'SpouseJobAddress' => $request->input('SpouseJobAddress'),
                // 'SpouseWorkTelNum' => $request->input('SpouseWorkTelNum'),
                // 'SpouseDateEmployed' => $request->input('SpouseDateEmployed'),
                // 'SpouseSalary' => $request->input('SpouseSalary'),
                // 'DependentName1' => $request->input('DependentName1'),
                // 'DependentAge1' => $request->input('DependentAge1'),
                // 'DependentGradeOcc1' => $request->input('DependentGradeOcc1'),
                // 'DependentSchoolComp1' => $request->input('DependentSchoolComp1'),
                // 'DependentName2' => $request->input('DependentName2'),
                // 'DependentAge2' => $request->input('DependentAge2'),
                // 'DependentGradeOcc2' => $request->input('DependentGradeOcc2'),
                // 'DependentSchoolComp2' => $request->input('DependentSchoolComp2'),
                // 'DependentName3' => $request->input('DependentName3'),
                // 'DependentAge3' => $request->input('DependentAge3'),
                // 'DependentGradeOcc3' => $request->input('DependentGradeOcc3'),
                // 'DependentSchoolComp3' => $request->input('DependentSchoolComp3'),
                // 'DependentName4' => $request->input('DependentName4'),
                // 'DependentAge4' => $request->input('DependentAge4'),
                // 'DependentGradeOcc4' => $request->input('DependentGradeOcc4'),
                // 'DependentSchoolComp4' => $request->input('DependentSchoolComp4'),
                // 'Father' => $request->input('Father'),
                // 'Mother' => $request->input('Mother'),
                // 'ParentAddresss' => $request->input('ParentAddresss'),
                // 'ParentNumber' => $request->input('ParentNumber'),
                'SourceIncome' => $request->input('SourceIncome'),	
                'ProvidedBy' => $request->input('ProvidedBy'),
                // 'StoreBank1' => $request->input('StoreBank1'),
                // 'ItemLoadAmount1' => $request->input('ItemLoadAmount1'),
                // 'Term1' => $request->input('Term1'),
                // 'CreditDate1' => $request->input('CreditDate1'),
                // 'CreditBalance1' => $request->input('CreditBalance1'),
                // 'StoreBank2' => $request->input('StoreBank2'),
                // 'ItemLoadAmount2' => $request->input('ItemLoadAmount2'),
                // 'Term2' => $request->input('Term2'),
                // 'CreditDate2' => $request->input('CreditDate2'),
                // 'CreditBalance2' => $request->input('CreditBalance2'),
                // 'StoreBank3' => $request->input('StoreBank3'),
                // 'ItemLoadAmount3' => $request->input('ItemLoadAmount3'),
                // 'Term3' => $request->input('Term3'),
                // 'CreditDate3' => $request->input('CreditDate3'),
                // 'CreditBalance3' => $request->input('CreditBalance3'),
                // 'StoreBank4' => $request->input('StoreBank4'),
                // 'ItemLoadAmount4' => $request->input('ItemLoadAmount4'),
                // 'Term4' => $request->input('Term4'),
                // 'CreditDate4' => $request->input('CreditDate4'),
                // 'CreditBalance4' => $request->input('CreditBalance4'),
                // 'PersonalReferenceName1' => $request->input('PersonalReferenceName1'),	
                // 'PersonalReferenceRelationship1' => $request->input('PersonalReferenceRelationship1'),	
                // 'PersonalReferenceNumber1' => $request->input('PersonalReferenceNumber1'),
                // 'PersonalReferenceAddress1' => $request->input('PersonalReferenceAddress1'),	
                // 'PersonalReferenceName2' => $request->input('PersonalReferenceName2'),	
                // 'PersonalReferenceRelationship2' => $request->input('PersonalReferenceRelationship2'),	
                // 'PersonalReferenceNumber2' => $request->input('PersonalReferenceNumber2'),
                // 'PersonalReferenceAddress2' => $request->input('PersonalReferenceAddress2'),	
                // 'PersonalReferenceName3' => $request->input('PersonalReferenceName3'),	
                // 'PersonalReferenceRelationship3' => $request->input('PersonalReferenceRelationship3'),	
                // 'PersonalReferenceNumber3' => $request->input('PersonalReferenceNumber3'),
                // 'PersonalReferenceAddress3' => $request->input('PersonalReferenceAddress3'),	
                'EmployerName' => $request->input('EmployerName'),	
                'WorkPosition' => $request->input('WorkPosition'),	
                'WorkAddress' => $request->input('WorkAddress'),	
                'WorkTelNumber' => $request->input('WorkTelNumber'),
                'DateEmployed' => $request->input('DateEmployed'),	
                'Salary' => $request->input('Salary'),
                'UnitToBeUsedFor' => $request->input('UnitToBeUsedFor'),
                'ModeOfPayment' => $request->input('ModeOfPayment'),
                // 'CoMakerName' => $request->input('CoMakerName'),	
                // 'CoMakerAge' => $request->input('CoMakerAge'),
                // 'CoMakerSex' => $request->input('CoMakerSex'),
                // 'CoMakerAddress' => $request->input('CoMakerAddress'),	
                // 'CoMakeTelNumber' => $request->input('CoMakeTelNumber'),
                // 'CoMakerResidence' => $request->input('CoMakerResidence'),
                // 'CoMakerResidenceProvidedBy' => $request->input('CoMakerResidenceProvidedBy'),
                // 'CoMakerCivilStatus' => $request->input('CoMakerCivilStatus'),
                // 'CoMakerRelationship' => $request->input('CoMakerRelationship'),
                // 'CoMakerBirthDate' => $request->input('CoMakerBirthDate'),
                // 'CoMakerTin' => $request->input('CoMakerTin'),
                // 'CoMakerMobileNo' => $request->input('CoMakerMobileNo'),
                // 'CoMakerEmployer' => $request->input('CoMakerEmployer'),	
                // 'CoMakeDateEmployed' => $request->input('CoMakeDateEmployed'),
                // 'CoMakerPosition' => $request->input('CoMakerPosition'),	
                // 'CoMakerTelNo' => $request->input('CoMakerTelNo'),
                // 'CoMakerEmployerAddress' => $request->input('CoMakerEmployerAddress'),	
                // 'EmploymentStatus' => $request->input('EmploymentStatus'),
                // 'CoMakerCreditReference1' => $request->input('CoMakerCreditReference1'),
                // 'CoMakerCreditReference2' => $request->input('CoMakerCreditReference2'),
                // 'CoMakerCreditReference3' => $request->input('CoMakerCreditReference3'),
                // 'ApplicantSketch' => $request->input('ApplicantSketch'),	
                // 'CoMakerSketch' => $request->input('CoMakerSketch'),
                // 'CoMakerSignature' => $request->input('CoMakerSignature'),
                // 'SpouseSignature' => $request->input('SpouseSignature'),
                // 'ApplicantSignature' => $request->input('ApplicantSignature'),
                'user_id' => $userId
                
            ]);

        //dd($request);
        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'mobile_number' => 'required|integer'
        //     //'email_address' => ''


        // ]);

        // Customer::create([
        //     'firstname' => $request->input('firstname'),
        //     'lastname' => $request->input('lastname'),
        //     'mobile_number' => $request->input('mobile_number'),
        //     'email_address' => $request->input('email_address'),
        //     'user_id' =>  $request->user()->id
        // ]);

        //return redirect() -> route('customer.customer.index');
        return redirect('/');
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
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
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

    public function AccountSetting()
    {
        $brand = Brand::all();
        return view('customer.AccountSetting', compact('brand'));
        // $customer = Customer::find(1);
        // return view('customer.index', compact('customer', 'brand'));
    }
    public function updateCustomer(Request $request){

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'min:5', Rule::unique('users','username')->ignore(auth()->user()->id)],
            'password' => 'nullable|string|min:5|confirmed',
        ]);

        if ($request->editpassword == ""){
            auth()->user() -> update([
                'username' => $request->username,
            ]);
        }else{
            auth()->user() -> update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('welcome'); 
    }

    public function CustomerViewDetails(){
        $customer = Customer::with('spouse', 'parent', 'address', 'comaker', 'creditreference', 'dependent', 'personalreference')->find(auth()->user()->customer->id);
        $brand = Brand::all();
        return view('customer.CustomerViewDetails', compact('brand', 'customer'));
    }
    public function updateCustomerDetails(Request $request){
        // dd($request->all());
        $request->validate([
            'MiddleName' => 'required|string',	
            'LastName' => 'required|string',	
            'Age' => 'required|integer',	
            'Citizenship' => 'required|string',	
            'Religion' => 'required|string',	
            'CivilStatus' => 'required|string',	
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
            'ParentAddress' => 'nullable|string',
            'ParentMobileNumber' => 'nullable|integer',

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
            'CoMakerMobileNo' => 'required|integer',
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

        $customer = Customer::with('spouse', 'comaker', 'address', 'parent', 'dependent', 'personalreference', 'creditreference', 'order.ordercustomerinformation')->find(auth()->user()->customer->id);
        $sorted = $customer->order->sortBy('created_at')->last();

        $imagePathApplicantSketch = ($customer->ApplicantSketch)?$customer->ApplicantSketch:"";
        $imagePathApplicantSignature = ($customer->ApplicantSignature)?$customer->ApplicantSignature:"";
        if ($request->ApplicantSketch != NULL){
            if ($sorted->ordercustomerinformation->ApplicantSketch != $customer->ApplicantSketch && $customer->ApplicantSketch){
                if(Storage::disk('public')->exists($customer->ApplicantSketch )){
                    Storage::disk('public')->delete($customer->ApplicantSketch);
                }else{
                    dd("storage not working");
                }
            }
            $imagePathApplicantSketch = request('ApplicantSketch')->store('uploads', 'public');
        }
        if ($request->ApplicantSignature != NULL) {
            if($sorted->ordercustomerinformation->ApplicantSignature != $customer->ApplicantSignature && $customer->ApplicantSignature){
                if(Storage::disk('public')->exists($customer->ApplicantSignature )){
                    Storage::disk('public')->delete($customer->ApplicantSignature);
                }else{
                    dd("storage not working");
                }
            }
            $imagePathApplicantSignature = request('ApplicantSignature')->store('uploads', 'public');
        }
        $customer -> update([
            'NumberOfDependencies' => $request->NumberOfDependencies,
            'NumberofCreditReference' => $request->NumberofCreditReference,    
            'MiddleName' => $request->MiddleName,	
            'LastName' => $request->LastName,	
            'Age' => $request->Age,	
            'Citizenship' => $request->Citizenship,	
            'Religion' => $request->Religion,	
            'CivilStatus' => $request->CivilStatus,	
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
        $imagePathSpouseSignature = ($customer->spouse->SpouseSignature)?$customer->spouse->SpouseSignature:"";
        
        if ($request->SpouseSignature != NULL) {
            if($sorted->ordercustomerinformation->SpouseSignature != $customer->spouse->SpouseSignature && $customer->spouse->SpouseSignature){
                if(Storage::disk('public')->exists($customer->spouse->SpouseSignature )){
                    Storage::disk('public')->delete($customer->spouse->SpouseSignature);
                }else{
                    dd("storage not working");
                }
            }
            $imagePathSpouseSignature = request('SpouseSignature')->store('uploads', 'public');
        }
            
            $customer -> spouse() -> update([
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

        
        $imagePathCoMakerSketch = ($customer->comaker->Sketch)?$customer->comaker->Sketch:"";
        $imagePathCoMakerSignature = ($customer->comaker->Signature)?$customer->comaker->Signature:"";

        if ($request->CoMakerSketch != NULL){ 
            if($sorted->ordercustomerinformation->CoMakerSketch != $customer->comaker->Sketch && $customer->comaker->Sketch){
                if(Storage::disk('public')->exists($customer->comaker->Sketch )){
                    Storage::disk('public')->delete($customer->comaker->Sketch);
                }else{
                    dd("storage not working");
                }
            } 

            $imagePathCoMakerSketch = request('CoMakerSketch')->store('uploads', 'public');

        }
        if ($request->CoMakerSignature != NULL) {
            if($sorted->ordercustomerinformation->CoMakerSignature != $customer->comaker->Signature && $customer->comaker->Signature){
                if(Storage::disk('public')->exists($customer->comaker->Signature )){
                    Storage::disk('public')->delete($customer->comaker->Signature);
                }else{
                    dd("storage not working");
                }
            }

            $imagePathCoMakerSignature = request('CoMakerSignature')->store('uploads', 'public');
        }
            
            
        $customer -> comaker() -> update([
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
        

       

        $customer -> parent() -> update([
            'Addresss' => $request->ParentAddress,
            'MobileNumber' => $request->ParentMobileNumber,

         ]);

         $customer -> address() -> update([
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
                if ($customer -> dependent -> slice(3, 1) -> first() && $customer -> dependent -> count() == 4){
                    $customer -> dependent -> slice(3, 1) -> first() -> update
                    ([
                        'Name' => $request->DependentName4,
                        'Age' => $request->DependentAge4,
                        'GradeOcc' => $request->DependentGradeOcc4,
                        'SchoolComp' => $request->DependentSchoolComp4,
                    ]);
                }
                else
                {
                    CustomerDependent::create([
                        'Name' => $request->input('DependentName4'),
                        'Age' => $request->input('DependentAge4'),
                        'GradeOcc' => $request->input('DependentGradeOcc4'),
                        'SchoolComp' => $request->input('DependentSchoolComp4'),
                        'customer_id' => $customer->id
                    ]);	
                }
                
            case '3':
                if ($customer -> dependent -> slice(2, 1) -> first() && $customer -> dependent -> count() <= 4){
                $customer -> dependent -> slice(2, 1) -> first() -> update([
                    'Name' => $request->DependentName3,
                    'Age' => $request->DependentAge3,
                    'GradeOcc' => $request->DependentGradeOcc3,
                    'SchoolComp' => $request->DependentSchoolComp3,
                ]);
                }
                else
                {
                    CustomerDependent::create([
                        'Name' => $request->input('DependentName3'),
                        'Age' => $request->input('DependentAge3'),
                        'GradeOcc' => $request->input('DependentGradeOcc3'),
                        'SchoolComp' => $request->input('DependentSchoolComp3'),
                        'customer_id' => $customer->id
                    ]);	
                }


	
            case '2':
                if ($customer -> dependent -> slice(1, 1) -> first() && $customer -> dependent -> count() <= 4){
                        $customer -> dependent -> slice(1, 1) -> first() -> update([
                            'Name' => $request->DependentName2,
                            'Age' => $request->DependentAge2,
                            'GradeOcc' => $request->DependentGradeOcc2,
                            'SchoolComp' => $request->DependentSchoolComp2,
                    ]);	
                    }
                    else
                    {
                        CustomerDependent::create([
                            'Name' => $request->input('DependentName2'),
                            'Age' => $request->input('DependentAge2'),
                            'GradeOcc' => $request->input('DependentGradeOcc2'),
                            'SchoolComp' => $request->input('DependentSchoolComp2'),
                            'customer_id' => $customer->id
                        ]);	
                    }


            case '1':
                if ($customer -> dependent -> slice(0, 1) -> first() && $customer -> dependent -> count() <= 4){
                    $customer -> dependent -> slice(0, 1) -> first() -> update([
                        'Name' => $request->DependentName1,
                        'Age' => $request->DependentAge1,
                        'GradeOcc' => $request->DependentGradeOcc1,
                        'SchoolComp' => $request->DependentSchoolComp1,
                    ]);	
                }
                else
                {
                    CustomerDependent::create([
                        'Name' => $request->input('DependentName1'),
                        'Age' => $request->input('DependentAge1'),
                        'GradeOcc' => $request->input('DependentGradeOcc1'),
                        'SchoolComp' => $request->input('DependentSchoolComp1'),
                        'customer_id' => $customer->id
                    ]);	
                }
            default:
                ;
        };



        $customer -> personalreference -> slice(0, 1) -> first() -> update([
            'PersonalReferenceName' => $request->PersonalReferenceName1,
            'PersonalReferenceRelationship' => $request->PersonalReferenceRelationship1,
            'PersonalReferenceNumber' => $request->PersonalReferenceNumber1,
            'PersonalReferenceAddress' => $request->PersonalReferenceAddress1,
        ]);	

        $customer -> personalreference -> slice(1, 1) -> first() -> update([
            'PersonalReferenceName' => $request->PersonalReferenceName2,
            'PersonalReferenceRelationship' => $request->PersonalReferenceRelationship2,
            'PersonalReferenceNumber' => $request->PersonalReferenceNumber2,
            'PersonalReferenceAddress' => $request->PersonalReferenceAddress2,
        ]);

        $customer -> personalreference -> slice(2, 1) -> first() -> update([
            'PersonalReferenceName' => $request->PersonalReferenceName3,
            'PersonalReferenceRelationship' => $request->PersonalReferenceRelationship3,
            'PersonalReferenceNumber' => $request->PersonalReferenceNumber3,
            'PersonalReferenceAddress' => $request->PersonalReferenceAddress3,
        ]);




        switch($request->NumberofCreditReference){
            case '4':
                if ($customer -> creditreference -> slice(3, 1) -> first() && $customer -> creditreference -> count() == 4){
                    $customer -> creditreference -> slice(3, 1) -> first() -> update
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
                        'customer_id' => $customer->id	
                    ]);

                }
                
            case '3':
                if ($customer -> creditreference -> slice(2, 1) -> first() && $customer -> creditreference -> count() <= 4){
                    $customer -> creditreference -> slice(2, 1) -> first() -> update
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
                        'customer_id' => $customer->id	
                    ]);
                }


	
            case '2':
                if ($customer -> creditreference -> slice(1, 1) -> first() && $customer -> creditreference -> count() <= 4){
                    $customer -> creditreference -> slice(1, 1) -> first() -> update
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
                            'customer_id' => $customer->id	
                        ]);
                    }


            case '1':
                if ($customer -> creditreference -> slice(0, 1) -> first() && $customer -> creditreference -> count() <= 4){
                    $customer -> creditreference -> slice(0, 1) -> first() -> update
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
                        'customer_id' => $customer->id	
                    ]);
                }
            default:
                ;
        };
        return redirect()->route('welcome'); 




    }
    public function Orderdetails(){
        $customer = Customer::with('order.orderhistory', 'order.ordertransactiondetails')->find(auth()->user()->customer->id);
        $brand = Brand::all();
        return view('customer.Orderdetails', compact('brand', 'customer'));

    }
    public function Preorder(){
        $customer = Customer::with('preorder.unit.unitimage')->find(auth()->user()->customer->id);
        $brand = Brand::all();
        return view('customer.preorder', compact('brand', 'customer'));

    }
    public function getorderdata($id){
        $order = Order::with('orderhistory', 'ordertransactiondetails')->find($id);

        return response()->json($order);
    }
}
