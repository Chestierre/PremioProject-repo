@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header h5">Update Customer Details: {{$customer->FirstName}} {{$customer->LastName}}</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route("updateCustomerDetails")}}">
                        @method('PATCH')
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

                        <div class="h6">Customer Information:</div>
                        <div class="row mb-3">
                            <label for="MiddleName" class="col-md-3 col-form-label text-md-end">{{ __('Middle Name') }}</label>
                            <div class="col-md-7">
                              <input id="MiddleName" type="text" class="form-control" name="MiddleName" value={{$customer->MiddleName}} autocomplete="MiddleName" >
                                
                              @error('MiddleName')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="MiddleNameerrorlabel">{{$message}}</strong>
                                </span>
                            @enderror        
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="LastName" class="col-md-3 col-form-label text-md-end">{{ __('Last Name') }}</label>
                            <div class="col-md-7">
                              <input id="LastName" type="text" class="form-control" name="LastName" value={{$customer->LastName}} autocomplete="LastName" >
                                
                              @error('LastName')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="LastNameerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Age" class="col-md-3 col-form-label text-md-end">{{ __('Age') }}</label>
                            <div class="col-md-7">
                              <input id="Age" type="number" class="form-control" name="Age" value={{$customer->Age}} autocomplete="Age" >
                                
                              @error('Age')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="Ageerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Citizenship" class="col-md-3 col-form-label text-md-end">{{ __('Citizenship') }}</label>
                            <div class="col-md-7">
                              <input id="Citizenship" type="text" class="form-control" name="Citizenship" value={{$customer->LastName}} autocomplete="Citizenship" >
                                
                              @error('Citizenship')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="Citizenshiperrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Religion" class="col-md-3 col-form-label text-md-end">{{ __('Religon') }}</label>
                            <div class="col-md-7">
                              <input id="Religion" type="text" class="form-control" name="Religion" value={{$customer->Religion}} autocomplete="Religion" >
                                
                              @error('Religion')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="Religionerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CivilStatus" class="col-md-3 col-form-label text-md-end">{{ __('CivilStatus') }}</label>
                            <div class="col-md-7">
                                <select name="CivilStatus" id="CivilStatus" class="form-select form-control">
                                    <option value="Single" {{ $customer->CivilStatus == "Single" ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $customer->CivilStatus == "Married" ? 'selected' : '' }}>Married</option>
                                    <option value="Divored/Separated" {{ $customer->CivilStatus == "Divored/Separated" ? 'selected' : '' }}>Divored/Separated</option>
                                    <option value="Widowed" {{ $customer->CivilStatus == "Widowed" ? 'selected' : '' }}>Widowed</option>
                                </select>    
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="HomePhoneNumber" class="col-md-3 col-form-label text-md-end">{{ __('Home Phone Number') }}</label>
                            <div class="col-md-7">
                              <input id="HomePhoneNumber" type="number" class="form-control" name="HomePhoneNumber" value={{$customer->HomePhoneNumber}} autocomplete="HomePhoneNumber" >
                                
                              @error('HomePhoneNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="HomePhoneNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OfficePhoneNumber" class="col-md-3 col-form-label text-md-end">{{ __('Office Phone Number') }}</label>
                            <div class="col-md-7">
                              <input id="OfficePhoneNumber" type="number" class="form-control" name="OfficePhoneNumber" value={{$customer->OfficePhoneNumber}} autocomplete="OfficePhoneNumber" >
                                
                              @error('OfficePhoneNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="OfficePhoneNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="MobileNumber" class="col-md-3 col-form-label text-md-end">{{ __('Mobile Number') }}</label>
                            <div class="col-md-7">
                              <input id="MobileNumber" type="text" class="form-control" name="MobileNumber" value={{$customer->MobileNumber}} autocomplete="MobileNumber" >
                                
                              @error('MobileNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="MobileNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-7">
                              <input id="email" type="email" class="form-control" name="email" value={{$customer->email}} autocomplete="email" >
                                
                              @error('email')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="emailerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SourceIncome" class="col-md-3 col-form-label text-md-end">{{ __('Source of Income') }}</label>
                            <div class="col-md-7">
                                <select name="SourceIncome" id="id_SourceIncome" class="form-select form-control">
                                    <option value="SelfEmployedBusiness" {{ $customer->SourceIncome == "SelfEmployedBusiness" ? 'selected' : '' }}>Self-Employed/Business</option>
                                    <option value="Employed" {{ $customer->SourceIncome == "Employed" ? 'selected' : '' }}>Employed</option>
                                    <option value="Allotment" {{ $customer->SourceIncome == "Allotment" ? 'selected' : '' }}>Allotment</option>
                                    <option value="Provided_by" {{ $customer->SourceIncome == "Provided_by" ? 'selected' : '' }}>Provided by</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ProvidedBy" class="col-md-3 col-form-label text-md-end">{{ __('Provided by') }}</label>
                            <div class="col-md-7">
                              <input id="ProvidedBy" type="text" class="form-control" name="ProvidedBy" value={{$customer->ProvidedBy}} autocomplete="ProvidedBy" >
                                
                              @error('ProvidedBy')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="ProvidedByerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="EmployerName" class="col-md-3 col-form-label text-md-end">{{ __('Employer Name') }}</label>
                            <div class="col-md-7">
                              <input id="EmployerName" type="text" class="form-control" name="EmployerName" value={{$customer->EmployerName}} autocomplete="EmployerName" >
                                
                              @error('EmployerName')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="EmployerNameerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="WorkPosition" class="col-md-3 col-form-label text-md-end">{{ __('Work Position') }}</label>
                            <div class="col-md-7">
                              <input id="WorkPosition" type="text" class="form-control" name="WorkPosition" value={{$customer->WorkPosition}} autocomplete="WorkPosition" >
                                
                              @error('WorkPosition')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="WorkPositionerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="WorkAddress" class="col-md-3 col-form-label text-md-end">{{ __('Work Address') }}</label>
                            <div class="col-md-7">
                              <input id="WorkAddress" type="text" class="form-control" name="WorkAddress" value={{$customer->WorkAddress}} autocomplete="WorkAddress" >
                                
                              @error('WorkAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="WorkAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="WorkTelNumber" class="col-md-3 col-form-label text-md-end">{{ __('Work Telephone Number') }}</label>
                            <div class="col-md-7">
                              <input id="WorkTelNumber" type="number" class="form-control" name="WorkTelNumber" value={{$customer->WorkTelNumber}} autocomplete="WorkTelNumber" >
                                
                              @error('WorkTelNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="WorkTelNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="DateEmployed" class="col-md-3 col-form-label text-md-end">{{ __('Date Employed') }}</label>
                            <div class="col-md-7">
                              <input id="DateEmployed" type="date" class="form-control" name="DateEmployed" value={{$customer->DateEmployed}} autocomplete="DateEmployed" >
                                
                              @error('DateEmployed')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="DateEmployederrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Salary" class="col-md-3 col-form-label text-md-end">{{ __('Salary') }}</label>
                            <div class="col-md-7">
                              <input id="Salary" type="text" class="form-control" name="Salary" value= "&#8369 {{number_format($customer->Salary)}}" autocomplete="Salary" >
                                
                              @error('Salary')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="Salaryerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="UnitToBeUsedFor" class="col-md-3 col-form-label text-md-end">{{ __('Unit To Be Used For') }}</label>
                            <div class="col-md-7">
                                <select name="UnitToBeUsedFor" id="id_UnitToBeUsedFor" class="form-select form-control">
                                    <option value="Personal_Use" {{ $customer->UnitToBeUsedFor == "Personal_Use" ? 'selected' : '' }}>Personal Use</option>
                                    <option value="Business_Use" {{ $customer->UnitToBeUsedFor == "Business_Use" ? 'selected' : '' }}>Business Use</option>
                                    <option value="Gift" {{ $customer->UnitToBeUsedFor == "Gift" ? 'selected' : '' }}>Gift</option>
                                    <option value="Used_by_Relative/Friend" {{ $customer->UnitToBeUsedFor == "Used_by_Relative/Friend" ? 'selected' : '' }}>Used by Relative/Friend</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ModeOfPayment" class="col-md-3 col-form-label text-md-end">{{ __('Mode Of Payment') }}</label>
                            <div class="col-md-7">
                                <select name="ModeOfPayment" id="id_ModeOfPayment" class="form-select form-control">
                                    <option value="Post_Date_Checks" {{ $customer->ModeOfPayment == "Post_Date_Checks" ? 'selected' : '' }}>Post Date Checks</option>
                                    <option value="Cash_Paid_to_Office" {{ $customer->ModeOfPayment == "Cash_Paid_to_Office" ? 'selected' : '' }}>Cash Paid to Office</option>
                                    <option value="Cash_for_Collection" {{ $customer->ModeOfPayment == "Cash_for_Collection" ? 'selected' : '' }}>Cash for Collection</option>
                                    <option value="Credit_Card" {{ $customer->ModeOfPayment == "Credit_Card" ? 'selected' : '' }}>Credit Card</option>
                                </select>       
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ApplicantSketch" class="col-md-3 col-form-label text-md-end">{{ __('Applicant Sketch') }}</label>
                            <div class="col-md-7">
                              <input id="ApplicantSketch" accept="image/*" type="file" class="form-control-file image_field" data-id="ApplicantSketchimg" name="ApplicantSketch" autocomplete="ApplicantSketch" >
                              <img id="ApplicantSketchimg" src="/storage/{{ $customer->ApplicantSketch }}" style="height:10cm;width:10cm" alt="your image" />    
                            </div>
                        </div>

                        <div class="h6">Address and Properties:</div>
                        <div class="row mb-3">
                            <label for="PresentAddress" class="col-md-3 col-form-label text-md-end">{{ __('Present Address') }}</label>
                            <div class="col-md-7">
                              <input id="PresentAddress" type="text" class="form-control" name="PresentAddress" value= "{{$customer->address->PresentAddress}}" autocomplete="PresentAddress" >
                                
                              @error('PresentAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PresentAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="LengthOfStay" class="col-md-3 col-form-label text-md-end">{{ __('Length Of Stay') }}</label>
                            <div class="col-md-7">
                              <input id="LengthOfStay" type="text" class="form-control" name="LengthOfStay" value= "{{$customer->address->LengthOfStay}}" autocomplete="LengthOfStay" >
                                
                              @error('LengthOfStay')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="LengthOfStayerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="HouseStatus" class="col-md-3 col-form-label text-md-end">{{ __('House Status') }}</label>
                            <div class="col-md-7">
                                <select name="HouseStatus" id="id_HouseStatus" class="form-select form-control">
                                    <option value="Owned" {{ $customer->address->HouseStatus == "Owned" ? 'selected' : '' }}>Owned</option>
                                    <option value="Rented" {{ $customer->address->HouseStatus == "Rented" ? 'selected' : '' }}>Rented</option>
                                    <option value="Mortgaged" {{ $customer->address->HouseStatus == "Mortgaged" ? 'selected' : '' }}>Mortgaged</option>
                                    <option value="Provided_By" {{ $customer->address->HouseStatus == "Provided_By" ? 'selected' : '' }}>Provided By</option>
                                </select>     
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="HouseProvidedBy" class="col-md-3 col-form-label text-md-end">{{ __('House Provided By') }}</label>
                            <div class="col-md-7">
                              <input id="HouseProvidedBy" type="text" class="form-control" name="HouseProvidedBy" value= "{{$customer->address->HouseProvidedBy}}" autocomplete="HouseProvidedBy" >
                                
                              @error('HouseProvidedBy')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="HouseProvidedByerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="LotStatus" class="col-md-3 col-form-label text-md-end">{{ __('Lot Status') }}</label>
                            <div class="col-md-7">
                                <select name="LotStatus" id="id_LotStatus" class="form-select form-control">
                                    <option value="Owned" {{ $customer->address->LotStatus == "Owned" ? 'selected' : '' }}>Owned</option>
                                    <option value="Rented" {{ $customer->address->LotStatus == "Rented" ? 'selected' : '' }}>Rented</option>
                                    <option value="Mortgaged" {{ $customer->address->LotStatus == "Mortgaged" ? 'selected' : '' }}>Mortgaged</option>
                                    <option value="Provided_By" {{ $customer->address->LotStatus == "Provided_By" ? 'selected' : '' }}>Provided By</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="LotProvidedBy" class="col-md-3 col-form-label text-md-end">{{ __('Lot Provided By') }}</label>
                            <div class="col-md-7">
                              <input id="LotProvidedBy" type="text" class="form-control" name="LotProvidedBy" value= "{{$customer->address->LotProvidedBy}}" autocomplete="LotProvidedBy" >
                                
                              @error('LotProvidedBy')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="LotProvidedByerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesTV" class="col-md-3 col-form-label text-md-end">{{ __('TV') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesTV" id="id_OtherPropertiesTV" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesTV == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesTV == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesRef" class="col-md-3 col-form-label text-md-end">{{ __('Ref') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesRef" id="id_OtherPropertiesRef" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesRef == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesRef == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesStereoComponent" class="col-md-3 col-form-label text-md-end">{{ __('Stereo Component') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesStereoComponent" id="id_OtherPropertiesStereoComponent" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesStereoComponent == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesStereoComponent == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesGasRange" class="col-md-3 col-form-label text-md-end">{{ __('GasRange') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesGasRange" id="id_OtherPropertiesGasRange" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesGasRange == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesGasRange == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesMotorcycle" class="col-md-3 col-form-label text-md-end">{{ __('Motorcycle') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesMotorcycle" id="id_OtherPropertiesMotorcycle" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesMotorcycle == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesMotorcycle == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesComputer" class="col-md-3 col-form-label text-md-end">{{ __('Computer') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesComputer" id="id_OtherPropertiesComputer" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesComputer == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesComputer == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OtherPropertiesFarmlot" class="col-md-3 col-form-label text-md-end">{{ __('Farm lot') }}</label>
                            <div class="col-md-7">
                                <select name="OtherPropertiesFarmlot" id="id_OtherPropertiesFarmlot" class="form-select form-control">
                                    <option value=1 {{ $customer->address->OtherPropertiesFarmlot == 1 ? 'selected' : '' }}>True</option>
                                    <option value=0 {{ $customer->address->OtherPropertiesFarmlot == 0 ? 'selected' : '' }}>False</option>
                                </select>       
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="FarmLotAddress" class="col-md-3 col-form-label text-md-end">{{ __('Farm Lot Address') }}</label>
                            <div class="col-md-7">
                              <input id="FarmLotAddress" type="text" class="form-control" name="FarmLotAddress" value= "{{$customer->address->FarmLotAddress}}" autocomplete="FarmLotAddress" >
                                
                              @error('FarmLotAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="FarmLotAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="FarmLotSize" class="col-md-3 col-form-label text-md-end">{{ __('Farm Lot Size') }}</label>
                            <div class="col-md-7">
                              <input id="FarmLotSize" type="text" class="form-control" name="FarmLotSize" value= "{{$customer->address->FarmLotSize}}" autocomplete="FarmLotSize" >
                                
                              @error('FarmLotSize')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="FarmLotSizeerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ProvincialAddress" class="col-md-3 col-form-label text-md-end">{{ __('Provincial Address') }}</label>
                            <div class="col-md-7">
                              <input id="ProvincialAddress" type="text" class="form-control" name="ProvincialAddress" value= "{{$customer->address->ProvincialAddress}}" autocomplete="ProvincialAddress" >
                                
                              @error('ProvincialAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="ProvincialAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        

                        <div class="h6">Parent Information:</div>
                        <div class="row mb-3">
                            <label for="ParentAddresss" class="col-md-3 col-form-label text-md-end">{{ __('Parent Address') }}</label>
                            <div class="col-md-7">
                              <input id="ParentAddresss" type="text" class="form-control" name="ParentAddresss" value= "{{$customer->parent->Addresss}}" autocomplete="ParentAddresss" >
                                
                              @error('ParentAddresss')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="ParentAddressserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ParentMobileNumber" class="col-md-3 col-form-label text-md-end">{{ __('Parent Mobile Number') }}</label>
                            <div class="col-md-7">
                              <input id="ParentMobileNumber" type="text" class="form-control" name="ParentMobileNumber" value= "{{$customer->parent->MobileNumber}}" autocomplete="ParentMobileNumber" >
                                
                              @error('ParentMobileNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="ParentMobileNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>

                        <div class="h6">Dependecies:</div>
                        <div class="row mb-3">
                            <label for="NumberOfDependencies" class="col-md-3 col-form-label text-md-end">{{ __('Number of Dependencies:') }}</label>
                            <div class="col-md-7">
                                <select name="NumberOfDependencies" id="id_NumberOfDependencies" class="form-select form-control"   >
                                    <option value="0" {{ $customer->NumberOfDependencies == "0" ? 'selected' : '' }}>0</option>
                                    <option value="1" {{ $customer->NumberOfDependencies == "1" ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $customer->NumberOfDependencies == "2" ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $customer->NumberOfDependencies == "3" ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $customer->NumberOfDependencies == "4" ? 'selected' : '' }}>4</option>
                                </select>    
                            </div>
                        </div>
                        <div id="Dependent1" style="display:none">
                        asd
                        </div>
                        <div id="Dependent2" style="display:none">
                            asdasd
                        </div>
                        <div id="Dependent3" style="display:none">
                            asdasd
                        </div>
                        <div id="Dependent4" style="display:none">
                            asd
                        </div>

                        







                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary col-md-3" >Save</button>    
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
        var NumberOfDependencies = $('#id_NumberOfDependencies').val();

        switch(NumberOfDependencies){
            case '0':
                $('#Dependent1').hide();
                $('#Dependent2').hide();
                $('#Dependent3').hide();
                $('#Dependent4').hide();
                break;
            case '1':
                $('#Dependent1').show();
                $('#Dependent2').hide();
                $('#Dependent3').hide();
                $('#Dependent4').hide();
                break;
            case '2':
                $('#Dependent1').show();
                $('#Dependent2').show();
                $('#Dependent3').hide();
                $('#Dependent4').hide();
                break;
            case '3':
                $('#Dependent1').show();
                $('#Dependent2').show();
                $('#Dependent3').show();
                $('#Dependent4').hide();
                break;
            default:
                $('#Dependent1').show();
                $('#Dependent2').show();
                $('#Dependent3').show();
                $('#Dependent4').show();
        }
        $('input.image_field').on('change',function(){
            const file = this.files[0];
            var item = $(this).attr('data-id'); 
            console.log(file);
            if (file){
                
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#'+ item ).attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }

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
    });

</script>
@endsection