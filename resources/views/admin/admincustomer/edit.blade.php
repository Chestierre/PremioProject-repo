@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="d-flex justify-content-between"> --}}
                <div class="d-flex">
                    <h1 class="">Customer Information</h1>
                    <div>
                        <a href = {{ url()->previous() }} type="button" class="btn btn-success mx-3"> Go Back </a>
                    </div>
                    
                </div>

            {{-- </div> --}}
            
            
            <div class="d-flex justify-content-between my-3">
                <div class="d-flex flex-column col col-md-2">
                    <button class="btn btn-primary" type="button" id="applicant_button">Applicant</button>
                    <button class="btn btn-secondary" type="button" id="spouse_button">Spouse</button>
                    <button class="btn btn-secondary" type="button" id="co_maker_button">Co-Maker</button>
                    <button class="btn btn-secondary" type="button" id="parents_button">Parents</button>
                    <button class="btn btn-secondary" type="button" id="address_button">Address</button>
                    <button class="btn btn-secondary" type="button" id="dependencies_button">Dependencies</button>
                    <button class="btn btn-secondary" type="button" id="personal_reference_button">Personal References</button>
                    <button class="btn btn-secondary" type="button" id="credit_references_button">Credit References</button>
                </div>
                <div class="col col-md-10 mx-3">
                    <form method="POST" enctype="multipart/form-data" action="{{route("admin.admincustomer.update", $admincustomer) }}">
                        @method('PUT')
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div id="applicant_page">
                            <div id="div_id_FirstName" class="form-group my-2">
                                <label for="id_FirstName" class="control-label">First Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('FirstName') is-invalid @enderror" id="id_FirstName" name="FirstName" value="{{ $admincustomer->customer->FirstName }}" type="text" autocomplete="firstname" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_FirstName" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('FirstName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_MiddleName" class="form-group my-2">
                                <label for="id_MiddleName" class="control-label">Middle Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('MiddleName') is-invalid @enderror" id="id_MiddleName" name="MiddleName" value="{{ $admincustomer->customer->MiddleName }}"  type="text"  autocomplete="MiddleName" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_MiddleName" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('MiddleName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_LastName" class="form-group my-2">
                                <label for="id_LastName" class="control-label">Last Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('LastName') is-invalid @enderror" id="id_LastName" name="LastName" value="{{ $admincustomer->customer->LastName }}"  type="text"  autocomplete="LastName" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_LastName" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('LastName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_Sex" class="form-group my-2">
                                <label for="id_Sex" class="control-label">Sex</label>
                                <div class="controls d-flex">
                                    <select name="Sex" id="id_Sex" class="form-select form-control" disabled>
                                        <option value="Male" {{ $admincustomer->customer->Sex == "Male" ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $admincustomer->customer->Sex == "Female" ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <button class="btn btn-secondary"id="button_id_Sex" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_Age" class="form-group my-2">
                                <label for="id_Age" class="control-label">Age</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('Age') is-invalid @enderror" id="id_Age" name="Age" value="{{ $admincustomer->customer->Age }}"  type="number" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_Age" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('Age')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_Citizenship" class="form-group my-2">
                                <label for="id_Citizenship" class="control-label">Citizenship</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('Citizenship') is-invalid @enderror" id="id_Citizenship" name="Citizenship" value="{{ $admincustomer->customer->Citizenship }}"  type="text" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_Citizenship" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('Citizenship')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_BirthDate" class="form-group my-2">
                                <label for="id_BirthDate" class="control-label">Birth Date</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('BirthDate') is-invalid @enderror" id="id_BirthDate" name="BirthDate" value="{{ $admincustomer->customer->BirthDate }}"  type="date" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_BirthDate" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('BirthDate')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_Religion" class="form-group my-2">
                                <label for="id_Religion" class="control-label">Religion</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('Religion') is-invalid @enderror" id="id_Religion" name="Religion" value="{{ $admincustomer->customer->Religion }}"  type="text" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_Religion" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('Religion')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_CivilStatus" class="form-group my-2">
                                <label for="id_CivilStatus" class="control-label">Source Income</label>
                                <div class="controls d-flex">
                                    <select name="CivilStatus" id="id_CivilStatus" class="form-select form-control" disabled>
                                        <option value="Single" {{ $admincustomer->customer->CivilStatus == "Single" ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ $admincustomer->customer->CivilStatus == "Married" ? 'selected' : '' }}>Married</option>
                                        <option value="Divored/Separated" {{ $admincustomer->customer->CivilStatus == "Divored/Separated" ? 'selected' : '' }}>Divored/Separated</option>
                                        <option value="Widowed" {{ $admincustomer->customer->CivilStatus == "Widowed" ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                    <button class="btn btn-secondary"id="button_id_CivilStatus" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_TinNo" class="form-group my-2">
                                <label for="id_TinNo" class="control-label">Tin Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('TinNo') is-invalid @enderror" id="id_TinNo" name="TinNo" value="{{ $admincustomer->customer->TinNo }}"  type="number" disabled/>
                                    <button class="btn btn-secondary"id="button_id_TinNo" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('TinNo')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_id_ResNo" class="form-group my-2">
                                <label for="id_id_ResNo" class="control-label">Residence Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('id_ResNo') is-invalid @enderror" id="id_id_ResNo" name="id_ResNo" value="{{ $admincustomer->customer->id_ResNo }}"  type="number" disabled/>
                                    <button class="btn btn-secondary"id="button_id_id_ResNo" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('id_ResNo')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_IssueDate" class="form-group my-2">
                                <label for="id_IssueDate" class="control-label">Issue Date</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('IssueDate') is-invalid @enderror" id="id_IssueDate" name="IssueDate" value="{{ $admincustomer->customer->IssueDate }}"  type="date" disabled/>
                                    <button class="btn btn-secondary"id="button_id_IssueDate" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('IssueDate')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_PlaceIssue" class="form-group my-2">
                                <label for="id_PlaceIssue" class="control-label">Place Issued</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PlaceIssue') is-invalid @enderror" id="id_PlaceIssue" name="PlaceIssue" value="{{ $admincustomer->customer->PlaceIssue }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_PlaceIssue" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PlaceIssue')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_HomePhoneNumber" class="form-group my-2">
                                <label for="id_HomePhoneNumber" class="control-label">Home Phone Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('HomePhoneNumber') is-invalid @enderror" id="id_HomePhoneNumber" name="HomePhoneNumber" value="{{ $admincustomer->customer->HomePhoneNumber }}"  type="number" disabled/>
                                    <button class="btn btn-secondary"id="button_id_HomePhoneNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('HomePhoneNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_OfficePhoneNumber" class="form-group my-2">
                                <label for="id_OfficePhoneNumber" class="control-label">Office Phone Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('OfficePhoneNumber') is-invalid @enderror" id="id_OfficePhoneNumber" name="OfficePhoneNumber" value="{{ $admincustomer->customer->OfficePhoneNumber }}"  type="number" disabled/>
                                    <button class="btn btn-secondary"id="button_id_OfficePhoneNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('OfficePhoneNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_MobileNumber" class="form-group my-2">
                                <label for="id_MobileNumber" class="control-label">Mobile Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('MobileNumber') is-invalid @enderror" id="id_MobileNumber" name="MobileNumber" value="{{ $admincustomer->customer->MobileNumber }}"  type="text" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_MobileNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('MobileNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_email" class="form-group my-2">
                                <label for="id_email" class="control-label">Email</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('email') is-invalid @enderror" id="id_email" name="email" value="{{ $admincustomer->customer->email }}"  type="email" disabled/>
                                    <button class="btn btn-secondary"id="button_id_email" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_SourceIncome" class="form-group my-2">
                                <label for="id_SourceIncome" class="control-label">Source Income</label>
                                <div class="controls d-flex">
                                    <select name="SourceIncome" id="id_SourceIncome" class="form-select form-control" disabled>
                                        <option value="SelfEmployedBusiness" {{ $admincustomer->customer->SourceIncome == "SelfEmployedBusiness" ? 'selected' : '' }}>Self-Employed/Business</option>
                                        <option value="Employed" {{ $admincustomer->customer->SourceIncome == "Employed" ? 'selected' : '' }}>Employed</option>
                                        <option value="Allotment" {{ $admincustomer->customer->SourceIncome == "Allotment" ? 'selected' : '' }}>Allotment</option>
                                        <option value="Provided_by" {{ $admincustomer->customer->SourceIncome == "Provided_by" ? 'selected' : '' }}>Provided by</option>
                                    </select>
                                    <button class="btn btn-secondary"id="button_id_SourceIncome" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_ProvidedBy" class="form-group my-2">
                                <label for="id_ProvidedBy" class="control-label">Provided By</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('ProvidedBy') is-invalid @enderror" id="id_ProvidedBy" name="ProvidedBy" value="{{ $admincustomer->customer->ProvidedBy }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_ProvidedBy" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('ProvidedBy')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_EmployerName" class="form-group my-2">
                                <label for="id_EmployerName" class="control-label">Employer's Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('EmployerName') is-invalid @enderror" id="id_EmployerName" name="EmployerName" value="{{ $admincustomer->customer->EmployerName }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_EmployerName" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('EmployerName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_WorkPosition" class="form-group my-2">
                                <label for="id_WorkPosition" class="control-label">Work Position</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('WorkPosition') is-invalid @enderror" id="id_WorkPosition" name="WorkPosition" value="{{ $admincustomer->customer->WorkPosition }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_WorkPosition" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('WorkPosition')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_WorkAddress" class="form-group my-2">
                                <label for="id_WorkAddress" class="control-label">Work Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('WorkAddress') is-invalid @enderror" id="id_WorkAddress" name="WorkAddress" value="{{ $admincustomer->customer->WorkAddress }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_WorkAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('WorkAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_WorkTelNumber" class="form-group my-2">
                                <label for="id_WorkTelNumber" class="control-label">Work Telephone Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('WorkTelNumber') is-invalid @enderror" id="id_WorkTelNumber" name="WorkTelNumber" value="{{ $admincustomer->customer->WorkTelNumber }}"  type="number" disabled/>
                                    <button class="btn btn-secondary"id="button_id_WorkTelNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('WorkTelNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_DateEmployed" class="form-group my-2">
                                <label for="id_DateEmployed" class="control-label">Work Telephone Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('DateEmployed') is-invalid @enderror" id="id_DateEmployed" name="DateEmployed" value="{{ $admincustomer->customer->DateEmployed }}"  type="date" disabled/>
                                    <button class="btn btn-secondary"id="button_id_DateEmployed" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('DateEmployed')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_Salary" class="form-group my-2">
                                <label for="id_Salary" class="control-label">Work Telephone Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('Salary') is-invalid @enderror" id="id_Salary" name="Salary" value="{{ $admincustomer->customer->Salary }}"  type="number" disabled/>
                                    <button class="btn btn-secondary"id="button_id_Salary" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('Salary')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_UnitToBeUsedFor" class="form-group my-2">
                                <label for="id_UnitToBeUsedFor" class="control-label">Unit to be used for</label>
                                <div class="controls d-flex">
                                    <select name="UnitToBeUsedFor" id="id_UnitToBeUsedFor" class="form-select form-control" disabled>
                                        <option value="Personal_Use" {{ $admincustomer->customer->UnitToBeUsedFor == "Personal_Use" ? 'selected' : '' }}>Personal Use</option>
                                        <option value="Business_Use" {{ $admincustomer->customer->UnitToBeUsedFor == "Business_Use" ? 'selected' : '' }}>Business Use</option>
                                        <option value="Gift" {{ $admincustomer->customer->UnitToBeUsedFor == "Gift" ? 'selected' : '' }}>Gift</option>
                                        <option value="Used_by_Relative/Friend" {{ $admincustomer->customer->UnitToBeUsedFor == "Used_by_Relative/Friend" ? 'selected' : '' }}>Used by Relative/Friend</option>
                                    </select>
                                    <button class="btn btn-secondary"id="button_id_UnitToBeUsedFor" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_ModeOfPayment" class="form-group my-2">
                                <label for="id_ModeOfPayment" class="control-label">Mode of Payment</label>
                                <div class="controls d-flex">
                                    <select name="ModeOfPayment" id="id_ModeOfPayment" class="form-select form-control" disabled>
                                        <option value="Post_Date_Checks" {{ $admincustomer->customer->ModeOfPayment == "Post_Date_Checks" ? 'selected' : '' }}>Post Date Checks</option>
                                        <option value="Cash_Paid_to_Office" {{ $admincustomer->customer->ModeOfPayment == "Cash_Paid_to_Office" ? 'selected' : '' }}>Cash Paid to Office</option>
                                        <option value="Cash_for_Collection" {{ $admincustomer->customer->ModeOfPayment == "Cash_for_Collection" ? 'selected' : '' }}>Cash for Collection</option>
                                        <option value="Credit_Card" {{ $admincustomer->customer->ModeOfPayment == "Credit_Card" ? 'selected' : '' }}>Credit Card</option>
                                    </select>
                                    <button class="btn btn-secondary"id="button_id_ModeOfPayment" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_ApplicantSketch" class="form-group my-2">
                                <label for="id_ApplicantSketch" class="control-label">Applicant Sketch:</label>
                                <div class="controls d-flex">
                                    <input class="form-control image_field @error('ApplicantSketch') is-invalid @enderror" id="id_ApplicantSketch" name="ApplicantSketch" accept="image/*" data-id="ApplicantSketchimg" type="file" disabled/>
                                    <button class="btn btn-secondary button_click"id="button_id_ApplicantSketch" data-id="id_ApplicantSketch" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('ApplicantSketch')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <img src= "/storage/{{ $admincustomer->customer->ApplicantSketch }}" id="ApplicantSketchimg" width="300" height="200">

                            <div id="div_id_ApplicantSignature" class="form-group my-2">
                                <label for="id_ApplicantSignature" class="control-label">Applicant Signature:</label>
                                <div class="controls d-flex">
                                    <input class="form-control image_field @error('ApplicantSignature') is-invalid @enderror" id="id_ApplicantSignature" name="ApplicantSignature" accept="image/*" data-id="ApplicantSignatureimg" type="file" disabled/>
                                    <button class="btn btn-secondary button_click"id="button_id_ApplicantSignature" data-id="id_ApplicantSignature" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('ApplicantSignature')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <img src= "/storage/{{ $admincustomer->customer->ApplicantSignature }}" id="ApplicantSignatureimg" width="300" height="200">





                        </div>
                        <div id="spouse_page" style="display:none">
                            <div id="div_id_SpouseName" class="form-group my-2">
                                <label for="id_SpouseName" class="control-label">Spouse Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseName') is-invalid @enderror" id="id_SpouseName" name="SpouseName" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->Name }}"@endif type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseName" id="button_id_SpouseName" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseAge" class="form-group my-2">
                                <label for="id_SpouseAge" class="control-label">Spouse Age</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseAge') is-invalid @enderror" id="id_SpouseAge" name="SpouseAge" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->Age }}"@endif type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseAge" id="button_id_SpouseAge" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseAge')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseProvincialAddress" class="form-group my-2">
                                <label for="id_SpouseProvincialAddress" class="control-label">Spouse Provincial Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseProvincialAddress') is-invalid @enderror" id="id_SpouseProvincialAddress" name="SpouseProvincialAddress" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->ProvincialAddress }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseProvincialAddress" id="button_id_SpouseProvincialAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseProvincialAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseMobileNumber" class="form-group my-2">
                                <label for="id_SpouseMobileNumber" class="control-label">Spouse Mobile Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseMobileNumber') is-invalid @enderror" id="id_SpouseMobileNumber" name="SpouseMobileNumber" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->MobileNumber }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseMobileNumber" id="button_id_SpouseMobileNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseMobileNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseEmail" class="form-group my-2">
                                <label for="id_SpouseEmail" class="control-label">Spouse Email</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseEmail') is-invalid @enderror" id="id_SpouseEmail" name="SpouseEmail" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->Email }}"@endif type="email" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseEmail" id="button_id_SpouseEmail" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseEmail')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseEmployer" class="form-group my-2">
                                <label for="id_SpouseEmployer" class="control-label">Spouse Employer</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseEmployer') is-invalid @enderror" id="id_SpouseEmployer" name="SpouseEmployer" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->Employer }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseEmployer" id="button_id_SpouseEmployer" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseEmployer')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpousePosition" class="form-group my-2">
                                <label for="id_SpousePosition" class="control-label">Spouse Position</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpousePosition') is-invalid @enderror" id="id_SpousePosition" name="SpousePosition" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->Position }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpousePosition" id="button_id_SpousePosition" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpousePosition')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseJobAddress" class="form-group my-2">
                                <label for="id_SpouseJobAddress" class="control-label">Spouse JobAddress</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseJobAddress') is-invalid @enderror" id="id_SpouseJobAddress" name="SpouseJobAddress" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->JobAddress }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseJobAddress" id="button_id_SpouseJobAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseJobAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseWorkTelNum" class="form-group my-2">
                                <label for="id_SpouseWorkTelNum" class="control-label">Spouse WorkTelNum</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseWorkTelNum') is-invalid @enderror" id="id_SpouseWorkTelNum" name="SpouseWorkTelNum" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->WorkTelNum }}"@endif type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseWorkTelNum" id="button_id_SpouseWorkTelNum" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseWorkTelNum')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseDateEmployed" class="form-group my-2">
                                <label for="id_SpouseDateEmployed" class="control-label">Spouse DateEmployed</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseDateEmployed') is-invalid @enderror" id="id_SpouseDateEmployed" name="SpouseDateEmployed" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->DateEmployed }}"@endif type="date" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseDateEmployed" id="button_id_SpouseDateEmployed" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseDateEmployed')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_SpouseSalary" class="form-group my-2">
                                <label for="id_SpouseSalary" class="control-label">Spouse Salary</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('SpouseSalary') is-invalid @enderror" id="id_SpouseSalary" name="SpouseSalary" @if($admincustomer->customer->spouse)value="{{ $admincustomer->customer->spouse->Salary }}"@endif type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_SpouseSalary" id="button_id_SpouseSalary" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseSalary')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_SpouseSignature" class="form-group my-2">
                                <label for="id_SpouseSignature" class="control-label">Spouse Signature:</label>
                                <div class="controls d-flex">
                                    <input class="form-control image_field @error('SpouseSignature') is-invalid @enderror" id="id_SpouseSignature" name="SpouseSignature"  data-id="SpouseSignatureimg" type="file" disabled/>
                                    <button class="btn btn-secondary button_click"id="button_id_SpouseSignature" data-id="id_SpouseSignature" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('SpouseSignature')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <img src= "/storage/{{ $admincustomer->customer->spouse->SpouseSignature }}" id="SpouseSignatureimg" width="300" height="200">


                        </div>
                        <div id="co_maker_page" style="display:none">
                            <div id="div_id_CoMakerName" class="form-group my-2">
                                <label for="id_CoMakerName" class="control-label">Co-Maker Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerName') is-invalid @enderror" id="id_CoMakerName" name="CoMakerName" value="{{ $admincustomer->customer->comaker->Name }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerName" id="button_id_CoMakerName" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerAge" class="form-group my-2">
                                <label for="id_CoMakerAge" class="control-label">Co-Maker Age</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerAge') is-invalid @enderror" id="id_CoMakerAge" name="CoMakerAge" value="{{ $admincustomer->customer->comaker->Age }}" type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerAge" id="button_id_CoMakerAge" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerAge')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerSex" class="form-group my-2">
                                <label for="id_CoMakerSex" class="control-label">CoMaker Sex</label>
                                <div class="controls d-flex">
                                    <select name="CoMakerSex" id="id_CoMakerSex" class="form-select form-control" disabled>
                                        <option value="Male" {{ $admincustomer->customer->comaker->Sex == "Male" ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $admincustomer->customer->comaker->Sex == "Female" ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerSex" id="button_id_CoMakerSex" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_CoMakerAddress" class="form-group my-2">
                                <label for="id_CoMakerAddress" class="control-label">Co-Maker Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerAddress') is-invalid @enderror" id="id_CoMakerAddress" name="CoMakerAddress" value="{{ $admincustomer->customer->comaker->Address }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerAddress" id="button_id_CoMakerAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div id="div_id_CoMakeTelNumber" class="form-group my-2">
                                <label for="id_CoMakeTelNumber" class="control-label">Co-Maker Tel Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakeTelNumber') is-invalid @enderror" id="id_CoMakeTelNumber" name="CoMakeTelNumber" value="{{ $admincustomer->customer->comaker->CoMakeTelNumber }}" type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakeTelNumber" id="button_id_CoMakeTelNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakeTelNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div id="div_id_CoMakerResidence" class="form-group my-2">
                                <label for="id_CoMakerResidence" class="control-label">Co-Maker Residence</label>
                                <div class="controls d-flex">
                                    <select name="CoMakerResidence" id="id_CoMakerResidence" class="form-select form-control" disabled>
                                        <option value="Owned" {{ $admincustomer->customer->comaker->Residence == "Owned" ? 'selected' : '' }}>Owned</option>
                                        <option value="Rented" {{ $admincustomer->customer->comaker->Residence == "Rented" ? 'selected' : '' }}>Rented</option>
                                        <option value="Mortgaged" {{ $admincustomer->customer->comaker->Residence == "Mortgaged" ? 'selected' : '' }}>Mortgaged</option>
                                        <option value="Provided_by" {{ $admincustomer->customer->comaker->Residence == "Provided_by" ? 'selected' : '' }}>Provided by</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerResidence" id="button_id_CoMakerResidence" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>

                                </div>
                            </div>

                            <div id="div_id_CoMakerResidenceProvidedBy" class="form-group my-2">
                                <label for="id_CoMakerResidenceProvidedBy" class="control-label">Co-Maker Residence Provided By</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerResidenceProvidedBy') is-invalid @enderror" id="id_CoMakerResidenceProvidedBy" name="CoMakerResidenceProvidedBy" value="{{ $admincustomer->customer->comaker->ResidenceProvidedBy }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerResidenceProvidedBy" id="button_id_CoMakerResidenceProvidedBy" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerResidenceProvidedBy')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerCivilStatus" class="form-group my-2">
                                <label for="id_CoMakerCivilStatus" class="control-label">Source Income</label>
                                <div class="controls d-flex">
                                    <select name="CoMakerCivilStatus" id="id_CoMakerCivilStatus" class="form-select form-control" disabled>
                                        <option value="Single" {{ $admincustomer->customer->comaker->CivilStatus == "Single" ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ $admincustomer->customer->comaker->CivilStatus == "Married" ? 'selected' : '' }}>Married</option>
                                        <option value="Divored/Separated" {{ $admincustomer->customer->comaker->CivilStatus == "Divored/Separated" ? 'selected' : '' }}>Divored/Separated</option>
                                        <option value="Widowed" {{ $admincustomer->customer->comaker->CivilStatus == "Widowed" ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerCivilStatus" id="button_id_CoMakerCivilStatus" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_CoMakerRelationship" class="form-group my-2">
                                <label for="id_CoMakerRelationship" class="control-label">Co-Maker Relationship</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerRelationship') is-invalid @enderror" id="id_CoMakerRelationship" name="CoMakerRelationship" value="{{ $admincustomer->customer->comaker->Relationship }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerRelationship" id="button_id_CoMakerRelationship" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerRelationship')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerBirthDate" class="form-group my-2">
                                <label for="id_CoMakerBirthDate" class="control-label">Co-Maker BirthDate</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerBirthDate') is-invalid @enderror" id="id_CoMakerBirthDate" name="CoMakerBirthDate" value="{{ $admincustomer->customer->comaker->BirthDate }}" type="date" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerBirthDate" id="button_id_CoMakerBirthDate" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerBirthDate')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerTin" class="form-group my-2">
                                <label for="id_CoMakerTin" class="control-label">Co-Maker Tin</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerTin') is-invalid @enderror" id="id_CoMakerTin" name="CoMakerTin" value="{{ $admincustomer->customer->comaker->Tin }}" type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerTin" id="button_id_CoMakerTin" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerTin')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerMobileNo" class="form-group my-2">
                                <label for="id_CoMakerMobileNo" class="control-label">Co-Maker MobileNo</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerMobileNo') is-invalid @enderror" id="id_CoMakerMobileNo" name="CoMakerMobileNo" value="{{ $admincustomer->customer->comaker->MobileNo }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerMobileNo" id="button_id_CoMakerMobileNo" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerMobileNo')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div id="div_id_CoMakerEmployer" class="form-group my-2">
                                <label for="id_CoMakerEmployer" class="control-label">Co-Maker Employer</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerEmployer') is-invalid @enderror" id="id_CoMakerEmployer" name="CoMakerEmployer" value="{{ $admincustomer->customer->comaker->Employer }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerEmployer" id="button_id_CoMakerEmployer" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerEmployer')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakeDateEmployed" class="form-group my-2">
                                <label for="id_CoMakeDateEmployed" class="control-label">Co-Maker Date Employed</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakeDateEmployed') is-invalid @enderror" id="id_CoMakeDateEmployed" name="CoMakeDateEmployed" value="{{ $admincustomer->customer->comaker->CoMakeDateEmployed }}" type="date" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakeDateEmployed" id="button_id_CoMakeDateEmployed" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakeDateEmployed')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerPosition" class="form-group my-2">
                                <label for="id_CoMakerPosition" class="control-label">Co-Maker Position</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerPosition') is-invalid @enderror" id="id_CoMakerPosition" name="CoMakerPosition" value="{{ $admincustomer->customer->comaker->Position }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerPosition" id="button_id_CoMakerPosition" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerPosition')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerTelNo" class="form-group my-2">
                                <label for="id_CoMakerTelNo" class="control-label">Co-Maker TelNo</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerTelNo') is-invalid @enderror" id="id_CoMakerTelNo" name="CoMakerTelNo" value="{{ $admincustomer->customer->comaker->TelNo }}" type="number" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerTelNo" id="button_id_CoMakerTelNo" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerTelNo')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerEmployerAddress" class="form-group my-2">
                                <label for="id_CoMakerEmployerAddress" class="control-label">Co-Maker EmployerAddress</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerEmployerAddress') is-invalid @enderror" id="id_CoMakerEmployerAddress" name="CoMakerEmployerAddress" value="{{ $admincustomer->customer->comaker->EmployerAddress }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerEmployerAddress" id="button_id_CoMakerEmployerAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerEmployerAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerEmploymentStatus" class="form-group my-2">
                                <label for="id_CoMakerEmploymentStatus" class="control-label">Co-Maker Employment Status</label>
                                <div class="controls d-flex">
                                    <select name="CoMakerEmploymentStatus" id="id_CoMakerEmploymentStatus" class="form-select form-control" disabled>
                                        <option value="Contractual" {{ $admincustomer->customer->comaker->EmploymentStatus == "Contractual" ? 'selected' : '' }}>Contractual</option>
                                        <option value="Probationary" {{ $admincustomer->customer->comaker->EmploymentStatus == "Probationary" ? 'selected' : '' }}>Probationary</option>
                                        <option value="Regular" {{ $admincustomer->customer->comaker->EmploymentStatus == "Regular" ? 'selected' : '' }}>Regular</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerEmploymentStatus" id="button_id_CoMakerEmploymentStatus" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_CoMakerCreditReference1" class="form-group my-2">
                                <label for="id_CoMakerCreditReference1" class="control-label">Co-Maker CreditReference1</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerCreditReference1') is-invalid @enderror" id="id_CoMakerCreditReference1" name="CoMakerCreditReference1" value="{{ $admincustomer->customer->comaker->CreditReference1 }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerCreditReference1" id="button_id_CoMakerCreditReference1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerCreditReference1')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerCreditReference2" class="form-group my-2">
                                <label for="id_CoMakerCreditReference2" class="control-label">Co-Maker CreditReference2</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerCreditReference2') is-invalid @enderror" id="id_CoMakerCreditReference2" name="CoMakerCreditReference2" value="{{ $admincustomer->customer->comaker->CreditReference2 }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerCreditReference2" id="button_id_CoMakerCreditReference2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerCreditReference2')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerCreditReference3" class="form-group my-2">
                                <label for="id_CoMakerCreditReference3" class="control-label">Co-Maker CreditReference3</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('CoMakerCreditReference3') is-invalid @enderror" id="id_CoMakerCreditReference3" name="CoMakerCreditReference3" value="{{ $admincustomer->customer->comaker->CreditReference3 }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_CoMakerCreditReference3" id="button_id_CoMakerCreditReference3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerCreditReference3')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_CoMakerSketch" class="form-group my-2">
                                <label for="id_CoMakerSketch" class="control-label">Co-Maker Sketch:</label>
                                <div class="controls d-flex">
                                    <input class="form-control image_field @error('CoMakerSketch') is-invalid @enderror" data-id="CoMakerSketchimg" id="id_CoMakerSketch" name="CoMakerSketch"   type="file" disabled/>
                                    <button class="btn btn-secondary button_click"id="button_id_CoMakerSketch" data-id="id_CoMakerSketch" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerSketch')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <img src= "/storage/{{ $admincustomer->customer->comaker->Sketch }}" id="CoMakerSketchimg" width="300" height="200">
                            <div id="div_id_CoMakerSignature" class="form-group my-2">
                                <label for="id_CoMakerSignature" class="control-label">Comaker Signature:</label>
                                <div class="controls d-flex">
                                    <input class="form-control image_field @error('CoMakerSignature') is-invalid @enderror" id="id_CoMakerSignature" data-id="CoMakerSignatureimg" name="CoMakerSignature"   type="file" disabled/>
                                    <button class="btn btn-secondary button_click"id="button_id_CoMakerSignature" data-id="id_CoMakerSignature" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('CoMakerSignature')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <img src= "/storage/{{ $admincustomer->customer->comaker->Signature }}" id="CoMakerSignatureimg" width="300" height="200">



                        </div>
                        <div id="parents_page" style="display:none">
                            <div id="div_id_Father" class="form-group my-2">
                                <label for="id_Father" class="control-label">Father's Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('Father') is-invalid @enderror" id="id_Father" name="Father" @if($admincustomer->customer->parent)value="{{ $admincustomer->customer->parent->Father }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_Father" id="button_id_Father" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('Father')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_Mother" class="form-group my-2">
                                <label for="id_Mother" class="control-label">MOther's Name</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('Mother') is-invalid @enderror" id="id_Mother" name="Mother" @if($admincustomer->customer->parent)value="{{ $admincustomer->customer->parent->Mother }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_Mother" id="button_id_Mother" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('Mother')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div id="div_id_ParentAddress" class="form-group my-2">
                                <label for="id_ParentAddress" class="control-label">Parent's Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('ParentAddress') is-invalid @enderror" id="id_ParentAddress" name="ParentAddress" @if($admincustomer->customer->parent)value="{{ $admincustomer->customer->parent->Addresss }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_ParentAddress" id="button_id_ParentAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('ParentAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_ParentMobileNumber" class="form-group my-2">
                                <label for="id_ParentMobileNumber" class="control-label">Parent's Mobile Number</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('ParentMobileNumber') is-invalid @enderror" id="id_ParentMobileNumber" name="ParentMobileNumber" @if($admincustomer->customer->parent)value="{{ $admincustomer->customer->parent->MobileNumber }}"@endif type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_ParentMobileNumber" id="button_id_ParentMobileNumber" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('ParentMobileNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div id="address_page" style="display:none">
                            <div id="div_id_PresentAddress" class="form-group my-2">
                                <label for="id_PresentAddress" class="control-label">Present Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PresentAddress') is-invalid @enderror" id="id_PresentAddress" name="PresentAddress" value="{{ $admincustomer->customer->address->PresentAddress }}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PresentAddress" id="button_id_PresentAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PresentAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_LengthOfStay" class="form-group my-2">
                                <label for="id_LengthOfStay" class="control-label">Length of Stay</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('LengthOfStay') is-invalid @enderror" id="id_LengthOfStay" name="LengthOfStay" value="{{ $admincustomer->customer->address->LengthOfStay}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_LengthOfStay" id="button_id_LengthOfStay" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('LengthOfStay')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_HouseStatus" class="form-group my-2">
                                <label for="id_HouseStatus" class="control-label">House Status</label>
                                <div class="controls d-flex">
                                    <select name="HouseStatus" id="id_HouseStatus" class="form-select form-control" disabled>
                                        <option value="Owned" {{ $admincustomer->customer->address->HouseStatus == "Owned" ? 'selected' : '' }}>Owned</option>
                                        <option value="Rented" {{ $admincustomer->customer->address->HouseStatus == "Rented" ? 'selected' : '' }}>Rented</option>
                                        <option value="Mortgaged" {{ $admincustomer->customer->address->HouseStatus == "Mortgaged" ? 'selected' : '' }}>Mortgaged</option>
                                        <option value="Provided_By" {{ $admincustomer->customer->address->HouseStatus == "Provided_By" ? 'selected' : '' }}>Provided By</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_HouseStatus" id="button_id_HouseStatus" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_HouseProvidedBy" class="form-group my-2">
                                <label for="id_HouseProvidedBy" class="control-label">House Provided By</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('HouseProvidedBy') is-invalid @enderror" id="id_HouseProvidedBy" name="HouseProvidedBy" value="{{ $admincustomer->customer->address->HouseProvidedBy }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_HouseProvidedBy" id="button_id_HouseProvidedBy" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('HouseProvidedBy')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_LotStatus" class="form-group my-2">
                                <label for="id_LotStatus" class="control-label">Lot Status</label>
                                <div class="controls d-flex">
                                    <select name="LotStatus" id="id_LotStatus" class="form-select form-control" disabled>
                                        <option value="Owned" {{ $admincustomer->customer->address->LotStatus == "Owned" ? 'selected' : '' }}>Owned</option>
                                        <option value="Rented" {{ $admincustomer->customer->address->LotStatus == "Rented" ? 'selected' : '' }}>Rented</option>
                                        <option value="Mortgaged" {{ $admincustomer->customer->address->LotStatus == "Mortgaged" ? 'selected' : '' }}>Mortgaged</option>
                                        <option value="Provided_By" {{ $admincustomer->customer->address->LotStatus == "Provided_By" ? 'selected' : '' }}>Provided By</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_LotStatus" id="button_id_LotStatus" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_LotProvidedBy" class="form-group my-2">
                                <label for="id_LotProvidedBy" class="control-label">Lot Provided By</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('LotProvidedBy') is-invalid @enderror" id="id_LotProvidedBy" name="LotProvidedBy" value="{{ $admincustomer->customer->address->LotProvidedBy  }}" type="text" disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_LotProvidedBy" id="button_id_LotProvidedBy" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('LotProvidedBy')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesTV" class="form-group my-2">
                                <label for="id_OtherPropertiesTV" class="control-label">TV</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesTV" id="id_OtherPropertiesTV" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesTV == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesTV == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesTV" id="button_id_OtherPropertiesTV" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesRef" class="form-group my-2">
                                <label for="id_OtherPropertiesRef" class="control-label">Ref</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesRef" id="id_OtherPropertiesRef" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesRef == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesRef == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesRef" id="button_id_OtherPropertiesRef" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesStereoComponent" class="form-group my-2">
                                <label for="id_OtherPropertiesStereoComponent" class="control-label">Stereo/Component</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesStereoComponent" id="id_OtherPropertiesStereoComponent" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesStereoComponent == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesStereoComponent == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesStereoComponent" id="button_id_OtherPropertiesStereoComponent" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesGasRange" class="form-group my-2">
                                <label for="id_OtherPropertiesGasRange" class="control-label">Gas Range</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesGasRange" id="id_OtherPropertiesGasRange" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesGasRange == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesGasRange == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesGasRange" id="button_id_OtherPropertiesGasRange" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesMotorcycle" class="form-group my-2">
                                <label for="id_OtherPropertiesMotorcycle" class="control-label">Motorcycle</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesMotorcycle" id="id_OtherPropertiesMotorcycle" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesMotorcycle == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesMotorcycle == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesMotorcycle" id="button_id_OtherPropertiesMotorcycle" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesComputer" class="form-group my-2">
                                <label for="id_OtherPropertiesComputer" class="control-label">Computers</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesComputer" id="id_OtherPropertiesComputer" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesComputer == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesComputer == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesComputer" id="button_id_OtherPropertiesComputer" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                            <div id="div_id_OtherPropertiesFarmLot" class="form-group my-2">
                                <label for="id_OtherPropertiesFarmLot" class="control-label">Farm/Lot</label>
                                <div class="controls d-flex">
                                    <select name="OtherPropertiesFarmLot" id="id_OtherPropertiesFarmLot" class="form-select form-control" disabled>
                                        <option value=1 {{ $admincustomer->customer->address->OtherPropertiesFarmLot == 1 ? 'selected' : '' }}>True</option>
                                        <option value=0 {{ $admincustomer->customer->address->OtherPropertiesFarmLot == 0 ? 'selected' : '' }}>False</option>
                                    </select>
                                    <button class="btn btn-secondary button_click" data-id="id_OtherPropertiesFarmLot" id="button_id_OtherPropertiesFarmLot" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="div_id_FarmLotAddress" class="form-group my-2">
                                <label for="id_FarmLotAddress" class="control-label">Farm Lot Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('FarmLotAddress') is-invalid @enderror" id="id_FarmLotAddress" name="FarmLotAddress" value="{{ $admincustomer->customer->address->FarmLotAddress }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_FarmLotAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('FarmLotAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_FarmLotSize" class="form-group my-2">
                                <label for="id_FarmLotSize" class="control-label">Farm Lot Size</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('FarmLotSize') is-invalid @enderror" id="id_FarmLotSize" name="FarmLotSize" value="{{ $admincustomer->customer->address->FarmLotSize }}"  type="text" disabled/>
                                    <button class="btn btn-secondary"id="button_id_FarmLotSize" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('FarmLotSize')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_ProvincialAddress" class="form-group my-2">
                                <label for="id_ProvincialAddress" class="control-label">Provincial Address</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('ProvincialAddress') is-invalid @enderror" id="id_ProvincialAddress" name="ProvincialAddress" value="{{ $admincustomer->customer->address->ProvincialAddress }}"  type="text" required disabled/>
                                    <button class="btn btn-secondary"id="button_id_ProvincialAddress" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('ProvincialAddress')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                        </div>
                        <div id="dependecies_page" style="display: none">

                            <div id="div_id_NumberOfDependencies" class="form-group my-2">
                                <label for="id_NumberOfDependencies" class="control-label">NumberOfDependencies</label>
                                <div class="controls d-flex">
                                    <select name="NumberOfDependencies" id="id_NumberOfDependencies" class="form-select form-control" disabled>
                                        <option value="0" {{ $admincustomer->customer->NumberOfDependencies == "0" ? 'selected' : '' }}>0</option>
                                        <option value="1" {{ $admincustomer->customer->NumberOfDependencies == "1" ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $admincustomer->customer->NumberOfDependencies == "2" ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $admincustomer->customer->NumberOfDependencies == "3" ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $admincustomer->customer->NumberOfDependencies == "4" ? 'selected' : '' }}>4</option>
                                    </select>
                                    <button class="btn btn-secondary" id="button_id_NumberOfDependencies" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>

                            <div id="Dependent1" style="display:none">
                                {{-- {{$admincustomer->customer->dependent->count()}} --}}
                                {{-- @if($admincustomer->customer->dependent->count() >= 1)
                                grate 1
                                @endif --}}
                                <div id="div_id_Dependent1_Name" class="form-group my-2">
                                    <label for="id_Dependent1_Name" class="control-label">Dependent1_Name</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent1_Name') is-invalid @enderror" id="id_Dependent1_Name" name="Dependent1_Name" value="@if($admincustomer->customer->dependent->count() >= 1){{ $admincustomer->customer->dependent[0]->Name  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent1_Name" id="button_id_Dependent1_Name" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent1_Name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent1_Age" class="form-group my-2">
                                    <label for="id_Dependent1_Age" class="control-label">Dependent1_Age</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent1_Age') is-invalid @enderror" id="id_Dependent1_Age" name="Dependent1_Age" value=  "@if($admincustomer->customer->dependent->count() >= 1){{ $admincustomer->customer->dependent[0]->Age  }}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent1_Age" id="button_id_Dependent1_Age" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent1_Age')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent1_GradeOcc" class="form-group my-2">
                                    <label for="id_Dependent1_GradeOcc" class="control-label">Dependent1 Grade/Occupation Position</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent1_GradeOcc') is-invalid @enderror" id="id_Dependent1_GradeOcc" name="Dependent1_GradeOcc" value="@if($admincustomer->customer->dependent->count() >= 1){{ $admincustomer->customer->dependent[0]->GradeOcc  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent1_GradeOcc" id="button_id_Dependent1_GradeOcc" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent1_GradeOcc')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent1_SchoolComp" class="form-group my-2">
                                    <label for="id_Dependent1_SchoolComp" class="control-label">Dependent1 School/Company</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent1_SchoolComp') is-invalid @enderror" id="id_Dependent1_SchoolComp" name="Dependent1_SchoolComp" value="@if($admincustomer->customer->dependent->count() >= 1){{ $admincustomer->customer->dependent[0]->SchoolComp  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent1_SchoolComp" id="button_id_Dependent1_SchoolComp" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent1_SchoolComp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="Dependent2" style="display:none">
                                <div id="div_id_Dependent2_Name" class="form-group my-2">
                                    <label for="id_Dependent2_Name" class="control-label">Dependent2_Name</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent2_Name') is-invalid @enderror" id="id_Dependent2_Name" name="Dependent2_Name" value="@if($admincustomer->customer->dependent->count() >= 2){{ $admincustomer->customer->dependent[1]->Name  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent2_Name" id="button_id_Dependent2_Name" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent2_Name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent2_Age" class="form-group my-2">
                                    <label for="id_Dependent2_Age" class="control-label">Dependent2_Age</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent2_Age') is-invalid @enderror" id="id_Dependent2_Age" name="Dependent2_Age" value="@if($admincustomer->customer->dependent->count() >= 2){{ $admincustomer->customer->dependent[1]->Age  }}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent2_Age" id="button_id_Dependent2_Age" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent2_Age')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent2_GradeOcc" class="form-group my-2">
                                    <label for="id_Dependent2_GradeOcc" class="control-label">Dependent2 Grade/Occupation Position</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent2_GradeOcc') is-invalid @enderror" id="id_Dependent2_GradeOcc" name="Dependent2_GradeOcc" value="@if($admincustomer->customer->dependent->count() >= 2){{ $admincustomer->customer->dependent[1]->GradeOcc  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent2_GradeOcc" id="button_id_Dependent2_GradeOcc" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent2_GradeOcc')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent2_SchoolComp" class="form-group my-2">
                                    <label for="id_Dependent2_SchoolComp" class="control-label">Dependent2 School/Company</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent2_SchoolComp') is-invalid @enderror" id="id_Dependent2_SchoolComp" name="Dependent2_SchoolComp" value="@if($admincustomer->customer->dependent->count() >= 2){{ $admincustomer->customer->dependent[1]->SchoolComp  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent2_SchoolComp" id="button_id_Dependent2_SchoolComp" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent2_SchoolComp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="Dependent3" style="display:none">
                                <div id="div_id_Dependent3_Name" class="form-group my-2">
                                    <label for="id_Dependent3_Name" class="control-label">Dependent3_Name</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent3_Name') is-invalid @enderror" id="id_Dependent3_Name" name="Dependent3_Name" value="@if($admincustomer->customer->dependent->count() >= 3){{ $admincustomer->customer->dependent[2]->Name  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent3_Name" id="button_id_Dependent3_Name" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent3_Name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent3_Age" class="form-group my-2">
                                    <label for="id_Dependent3_Age" class="control-label">Dependent3_Age</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent3_Age') is-invalid @enderror" id="id_Dependent3_Age" name="Dependent3_Age" value="@if($admincustomer->customer->dependent->count() >= 3){{ $admincustomer->customer->dependent[2]->Age  }}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent3_Age" id="button_id_Dependent3_Age" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent3_Age')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent3_GradeOcc" class="form-group my-2">
                                    <label for="id_Dependent3_GradeOcc" class="control-label">Dependent3 Grade/Occupation Position</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent3_GradeOcc') is-invalid @enderror" id="id_Dependent3_GradeOcc" name="Dependent3_GradeOcc" value="@if($admincustomer->customer->dependent->count() >= 3){{ $admincustomer->customer->dependent[2]->GradeOcc  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent3_GradeOcc" id="button_id_Dependent3_GradeOcc" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent3_GradeOcc')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent3_SchoolComp" class="form-group my-2">
                                    <label for="id_Dependent3_SchoolComp" class="control-label">Dependent3 School/Company</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent3_SchoolComp') is-invalid @enderror" id="id_Dependent3_SchoolComp" name="Dependent3_SchoolComp" value="@if($admincustomer->customer->dependent->count() >= 3){{ $admincustomer->customer->dependent[2]->SchoolComp  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent3_SchoolComp" id="button_id_Dependent3_SchoolComp" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent3_SchoolComp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="Dependent4" style="display:none">
                                <div id="div_id_Dependent4_Name" class="form-group my-2">
                                    <label for="id_Dependent4_Name" class="control-label">Dependent4_Name</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent4_Name') is-invalid @enderror" id="id_Dependent4_Name" name="Dependent4_Name" value="@if($admincustomer->customer->dependent->count() == 4){{ $admincustomer->customer->dependent[3]->Name  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent4_Name" id="button_id_Dependent4_Name" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent4_Name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent4_Age" class="form-group my-2">
                                    <label for="id_Dependent4_Age" class="control-label">Dependent4_Age</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent4_Age') is-invalid @enderror" id="id_Dependent4_Age" name="Dependent4_Age" value="@if($admincustomer->customer->dependent->count() == 4){{ $admincustomer->customer->dependent[3]->Age  }}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent4_Age" id="button_id_Dependent4_Age" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent4_Age')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent4_GradeOcc" class="form-group my-2">
                                    <label for="id_Dependent4_GradeOcc" class="control-label">Dependent4 Grade/Occupation Position</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent4_GradeOcc') is-invalid @enderror" id="id_Dependent4_GradeOcc" name="Dependent4_GradeOcc" value="@if($admincustomer->customer->dependent->count() == 4){{ $admincustomer->customer->dependent[3]->GradeOcc  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent4_GradeOcc" id="button_id_Dependent4_GradeOcc" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent4_GradeOcc')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="div_id_Dependent4_SchoolComp" class="form-group my-2">
                                    <label for="id_Dependent4_SchoolComp" class="control-label">Dependent4 School/Company</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Dependent4_SchoolComp') is-invalid @enderror" id="id_Dependent4_SchoolComp" name="Dependent4_SchoolComp" value="@if($admincustomer->customer->dependent->count() == 4){{ $admincustomer->customer->dependent[3]->SchoolComp  }}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Dependent4_SchoolComp" id="button_id_Dependent4_SchoolComp" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Dependent4_SchoolComp')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div id="personal_reference_page" style="display:none">

                            <div id="div_id_PersonalReferenceName1" class="form-group my-2">
                                <label for="id_PersonalReferenceName1" class="control-label">Personal Reference Name 1</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceName1') is-invalid @enderror" id="id_PersonalReferenceName1" name="PersonalReferenceName1" value="{{$admincustomer->customer->personalreference[0]->PersonalReferenceName}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceName1" id="button_id_PersonalReferenceName1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceName1')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceRelationship1" class="form-group my-2">
                                <label for="id_PersonalReferenceRelationship1" class="control-label">Personal Reference Relationship 1</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceRelationship1') is-invalid @enderror" id="id_PersonalReferenceRelationship1" name="PersonalReferenceRelationship1" value="{{$admincustomer->customer->personalreference[0]->PersonalReferenceRelationship}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceRelationship1" id="button_id_PersonalReferenceRelationship1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceRelationship1')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceNumber1" class="form-group my-2">
                                <label for="id_PersonalReferenceNumber1" class="control-label">Personal Reference Number 1</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceNumber1') is-invalid @enderror" id="id_PersonalReferenceNumber1" name="PersonalReferenceNumber1" value="{{$admincustomer->customer->personalreference[0]->PersonalReferenceNumber}}" type="number" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceNumber1" id="button_id_PersonalReferenceNumber1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceNumber1')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceAddress1" class="form-group my-2">
                                <label for="id_PersonalReferenceAddress1" class="control-label">Personal Reference Address 1</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceAddress1') is-invalid @enderror" id="id_PersonalReferenceAddress1" name="PersonalReferenceAddress1" value="{{$admincustomer->customer->personalreference[0]->PersonalReferenceAddress}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceAddress1" id="button_id_PersonalReferenceAddress1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceAddress1')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_PersonalReferenceName2" class="form-group my-2">
                                <label for="id_PersonalReferenceName2" class="control-label">Personal Reference Name 2</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceName2') is-invalid @enderror" id="id_PersonalReferenceName2" name="PersonalReferenceName2" value="{{$admincustomer->customer->personalreference[1]->PersonalReferenceName}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceName2" id="button_id_PersonalReferenceName2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceName2')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceRelationship2" class="form-group my-2">
                                <label for="id_PersonalReferenceRelationship2" class="control-label">Personal Reference Relationship 2</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceRelationship2') is-invalid @enderror" id="id_PersonalReferenceRelationship2" name="PersonalReferenceRelationship2" value="{{$admincustomer->customer->personalreference[1]->PersonalReferenceRelationship}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceRelationship2" id="button_id_PersonalReferenceRelationship2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceRelationship2')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceNumber2" class="form-group my-2">
                                <label for="id_PersonalReferenceNumber2" class="control-label">Personal Reference Number 2</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceNumber2') is-invalid @enderror" id="id_PersonalReferenceNumber2" name="PersonalReferenceNumber2" value="{{$admincustomer->customer->personalreference[1]->PersonalReferenceNumber}}" type="number" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceNumber2" id="button_id_PersonalReferenceNumber2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceNumber2')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceAddress2" class="form-group my-2">
                                <label for="id_PersonalReferenceAddress2" class="control-label">Personal Reference Address 2</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceAddress2') is-invalid @enderror" id="id_PersonalReferenceAddress2" name="PersonalReferenceAddress2" value="{{$admincustomer->customer->personalreference[1]->PersonalReferenceAddress}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceAddress2" id="button_id_PersonalReferenceAddress2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceAddress2')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="div_id_PersonalReferenceName3" class="form-group my-2">
                                <label for="id_PersonalReferenceName3" class="control-label">Personal Reference Name 3</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceName3') is-invalid @enderror" id="id_PersonalReferenceName3" name="PersonalReferenceName3" value="{{$admincustomer->customer->personalreference[2]->PersonalReferenceName}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceName3" id="button_id_PersonalReferenceName3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceName3')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceRelationship3" class="form-group my-2">
                                <label for="id_PersonalReferenceRelationship3" class="control-label">Personal Reference Relationship 3</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceRelationship3') is-invalid @enderror" id="id_PersonalReferenceRelationship3" name="PersonalReferenceRelationship3" value="{{$admincustomer->customer->personalreference[2]->PersonalReferenceRelationship}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceRelationship3" id="button_id_PersonalReferenceRelationship3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceRelationship3')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceNumber3" class="form-group my-2">
                                <label for="id_PersonalReferenceNumber3" class="control-label">Personal Reference Number 3</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceNumber3') is-invalid @enderror" id="id_PersonalReferenceNumber3" name="PersonalReferenceNumber3" value="{{$admincustomer->customer->personalreference[1]->PersonalReferenceNumber}}" type="number" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceNumber3" id="button_id_PersonalReferenceNumber3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceNumber3')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceAddress3" class="form-group my-2">
                                <label for="id_PersonalReferenceAddress3" class="control-label">Personal Reference Address 3</label>
                                <div class="controls d-flex">
                                    <input class="form-control @error('PersonalReferenceAddress3') is-invalid @enderror" id="id_PersonalReferenceAddress3" name="PersonalReferenceAddress3" value="{{$admincustomer->customer->personalreference[2]->PersonalReferenceAddress}}" type="text" required disabled/>
                                    <button class="btn btn-secondary button_click" data-id="id_PersonalReferenceAddress3" id="button_id_PersonalReferenceAddress3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                    @error('PersonalReferenceAddress3')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div id="credit_reference_page" style="display:none">
                            <div id="div_id_NumberofCreditReference" class="form-group my-2">
                                <label for="id_NumberofCreditReference" class="control-label">NumberofCreditReference</label>
                                <div class="controls d-flex">
                                    <select name="NumberofCreditReference" id="id_NumberofCreditReference" class="form-select form-control" disabled>
                                        <option value="0" {{ $admincustomer->customer->NumberofCreditReference == "0" ? 'selected' : '' }}>0</option>
                                        <option value="1" {{ $admincustomer->customer->NumberofCreditReference == "1" ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $admincustomer->customer->NumberofCreditReference == "2" ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $admincustomer->customer->NumberofCreditReference == "3" ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $admincustomer->customer->NumberofCreditReference == "4" ? 'selected' : '' }}>4</option>
                                    </select>
                                    <button class="btn btn-secondary" id="button_id_NumberofCreditReference" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </div>
                           
                            <div id="Credit1">
                                <div id="div_id_StoreBank1" class="form-group my-2">
                                    <label for="id_StoreBank1" class="control-label">StoreBank1</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('StoreBank1') is-invalid @enderror" id="id_StoreBank1" name="StoreBank1" value="@if( $admincustomer->customer->creditreference->count() >= 1){{ $admincustomer->customer->creditreference[0]->StoreBank}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_StoreBank1" id="button_id_StoreBank1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>  
                                        @error('StoreBank1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_ItemLoadAmount1" class="form-group my-2">
                                    <label for="id_ItemLoadAmount1" class="control-label">ItemLoadAmount1</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('ItemLoadAmount1') is-invalid @enderror" id="id_ItemLoadAmount1" name="ItemLoadAmount1" value="@if( $admincustomer->customer->creditreference->count() >= 1){{ $admincustomer->customer->creditreference[0]->ItemLoadAmount}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_ItemLoadAmount1" id="button_id_ItemLoadAmount1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('ItemLoadAmount1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_Term1" class="form-group my-2">
                                    <label for="id_Term1" class="control-label">Term1</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Term1') is-invalid @enderror" id="id_Term1" name="Term1" value="@if( $admincustomer->customer->creditreference->count() >= 1){{ $admincustomer->customer->creditreference[0]->Term}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Term1" id="button_id_Term1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Term1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditDate1" class="form-group my-2">
                                    <label for="id_CreditDate1" class="control-label">CreditDate1</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditDate1') is-invalid @enderror" id="id_CreditDate1" name="CreditDate1" value="@if( $admincustomer->customer->creditreference->count() >= 1){{ $admincustomer->customer->creditreference[0]->CreditDate}}@endif" type="date" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditDate1" id="button_id_CreditDate1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditDate1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditBalance1" class="form-group my-2">
                                    <label for="id_CreditBalance1" class="control-label">CreditBalance1</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditBalance1') is-invalid @enderror" id="id_CreditBalance1" name="CreditBalance1" value="@if( $admincustomer->customer->creditreference->count() >= 1){{ $admincustomer->customer->creditreference[0]->CreditBalance}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditBalance1" id="button_id_CreditBalance1" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditBalance1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                            </div>
                            
                            <div id="Credit2">
                                <div id="div_id_StoreBank2" class="form-group my-2">
                                    <label for="id_StoreBank2" class="control-label">StoreBank2</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('StoreBank2') is-invalid @enderror" id="id_StoreBank2" name="StoreBank2" value="@if( $admincustomer->customer->creditreference->count() >= 2){{ $admincustomer->customer->creditreference[1]->StoreBank}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_StoreBank2" id="button_id_StoreBank2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('StoreBank2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_ItemLoadAmount2" class="form-group my-2">
                                    <label for="id_ItemLoadAmount2" class="control-label">ItemLoadAmount2</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('ItemLoadAmount2') is-invalid @enderror" id="id_ItemLoadAmount2" name="ItemLoadAmount2" value="@if( $admincustomer->customer->creditreference->count() >= 2){{ $admincustomer->customer->creditreference[1]->ItemLoadAmount}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_ItemLoadAmount2" id="button_id_ItemLoadAmount2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('ItemLoadAmount2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_Term2" class="form-group my-2">
                                    <label for="id_Term2" class="control-label">Term2</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Term2') is-invalid @enderror" id="id_Term2" name="Term2" value="@if( $admincustomer->customer->creditreference->count() >= 2){{ $admincustomer->customer->creditreference[1]->Term}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="Term2" id="button_id_Term2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Term2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditDate2" class="form-group my-2">
                                    <label for="id_CreditDate2" class="control-label">CreditDate2</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditDate2') is-invalid @enderror" id="id_CreditDate2" name="CreditDate2" value="@if( $admincustomer->customer->creditreference->count() >= 2){{ $admincustomer->customer->creditreference[1]->CreditDate}}@endif" type="date" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditDate2" id="button_id_CreditDate2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditDate2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditBalance2" class="form-group my-2">
                                    <label for="id_CreditBalance2" class="control-label">CreditBalance2</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditBalance2') is-invalid @enderror" id="id_CreditBalance2" name="CreditBalance2" value="@if( $admincustomer->customer->creditreference->count() >= 2){{ $admincustomer->customer->creditreference[1]->CreditBalance}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditBalance2" id="button_id_CreditBalance2" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditBalance2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div id="Credit3">
                                <div id="div_id_StoreBank3" class="form-group my-2">
                                    <label for="id_StoreBank3" class="control-label">StoreBank3</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('StoreBank3') is-invalid @enderror" id="id_StoreBank3" name="StoreBank3" value="@if( $admincustomer->customer->creditreference->count() >= 3){{ $admincustomer->customer->creditreference[2]->StoreBank}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_StoreBank3" id="button_id_StoreBank3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('StoreBank3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_ItemLoadAmount3" class="form-group my-2">
                                    <label for="id_ItemLoadAmount3" class="control-label">ItemLoadAmount3</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('ItemLoadAmount3') is-invalid @enderror" id="id_ItemLoadAmount3" name="ItemLoadAmount3" value="@if( $admincustomer->customer->creditreference->count() >= 3){{ $admincustomer->customer->creditreference[2]->ItemLoadAmount}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_ItemLoadAmount3" id="button_id_ItemLoadAmount3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('ItemLoadAmount3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_Term3" class="form-group my-2">
                                    <label for="id_Term3" class="control-label">Term3</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Term3') is-invalid @enderror" id="id_Term3" name="Term3" value="@if( $admincustomer->customer->creditreference->count() >= 3){{ $admincustomer->customer->creditreference[2]->Term}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Term3" id="button_id_Term3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Term3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditDate3" class="form-group my-2">
                                    <label for="id_CreditDate3" class="control-label">CreditDate3</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditDate3') is-invalid @enderror" id="id_CreditDate3" name="CreditDate3" value="@if( $admincustomer->customer->creditreference->count() >= 3){{ $admincustomer->customer->creditreference[2]->CreditDate}}@endif" type="date" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditDate3" id="button_id_CreditDate3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditDate3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditBalance3" class="form-group my-2">
                                    <label for="id_CreditBalance3" class="control-label">CreditBalance3</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditBalance3') is-invalid @enderror" id="id_CreditBalance3" name="CreditBalance3" value="@if( $admincustomer->customer->creditreference->count() >= 3){{ $admincustomer->customer->creditreference[2]->CreditBalance}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditBalance3" id="button_id_CreditBalance3" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditBalance3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="Credit4">
                                <div id="div_id_StoreBank4" class="form-group my-2">
                                    <label for="id_StoreBank4" class="control-label">StoreBank4</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('StoreBank4') is-invalid @enderror" id="id_StoreBank4" name="StoreBank4" value="@if( $admincustomer->customer->creditreference->count() == 4){{ $admincustomer->customer->creditreference[3]->StoreBank}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_StoreBank4" id="button_id_StoreBank4" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('StoreBank4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_ItemLoadAmount4" class="form-group my-2">
                                    <label for="id_ItemLoadAmount4" class="control-label">ItemLoadAmount4</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('ItemLoadAmount4') is-invalid @enderror" id="id_ItemLoadAmount4" name="ItemLoadAmount4" value="@if( $admincustomer->customer->creditreference->count() == 4){{ $admincustomer->customer->creditreference[3]->ItemLoadAmount}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_ItemLoadAmount4" id="button_id_ItemLoadAmount4" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('ItemLoadAmount4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_Term4" class="form-group my-2">
                                    <label for="id_Term4" class="control-label">Term4</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('Term4') is-invalid @enderror" id="id_Term4" name="Term4" value="@if( $admincustomer->customer->creditreference->count() == 4){{ $admincustomer->customer->creditreference[3]->Term}}@endif" type="text" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_Term4" id="button_id_Term4" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('Term4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditDate4" class="form-group my-2">
                                    <label for="id_CreditDate4" class="control-label">CreditDate4</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditDate4') is-invalid @enderror" id="id_CreditDate4" name="CreditDate4" value="@if( $admincustomer->customer->creditreference->count() == 4){{ $admincustomer->customer->creditreference[3]->CreditDate}}@endif" type="date" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditDate4" id="button_id_CreditDate4" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditDate4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div id="div_id_CreditBalance4" class="form-group my-2">
                                    <label for="id_CreditBalance4" class="control-label">CreditBalance4</label>
                                    <div class="controls d-flex">
                                        <input class="form-control @error('CreditBalance4') is-invalid @enderror" id="id_CreditBalance4" name="CreditBalance4" value="@if( $admincustomer->customer->creditreference->count() == 4){{ $admincustomer->customer->creditreference[3]->CreditBalance}}@endif" type="number" disabled/>
                                        <button class="btn btn-secondary button_click" data-id="id_CreditBalance4" id="button_id_CreditBalance4" type="button" style="height:2.4em"><i class="fa-regular fa-pen-to-square"></i></button>
                                        @error('CreditBalance4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <button type="submit" class="btn btn-primary mx-2" id="submit_edit">Save</button>
                            <a href={{ route('admin.user.index') }} type="button" class="btn btn-success mx-2"> Go Back </a>
                        </div>
                    </form>   
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        
        // $('#button_before').click(function(){
        //     console.log('hello');
        //     // $('#id_FirstName').prop("disabled", false);
        //     $(".form-control").each(function() {  
        //         $(this).prop("disabled", false);
        //     });  
        // });
        $('#submit_edit').click(function(){
            $(".form-control").each(function() {  
                $(this).prop("disabled", false);
            }); 
        });
        $('input.image_field').on('change',function(){
            const file = this.files[0];
            var item = $(this).attr('data-id'); 
            // console.log(file);
            if (file){
                
                let reader = new FileReader();
                reader.onload = function(event){
                    // console.log(event.target.result);
                    $('#'+ item ).attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }

        }); 




        $('#button_id_FirstName').click(function(){
            event.preventDefault();
            $('#id_FirstName').prop("disabled", (i, v) => !v);
        });
        $('#button_id_MiddleName').click(function(){
            event.preventDefault();
            $('#id_MiddleName').prop("disabled", (i, v) => !v);
        });
        $('#button_id_LastName').click(function(){
            event.preventDefault();
            $('#id_LastName').prop("disabled", (i, v) => !v);
        });
        $('#button_id_Sex').click(function(){
            event.preventDefault();
            $('#id_Sex').prop("disabled", (i, v) => !v);
        });
        $('#button_id_Age').click(function(){
            event.preventDefault();
            $('#id_Age').prop("disabled", (i, v) => !v);
        });
        $('#button_id_Citizenship').click(function(){
            event.preventDefault();
            $('#id_Citizenship').prop("disabled", (i, v) => !v);
        });
        $('#button_id_BirthDate').click(function(){
            event.preventDefault();
            $('#id_BirthDate').prop("disabled", (i, v) => !v);
        });
        $('#button_id_Religion').click(function(){
            event.preventDefault();
            $('#id_Religion').prop("disabled", (i, v) => !v);
        });
        $('#button_id_CivilStatus').click(function(){
            event.preventDefault();
            $('#id_CivilStatus').prop("disabled", (i, v) => !v);
        });
        $('#button_id_TinNo').click(function(){
            event.preventDefault();
            $('#id_TinNo').prop("disabled", (i, v) => !v);
        });
        $('#button_id_id_ResNo').click(function(){
            event.preventDefault();
            $('#id_ResNo').prop("disabled", (i, v) => !v);
        });
        $('#button_id_IssueDate').click(function(){
            event.preventDefault();
            $('#id_IssueDate').prop("disabled", (i, v) => !v);
        });
        $('#button_id_PlaceIssue').click(function(){
            event.preventDefault();
            $('#id_PlaceIssue').prop("disabled", (i, v) => !v);
        });
        $('#button_id_FarmLotAddress').click(function(){
            event.preventDefault();
            $('#id_FarmLotAddress').prop("disabled", (i, v) => !v);
        });
        $('#button_id_FarmLotSize').click(function(){
            event.preventDefault();
            $('#id_FarmLotSize').prop("disabled", (i, v) => !v);
        });
        $('#button_id_ProvincialAddress').click(function(){
            event.preventDefault();
            $('#id_ProvincialAddress').prop("disabled", (i, v) => !v);
        });
        $('#button_id_HomePhoneNumber').click(function(){
            event.preventDefault();
            $('#id_HomePhoneNumber').prop("disabled", (i, v) => !v);
        });
        $('#button_id_OfficePhoneNumber').click(function(){
            event.preventDefault();
            $('#id_OfficePhoneNumber').prop("disabled", (i, v) => !v);
        });
        $('#button_id_MobileNumber').click(function(){
            event.preventDefault();
            $('#id_MobileNumber').prop("disabled", (i, v) => !v);
        });
        $('#button_id_email').click(function(){
            event.preventDefault();
            $('#id_email').prop("disabled", (i, v) => !v);
        });
        $('#button_id_SourceIncome').click(function(){
            event.preventDefault();
            $('#id_SourceIncome').prop("disabled", (i, v) => !v);
        });
        $('#button_id_ProvidedBy').click(function(){
            event.preventDefault();
            $('#id_ProvidedBy').prop("disabled", (i, v) => !v);
        });
        $('#button_id_EmployerName').click(function(){
            event.preventDefault();
            $('#id_EmployerName').prop("disabled", (i, v) => !v);
        });
        $('#button_id_WorkPosition').click(function(){
            event.preventDefault();
            $('#id_WorkPosition').prop("disabled", (i, v) => !v);
        });

        $('#button_id_WorkAddress').click(function(){
            event.preventDefault();
            $('#id_WorkAddress').prop("disabled", (i, v) => !v);
        });
        $('#button_id_WorkTelNumber').click(function(){
            event.preventDefault();
            $('#id_WorkTelNumber').prop("disabled", (i, v) => !v);
        });
        $('#button_id_DateEmployed').click(function(){
            event.preventDefault();
            $('#id_DateEmployed').prop("disabled", (i, v) => !v);
        });
        $('#button_id_Salary').click(function(){
            event.preventDefault();
            $('#id_Salary').prop("disabled", (i, v) => !v);
        });
        $('#button_id_UnitToBeUsedFor').click(function(){
            event.preventDefault();
            $('#id_UnitToBeUsedFor').prop("disabled", (i, v) => !v);
        });
        $('#button_id_ModeOfPayment').click(function(){
            event.preventDefault();
            $('#id_ModeOfPayment').prop("disabled", (i, v) => !v);
        });

        $('#button_id_NumberOfDependencies').click(function(){
            event.preventDefault();
            $('#id_NumberOfDependencies').prop("disabled", (i, v) => !v);
        });

        $('.button_click').on('click', function(e) {
            event.preventDefault();
        
            var item = $(this).attr('data-id');
            $('#'+ item ).prop("disabled", (i, v) => !v);
        });


        $('#id_NumberOfDependencies').on('change', function(){
            var NumberOfDependencies = $('#id_NumberOfDependencies').val();
            switch(NumberOfDependencies){
                case '0':
                    $('#Dependent1').hide(500);
                    $('#Dependent2').hide(500);
                    $('#Dependent3').hide(500);
                    $('#Dependent4').hide(500);
                    break;
                case '1':
                    $('#Dependent1').show(500);
                    $('#Dependent2').hide(500);
                    $('#Dependent3').hide(500);
                    $('#Dependent4').hide(500);
                    break;
                case '2':
                    $('#Dependent1').show(500);
                    $('#Dependent2').show(500);
                    $('#Dependent3').hide(500);
                    $('#Dependent4').hide(500);
                    break;
                case '3':
                    $('#Dependent1').show(500);
                    $('#Dependent2').show(500);
                    $('#Dependent3').show(500);
                    $('#Dependent4').hide(500);
                    break;
                default:
                    $('#Dependent1').show(500);
                    $('#Dependent2').show(500);
                    $('#Dependent3').show(500);
                    $('#Dependent4').show(500);

            }
        });

        $('#id_NumberofCreditReference').on('change', function(){
            var NumberofCreditReference = $('#id_NumberofCreditReference').val();

            switch(NumberofCreditReference){
                case '0':
                    $('#Credit1').hide(500);
                    $('#Credit2').hide(500);
                    $('#Credit3').hide(500);
                    $('#Credit4').hide(500);
                    break;
                case '1':
                    $('#Credit1').show(500);
                    $('#Credit2').hide(500);
                    $('#Credit3').hide(500);
                    $('#Credit4').hide(500);
                    break;
                case '2':
                    $('#Credit1').show(500);
                    $('#Credit2').show(500);
                    $('#Credit3').hide(500);
                    $('#Credit4').hide(500);
                    break;
                case '3':
                    $('#Credit1').show(500);
                    $('#Credit2').show(500);
                    $('#Credit3').show(500);
                    $('#Credit4').hide(500);
                    break;
                default:
                    $('#Credit1').show(500);
                    $('#Credit2').show(500);
                    $('#Credit3').show(500);
                    $('#Credit4').show(500);

            }
        });


        $('#button_id_NumberofCreditReference').click(function(){
            event.preventDefault();
            $('#id_NumberofCreditReference').prop("disabled", (i, v) => !v);
        });

        $('#applicant_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");


            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }

            $('#applicant_page').show(500);
        });
        $('#spouse_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }
            $('#spouse_page').show(500);

        });
        $('#co_maker_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }
            $('#co_maker_page').show(500);
        });
        $('#parents_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }
            $('#parents_page').show(500);
        });
        $('#address_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }
            $('#address_page').show(500);
        
        });
        $('#dependencies_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");
            var NumberOfDependencies = $('#id_NumberOfDependencies').val();

            switch(NumberOfDependencies){
                case '0':
                    $('#Dependent1').hide(500);
                    $('#Dependent2').hide(500);
                    $('#Dependent3').hide(500);
                    $('#Dependent4').hide(500);
                    break;
                case '1':
                    $('#Dependent1').show(500);
                    $('#Dependent2').hide(500);
                    $('#Dependent3').hide(500);
                    $('#Dependent4').hide(500);
                    break;
                case '2':
                    $('#Dependent1').show(500);
                    $('#Dependent2').show(500);
                    $('#Dependent3').hide(500);
                    $('#Dependent4').hide(500);
                    break;
                case '3':
                    $('#Dependent1').show(500);
                    $('#Dependent2').show(500);
                    $('#Dependent3').show(500);
                    $('#Dependent4').hide(500);
                    break;
                default:
                    $('#Dependent1').show(500);
                    $('#Dependent2').show(500);
                    $('#Dependent3').show(500);
                    $('#Dependent4').show(500);

            }

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }
            $('#dependecies_page').show(500);
        });
        $('#personal_reference_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#credit_references_button').attr('class') == "btn btn-primary"){
                $('#credit_references_button').removeClass("btn-primary");
                $('#credit_references_button').addClass("btn-secondary");
                $('#credit_reference_page').hide(500);
            }
            $('#personal_reference_page').show(500);
        });
        $('#credit_references_button').click(function(){
            event.preventDefault();
            $(this).removeClass("btn-secondary");
            $(this).addClass("btn-primary");
            var NumberofCreditReference = $('#id_NumberofCreditReference').val();

            switch(NumberofCreditReference){
                case '0':
                    $('#Credit1').hide(500);
                    $('#Credit2').hide(500);
                    $('#Credit3').hide(500);
                    $('#Credit4').hide(500);
                    break;
                case '1':
                    $('#Credit1').show(500);
                    $('#Credit2').hide(500);
                    $('#Credit3').hide(500);
                    $('#Credit4').hide(500);
                    break;
                case '2':
                    $('#Credit1').show(500);
                    $('#Credit2').show(500);
                    $('#Credit3').hide(500);
                    $('#Credit4').hide(500);
                    break;
                case '3':
                    $('#Credit1').show(500);
                    $('#Credit2').show(500);
                    $('#Credit3').show(500);
                    $('#Credit4').hide(500);
                    break;
                default:
                    $('#Credit1').show(500);
                    $('#Credit2').show(500);
                    $('#Credit3').show(500);
                    $('#Credit4').show(500);

            }

            if($('#applicant_button').attr('class') == "btn btn-primary"){
                $('#applicant_button').removeClass("btn-primary");
                $('#applicant_button').addClass("btn-secondary");
                $('#applicant_page').hide(500);
            }
            if($('#spouse_button').attr('class') == "btn btn-primary"){
                $('#spouse_button').removeClass("btn-primary");
                $('#spouse_button').addClass("btn-secondary");
                $('#spouse_page').hide(500);
            }
            if($('#co_maker_button').attr('class') == "btn btn-primary"){
                $('#co_maker_button').removeClass("btn-primary");
                $('#co_maker_button').addClass("btn-secondary");
                $('#co_maker_page').hide(500);
            }
            if($('#parents_button').attr('class') == "btn btn-primary"){
                $('#parents_button').removeClass("btn-primary");
                $('#parents_button').addClass("btn-secondary");
                $('#parents_page').hide(500);
            }
            if($('#address_button').attr('class') == "btn btn-primary"){
                $('#address_button').removeClass("btn-primary");
                $('#address_button').addClass("btn-secondary");
                $('#address_page').hide(500);
            }
            if($('#dependencies_button').attr('class') == "btn btn-primary"){
                $('#dependencies_button').removeClass("btn-primary");
                $('#dependencies_button').addClass("btn-secondary");
                $('#dependecies_page').hide(500);
            }
            if($('#personal_reference_button').attr('class') == "btn btn-primary"){
                $('#personal_reference_button').removeClass("btn-primary");
                $('#personal_reference_button').addClass("btn-secondary");
                $('#personal_reference_page').hide(500);
            }
            $('#credit_reference_page').show(500);
        });


    });

</script>
@endsection
