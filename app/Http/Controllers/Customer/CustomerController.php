<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customer = Customer::with('user')->get();
        // $brand = Brand::all();
        return view('customer.index');
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
            'MobileNumber' => 'required|integer',
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

    public function try(Request $request)
    {
        dd($request->all());
    }
}
