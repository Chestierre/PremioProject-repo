@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header h5">Update Customer Details: {{$customer->FirstName}} {{$customer->LastName}}</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route("customer.updateCustomerDetails")}}">
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
                              <input id="Citizenship" type="text" class="form-control" name="Citizenship" value={{$customer->Citizenship}} autocomplete="Citizenship" >
                                
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
                              <input id="Salary" type="text" class="form-control" name="Salary" value= "{{$customer->Salary}}" autocomplete="Salary" >
                                
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
                            <div class="row mb-3">
                                <label for="DependentName1" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Name 1') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentName1" type="text" class="form-control" name="DependentName1" value= "@if($customer->dependent->count() >= 1){{ $customer->dependent[0]->Name  }}@endif" autocomplete="DependentName1" >
                                    
                                  @error('DependentName1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentName1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentAge1" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Age 1') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentAge1" type="number" class="form-control" name="DependentAge1" value= "@if($customer->dependent->count() >= 1){{ $customer->dependent[0]->Age  }}@endif" autocomplete="DependentAge1" >
                                    
                                  @error('DependentAge1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentAge1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentGradeOcc1" class="col-md-3 col-form-label text-md-end">{{ __('Grade/Occupation Position 1') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentGradeOcc1" type="text" class="form-control" name="DependentGradeOcc1" value= "@if($customer->dependent->count() >= 1){{ $customer->dependent[0]->GradeOcc  }}@endif" autocomplete="DependentGradeOcc1" >
                                    
                                  @error('DependentGradeOcc1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentGradeOcc1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentSchoolComp1" class="col-md-3 col-form-label text-md-end">{{ __('School/Company Employed 1') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentSchoolComp1" type="text" class="form-control" name="DependentSchoolComp1" value= "@if($customer->dependent->count() >= 1){{ $customer->dependent[0]->SchoolComp  }}@endif" autocomplete="DependentSchoolComp1" >
                                    
                                  @error('DependentSchoolComp1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentSchoolComp1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>
                        <div id="Dependent2" style="display:none">
                            <div class="row mb-3">
                                <label for="DependentName2" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Name 2') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentName2" type="text" class="form-control" name="DependentName2" value= "@if($customer->dependent->count() >= 2){{ $customer->dependent[1]->Name  }}@endif" autocomplete="DependentName2" >
                                    
                                  @error('DependentName2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentName2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentAge2" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Age 2') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentAge2" type="number" class="form-control" name="DependentAge2" value= "@if($customer->dependent->count() >= 2){{ $customer->dependent[1]->Age  }}@endif" autocomplete="DependentAge2" >
                                    
                                  @error('DependentAge2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentAge2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentGradeOcc2" class="col-md-3 col-form-label text-md-end">{{ __('Grade/Occupation Position 2') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentGradeOcc2" type="text" class="form-control" name="DependentGradeOcc2" value= "@if($customer->dependent->count() >= 2){{ $customer->dependent[1]->GradeOcc  }}@endif" autocomplete="DependentGradeOcc2" >
                                    
                                  @error('DependentGradeOcc2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentGradeOcc2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentSchoolComp2" class="col-md-3 col-form-label text-md-end">{{ __('School/Company Employed 2') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentSchoolComp2" type="text" class="form-control" name="DependentSchoolComp2" value= "@if($customer->dependent->count() >= 2){{ $customer->dependent[1]->SchoolComp  }}@endif" autocomplete="DependentSchoolComp2" >
                                    
                                  @error('DependentSchoolComp2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentSchoolComp2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>
                        <div id="Dependent3" style="display:none">
                            <div class="row mb-3">
                                <label for="DependentName3" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Name 3') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentName3" type="text" class="form-control" name="DependentName3" value= "@if($customer->dependent->count() >= 3){{ $customer->dependent[2]->Name  }}@endif" autocomplete="DependentName3" >
                                    
                                  @error('DependentName3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentName3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentAge3" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Age 3') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentAge3" type="number" class="form-control" name="DependentAge3" value= "@if($customer->dependent->count() >= 3){{ $customer->dependent[2]->Age  }}@endif" autocomplete="DependentAge3" >
                                    
                                  @error('DependentAge3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentAge3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentGradeOcc3" class="col-md-3 col-form-label text-md-end">{{ __('Grade/Occupation Position 3') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentGradeOcc3" type="text" class="form-control" name="DependentGradeOcc3" value= "@if($customer->dependent->count() >= 3){{ $customer->dependent[2]->GradeOcc  }}@endif" autocomplete="DependentGradeOcc3" >
                                    
                                  @error('DependentGradeOcc3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentGradeOcc3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentSchoolComp3" class="col-md-3 col-form-label text-md-end">{{ __('School/Company Employed 3') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentSchoolComp3" type="text" class="form-control" name="DependentSchoolComp3" value= "@if($customer->dependent->count() >= 3){{ $customer->dependent[2]->SchoolComp  }}@endif" autocomplete="DependentSchoolComp3" >
                                    
                                  @error('DependentSchoolComp3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentSchoolComp3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>
                        <div id="Dependent4" style="display:none">
                            <div class="row mb-3">
                                <label for="DependentName4" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Name 4') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentName4" type="text" class="form-control" name="DependentName4" value= "@if($customer->dependent->count() >= 4){{ $customer->dependent[3]->Name  }}@endif" autocomplete="DependentName4" >
                                    
                                  @error('DependentName4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentName4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentAge4" class="col-md-3 col-form-label text-md-end">{{ __('Dependent Age 4') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentAge4" type="number" class="form-control" name="DependentAge4" value= "@if($customer->dependent->count() >= 4){{ $customer->dependent[3]->Age  }}@endif" autocomplete="DependentAge4" >
                                    
                                  @error('DependentAge4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentAge4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentGradeOcc4" class="col-md-3 col-form-label text-md-end">{{ __('Grade/Occupation Position 4') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentGradeOcc4" type="text" class="form-control" name="DependentGradeOcc4" value= "@if($customer->dependent->count() >= 4){{ $customer->dependent[3]->GradeOcc  }}@endif" autocomplete="DependentGradeOcc4" >
                                    
                                  @error('DependentGradeOcc4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentGradeOcc4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DependentSchoolComp4" class="col-md-3 col-form-label text-md-end">{{ __('School/Company Employed 4') }}</label>
                                <div class="col-md-7">
                                  <input id="DependentSchoolComp4" type="text" class="form-control" name="DependentSchoolComp4" value= "@if($customer->dependent->count() >= 4){{ $customer->dependent[3]->SchoolComp  }}@endif" autocomplete="DependentSchoolComp4" >
                                    
                                  @error('DependentSchoolComp4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="DependentSchoolComp4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>

                        <div class="h6">Spouse:</div>
                        <div class="row mb-3">
                            <label for="SpouseName" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Name') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseName" type="text" class="form-control" name="SpouseName" value= "{{ $customer->spouse->Name }}" autocomplete="SpouseName" >
                                
                              @error('SpouseName')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseNameerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseAge" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Age') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseAge" type="text" class="form-control" name="SpouseAge" value= "{{ $customer->spouse->Age }}" autocomplete="SpouseAge" >
                                
                              @error('SpouseAge')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseAgeerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseProvincialAddress" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Provincial Address') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseProvincialAddress" type="text" class="form-control" name="SpouseProvincialAddress" value= "{{ $customer->spouse->ProvincialAddress }}" autocomplete="SpouseProvincialAddress" >
                                
                              @error('SpouseProvincialAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseProvincialAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseMobileNumber" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Mobile Number') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseMobileNumber" type="text" class="form-control" name="SpouseMobileNumber" value= "{{ $customer->spouse->MobileNumber }}" autocomplete="SpouseMobileNumber" >
                                
                              @error('SpouseMobileNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseMobileNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseEmail" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Email') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseEmail" type="email" class="form-control" name="SpouseEmail" value= "{{ $customer->spouse->Email }}" autocomplete="SpouseEmail" >
                                
                              @error('SpouseEmail')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseEmailerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseEmployer" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Employer') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseEmployer" type="text" class="form-control" name="SpouseEmployer" value= "{{ $customer->spouse->Employer }}" autocomplete="SpouseEmployer" >
                                
                              @error('SpouseEmployer')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseEmployererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpousePosition" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Position') }}</label>
                            <div class="col-md-7">
                              <input id="SpousePosition" type="text" class="form-control" name="SpousePosition" value= "{{ $customer->spouse->Position }}" autocomplete="SpousePosition" >
                                
                              @error('SpousePosition')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpousePositionerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseJobAddress" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Job Address') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseJobAddress" type="text" class="form-control" name="SpouseJobAddress" value= "{{ $customer->spouse->JobAddress }}" autocomplete="SpouseJobAddress" >
                                
                              @error('SpouseJobAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseJobAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseWorkTelNum" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Work Telephone Number') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseWorkTelNum" type="number" class="form-control" name="SpouseWorkTelNum" value= "{{ $customer->spouse->WorkTelNum }}" autocomplete="SpouseWorkTelNum" >
                                
                              @error('SpouseWorkTelNum')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseWorkTelNumerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseDateEmployed" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Date Employed') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseDateEmployed" type="date" class="form-control" name="SpouseDateEmployed" value= "{{ $customer->spouse->WorkTelNum }}" autocomplete="SpouseDateEmployed" >
                                
                              @error('SpouseDateEmployed')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseDateEmployederrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="SpouseSalary" class="col-md-3 col-form-label text-md-end">{{ __('Spouse Salary') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseSalary" type="text" class="form-control" name="SpouseSalary" value= "{{$customer->spouse->Salary}}" autocomplete="SpouseSalary" >
                                
                              @error('SpouseSalary')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="SpouseSalaryerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="SpouseSignature" class="col-md-3 col-form-label text-md-end">{{ __('Applicant Sketch') }}</label>
                            <div class="col-md-7">
                              <input id="SpouseSignature" accept="image/*" type="file" class="form-control-file image_field" data-id="SpouseSignatureimg" name="SpouseSignature" autocomplete="SpouseSignature" >
                              <img id="SpouseSignatureimg" src="/storage/{{ $customer->Spouse->SpouseSignature }}" style="height:10cm;width:10cm" alt="your image" />    
                            </div>
                        </div>

                        <div class="h6">Personal Reference:</div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceName1" class="col-md-3 col-form-label text-md-end">{{ __('Name 1') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceName1" type="text" class="form-control" name="PersonalReferenceName1" value= "{{ $customer->personalreference[0]->PersonalReferenceName  }}" autocomplete="PersonalReferenceName1" >
                                
                              @error('PersonalReferenceName1')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceName1errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceRelationship1" class="col-md-3 col-form-label text-md-end">{{ __('Relationship 1') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceRelationship1" type="text" class="form-control" name="PersonalReferenceRelationship1" value= "{{ $customer->personalreference[0]->PersonalReferenceRelationship  }}" autocomplete="PersonalReferenceRelationship1" >
                                
                              @error('PersonalReferenceRelationship1')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceRelationship1errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceNumber1" class="col-md-3 col-form-label text-md-end">{{ __('Telephone Number 1') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceNumber1" type="number" class="form-control" name="PersonalReferenceNumber1" value= "{{ $customer->personalreference[0]->PersonalReferenceNumber  }}" autocomplete="PersonalReferenceNumber1" >
                                
                              @error('PersonalReferenceNumber1')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceNumber1errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceAddress1" class="col-md-3 col-form-label text-md-end">{{ __('Address 1') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceAddress1" type="text" class="form-control" name="PersonalReferenceAddress1" value= "{{ $customer->personalreference[0]->PersonalReferenceAddress  }}" autocomplete="PersonalReferenceAddress1" >
                                
                              @error('PersonalReferenceAddress1')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceAddress1errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceName2" class="col-md-3 col-form-label text-md-end">{{ __('Name 2') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceName2" type="text" class="form-control" name="PersonalReferenceName2" value= "{{ $customer->personalreference[1]->PersonalReferenceName  }}" autocomplete="PersonalReferenceName2" >
                                
                              @error('PersonalReferenceName2')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceName2errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceRelationship2" class="col-md-3 col-form-label text-md-end">{{ __('Relationship 2') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceRelationship2" type="text" class="form-control" name="PersonalReferenceRelationship2" value= "{{ $customer->personalreference[1]->PersonalReferenceRelationship  }}" autocomplete="PersonalReferenceRelationship2" >
                                
                              @error('PersonalReferenceRelationship2')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceRelationship2errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceNumber2" class="col-md-3 col-form-label text-md-end">{{ __('Telephone Number 2') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceNumber2" type="number" class="form-control" name="PersonalReferenceNumber2" value= "{{ $customer->personalreference[1]->PersonalReferenceNumber  }}" autocomplete="PersonalReferenceNumber2" >
                                
                              @error('PersonalReferenceNumber2')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceNumber2errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceAddress2" class="col-md-3 col-form-label text-md-end">{{ __('Address 2') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceAddress2" type="text" class="form-control" name="PersonalReferenceAddress2" value= "{{ $customer->personalreference[1]->PersonalReferenceAddress  }}" autocomplete="PersonalReferenceAddress2" >
                                
                              @error('PersonalReferenceAddress2')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceAddress2errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceName3" class="col-md-3 col-form-label text-md-end">{{ __('Name 3') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceName3" type="text" class="form-control" name="PersonalReferenceName3" value= "{{ $customer->personalreference[2]->PersonalReferenceName  }}" autocomplete="PersonalReferenceName3" >
                                
                              @error('PersonalReferenceName3')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceName3errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceRelationship3" class="col-md-3 col-form-label text-md-end">{{ __('Relationship 3') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceRelationship3" type="text" class="form-control" name="PersonalReferenceRelationship3" value= "{{ $customer->personalreference[2]->PersonalReferenceRelationship  }}" autocomplete="PersonalReferenceRelationship3" >
                                
                              @error('PersonalReferenceRelationship3')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceRelationship3errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceNumber3" class="col-md-3 col-form-label text-md-end">{{ __('Telephone Number 3') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceNumber3" type="number" class="form-control" name="PersonalReferenceNumber3" value= "{{ $customer->personalreference[2]->PersonalReferenceNumber  }}" autocomplete="PersonalReferenceNumber3" >
                                
                              @error('PersonalReferenceNumber3')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceNumber3errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PersonalReferenceAddress3" class="col-md-3 col-form-label text-md-end">{{ __('Address 3') }}</label>
                            <div class="col-md-7">
                              <input id="PersonalReferenceAddress3" type="text" class="form-control" name="PersonalReferenceAddress3" value= "{{ $customer->personalreference[2]->PersonalReferenceAddress  }}" autocomplete="PersonalReferenceAddress3" >
                                
                              @error('PersonalReferenceAddress3')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="PersonalReferenceAddress3errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>

                        <div class="h6">Credit Reference:</div>
                        
                        <div class="row mb-3">
                            <label for="NumberofCreditReference" class="col-md-3 col-form-label text-md-end">{{ __('Number of Credit Reference:') }}</label>
                            <div class="col-md-7">
                                <select name="NumberofCreditReference" id="id_NumberofCreditReference" class="form-select form-control"   >
                                    <option value="0" {{ $customer->NumberofCreditReference == "0" ? 'selected' : '' }}>0</option>
                                    <option value="1" {{ $customer->NumberofCreditReference == "1" ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $customer->NumberofCreditReference == "2" ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $customer->NumberofCreditReference == "3" ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $customer->NumberofCreditReference == "4" ? 'selected' : '' }}>4</option>
                                </select>    
                            </div>
                        </div>

                        <div id="Credit1" style="display:none">
                            <div class="row mb-3">
                                <label for="StoreBank1" class="col-md-3 col-form-label text-md-end">{{ __('Store Bank 1') }}</label>
                                <div class="col-md-7">
                                    <input id="StoreBank1" type="text" class="form-control" name="StoreBank1" value="@if( $customer->creditreference->count() >= 1){{ $customer->creditreference[0]->StoreBank}}@endif" >
                                    
                                    @error('StoreBank1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="StoreBank1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ItemLoadAmount1" class="col-md-3 col-form-label text-md-end">{{ __('Item Load Amount 1') }}</label>
                                <div class="col-md-7">
                                <input id="ItemLoadAmount1" type="number" class="form-control" name="ItemLoadAmount1" value="@if( $customer->creditreference->count() >= 1){{ $customer->creditreference[0]->ItemLoadAmount}}@endif" >
                                    
                                @error('ItemLoadAmount1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="ItemLoadAmount1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Term1" class="col-md-3 col-form-label text-md-end">{{ __('Term 1') }}</label>
                                <div class="col-md-7">
                                    <input id="Term1" type="text" class="form-control" name="Term1" value="@if( $customer->creditreference->count() >= 1){{ $customer->creditreference[0]->Term}}@endif" >
                                    
                                    @error('Term1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="Term1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditDate1" class="col-md-3 col-form-label text-md-end">{{ __('Credit Date 1') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditDate1" type="date" class="form-control" name="CreditDate1" value="@if( $customer->creditreference->count() >= 1){{ $customer->creditreference[0]->CreditDate}}@endif" >
                                    
                                    @error('CreditDate1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditDate1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditBalance1" class="col-md-3 col-form-label text-md-end">{{ __('Credit Balance 1') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditBalance1" type="number" class="form-control" name="CreditBalance1" value="@if( $customer->creditreference->count() >= 1){{ $customer->creditreference[0]->CreditBalance}}@endif" >
                                    
                                    @error('CreditBalance1')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditBalance1errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>

                        <div id="Credit2" style="display:none">
                            <div class="row mb-3">
                                <label for="StoreBank2" class="col-md-3 col-form-label text-md-end">{{ __('Store Bank 2') }}</label>
                                <div class="col-md-7">
                                    <input id="StoreBank2" type="text" class="form-control" name="StoreBank2" value="@if( $customer->creditreference->count() >= 2){{ $customer->creditreference[1]->StoreBank}}@endif" >
                                    
                                    @error('StoreBank2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="StoreBank2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ItemLoadAmount2" class="col-md-3 col-form-label text-md-end">{{ __('Item Load Amount 2') }}</label>
                                <div class="col-md-7">
                                <input id="ItemLoadAmount2" type="number" class="form-control" name="ItemLoadAmount2" value="@if( $customer->creditreference->count() >= 2){{ $customer->creditreference[1]->ItemLoadAmount}}@endif" >
                                    
                                @error('ItemLoadAmount2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="ItemLoadAmount2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Term2" class="col-md-3 col-form-label text-md-end">{{ __('Term 2') }}</label>
                                <div class="col-md-7">
                                    <input id="Term2" type="text" class="form-control" name="Term2" value="@if( $customer->creditreference->count() >= 2){{ $customer->creditreference[1]->Term}}@endif" >
                                    
                                    @error('Term2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="Term2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditDate2" class="col-md-3 col-form-label text-md-end">{{ __('Credit Date 2') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditDate2" type="date" class="form-control" name="CreditDate2" value="@if( $customer->creditreference->count() >= 2){{ $customer->creditreference[1]->CreditDate}}@endif" >
                                    
                                    @error('CreditDate2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditDate2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditBalance2" class="col-md-3 col-form-label text-md-end">{{ __('Credit Balance 2') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditBalance2" type="number" class="form-control" name="CreditBalance2" value="@if( $customer->creditreference->count() >= 2){{ $customer->creditreference[1]->CreditBalance}}@endif" >
                                    
                                    @error('CreditBalance2')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditBalance2errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>

                        <div id="Credit3" style="display:none">
                            <div class="row mb-3">
                                <label for="StoreBank3" class="col-md-3 col-form-label text-md-end">{{ __('Store Bank 3') }}</label>
                                <div class="col-md-7">
                                    <input id="StoreBank3" type="text" class="form-control" name="StoreBank3" value="@if( $customer->creditreference->count() >= 3){{ $customer->creditreference[2]->StoreBank}}@endif" >
                                    
                                    @error('StoreBank3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="StoreBank3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ItemLoadAmount3" class="col-md-3 col-form-label text-md-end">{{ __('Item Load Amount 3') }}</label>
                                <div class="col-md-7">
                                <input id="ItemLoadAmount3" type="number" class="form-control" name="ItemLoadAmount3" value="@if( $customer->creditreference->count() >= 3){{ $customer->creditreference[2]->ItemLoadAmount}}@endif" >
                                    
                                @error('ItemLoadAmount3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="ItemLoadAmount3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Term3" class="col-md-3 col-form-label text-md-end">{{ __('Term 3') }}</label>
                                <div class="col-md-7">
                                    <input id="Term3" type="text" class="form-control" name="Term3" value="@if( $customer->creditreference->count() >= 3){{ $customer->creditreference[2]->Term}}@endif" >
                                    
                                    @error('Term3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="Term3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditDate3" class="col-md-3 col-form-label text-md-end">{{ __('Credit Date 3') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditDate3" type="date" class="form-control" name="CreditDate3" value="@if( $customer->creditreference->count() >= 3){{ $customer->creditreference[2]->CreditDate}}@endif" >
                                    
                                    @error('CreditDate3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditDate3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditBalance3" class="col-md-3 col-form-label text-md-end">{{ __('Credit Balance 3') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditBalance3" type="number" class="form-control" name="CreditBalance3" value="@if( $customer->creditreference->count() >= 3){{ $customer->creditreference[2]->CreditBalance}}@endif" >
                                    
                                    @error('CreditBalance3')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditBalance3errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>

                        <div id="Credit4" style="display:none">
                            <div class="row mb-3">
                                <label for="StoreBank4" class="col-md-3 col-form-label text-md-end">{{ __('Store Bank 4') }}</label>
                                <div class="col-md-7">
                                    <input id="StoreBank4" type="text" class="form-control" name="StoreBank4" value="@if( $customer->creditreference->count() == 4){{ $customer->creditreference[3]->StoreBank}}@endif" >
                                    
                                    @error('StoreBank4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="StoreBank4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ItemLoadAmount4" class="col-md-3 col-form-label text-md-end">{{ __('Item Load Amount 4') }}</label>
                                <div class="col-md-7">
                                <input id="ItemLoadAmount4" type="number" class="form-control" name="ItemLoadAmount4" value="@if( $customer->creditreference->count() == 4){{ $customer->creditreference[3]->ItemLoadAmount}}@endif" >
                                    
                                @error('ItemLoadAmount4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="ItemLoadAmount4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Term4" class="col-md-3 col-form-label text-md-end">{{ __('Term 4') }}</label>
                                <div class="col-md-7">
                                    <input id="Term4" type="text" class="form-control" name="Term4" value="@if( $customer->creditreference->count() == 4){{ $customer->creditreference[3]->Term}}@endif" >
                                    
                                    @error('Term4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="Term4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditDate4" class="col-md-3 col-form-label text-md-end">{{ __('Credit Date 4') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditDate4" type="date" class="form-control" name="CreditDate4" value="@if( $customer->creditreference->count() == 4){{ $customer->creditreference[3]->CreditDate}}@endif" >
                                    
                                    @error('CreditDate4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditDate4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CreditBalance4" class="col-md-3 col-form-label text-md-end">{{ __('Credit Balance 4') }}</label>
                                <div class="col-md-7">
                                    <input id="CreditBalance4" type="number" class="form-control" name="CreditBalance4" value="@if( $customer->creditreference->count() == 4){{ $customer->creditreference[3]->CreditBalance}}@endif" >
                                    
                                    @error('CreditBalance4')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong id="CreditBalance4errorlabel">{{$message}}</strong>
                                    </span>
                                    @enderror        
                                </div>
                            </div>
                        </div>

                        <div class="h6">Co-Maker:</div>
                        <div class="row mb-3">
                            <label for="CoMakerName" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Name') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerName" type="text" class="form-control" name="CoMakerName" value="{{ $customer->comaker->Name }}" >
                                
                                @error('CoMakerName')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerNameerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerAge" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Age') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerAge" type="number" class="form-control" name="CoMakerAge" value="{{ $customer->comaker->Age }}" >
                                
                                @error('CoMakerAge')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerAgeerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerSex" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Sex') }}</label>
                            <div class="col-md-7">
                                <select name="CoMakerSex" id="id_CoMakerSex" class="form-select form-control">
                                    <option value="Male" {{ $customer->comaker->Sex == "Male" ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $customer->comaker->Sex == "Female" ? 'selected' : '' }}>Female</option>
                                </select>    
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerAddress" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Address') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerAddress" type="text" class="form-control" name="CoMakerAddress" value="{{ $customer->comaker->Address }}" >
                                
                                @error('CoMakerAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakeTelNumber" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Telephone Number') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakeTelNumber" type="number" class="form-control" name="CoMakeTelNumber" value="{{ $customer->comaker->CoMakeTelNumber }}" >
                                
                                @error('CoMakeTelNumber')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakeTelNumbererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerResidence" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Residence') }}</label>
                            <div class="col-md-7">
                                <select name="CoMakerResidence" id="id_CoMakerResidence" class="form-select form-control">
                                    <option value="Owned" {{ $customer->comaker->Residence == "Owned" ? 'selected' : '' }}>Owned</option>
                                    <option value="Rented" {{ $customer->comaker->Residence == "Rented" ? 'selected' : '' }}>Rented</option>
                                    <option value="Mortgaged" {{ $customer->comaker->Residence == "Mortgaged" ? 'selected' : '' }}>Mortgaged</option>
                                    <option value="Provided_by" {{ $customer->comaker->Residence == "Provided_by" ? 'selected' : '' }}>Provided by</option>
                                </select>   
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerResidenceProvidedBy" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Residence Provided by') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerResidenceProvidedBy" type="text" class="form-control" name="CoMakerResidenceProvidedBy" value="{{ $customer->comaker->ResidenceProvidedBy }}" >
                                
                                @error('CoMakerResidenceProvidedBy')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerResidenceProvidedByerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerCivilStatus" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Civil Status') }}</label>
                            <div class="col-md-7">
                                <select name="CoMakerCivilStatus" id="id_CoMakerCivilStatus" class="form-select form-control">
                                    <option value="Single" {{ $customer->comaker->CivilStatus == "Single" ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $customer->comaker->CivilStatus == "Married" ? 'selected' : '' }}>Married</option>
                                    <option value="Divored/Separated" {{ $customer->comaker->CivilStatus == "Divored/Separated" ? 'selected' : '' }}>Divored/Separated</option>
                                    <option value="Widowed" {{ $customer->comaker->CivilStatus == "Widowed" ? 'selected' : '' }}>Widowed</option>
                                </select>        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerRelationship" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Relatioship') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerRelationship" type="text" class="form-control" name="CoMakerRelationship" value="{{ $customer->comaker->Relationship }}" >
                                
                                @error('CoMakerRelationship')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerRelationshiperrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerBirthDate" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Birth Date') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerBirthDate" type="date" class="form-control" name="CoMakerBirthDate" value="{{ $customer->comaker->BirthDate }}" >
                                
                                @error('CoMakerBirthDate')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerBirthDateerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerTin" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Tin') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerTin" type="number" class="form-control" name="CoMakerTin" value="{{ $customer->comaker->Tin }}" >
                                
                                @error('CoMakerTin')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerTinerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerMobileNo" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Mobile Number') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerMobileNo" type="text" class="form-control" name="CoMakerMobileNo" value="{{ $customer->comaker->MobileNo }}" >
                                
                                @error('CoMakerMobileNo')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerMobileNoerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerEmployer" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Employer') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerEmployer" type="text" class="form-control" name="CoMakerEmployer" value="{{ $customer->comaker->Employer }}" >
                                
                                @error('CoMakerEmployer')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerEmployererrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakeDateEmployed" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Date Employed') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakeDateEmployed" type="date" class="form-control" name="CoMakeDateEmployed" value="{{ $customer->comaker->CoMakeDateEmployed }}" >
                                
                                @error('CoMakeDateEmployed')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakeDateEmployederrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerPosition" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Position') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerPosition" type="text" class="form-control" name="CoMakerPosition" value="{{ $customer->comaker->Position }}" >
                                
                                @error('CoMakerPosition')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerPositionerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerTelNo" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Telephone Number') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerTelNo" type="number" class="form-control" name="CoMakerTelNo" value="{{ $customer->comaker->TelNo }}" >
                                
                                @error('CoMakerTelNo')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerTelNoerrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerEmployerAddress" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Employer\' Address') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerEmployerAddress" type="text" class="form-control" name="CoMakerEmployerAddress" value="{{ $customer->comaker->EmployerAddress }}" >
                                
                                @error('CoMakerEmployerAddress')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerEmployerAddresserrorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerEmploymentStatus" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Employment Status') }}</label>
                            <div class="col-md-7">
                                <select name="CoMakerEmploymentStatus" id="id_CoMakerEmploymentStatus" class="form-select form-control">
                                    <option value="Contractual" {{ $customer->comaker->EmploymentStatus == "Contractual" ? 'selected' : '' }}>Contractual</option>
                                    <option value="Probationary" {{ $customer->comaker->EmploymentStatus == "Probationary" ? 'selected' : '' }}>Probationary</option>
                                    <option value="Regular" {{ $customer->comaker->EmploymentStatus == "Regular" ? 'selected' : '' }}>Regular</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerCreditReference1" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Credit Reference 1') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerCreditReference1" type="text" class="form-control" name="CoMakerCreditReference1" value="{{ $customer->comaker->CreditReference1 }}" >
                                
                                @error('CoMakerCreditReference1')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerCreditReference1errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerCreditReference2" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Credit Reference 2') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerCreditReference2" type="text" class="form-control" name="CoMakerCreditReference2" value="{{ $customer->comaker->CreditReference2 }}" >
                                
                                @error('CoMakerCreditReference2')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerCreditReference2errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerCreditReference3" class="col-md-3 col-form-label text-md-end">{{ __('Co-Maker Credit Reference 3') }}</label>
                            <div class="col-md-7">
                                <input id="CoMakerCreditReference3" type="text" class="form-control" name="CoMakerCreditReference3" value="{{ $customer->comaker->CreditReference3 }}" >
                                
                                @error('CoMakerCreditReference3')
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="CoMakerCreditReference3errorlabel">{{$message}}</strong>
                                </span>
                                @enderror        
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerSketch" class="col-md-3 col-form-label text-md-end">{{ __('Applicant Sketch') }}</label>
                            <div class="col-md-7">
                              <input id="CoMakerSketch" accept="image/*" type="file" class="form-control-file image_field" data-id="CoMakerSketchimg" name="CoMakerSketch" autocomplete="CoMakerSketch" >
                              <img id="CoMakerSketchimg" src="/storage/{{ $customer->comaker->Sketch }}" style="height:10cm;width:10cm" alt="your image" />    
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="CoMakerSignature" class="col-md-3 col-form-label text-md-end">{{ __('Applicant Sketch') }}</label>
                            <div class="col-md-7">
                              <input id="CoMakerSignature" accept="image/*" type="file" class="form-control-file image_field" data-id="CoMakerSignatureimg" name="CoMakerSignature" autocomplete="CoMakerSignature" >
                              <img id="CoMakerSignatureimg" src="/storage/{{ $customer->comaker->Signature }}" style="height:10cm;width:10cm" alt="your image" />    
                            </div>
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
        var NumberofCreditReference = $('#id_NumberofCreditReference').val();
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
        switch(NumberofCreditReference){
            case '0':
                $('#Credit1').hide();
                $('#Credit2').hide();
                $('#Credit3').hide();
                $('#Credit4').hide();
                break;
            case '1':
                $('#Credit1').show();
                $('#Credit2').hide();
                $('#Credit3').hide();
                $('#Credit4').hide();
                break;
            case '2':
                $('#Credit1').show();
                $('#Credit2').show();
                $('#Credit3').hide();
                $('#Credit4').hide();
                break;
            case '3':
                $('#Credit1').show();
                $('#Credit2').show();
                $('#Credit3').show();
                $('#Credit4').hide();
                break;
            default:
                $('#Credit1').show();
                $('#Credit2').show();
                $('#Credit3').show();
                $('#Credit4').show();
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
    });

</script>
@endsection