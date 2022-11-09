<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    


    <title>{{ "Premio" }}</title>

    <link rel="icon" href="{{ url('img/Desmark logo.jpg') }}">

    
</head>
<body>
    <div class="container">                  
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Credit Application Form</div>
                </div>  
                <div class="panel-body" >
                    
                    
                    
                    @isset($user)
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.admincustomer.storeCustomer', $user->id)}}">
                        {{-- {{$user->id}} --}}
                    @endisset
                    @empty($user)
                    <form method="POST" enctype="multipart/form-data" action="{{ route('customer.customer.store')}}">
                    {{-- <form method="POST" enctype="multipart/form-data" action="{{ route('admin.admincustomer.store', $id)}}"> --}}
                        {{-- {{$id}} --}}
                    @endempty
                    
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
                        
                            <div id="div_id_FillOutDate" class="form-group required">
                                <label for="id_FillOutDate" class="control-label col-md-4  requiredField"> Fill out date<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input type="date" class="input-md  textinput textInput form-control" id="id_FillOutDate" value="{{ old('FillOutDate') }}" maxlength="30" name="FillOutDate"  
                                    min="2018-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                </div>
                            </div>

                            <div id="div_id_FirstName" class="form-group required">
                                <label for="id_FirstName" class="control-label col-md-4  requiredField"> First Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('FirstName') is-invalid @enderror" id="id_FirstName" maxlength="30" name="FirstName" value="{{ old('FirstName') }}" placeholder="Enter your first name" style="margin-bottom: 10px" type="text" autofocus autocomplete="firstname"/>
                                    @error('FirstName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div id="div_id_MiddleName" class="form-group required">
                                <label for="id_MiddleName" class="control-label col-md-4  requiredField"> Middle Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('MiddleName') is-invalid @enderror" id="id_MiddleName" maxlength="30" name="MiddleName" value="{{ old('MiddleName') }}" placeholder="Enter your middle name" style="margin-bottom: 10px" type="text" autocomplete="MiddleName"/>
                                    @error('MiddleName')
                                        <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div id="div_id_LastName" class="form-group required">
                                <label for="id_LastName" class="control-label col-md-4  requiredField"> Last Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('LastName') is-invalid @enderror" id="id_LastName" maxlength="30" name="LastName" value="{{ old('LastName') }}" placeholder="Enter your last Name" style="margin-bottom: 10px" type="text" autocomplete="LastName"/>
                                    @error('LastName')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_Sex" class="form-group required">
                                <label for="id_Sex"  class="control-label col-md-4  requiredField"> Sex<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="Sex" id="id_Sex_1" value="Male" {{ old('Sex') == "Male" ? 'checked' : ''  }} style="margin-bottom: 10px">Male</label>
                                        
                                        <label class="radio-inline"> <input type="radio" name="Sex" id="id_Sex_2" value="Female" {{ old('Sex') == "Female" ? 'checked' : '' }} style="margin-bottom: 10px">Female </label>
                                        @error('Sex')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                                


                            <div id="div_id_Age" class="form-group required">
                                <label for="id_Age" class="control-label col-md-4  requiredField"> Age<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('Age') is-invalid @enderror" id="id_Age" maxlength="30" name="Age" value="{{ old('Age') }}" placeholder="Enter your Age" style="margin-bottom: 10px" type="text" autocomplete="Age"/>
                                    @error('Age')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_Citizenship" class="form-group required">
                                <label for="id_Citizenship" class="control-label col-md-4  requiredField"> Citizenship<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('Citizenship') is-invalid @enderror" id="id_Citizenship" maxlength="30" name="Citizenship" value="{{ old('Citizenship') }}" placeholder="Enter your Citizenship" style="margin-bottom: 10px" type="text" autocomplete="Citizenship"/>
                                    @error('Citizenship')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div id="div_id_BirthDate" class="form-group required">
                                <label for="id_BirthDate" class="control-label col-md-4  requiredField"> Birth date<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input type="date" class="input-md  textinput textInput form-control" id="id_BirthDate" maxlength="30" name="BirthDate" value="{{ old('BirthDate') }}" placeholder="Enter your birth date" 
                                    min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                </div>
                            </div>

                            <div id="div_id_Religion" class="form-group required">
                                <label for="id_Religion" class="control-label col-md-4  requiredField"> Religion<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('Religion') is-invalid @enderror" id="id_Religion" maxlength="30" name="Religion" value="{{ old('Religion') }}" placeholder="Enter your Religion" style="margin-bottom: 10px" type="text" />
                                    @error('Religion')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div id="div_id_CivilStatus" class="form-group required">
                                <label for="id_CivilStatus"  class="control-label col-md-4  requiredField"> CivilStatus<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="CivilStatus" id="id_CivilStatus_1" value="Single" {{ old('CivilStatus') == "Single" ? 'checked' : ''  }} style="margin-bottom: 10px">Single</label>
                                        <label class="radio-inline"> <input type="radio" name="CivilStatus" id="id_CivilStatus_2" value="Married" {{ old('CivilStatus') == "Married" ? 'checked' : ''  }} style="margin-bottom: 10px">Married </label>
                                        <label class="radio-inline"> <input type="radio" name="CivilStatus" id="id_CivilStatus_3" value="Divored/Separated" {{ old('CivilStatus') == "Divored/Separated" ? 'checked' : ''  }} style="margin-bottom: 10px">Divored/Separated </label>
                                        <label class="radio-inline"> <input type="radio" name="CivilStatus" id="id_CivilStatus_4" value="Widowed" {{ old('CivilStatus') == "Widowed" ? 'checked' : ''  }} style="margin-bottom: 10px">Widowed </label>
                                        @error('CivilStatus')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>


                            <div id="div_id_TinNo" class="form-group required">
                                <label for="id_TinNo" class="control-label col-md-4  requiredField"> Tin Number<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('TinNo') is-invalid @enderror" id="id_TinNo" maxlength="30" name="TinNo" value="{{ old('TinNo') }}" placeholder="Enter your Tin Number" style="margin-bottom: 10px" type="number" />
                                    @error('TinNo')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_ResNo" class="form-group required">
                                <label for="id_ResNo" class="control-label col-md-4  requiredField"> Res Number<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control  @error('id_ResNo') is-invalid @enderror" id="id_ResNo" maxlength="30" name="id_ResNo" value="{{ old('id_ResNo') }}" placeholder="Enter your Res Number" style="margin-bottom: 10px" type="number" />
                                    @error('id_ResNo')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_IssueDate" class="form-group required">
                                <label for="id_IssueDate" class="control-label col-md-4  requiredField"> Issue date<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input type="date" class="input-md  textinput textInput form-control" id="id_IssueDate" maxlength="30" name="IssueDate" value="{{ old('IssueDate') }}" placeholder="Enter your Issue date" 
                                    min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                </div>
                            </div>

                            <div id="div_id_PlaceIssue" class="form-group required">
                                <label for="id_PlaceIssuse" class="control-label col-md-4  requiredField"> Place Issued<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control  @error('PlaceIssue') is-invalid @enderror" id="PlaceIssue" maxlength="30" name="PlaceIssue" value="{{ old('PlaceIssue') }}" placeholder="Enter the Place Issued" style="margin-bottom: 10px" type="text" />
                                    @error('PlaceIssue')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_PresentAddress" class="form-group required">
                                <label for="id_PresentAddress" class="control-label col-md-4  requiredField"> Present Address<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control overflow-auto  @error('PresentAddress') is-invalid @enderror" id="id_PresentAddress"  name="PresentAddress" value="{{ old('PresentAddress') }}" placeholder="Enter your Present Address" style="margin-bottom:10px;" type="text" />
                                    @error('PresentAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_LengthOfStay" class="form-group required">
                                <label for="id_LengthOfStay" class="control-label col-md-4  requiredField"> Length of Stay<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input type="text" class="input-md  textinput textInput form-control @error('LengthOfStay') is-invalid @enderror" id="id_LengthOfStay" maxlength="30" name="LengthOfStay" value="{{ old('LengthOfStay') }}" placeholder="Enter the Length of Stay" style="margin-bottom: 10px" />
                                    @error('LengthOfStay')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_HouseStatus" class="form-group required">
                                <label for="id_HouseStatus"  class="control-label col-md-4  requiredField"> House Status<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="HouseStatus" class="HouseStatus" id="id_HouseStatus_1" value="Owned" {{ old('HouseStatus') == "Owned" ? 'checked' : ''  }} style="margin-bottom: 10px">Owned</label>
                                        <label class="radio-inline"> <input type="radio" name="HouseStatus" class="HouseStatus" id="id_HouseStatus_2" value="Rented" {{ old('HouseStatus') == "Rented" ? 'checked' : ''  }} style="margin-bottom: 10px">Rented</label>
                                        <label class="radio-inline"> <input type="radio" name="HouseStatus" class="HouseStatus" id="id_HouseStatus_3" value="Mortgaged" {{ old('HouseStatus') == "Mortgaged" ? 'checked' : ''  }} style="margin-bottom: 10px">Mortgaged</label>
                                        <label class="radio-inline"> <input type="radio" name="HouseStatus" class="HouseStatus" id="id_HouseStatus_4" value="Provided_By" {{ old('HouseStatus') == "Provided_By" ? 'checked' : ''  }} style="margin-bottom: 10px">Provided By</label>
                                        @error('HouseStatus')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_HouseProvidedBy" style="display:none" class="form-group required">
                                <label for="id_HouseProvidedBy" style="color:red" class="control-label col-md-4  requiredField"> House Provided by<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control form-control @error('HouseProvidedBy') is-invalid @enderror" id="id_HouseProvidedBy" maxlength="30" name="HouseProvidedBy" value="{{ old('HouseProvidedBy') }}" placeholder="House Provided by ..." style="margin-bottom: 10px" type="text" />
                                    @error('HouseProvidedBy')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_LotStatus" class="form-group required">
                                <label for="id_LotStatus"  class="control-label col-md-4  requiredField"> Lot Status<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="LotStatus" class="LotStatus" id="id_LotStatus_1" value="Owned" {{ old('LotStatus') == "Owned" ? 'checked' : ''  }} style="margin-bottom: 10px">Owned</label>
                                        <label class="radio-inline"> <input type="radio" name="LotStatus" class="LotStatus" id="id_LotStatus_2" value="Rented" {{ old('LotStatus') == "Rented" ? 'checked' : ''  }} style="margin-bottom: 10px">Rented</label>
                                        <label class="radio-inline"> <input type="radio" name="LotStatus" class="LotStatus" id="id_LotStatus_3" value="Mortgaged" {{ old('LotStatus') == "Owned" ? 'Mortgaged' : ''  }} style="margin-bottom: 10px">Mortgaged</label>
                                        <label class="radio-inline"> <input type="radio" name="LotStatus" class="LotStatus" id="id_LotStatus_4" value="Provided_by" {{ old('LotStatus') == "Provided_by" ? 'checked' : ''  }} style="margin-bottom: 10px">Provided by</label>
                                        @error('LotStatus')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_LotProvidedBy" style="display:none" class="form-group required">
                                <label for="id_LotProvidedBy" style="color:red" class="control-label col-md-4  requiredField"> Lot Provided by<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('LotProvidedBy') is-invalid @enderror" id="id_LotProvidedBy" maxlength="30" name="LotProvidedBy" value="{{ old('LotProvidedBy') }}" placeholder="Lot Provided by ..." style="margin-bottom: 10px" type="text" />
                                    @error('LotProvidedBy')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            
                            <div id="div_id_OtherProperties" class="form-group required">
                                <label for="id_OtherProperties"  class="control-label col-md-4  requiredField"> Other Properties<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <input type="hidden" value=0 name="OtherPropertiesTV">
                                        <input type="hidden" value=0 name="OtherPropertiesRef">
                                        <input type="hidden" value=0 name="OtherPropertiesStereoComponent">
                                        <input type="hidden" value=0 name="OtherPropertiesGasRange">
                                        <input type="hidden" value=0 name="OtherPropertiesMotorcycle">
                                        <input type="hidden" value=0 name="OtherPropertiesComputer">
                                        <input type="hidden" value=0 name="OtherPropertiesFarmlot">
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesTV" id="id_OtherPropertiesTV" value=1 {{ old('OtherPropertiesTV') == 1 ? 'checked' : '' }}  style="margin-bottom: 10px">TV</label>
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesRef" id="id_OtherPropertiesRef" value=1 {{ old('OtherPropertiesRef') == 1 ? 'checked' : '' }} style="margin-bottom: 10px">Ref</label>
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesStereoComponent" id="id_OtherPropertiesStereoComponent" value=1 {{ old('OtherPropertiesStereoComponent') == 1 ? 'checked' : '' }} style="margin-bottom: 10px">Stereo/Component</label>
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesGasRange" id="id_OtherPropertiesGasRange" value=1 {{ old('OtherPropertiesGasRange') == 1 ? 'checked' : '' }} style="margin-bottom: 10px">Gas Range</label>
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesMotorcycle" id="id_OtherPropertiesMotorcycle" value=1 {{ old('OtherPropertiesMotorcycle') == 1 ? 'checked' : '' }} style="margin-bottom: 10px">Motorcycle</label>
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesComputer" id="id_OtherPropertiesComputer" value=1 {{ old('OtherPropertiesComputer') == 1 ? 'checked' : '' }} style="margin-bottom: 10px">Computers</label>
                                        <label class="check-inline"> <input type="checkbox" name="OtherPropertiesFarmlot" id="id_OtherPropertiesFarmlot" value=1 {{ old('OtherPropertiesFarmlot') == 1 ? 'checked' : '' }} style="margin-bottom: 10px">Farm/Lot</label>
                                </div>
                            </div>
                            <div id="div_id_FarmLot" class="form-group required" style="display:none">
                                <label for="FarmLotLabel" style="margin-bottom: 30px; color:red"> Enter Farm/Lot information:</label>

                                <div id="div_id_FarmLotAddress" class="form-group required" >
                                    <label for="id_FarmLotAddress" class="control-label col-md-4  requiredField" style="color: red"> Farm/Lot Address<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md  textinput textInput form-control overflow-auto @error('FarmLotAddress') is-invalid @enderror" id="id_FarmLotAddress" name="FarmLotAddress" value="{{ old('FarmLotAddress') }}" placeholder="Farm/Lot Address" style="margin-bottom: 10px" type="text" />
                                        @error('FarmLotAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="div_id_FarmLotSize" class="form-group required">
                                    <label for="id_FarmLotSize" class="control-label col-md-4  requiredField" style="color: red"> Farm/Lot Size<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md  textinput textInput form-control @error('FarmLotSize') is-invalid @enderror" id="id_FarmLotSize" maxlength="30" name="FarmLotSize" value="{{ old('FarmLotSize') }}" placeholder="Farm/Lot Size" style="margin-bottom: 10px" type="text" />
                                        @error('FarmLotSize')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="div_id_ProvincialAddress" class="form-group required">
                                <label for="id_ProvincialAddress" class="control-label col-md-4  requiredField"> Provincial Address<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control overflow-auto @error('ProvincialAddress') is-invalid @enderror" id="id_ProvincialAddress"  name="ProvincialAddress" value="{{ old('ProvincialAddress') }}" placeholder="Enter your Provincial Address" style="margin-bottom:10px;" type="text" />
                                    @error('ProvincialAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_HomePhoneNumber" class="form-group required">
                                <label for="id_HomePhoneNumber" class="control-label col-md-4  requiredField"> Home Number<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('HomePhoneNumber') is-invalid @enderror" id="id_HomePhoneNumber" maxlength="30" name="HomePhoneNumber" value="{{ old('HomePhoneNumber') }}" placeholder="Enter your Home Phone Number" style="margin-bottom: 10px" type="number" />
                                    @error('HomePhoneNumber')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_OfficePhoneNumber" class="form-group required">
                                <label for="id_OfficePhoneNumber" class="control-label col-md-4  requiredField"> Office Number<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('OfficePhoneNumber') is-invalid @enderror" id="id_OfficePhoneNumber" maxlength="30" name="OfficePhoneNumber" value="{{ old('OfficePhoneNumber') }}" placeholder="Enter your Office Number" style="margin-bottom: 10px" type="number" />
                                    @error('OfficePhoneNumber')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_MobileNumber" class="form-group required">
                                <label for="id_MobileNumber" class="control-label col-md-4  requiredField"> Mobile Number<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control @error('MobileNumber') is-invalid @enderror" id="id_MobileNumber" maxlength="30" name="MobileNumber" value="{{ old('MobileNumber') }}" placeholder="Enter your Mobile Number" style="margin-bottom: 10px" type="number" />
                                    @error('MobileNumber')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_email" class="form-group required">
                                <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md emailinput form-control @error('email') is-invalid @enderror" id="id_email" name="email" value="{{ old('email') }}" placeholder="Your current email address" style="margin-bottom: 10px" type="email" />
                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>     
                            </div>
                            
                            <div id="div_id_Spouse" class="form-group required">
                                <label for="id_Spouse" class="control-label col-md-4  requiredField"> Spouse Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md Spouseinput form-control @error('Spouse') is-invalid @enderror" id="id_Spouse" name="Spouse" value="{{ old('Spouse') }}" placeholder="Enter Spouse Name" style="margin-bottom: 10px" type="text" />
                                    @error('Spouse')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>

                            <div style="display:none" id="div_id_SpouseBlock">
                                <label for="FarmLotLabel" style="margin-bottom: 30px; color:red"> Enter Spouse information:</label>

                                <div id="div_id_SpouseAge" class="form-group required">
                                    <label for="id_SpouseAge" class="control-label col-md-4  requiredField" style="color: red"> Spouse's Age<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseAge input form-control @error('SpouseAge') is-invalid @enderror" id="id_SpouseAge" name="SpouseAge" value="{{ old('SpouseAge') }}" placeholder="Enter Spouse's Age" style="margin-bottom: 10px" type="number" />
                                        @error('SpouseAge')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
                                
                                <div id="div_id_SpouseProvincialAddress" class="form-group required">
                                    <label for="id_SpouseProvincialAddress" class="control-label col-md-4  requiredField" style="color: red">Provincial Address <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseProvincialAddress input form-control @error('SpouseProvincialAddress') is-invalid @enderror" id="id_SpouseProvincialAddress" name="SpouseProvincialAddress" value="{{ old('SpouseProvincialAddress') }}" placeholder="Enter Spouse's Provincial Address" style="margin-bottom: 10px" type="text" />
                                        @error('SpouseProvincialAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
                                
                                <div id="div_id_SpouseMobileNumber" class="form-group required">
                                    <label for="id_SpouseMobileNumber" class="control-label col-md-4  requiredField" style="color: red">Mobile Number <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseMobileNumber input form-control @error('SpouseMobileNumber') is-invalid @enderror" id="id_SpouseMobileNumber" name="SpouseMobileNumber" value="{{ old('SpouseMobileNumber') }}" placeholder="Enter Spouse's Mobile Number" style="margin-bottom: 10px" type="number" />
                                        @error('SpouseMobileNumber')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
                                
                                <div id="div_id_SpouseEmail" class="form-group required">
                                    <label for="id_SpouseEmail" class="control-label col-md-4  requiredField" style="color: red">Spouse's E-mail<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseEmailinput form-control @error('SpouseEmail') is-invalid @enderror" id="id_SpouseEmail" name="SpouseEmail" value="{{ old('SpouseEmail') }}" placeholder="Enter Your current Spouse's Email address" style="margin-bottom: 10px" type="email" />
                                        @error('SpouseEmail')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
                                
                                <div id="div_id_SpouseEmployer" class="form-group required">
                                    <label for="id_SpouseEmployer" class="control-label col-md-4  requiredField" style="color: red">Employer <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseEmployer input form-control @error('SpouseEmployer') is-invalid @enderror" id="id_SpouseEmployer" name="SpouseEmployer" value="{{ old('SpouseEmployer') }}" placeholder="Enter Spouse's Employer" style="margin-bottom: 10px" type="text" />
                                        @error('SpouseEmployer')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>

                                <div id="div_id_SpousePosition" class="form-group required">
                                    <label for="id_SpousePosition" class="control-label col-md-4  requiredField" style="color: red">Position <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpousePosition input form-control @error('SpousePosition') is-invalid @enderror" id="id_SpousePosition" name="SpousePosition" value="{{ old('SpousePosition') }}" placeholder="Enter Spouse's Spouse's Position" style="margin-bottom: 10px" type="text" />
                                        @error('SpousePosition')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>

                                <div id="div_id_SpouseJobAddress" class="form-group required">
                                    <label for="id_SpouseJobAddress" class="control-label col-md-4  requiredField" style="color: red">Job Address <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseJobAddress input form-control @error('SpouseJobAddress') is-invalid @enderror" id="id_SpouseJobAddress" name="SpouseJobAddress" value="{{ old('SpouseJobAddress') }}" placeholder="Enter Spouse's Spouse Job Address" style="margin-bottom: 10px" type="text" />
                                        @error('SpouseJobAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>

                                <div id="div_id_SpouseWorkTelNum" class="form-group required">
                                    <label for="id_SpouseWorkTelNum" class="control-label col-md-4  requiredField" style="color: red">Work Telephone <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseWorkTelNum input form-control @error('SpouseWorkTelNum') is-invalid @enderror" id="id_SpouseWorkTelNum" name="SpouseWorkTelNum" value="{{ old('SpouseWorkTelNum') }}" placeholder="Enter Spouse's Work Telephone" style="margin-bottom: 10px" type="number" />
                                        @error('SpouseWorkTelNum')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>

                                <div id="div_id_SpouseDateEmployed" class="form-group required">
                                    <label for="id_SpouseDateEmployed" class="control-label col-md-4  requiredField" style="color: red">Date Employed <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input type="date" class="input-md  textinput textInput form-control" id="id_SpouseDateEmployed" maxlength="30" name="SpouseDateEmployed" value="{{ old('SpouseDateEmployed') }}" placeholder="Enter your Issue date" 
                                        min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                        @error('SpouseDateEmployed')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
                            

                                <div id="div_id_SpouseSalary" class="form-group required">
                                    <label for="id_SpouseSalary" class="control-label col-md-4  requiredField" style="color: red">Spouse's Salary <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md SpouseSalary input form-control @error('SpouseSalary') is-invalid @enderror" id="id_SpouseSalary" name="SpouseSalary" value="{{ old('SpouseSalary') }}" placeholder="Enter Spouse'sSpouse's  Salary" style="margin-bottom: 10px" type="number" />
                                        @error('SpouseSalary')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>

                            </div>

                            <div id="div_id_NumberDependents" class="form-group required">
                               <label for="id_NumberDependents" class="control-label col-md-4  requiredField">Dependents<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md NumberDependents input form-control @error('NumberDependents') is-invalid @enderror" id="id_NumberDependents" value="{{ old('NumberDependents') }}" name="NumberDependents" placeholder="Enter the number of Dependents (0-4)" style="margin-bottom: 10px" type="text" />
                                    @error('NumberDependents')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>     
                            </div>

                            <div class="" style="display:none" id="dependent1">
                            <div id="div_id_DependentName1" class="form-group required">
                                <label for="id_DependentName1" style="color: red" class="control-label col-md-4  requiredField">1st Dependent<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentName1 input form-control @error('DependentName1') is-invalid @enderror" id="id_DependentName1" name="DependentName1" value="{{ old('DependentName1') }}" placeholder="Enter Dependent Name" style="margin-bottom: 10px" type="text" />
                                     @error('DependentName1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             
                             <div id="div_id_DependentAge1" class="form-group required">
                                <label for="id_DependentAge1" style="color: red" class="control-label col-md-4  requiredField">1st Dependent Age<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentAge1 input form-control @error('DependentAge1') is-invalid @enderror" id="id_DependentAge1" name="DependentAge1" value="{{ old('DependentAge1') }}" placeholder="Enter Dependent Age" style="margin-bottom: 10px" type="number" />
                                     @error('DependentAge1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentGradeOcc1" class="form-group required">
                                <label for="id_DependentGradeOcc1" style="color: red" class="control-label col-md-4  requiredField">1st Dpndt Grade<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentGradeOcc1 input form-control @error('DependentGradeOcc1') is-invalid @enderror" id="id_DependentGradeOcc1" name="DependentGradeOcc1" value="{{ old('DependentGradeOcc1') }}" placeholder="Enter Dependent Grade/Occupation Position" style="margin-bottom: 10px" type="text" />
                                     @error('DependentGradeOcc1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentSchoolComp1" class="form-group required">
                                <label for="id_DependentSchoolComp1" style="color: red" class="control-label col-md-4  requiredField">1st Dpndt School<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentSchoolComp1 input form-control @error('DependentSchoolComp1') is-invalid @enderror" id="id_DependentSchoolComp1" name="DependentSchoolComp1" value="{{ old('DependentSchoolComp1') }}" placeholder="Enter Dependent School/Company" style="margin-bottom: 10px" type="text" />
                                     @error('DependentSchoolComp1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>


                            </div>

                            <div class="" style="display:none" id="dependent2">
                             <div id="div_id_DependentName2" class="form-group required">
                                <label for="id_DependentName2" style="color: red" class="control-label col-md-4  requiredField">2nd Dependent<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentName2 input form-control @error('DependentName2') is-invalid @enderror" id="id_DependentName2" name="DependentName2" value="{{ old('DependentName2') }}" placeholder="Enter Dependent Name" style="margin-bottom: 10px" type="text" />
                                     @error('DependentName2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentAge2" class="form-group required">
                                <label for="id_DependentAge2" style="color: red" class="control-label col-md-4  requiredField">2nd Dependent Age<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentAge2 input form-control @error('DependentAge2') is-invalid @enderror" id="id_DependentAge2" name="DependentAge2" value="{{ old('DependentAge2') }}" placeholder="Enter Dependent Age" style="margin-bottom: 10px" type="number" />
                                     @error('DependentAge2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentGradeOcc2" class="form-group required">
                                <label for="id_DependentGradeOcc2" style="color: red" class="control-label col-md-4  requiredField">2nd Dpndt Grade<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentGradeOcc2 input form-control @error('DependentGradeOcc2') is-invalid @enderror" id="id_DependentGradeOcc2" name="DependentGradeOcc2" value="{{ old('DependentGradeOcc2') }}" placeholder="Enter Dependent Grade/Occupation Position" style="margin-bottom: 10px" type="text" />
                                     @error('DependentGradeOcc2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentSchoolComp2" class="form-group required">
                                <label for="id_DependentSchoolComp2" style="color: red" class="control-label col-md-4  requiredField">2nd Dpndt School<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentSchoolComp2 input form-control @error('DependentSchoolComp2') is-invalid @enderror" id="id_DependentSchoolComp2" name="DependentSchoolComp2" value="{{ old('DependentSchoolComp2') }}" placeholder="Enter Dependent School/Company" style="margin-bottom: 10px" type="text" />
                                     @error('DependentSchoolComp2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                            </div>

                             <div class="" style="display:none" id="dependent3">
                             <div id="div_id_DependentName3" class="form-group required">
                                <label for="id_DependentName3" style="color: red" class="control-label col-md-4  requiredField">3rd Dependent<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentName3 input form-control @error('DependentName3') is-invalid @enderror" id="id_DependentName3" name="DependentName3" value="{{ old('DependentName3') }}" placeholder="Enter Dependent Name" style="margin-bottom: 10px" type="text" />
                                     @error('DependentName3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentAge3" class="form-group required">
                                <label for="id_DependentAge3" style="color: red" class="control-label col-md-4  requiredField">3rd Dependent Age<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentAge3 input form-control @error('DependentAge3') is-invalid @enderror" id="id_DependentAge3" name="DependentAge3" value="{{ old('DependentAge3') }}" placeholder="Enter Dependent Age" style="margin-bottom: 10px" type="number" />
                                     @error('DependentAge3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentGradeOcc3" class="form-group required">
                                <label for="id_DependentGradeOcc3" style="color: red" class="control-label col-md-4  requiredField">3rd Dpndt Grade<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentGradeOcc3 input form-control @error('DependentGradeOcc3') is-invalid @enderror" id="id_DependentGradeOcc3" name="DependentGradeOcc3" value="{{ old('DependentGradeOcc3') }}" placeholder="Enter Dependent Grade/Occupation Position" style="margin-bottom: 10px" type="text" />
                                     @error('DependentGradeOcc3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>

                             <div id="div_id_DependentSchoolComp3" class="form-group required">
                                <label for="id_DependentSchoolComp3" style="color: red" class="control-label col-md-4  requiredField">3rd Dpndt School<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md DependentSchoolComp3 input form-control @error('DependentSchoolComp3') is-invalid @enderror" id="id_DependentSchoolComp3" name="DependentSchoolComp3" value="{{ old('DependentSchoolComp3') }}" placeholder="Enter Dependent School/Company" style="margin-bottom: 10px" type="text" />
                                     @error('DependentSchoolComp3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                             </div>
                            </div>

                            <div class="" style="display:none" id="dependent4">
                                <div id="div_id_DependentName4" class="form-group required">
                                   <label for="id_DependentName4" style="color: red" class="control-label col-md-4  requiredField">4th Dependent<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md DependentName4 input form-control @error('DependentName4') is-invalid @enderror" id="id_DependentName4" name="DependentName4" value="{{ old('DependentName4') }}" placeholder="Enter Dependent Name" style="margin-bottom: 10px" type="text" />
                                        @error('DependentName4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
   
                                <div id="div_id_DependentAge4" class="form-group required">
                                   <label for="id_DependentAge4" style="color: red" class="control-label col-md-4  requiredField">4th Dependent Age<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md DependentAge4 input form-control @error('DependentAge4') is-invalid @enderror" id="id_DependentAge4" name="DependentAge4" value="{{ old('DependentAge4') }}" placeholder="Enter Dependent Age" style="margin-bottom: 10px" type="number" />
                                        @error('DependentAge4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
   
                                <div id="div_id_DependentGradeOcc4" class="form-group required">
                                   <label for="id_DependentGradeOcc4" style="color: red" class="control-label col-md-4  requiredField">4th Dpndt Grade<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md DependentGradeOcc4 input form-control @error('DependentGradeOcc4') is-invalid @enderror" id="id_DependentGradeOcc4" name="DependentGradeOcc4" value="{{ old('DependentGradeOcc4') }}" placeholder="Enter Dependent Grade/Occupation Position" style="margin-bottom: 10px" type="text" />
                                        @error('DependentGradeOcc4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
   
                                <div id="div_id_DependentSchoolComp4" class="form-group required">
                                   <label for="id_DependentSchoolComp4" style="color: red" class="control-label col-md-4  requiredField">4th Dpndt School<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8">
                                        <input class="input-md DependentSchoolComp4 input form-control @error('DependentSchoolComp4') is-invalid @enderror" id="id_DependentSchoolComp4" name="DependentSchoolComp4" value="{{ old('DependentSchoolComp4') }}" placeholder="Enter Dependent School/Company" style="margin-bottom: 10px" type="text" />
                                        @error('DependentSchoolComp4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                                </div>
                            </div>

                            <div id="div_id_Father" class="form-group required">
                                <label for="id_Father" class="control-label col-md-4  requiredField"> Father's Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md Fatherinput form-control @error('Father') is-invalid @enderror" id="id_Father" name="Father" value="{{ old('Father') }}" placeholder="Enter Father's Name" style="margin-bottom: 10px" type="text" />
                                    @error('Father')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>

                            <div id="div_id_Mother" class="form-group required">
                                <label for="id_Mother" class="control-label col-md-4  requiredField"> Mother's Name<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md Motherinput form-control @error('Mother') is-invalid @enderror" id="id_Mother" name="Mother" value="{{ old('Mother') }}" placeholder="Enter Mother's Name" style="margin-bottom: 10px" type="text" />
                                    @error('Mother')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>

                            <div id="div_id_ParentAddresss" class="form-group required">
                                <label for="id_ParentAddresss" class="control-label col-md-4  requiredField"> Parent Address<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md ParentAddresssinput form-control @error('ParentAddresss') is-invalid @enderror" id="id_ParentAddresss" name="ParentAddresss" value="{{ old('ParentAddresss') }}" placeholder="Enter Parent's Addresss" style="margin-bottom: 10px" type="text" />
                                    @error('ParentAddresss')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>
                            
                            <div id="div_id_ParentNumber" class="form-group required">
                                <label for="id_ParentNumber" class="control-label col-md-4  requiredField"> Parent's Number<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md ParentNumberinput form-control @error('ParentNumber') is-invalid @enderror" id="id_ParentNumber" name="ParentNumber" value="{{ old('ParentNumber') }}" placeholder="Enter Parent's Tel/Mobile No." style="margin-bottom: 10px" type="number" />
                                    @error('ParentNumber')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>

                            <div id="div_id_SourceIncome" class="form-group required">
                                <label for="id_SourceIncome"  class="control-label col-md-4  requiredField">Source of Income<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="SourceIncome" class="SourceIncomeRadio" id="id_SourceIncome_1" value="SelfEmployedBusiness" {{ old('SourceIncome') == "SelfEmployedBusiness" ? 'checked' : ''  }} style="margin-bottom: 10px">Self-Employed/Business</label>
                                        <label class="radio-inline"> <input type="radio" name="SourceIncome" class="SourceIncomeRadio" id="id_SourceIncome_2" value="Employed" {{ old('SourceIncome') == "Employed" ? 'checked' : ''  }} style="margin-bottom: 10px">Employed</label>
                                        <label class="radio-inline"> <input type="radio" name="SourceIncome" class="SourceIncomeRadio" id="id_SourceIncome_3" value="Allotment" {{ old('SourceIncome') == "Allotment" ? 'checked' : ''  }}  style="margin-bottom: 10px">Allotment</label>
                                        <label class="radio-inline"> <input type="radio" name="SourceIncome" class="SourceIncomeRadio" id="id_SourceIncome_4" value="Provided_by" {{ old('SourceIncome') == "Provided_by" ? 'checked' : ''  }} style="margin-bottom: 10px">Provided by</label>
                                        @error('SourceIncome')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_ProvidedBy" style="display: none" class="form-group required">
                                <label for="id_ProvidedBy" style="color:red" class="control-label col-md-4  requiredField"> Provided By<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md ProvidedByinput form-control @error('ProvidedBy') is-invalid @enderror" id="id_ProvidedBy" name="ProvidedBy" value="{{ old('ProvidedBy') }}" placeholder="Enter name" style="margin-bottom: 10px" type="text" />
                                    @error('ProvidedBy')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>

                            <div id="div_id_NumberCreditRef" class="form-group required">
                                <label for="id_NumberCreditRef" class="control-label col-md-4  requiredField">Credit Referece<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md NumberCreditRef input form-control @error('NumberCreditRef') is-invalid @enderror" id="id_NumberCreditRef" value="{{ old('NumberCreditRef') }}" name="NumberCreditRef" placeholder="Enter the number of Credit Referece (0-4)" style="margin-bottom: 10px" type="text" />
                                     @error('NumberCreditRef')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div class="" style="display:none" id="CreditRef1">
                                <div id="div_id_StoreBank1" class="form-group required">
                                    <label for="id_StoreBank1" style="color:red" class="control-label col-md-4  requiredField">Store/Bank 1<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md StoreBank1 input form-control @error('StoreBank1') is-invalid @enderror" id="id_StoreBank1" name="StoreBank1" value="{{ old('StoreBank1') }}" placeholder="Enter Stone/Bank name" style="margin-bottom: 10px" type="text" />
                                         @error('StoreBank1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_ItemLoadAmount1" class="form-group required">
                                    <label for="id_ItemLoadAmount1" class="control-label col-md-4  requiredField">Item/Loan Amount<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md ItemLoadAmount1 input form-control @error('ItemLoadAmount1') is-invalid @enderror" id="id_ItemLoadAmount1" name="ItemLoadAmount1" value="{{ old('ItemLoadAmount1') }}" placeholder="Enter Item/Loan Amount" style="margin-bottom: 10px" type="number" />
                                         @error('ItemLoadAmount1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_Term1" class="form-group required">
                                    <label for="id_Term1" class="control-label col-md-4  requiredField">Term<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md Term1 input form-control @error('Term1') is-invalid @enderror" id="id_Term1" name="Term1" value="{{ old('Term1') }}" placeholder="Enter Term" style="margin-bottom: 10px" type="text" />
                                         @error('Term1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditDate1" class="form-group required">
                                    <label for="id_CreditDate1" class="control-label col-md-4  requiredField">Date<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input type="date" class="input-md  textinput textInput form-control" id="id_CreditDate1" maxlength="30" name="CreditDate1" value="{{ old('CreditDate1') }}" placeholder="Enter your Credit date" 
                                          min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                         @error('CreditDate1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditBalance1" class="form-group required">
                                    <label for="id_CreditBalance1" class="control-label col-md-4  requiredField">Balance<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md CreditBalance1 input form-control @error('CreditBalance1') is-invalid @enderror" id="id_CreditBalance1" name="CreditBalance1" value="{{ old('CreditBalance1') }}" placeholder="Enter Balance" style="margin-bottom: 10px" type="number" />
                                         @error('CreditBalance1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>
                            </div>

                            <div class="" style="display:none" id="CreditRef2">
                                <div id="div_id_StoreBank2" class="form-group required">
                                    <label for="id_StoreBank2" style="color:red" class="control-label col-md-4  requiredField">Store/Bank 2<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md StoreBank2 input form-control @error('StoreBank2') is-invalid @enderror" id="id_StoreBank2" name="StoreBank2" value="{{ old('StoreBank2') }}" placeholder="Enter Stone/Bank name" style="margin-bottom: 10px" type="text" />
                                         @error('StoreBank2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_ItemLoadAmount2" class="form-group required">
                                    <label for="id_ItemLoadAmount2"  class="control-label col-md-4  requiredField">Item/Loan Amount<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md ItemLoadAmount2 input form-control @error('ItemLoadAmount2') is-invalid @enderror" id="id_ItemLoadAmount2" name="ItemLoadAmount2" value="{{ old('ItemLoadAmount2') }}" placeholder="Enter Item/Loan Amount" style="margin-bottom: 10px" type="number" />
                                         @error('ItemLoadAmount2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_Term2" class="form-group required">
                                    <label for="id_Term2"  class="control-label col-md-4  requiredField">Term<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md Term2 input form-control @error('Term2') is-invalid @enderror" id="id_Term2" name="Term2" value="{{ old('Term2') }}" placeholder="Enter Term" style="margin-bottom: 10px" type="text" />
                                         @error('Term2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditDate2" class="form-group required">
                                    <label for="id_CreditDate2"  class="control-label col-md-4  requiredField">Date<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                        <input type="date" class="input-md  textinput textInput form-control" id="id_CreditDate2" maxlength="30" name="CreditDate2" value="{{ old('CreditDate2') }}" placeholder="Enter your Credit date" 
                                        min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                         @error('CreditDate2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditBalance2" class="form-group required">
                                    <label for="id_CreditBalance2"  class="control-label col-md-4  requiredField">Balance<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md CreditBalance2 input form-control @error('CreditBalance2') is-invalid @enderror" id="id_CreditBalance2" name="CreditBalance2" value="{{ old('CreditBalance2') }}" placeholder="Enter Balance" style="margin-bottom: 10px" type="number" />
                                         @error('CreditBalance2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>
                            </div>

                            <div class="" style="display:none" id="CreditRef3">
                                <div id="div_id_StoreBank3" class="form-group required">
                                    <label for="id_StoreBank3" style="color:red" class="control-label col-md-4  requiredField">Store/Bank 3<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md StoreBank3 input form-control @error('StoreBank3') is-invalid @enderror" id="id_StoreBank3" name="StoreBank3" value="{{ old('StoreBank3') }}" placeholder="Enter Stone/Bank name" style="margin-bottom: 10px" type="text" />
                                         @error('StoreBank3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_ItemLoadAmount3" class="form-group required">
                                    <label for="id_ItemLoadAmount3"  class="control-label col-md-4  requiredField">Item/Loan Amount<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md ItemLoadAmount3 input form-control @error('ItemLoadAmount3') is-invalid @enderror" id="id_ItemLoadAmount3" name="ItemLoadAmount3" value="{{ old('ItemLoadAmount3') }}" placeholder="Enter Item/Loan Amount" style="margin-bottom: 10px" type="number" />
                                         @error('ItemLoadAmount3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_Term3" class="form-group required">
                                    <label for="id_Term3"  class="control-label col-md-4  requiredField">Term<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md Term3 input form-control @error('Term3') is-invalid @enderror" id="id_Term3" name="Term3" value="{{ old('Term3') }}" placeholder="Enter Term" style="margin-bottom: 10px" type="text" />
                                         @error('Term3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditDate3" class="form-group required">
                                    <label for="id_CreditDate3"  class="control-label col-md-4  requiredField">Date<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                        <input type="date" class="input-md  textinput textInput form-control" id="id_CreditDate3" maxlength="30" name="CreditDate3" value="{{ old('CreditDate3') }}" placeholder="Enter your Credit date" 
                                        min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                         @error('CreditDate3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditBalance3" class="form-group required">
                                    <label for="id_CreditBalance3"  class="control-label col-md-4  requiredField">Balance<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md CreditBalance3 input form-control @error('CreditBalance3') is-invalid @enderror" id="id_CreditBalance3" name="CreditBalance3" value="{{ old('CreditBalance3') }}" placeholder="Enter Balance" style="margin-bottom: 10px" type="number" />
                                         @error('CreditBalance3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>
                            </div>

                            <div class="" style="display:none" id="CreditRef4">
                                <div id="div_id_StoreBank4" class="form-group required">
                                    <label for="id_StoreBank4" style="color:red" class="control-label col-md-4  requiredField">Store/Bank 4<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md StoreBank4 input form-control @error('StoreBank4') is-invalid @enderror" id="id_StoreBank4" name="StoreBank4" value="{{ old('StoreBank4') }}" placeholder="Enter Stone/Bank name" style="margin-bottom: 10px" type="text" />
                                         @error('StoreBank4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_ItemLoadAmount4" class="form-group required">
                                    <label for="id_ItemLoadAmount4" class="control-label col-md-4  requiredField">Item/Loan Amount<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md ItemLoadAmount4 input form-control @error('ItemLoadAmount4') is-invalid @enderror" id="id_ItemLoadAmount4" name="ItemLoadAmount4" value="{{ old('ItemLoadAmount4') }}" placeholder="Enter Item/Loan Amount" style="margin-bottom: 10px" type="number" />
                                         @error('ItemLoadAmount4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_Term4" class="form-group required">
                                    <label for="id_Term4" class="control-label col-md-4  requiredField">Term<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md Term4 input form-control @error('Term4') is-invalid @enderror" id="id_Term4" name="Term4" value="{{ old('Term4') }}" placeholder="Enter Term" style="margin-bottom: 10px" type="text" />
                                         @error('Term4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditDate4" class="form-group required">
                                    <label for="id_CreditDate4" class="control-label col-md-4  requiredField">Date<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                        <input type="date" class="input-md  textinput textInput form-control" id="id_CreditDate4" maxlength="30" name="CreditDate4" value="{{ old('CreditDate4') }}" placeholder="Enter your Credit date" 
                                        min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                         @error('CreditDate4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>

                                <div id="div_id_CreditBalance4" class="form-group required">
                                    <label for="id_CreditBalance4" class="control-label col-md-4  requiredField">Balance<span class="asteriskField">*</span> </label>
                                     <div class="controls col-md-8">
                                         <input class="input-md CreditBalance4 input form-control @error('CreditBalance4') is-invalid @enderror" id="id_CreditBalance4" name="CreditBalance4" value="{{ old('CreditBalance4') }}" placeholder="Enter Balance" style="margin-bottom: 10px" type="number" />
                                         @error('CreditBalance4')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>     
                                </div>
                            </div>

                            <div id="div_id_PersonalReferenceName1" class="form-group required">
                                <label for="id_PersonalReferenceName1" class="control-label col-md-4  requiredField">Prsnal Ref Name 1<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceName1 input form-control @error('PersonalReferenceName1') is-invalid @enderror" id="id_PersonalReferenceName1" name="PersonalReferenceName1" value="{{ old('PersonalReferenceName1') }}" placeholder="Enter Personal Reference:Name" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceName1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceRelationship1" class="form-group required">
                                <label for="id_PersonalReferenceRelationship1" class="control-label col-md-4  requiredField">Relastionship 1<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceRelationship1 input form-control @error('PersonalReferenceRelationship1') is-invalid @enderror" id="id_PersonalReferenceRelationship1" name="PersonalReferenceRelationship1" value="{{ old('PersonalReferenceRelationship1') }}" placeholder="Enter Personal Reference:Relationship" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceRelationship1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceNumber1" class="form-group required">
                                <label for="id_PersonalReferenceNumber1" class="control-label col-md-4  requiredField">Telephone 1<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceNumber1 input form-control @error('PersonalReferenceNumber1') is-invalid @enderror" id="id_PersonalReferenceNumber1" name="PersonalReferenceNumber1" value="{{ old('PersonalReferenceNumber1') }}" placeholder="Enter Personal Reference:Telephone" style="margin-bottom: 10px" type="number" />
                                     @error('PersonalReferenceNumber1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceAddress1" class="form-group required">
                                <label for="id_PersonalReferenceAddress1" class="control-label col-md-4  requiredField">Address 1<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceAddress1 input form-control @error('PersonalReferenceAddress1') is-invalid @enderror" id="id_PersonalReferenceAddress1" name="PersonalReferenceAddress1" value="{{ old('PersonalReferenceAddress1') }}" placeholder="Enter Personal Reference:Address" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceAddress1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceName2" class="form-group required">
                                <label for="id_PersonalReferenceName2" class="control-label col-md-4  requiredField">Prsnal Ref Name 2<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceName2 input form-control @error('PersonalReferenceName2') is-invalid @enderror" id="id_PersonalReferenceName2" name="PersonalReferenceName2" value="{{ old('PersonalReferenceName2') }}" placeholder="Enter Personal Reference:Name" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceName2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceRelationship2" class="form-group required">
                                <label for="id_PersonalReferenceRelationship2" class="control-label col-md-4  requiredField">Relastionship 2<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceRelationship2 input form-control @error('PersonalReferenceRelationship2') is-invalid @enderror" id="id_PersonalReferenceRelationship2" name="PersonalReferenceRelationship2" value="{{ old('PersonalReferenceRelationship2') }}" placeholder="Enter Personal Reference:Relationship" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceRelationship2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceNumber2" class="form-group required">
                                <label for="id_PersonalReferenceNumber2" class="control-label col-md-4  requiredField">Telephone 2<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceNumber2 input form-control @error('PersonalReferenceNumber2') is-invalid @enderror" id="id_PersonalReferenceNumber2" name="PersonalReferenceNumber2" value="{{ old('PersonalReferenceNumber2') }}" placeholder="Enter Personal Reference:Telephone" style="margin-bottom: 10px" type="number" />
                                     @error('PersonalReferenceNumber2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceAddress2" class="form-group required">
                                <label for="id_PersonalReferenceAddress2" class="control-label col-md-4  requiredField">Address 2<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceAddress2 input form-control @error('PersonalReferenceAddress2') is-invalid @enderror" id="id_PersonalReferenceAddress2" name="PersonalReferenceAddress2" value="{{ old('PersonalReferenceAddress2') }}" placeholder="Enter Personal Reference:Address" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceAddress2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceName3" class="form-group required">
                                <label for="id_PersonalReferenceName3" class="control-label col-md-4  requiredField">Prsnal Ref Name 3<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceName3 input form-control @error('PersonalReferenceName3') is-invalid @enderror" id="id_PersonalReferenceName3" name="PersonalReferenceName3" value="{{ old('PersonalReferenceName3') }}" placeholder="Enter Personal Reference:Name" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceName3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceRelationship3" class="form-group required">
                                <label for="id_PersonalReferenceRelationship3" class="control-label col-md-4  requiredField">Relastionship 3<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceRelationship3 input form-control @error('PersonalReferenceRelationship3') is-invalid @enderror" id="id_PersonalReferenceRelationship3" name="PersonalReferenceRelationship3" value="{{ old('PersonalReferenceRelationship3') }}" placeholder="Enter Personal Reference:Relationship" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceRelationship3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceNumber3" class="form-group required">
                                <label for="id_PersonalReferenceNumber3" class="control-label col-md-4  requiredField">Telephone 3<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceNumber3 input form-control @error('PersonalReferenceNumber3') is-invalid @enderror" id="id_PersonalReferenceNumber3" name="PersonalReferenceNumber3" value="{{ old('PersonalReferenceNumber3') }}" placeholder="Enter Personal Reference:Telephone" style="margin-bottom: 10px" type="number" />
                                     @error('PersonalReferenceNumber3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_PersonalReferenceAddress3" class="form-group required">
                                <label for="id_PersonalReferenceAddress3" class="control-label col-md-4  requiredField">Address 3<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md PersonalReferenceAddress3 input form-control @error('PersonalReferenceAddress3') is-invalid @enderror" id="id_PersonalReferenceAddress3" name="PersonalReferenceAddress3" value="{{ old('PersonalReferenceAddress3') }}" placeholder="Enter Personal Reference:Address" style="margin-bottom: 10px" type="text" />
                                     @error('PersonalReferenceAddress3')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_EmployerName" class="form-group required">
                                <label for="id_EmployerName" class="control-label col-md-4  requiredField">Employer's Name<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md EmployerName input form-control @error('EmployerName') is-invalid @enderror" id="id_EmployerName" name="EmployerName" value="{{ old('EmployerName') }}" placeholder="Enter Employer's Name" style="margin-bottom: 10px" type="text" />
                                     @error('EmployerName')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_WorkPosition" class="form-group required">
                                <label for="id_WorkPosition" class="control-label col-md-4  requiredField">Position in work<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md WorkPosition input form-control @error('WorkPosition') is-invalid @enderror" id="id_WorkPosition" name="WorkPosition" value="{{ old('WorkPosition') }}" placeholder="Enter your position in work" style="margin-bottom: 10px" type="text" />
                                     @error('WorkPosition')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_WorkAddress" class="form-group required">
                                <label for="id_WorkAddress" class="control-label col-md-4  requiredField">Work Address<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md WorkAddress input form-control @error('WorkAddress') is-invalid @enderror" id="id_WorkAddress" name="WorkAddress" value="{{ old('WorkAddress') }}" placeholder="Enter your work address" style="margin-bottom: 10px" type="text" />
                                     @error('WorkAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_WorkTelNumber" class="form-group required">
                                <label for="id_WorkTelNumber" class="control-label col-md-4  requiredField">Work Tel No.<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md WorkTelNumber input form-control @error('WorkTelNumber') is-invalid @enderror" id="id_WorkTelNumber" name="WorkTelNumber" value="{{ old('WorkTelNumber') }}" placeholder="Enter your work telephone number" style="margin-bottom: 10px" type="number" />
                                     @error('WorkTelNumber')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_DateEmployed" class="form-group required">
                                <label for="id_DateEmployed" class="control-label col-md-4  requiredField">Date Employed<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input type="date" class="input-md  textinput textInput form-control" id="id_DateEmployed" maxlength="30" name="DateEmployed" value="{{ old('DateEmployed') }}" placeholder="Enter your employ date" 
                                        min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" required/>
                                     @error('DateEmployed')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_Salary" class="form-group required">
                                <label for="id_Salary" class="control-label col-md-4  requiredField">Salary<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md Salary input form-control @error('Salary') is-invalid @enderror" id="id_Salary" name="Salary" value="{{ old('Salary') }}" placeholder="Enter Salary" style="margin-bottom: 10px" type="number" />
                                     @error('Salary')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_UnitToBeUsedFor" class="form-group required">
                                <label for="id_UnitToBeUsedFor"  class="control-label col-md-4  requiredField">Unit to be used for<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="UnitToBeUsedFor" id="id_UnitToBeUsedFor_1" value="Personal_Use" {{ old('UnitToBeUsedFor') == "Personal_Use" ? 'checked' : ''  }} style="margin-bottom: 10px">Personal Use</label>
                                        <label class="radio-inline"> <input type="radio" name="UnitToBeUsedFor" id="id_UnitToBeUsedFor_2" value="Business_Use" {{ old('UnitToBeUsedFor') == "Business_Use" ? 'checked' : ''  }} style="margin-bottom: 10px">Business Use</label>
                                        <label class="radio-inline"> <input type="radio" name="UnitToBeUsedFor" id="id_UnitToBeUsedFor_3" value="Gift" {{ old('UnitToBeUsedFor') == "Gift" ? 'checked' : ''  }} style="margin-bottom: 10px">Gift</label>
                                        <label class="radio-inline"> <input type="radio" name="UnitToBeUsedFor" id="id_UnitToBeUsedFor_4" value="Used_by_Relative/Friend" {{ old('UnitToBeUsedFor') == "Used_by_Relative/Friend" ? 'checked' : ''  }} style="margin-bottom: 10px">Used by Relative/Friend</label>
                                        @error('UnitToBeUsedFor')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_ModeOfPayment" class="form-group required">
                                <label for="id_ModeOfPayment"  class="control-label col-md-4  requiredField">Mode of payment<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="ModeOfPayment" id="id_ModeOfPayment_1" value="Post_Date_Checks" {{ old('ModeOfPayment') == "Post_Date_Checks" ? 'checked' : ''  }} style="margin-bottom: 10px">Post Date Checks</label>
                                        <label class="radio-inline"> <input type="radio" name="ModeOfPayment" id="id_ModeOfPayment_2" value="Cash_Paid_to_Office" {{ old('ModeOfPayment') == "Cash_Paid_to_Office" ? 'checked' : ''  }} style="margin-bottom: 10px">Cash Paid to Office</label>
                                        <label class="radio-inline"> <input type="radio" name="ModeOfPayment" id="id_ModeOfPayment_2" value="Cash_for_Collection" {{ old('ModeOfPayment') == "Cash_for_Collection" ? 'checked' : ''  }} style="margin-bottom: 10px">Cash for Collection</label>
                                        <label class="radio-inline"> <input type="radio" name="ModeOfPayment" id="id_ModeOfPayment_2" value="Credit_Card" {{ old('ModeOfPayment') == "Credit_Card" ? 'checked' : ''  }} style="margin-bottom: 10px">Credit Card</label>
                                        @error('ModeOfPayment')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            
                            <div id="div_id_CoMakerName" class="form-group required">
                                <label for="id_CoMakerName" class="control-label col-md-4  requiredField">Co-Maker Name<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerName input form-control @error('CoMakerName') is-invalid @enderror" id="id_CoMakerName" name="CoMakerName" value="{{ old('CoMakerName') }}" placeholder="Enter Co-Maker's Name" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerName')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>
                            
                            <div id="div_id_CoMakerAge" class="form-group required">
                                <label for="id_CoMakerAge" class="control-label col-md-4  requiredField">Co-Maker Age<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerAge input form-control @error('CoMakerAge') is-invalid @enderror" id="id_CoMakerAge" name="CoMakerAge" value="{{ old('CoMakerAge') }}" placeholder="Enter Co-Maker's Age" style="margin-bottom: 10px" type="number" max="100"/>
                                     @error('CoMakerAge')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerSex" class="form-group required">
                                <label for="id_CoMakerSex"  class="control-label col-md-4  requiredField">Co-Maker Sex<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="CoMakerSex" id="id_CoMakerSex_1" value="Male" {{ old('CoMakerSex') == "Male" ? 'checked' : ''  }} style="margin-bottom: 10px">Male</label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerSex" id="id_CoMakerSex_2" value="Female" {{ old('CoMakerSex') == "Female" ? 'checked' : ''  }} style="margin-bottom: 10px">Female </label>
                                        @error('CoMakerSex')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerAddress" class="form-group required">
                                <label for="id_CoMakerAddress" class="control-label col-md-4  requiredField">Co-Maker Address<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerAddress input form-control @error('CoMakerAddress') is-invalid @enderror" id="id_CoMakerAddress" name="CoMakerAddress" value="{{ old('CoMakerAddress') }}" placeholder="Enter Co-Maker's Home Address" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakeTelNumber" class="form-group required">
                                <label for="id_CoMakeTelNumber" class="control-label col-md-4  requiredField">Co-Maker Tel. No.<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakeTelNumber input form-control @error('CoMakeTelNumber') is-invalid @enderror" id="id_CoMakeTelNumber" name="CoMakeTelNumber" value="{{ old('CoMakeTelNumber') }}" placeholder="Enter Co-Maker's Telephone Number" style="margin-bottom: 10px" type="number" />
                                     @error('CoMakeTelNumber')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerResidence" class="form-group required">
                                <label for="id_CoMakerResidence"  class="control-label col-md-4  requiredField">Residence<span class="asteriskField">*</span   > </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="CoMakerResidence" class="CoMakerResidence" id="id_CoMakerResidence_1" value="Owned" {{ old('CoMakerResidence') == "Owned" ? 'checked' : ''  }} style="margin-bottom: 10px">Owned</label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerResidence" class="CoMakerResidence" id="id_CoMakerResidence_2" value="Rented" {{ old('CoMakerResidence') == "Rented" ? 'checked' : ''  }} style="margin-bottom: 10px">Rented</label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerResidence" class="CoMakerResidence" id="id_CoMakerResidence_3" value="Mortgaged" {{ old('CoMakerResidence') == "Mortgaged" ? 'checked' : ''  }} style="margin-bottom: 10px">Mortgaged</label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerResidence" class="CoMakerResidence" id="id_CoMakerResidence_4" value="Provided_by" {{ old('CoMakerResidence') == "Provided_by" ? 'checked' : ''  }} style="margin-bottom: 10px">Provided by</label>
                                        @error('CoMakerResidence')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerResidenceProvidedBy" style="display:none" class="form-group required">
                                <label for="id_CoMakerResidenceProvidedBy" style="color:red" class="control-label col-md-4  requiredField"> Residence Provided by<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input class="input-md  textinput textInput form-control form-control @error('CoMakerResidenceProvidedBy') is-invalid @enderror" id="id_CoMakerResidenceProvidedBy" maxlength="30" name="CoMakerResidenceProvidedBy" value="{{ old('CoMakerResidenceProvidedBy') }}" placeholder="Residence Provided by ..." style="margin-bottom: 10px" type="text" />
                                    @error('CoMakerResidenceProvidedBy')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            
                            <div id="div_id_CoMakerCivilStatus" class="form-group required">
                                <label for="id_CoMakerCivilStatus"  class="control-label col-md-4  requiredField"> Co-Maker Civil Status<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="CoMakerCivilStatus" id="id_CoMakerCivilStatus_1" value="Single" {{ old('CoMakerCivilStatus') == "Single" ? 'checked' : ''  }} style="margin-bottom: 10px">Single</label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerCivilStatus" id="id_CoMakerCivilStatus_2" value="Married" {{ old('CoMakerCivilStatus') == "Married" ? 'checked' : ''  }} style="margin-bottom: 10px">Married </label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerCivilStatus" id="id_CoMakerCivilStatus_3" value="Divored/Separated" {{ old('CoMakerCivilStatus') == "Divored/Separated" ? 'checked' : ''  }} style="margin-bottom: 10px">Divored/Separated </label>
                                        <label class="radio-inline"> <input type="radio" name="CoMakerCivilStatus" id="id_CoMakerCivilStatus_4" value="Widowed" {{ old('CoMakerCivilStatus') == "Widowed" ? 'checked' : ''  }} style="margin-bottom: 10px">Widowed </label>
                                        @error('CoMakerCivilStatus')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerRelationship" class="form-group required">
                                <label for="id_CoMakerRelationship" class="control-label col-md-4  requiredField">Relationship<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerRelationship input form-control @error('CoMakerRelationship') is-invalid @enderror" id="id_CoMakerRelationship" name="CoMakerRelationship" value="{{ old('CoMakerRelationship') }}" placeholder="Enter Co-Maker's Relationship with Applicant" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerRelationship')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerBirthDate" class="form-group required">
                                <label for="id_CoMakerBirthDate" class="control-label col-md-4  requiredField">Birth date<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input type="date" class="input-md  textinput textInput form-control @error('CoMakerBirthDate') is-invalid @enderror" id="id_CoMakerBirthDate" maxlength="30" name="CoMakerBirthDate" value="{{ old('CoMakerBirthDate') }}" placeholder="Enter Co-Maker birth date" 
                                    min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                    @error('CoMakerBirthDate')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerTin" class="form-group required">
                                <label for="id_CoMakerTin" class="control-label col-md-4  requiredField">Co-Maker TIN<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerTin input form-control @error('CoMakerTin') is-invalid @enderror" id="id_CoMakerTin" name="CoMakerTin" value="{{ old('CoMakerTin') }}" placeholder="Enter Co-Maker's Tax Identification Number" style="margin-bottom: 10px" type="number" />
                                     @error('CoMakerTin')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerMobileNo" class="form-group required">
                                <label for="id_CoMakerMobileNo" class="control-label col-md-4  requiredField">Mobile Number<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerMobileNo input form-control @error('CoMakerMobileNo') is-invalid @enderror" id="id_CoMakerMobileNo" name="CoMakerMobileNo" value="{{ old('CoMakerMobileNo') }}" placeholder="Enter Co-Maker's Mobile Number" style="margin-bottom: 10px" type="number" />
                                     @error('CoMakerMobileNo')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerEmployer" class="form-group required">
                                <label for="id_CoMakerEmployer" class="control-label col-md-4  requiredField">Employer<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerEmployer input form-control @error('CoMakerEmployer') is-invalid @enderror" id="id_CoMakerEmployer" name="CoMakerEmployer" value="{{ old('CoMakerEmployer') }}" placeholder="Enter Co-Maker's Employer Name" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerEmployer')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerDateEmployed" class="form-group required">
                                <label for="id_CoMakerDateEmployed" class="control-label col-md-4  requiredField">Date Employed <span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <input type="date" class="input-md  textinput textInput form-control" id="id_CoMakerDateEmployed" maxlength="30" name="CoMakerDateEmployed" value="{{ old('CoMakerDateEmployed') }}" placeholder="Enter your employ date" 
                                        min="1950-01-01" max="2022-12-31" style="margin-bottom: 10px" />
                                    @error('CoMakerDateEmployed')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>     
                            </div>

                            <div id="div_id_CoMakerPosition" class="form-group required">
                                <label for="id_CoMakerPosition" class="control-label col-md-4  requiredField">Co-Maker Position<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerPosition input form-control @error('CoMakerPosition') is-invalid @enderror" id="id_CoMakerPosition" name="CoMakerPosition" value="{{ old('CoMakerPosition') }}" placeholder="Enter Co-Maker's Job Position" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerPosition')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerTelNo" class="form-group required">
                                <label for="id_CoMakerTelNo" class="control-label col-md-4  requiredField">Co-Maker Tel. No.<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerTelNo input form-control @error('CoMakerTelNo') is-invalid @enderror" id="id_CoMakerTelNo" name="CoMakerTelNo" value="{{ old('CoMakerTelNo') }}" placeholder="Enter Co-Maker's Telephone Number" style="margin-bottom: 10px" type="number" />
                                     @error('CoMakerTelNo')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerEmployerAddress" class="form-group required">
                                <label for="id_CoMakerEmployerAddress" class="control-label col-md-4  requiredField">Employer Address<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerEmployerAddress input form-control @error('CoMakerEmployerAddress') is-invalid @enderror" id="id_CoMakerEmployerAddress" name="CoMakerEmployerAddress" value="{{ old('CoMakerEmployerAddress') }}" placeholder="Enter Co-Maker's Employer's Adress" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerEmployerAddress')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_EmploymentStatus" class="form-group required">
                                <label for="id_EmploymentStatus"  class="control-label col-md-4  requiredField">Status<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8"  style="margin-bottom: 15px">
                                        <label class="radio-inline"> <input type="radio" name="EmploymentStatus" id="id_EmploymentStatus_1" value="Contractual" {{ old('EmploymentStatus') == "Contractual" ? 'checked' : ''  }} style="margin-bottom: 10px">Contractual</label>
                                        <label class="radio-inline"> <input type="radio" name="EmploymentStatus" id="id_EmploymentStatus_2" value="Probationary" {{ old('EmploymentStatus') == "Probationary" ? 'checked' : ''  }} style="margin-bottom: 10px">Probationary</label>
                                        <label class="radio-inline"> <input type="radio" name="EmploymentStatus" id="id_EmploymentStatus_3" value="Regular" {{ old('EmploymentStatus') == "Regular" ? 'checked' : ''  }} style="margin-bottom: 10px">Regular</label>
                                        @error('EmploymentStatus')
                                            <br />
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div id="div_id_CoMakerCreditReference1" class="form-group required">
                                <label for="id_CoMakerCreditReference1" class="control-label col-md-4  requiredField">Credit Ref. 1<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerCreditReference1 input form-control @error('CoMakerCreditReference1') is-invalid @enderror" id="id_CoMakerCreditReference1" name="CoMakerCreditReference1" value="{{ old('CoMakerCreditReference1') }}" placeholder="Enter Co-maker 1st Credit Reference" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerCreditReference1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>
                            
                            <div id="div_id_CoMakerCreditReference2" class="form-group required">
                                <label for="id_CoMakerCreditReference2" class="control-label col-md-4  requiredField">Credit Ref. 2<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input class="input-md CoMakerCreditReference2 input form-control @error('CoMakerCreditReference2') is-invalid @enderror" id="id_CoMakerCreditReference2" name="CoMakerCreditReference2" value="{{ old('CoMakerCreditReference2') }}" placeholder="Enter Co-maker 2nd Credit Reference" style="margin-bottom: 10px" type="text" />
                                     @error('CoMakerCreditReference2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerCreditReference3" class="form-group required">
                                <label for="id_CoMakerCreditReference3" class="control-label col-md-4  requiredField">Credit Ref. 3<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                    <input class="input-md CoMakerCreditReference3 input form-control @error('CoMakerCreditReference3') is-invalid @enderror" id="id_CoMakerCreditReference3" name="CoMakerCreditReference3" value="{{ old('CoMakerCreditReference3') }}" placeholder="Enter Co-maker 3rd Credit Reference" style="margin-bottom: 10px" type="text" />
                                    @error('CoMakerCreditReference3')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>     
                            </div>

                            <div id="div_id_ApplicantSketch" class="form-group required">
                                <label for="id_ApplicantSketch" class="control-label col-md-4  requiredField">Applicant Address<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input type="file" class="form-control-file @error('ApplicantSketch') is-invalid @enderror ApplicantSketch" id="ApplicantSketch" name="ApplicantSketch" style="margin-bottom: 15px">
                                     @error('ApplicantSketch')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerSketch" class="form-group required">
                                <label for="id_CoMakerSketch" class="control-label col-md-4  requiredField">Co-maker Address<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input type="file" class="form-control-file @error('CoMakerSketch') is-invalid @enderror CoMakerSketch" id="CoMakerSketch" name="CoMakerSketch" style="margin-bottom: 15px">
                                     @error('CoMakerSketch')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>     
                            </div>

                            <div id="div_id_CoMakerSignature" class="form-group required">
                                <label for="id_CoMakerSignature" class="control-label col-md-4  requiredField">Co-maker Signature<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input type="file" class="form-control-file @error('CoMakerSignature') is-invalid @enderror CoMakerSignature" id="CoMakerSignature" name="CoMakerSignature" style="margin-bottom: 15px">
                                     @error('CoMakerSignature')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>     
                            </div>

                            <div id="div_id_SpouseSignature" class="form-group required">
                                <label for="id_SpouseSignature" class="control-label col-md-4  requiredField">Spouse Signature<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input type="file" class="form-control-file @error('SpouseSignature') is-invalid @enderror SpouseSignature" id="SpouseSignature" name="SpouseSignature" style="margin-bottom: 15px">
                                     @error('SpouseSignature')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>     
                            </div>

                            <div id="div_id_ApplicantSignature" class="form-group required">
                                <label for="id_ApplicantSignature" class="control-label col-md-4  requiredField">Applicant Signature<span class="asteriskField">*</span> </label>
                                 <div class="controls col-md-8">
                                     <input type="file" class="form-control-file @error('ApplicantSignature') is-invalid @enderror ApplicantSignature" id="ApplicantSignature" name="ApplicantSignature" style="margin-bottom: 15px">
                                     @error('ApplicantSignature')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>     
                            </div>
                        
                                <div class="col-sm-5"></div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    @isset($user)
                                    <a href={{ route('admin.user.index') }} type="button" class="btn btn-success mx-2"> Go Back </a>
                                        {{-- {{$user->id}} --}}
                                    @endisset
                            
                    </form>
                </div>
            </div>
        </div> 
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function () {
        var NumberDependents = $('#id_NumberDependents').val();
        
        if(NumberDependents == 1){
            $('#dependent1').show();
            $('#dependent2').hide();
            $('#dependent3').hide();
            $('#dependent4').hide();
        }else if (NumberDependents == 2){   
            $('#dependent1').show();
            $('#dependent2').show();
            $('#dependent3').hide();
            $('#dependent4').hide();
        }else if( NumberDependents == 3){
            $('#dependent1').show();
            $('#dependent2').show();
            $('#dependent3').show();
            $('#dependent4').hide();
        }else if( NumberDependents == 4){
            $('#dependent1').show();
            $('#dependent2').show();
            $('#dependent3').show();
            $('#dependent4').show();
        }else{
            $('#dependent1').hide();
            $('#dependent2').hide();
            $('#dependent3').hide();
            $('#dependent4').hide();
        }

        var NumberCreditRef = $('#id_NumberCreditRef').val();

        if(NumberCreditRef == 1){
            $('#CreditRef1').show();
            $('#CreditRef2').hide();
            $('#CreditRef3').hide();
            $('#CreditRef4').hide();
        }else if (NumberCreditRef == 2){   
            $('#CreditRef1').show();
            $('#CreditRef2').show();
            $('#CreditRef3').hide();
            $('#CreditRef4').hide();
        }else if( NumberCreditRef == 3){
            $('#CreditRef1').show();
            $('#CreditRef2').show();
            $('#CreditRef3').show();
            $('#CreditRef4').hide();
        }else if( NumberCreditRef == 4){
            $('#CreditRef1').show();
            $('#CreditRef2').show();
            $('#CreditRef3').show();
            $('#CreditRef4').show();
        }else{
            $('#CreditRef1').hide();
            $('#CreditRef2').hide();
            $('#CreditRef3').hide();
            $('#CreditRef4').hide();
        }

        if($('#id_SourceIncome_4').is(':checked',true)){
            $('#div_id_ProvidedBy').show();
        }
        else{
            $('#div_id_ProvidedBy').hide();
        }

        if($('#id_HouseStatus_4').is(':checked',true)){
            $('#div_id_HouseProvidedBy').show();
        }
        else{
            $('#div_id_HouseProvidedBy').hide();
        }

        if($('#id_LotStatus_4').is(':checked',true)){
            $('#div_id_LotProvidedBy').show();
        }
        else{
            $('#div_id_LotProvidedBy').hide();
        }

        if($('#id_CoMakerResidence_4').is(':checked',true)){
            $('#div_id_CoMakerResidenceProvidedBy').show();
        }
        else{
            $('#div_id_CoMakerResidenceProvidedBy').hide();
        }
        if($('#id_Spouse').val()){
            $('#div_id_SpouseBlock').show();
        } else{
            $('#div_id_SpouseBlock').hide();
        }


        $('#id_OtherPropertiesFarmlot').on('click', function(e) {
            if($(this).is(':checked',true)){
                $('#div_id_FarmLot').show();
            }
            else{
                $('#div_id_FarmLot').hide();
                $('#id_FarmLotAddress').val("");
                
            }
        });

        $('.SourceIncomeRadio').on('click', function(e) {
            if($('#id_SourceIncome_4').is(':checked',true)){
                $('#div_id_ProvidedBy').show();
            }
            else{
                $('#div_id_ProvidedBy').hide();
            }
        });

        $('.HouseStatus').on('click', function(e) {
            if($('#id_HouseStatus_4').is(':checked',true)){
                $('#div_id_HouseProvidedBy').show();
            }
            else{
                $('#div_id_HouseProvidedBy').hide();
            }
        });

        
        $('.LotStatus').on('click', function(e) {
            if($('#id_LotStatus_4').is(':checked',true)){
                $('#div_id_LotProvidedBy').show();
            }
            else{
                $('#div_id_LotProvidedBy').hide();
            }
        });

        $('.CoMakerResidence').on('click', function(e) {
            if($('#id_CoMakerResidence_4').is(':checked',true)){
                $('#div_id_CoMakerResidenceProvidedBy').show();
            }
            else{
                $('#div_id_CoMakerResidenceProvidedBy').hide();
            }
        });

        $('#id_Spouse').blur(function(){
            if($(this).val()){
                $('#div_id_SpouseBlock').show();
            } else{
                $('#div_id_SpouseBlock').hide();
            }
        });

        $('#id_NumberDependents').blur(function(){
            var NumberDependents = $(this).val();

            if(NumberDependents == 1){
                $('#dependent1').show();
                $('#dependent2').hide();
                $('#dependent3').hide();
                $('#dependent4').hide();
            }else if (NumberDependents == 2){   
                $('#dependent1').show();
                $('#dependent2').show();
                $('#dependent3').hide();
                $('#dependent4').hide();
            }else if( NumberDependents == 3){
                $('#dependent1').show();
                $('#dependent2').show();
                $('#dependent3').show();
                $('#dependent4').hide();
            }else if( NumberDependents == 4){
                $('#dependent1').show();
                $('#dependent2').show();
                $('#dependent3').show();
                $('#dependent4').show();
            }else{
                $('#dependent1').hide();
                $('#dependent2').hide();
                $('#dependent3').hide();
                $('#dependent4').hide();
            }
            
        });
      

        $('#id_NumberCreditRef').blur(function(){
            var NumberCreditRef = $(this).val();

            if(NumberCreditRef == 1){
                $('#CreditRef1').show();
                $('#CreditRef2').hide();
                $('#CreditRef3').hide();
                $('#CreditRef4').hide();
            }else if (NumberCreditRef == 2){   
                $('#CreditRef1').show();
                $('#CreditRef2').show();
                $('#CreditRef3').hide();
                $('#CreditRef4').hide();
            }else if( NumberCreditRef == 3){
                $('#CreditRef1').show();
                $('#CreditRef2').show();
                $('#CreditRef3').show();
                $('#CreditRef4').hide();
            }else if( NumberCreditRef == 4){
                $('#CreditRef1').show();
                $('#CreditRef2').show();
                $('#CreditRef3').show();
                $('#CreditRef4').show();
            }else{
                $('#CreditRef1').hide();
                $('#CreditRef2').hide();
                $('#CreditRef3').hide();
                $('#CreditRef4').hide();
            } 
        });
        
    });    
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>