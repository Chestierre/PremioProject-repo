@extends('layouts.adminlayout')

@section('content')


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <h2 class="col-6"><b>Manage Unit</b></h2>
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                       <div class="">
                            {{-- <a href="{{route('admin.unit.create')}}" class="btn btn-success col-sm"> <span class = "">Add New Unit</span></a> --}}
                            {{-- <a href = "{{route('admin.brand.create')}}" class="btn btn-primary"> <span class = "">Add New Brand</span></a> --}}
                            <a href = "#" class="btn btn-success" data-toggle="modal" data-target="#createUnitModal"> <span class = "">Add New Unit</span></a>
                            <a href = "#" class="btn btn-primary" data-toggle="modal" data-target="#createBrandModal"> <span class = "">Add New Brand</span></a>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#viewBrandModal"> <span class = "">View Brands</span></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteBrandModal"> <span class = "">Delete Brand</span></a>
                        </div>
                        <div class="">
                            <form method="POST" action={{route("admin.unit.search")}}>
                                @csrf 
                                <div class="d-flex">
                                
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                                  <select name="brand_type" class="btn btn-secondary dropdown-toggle" type="button">
                                        <option>All</option>
                                        @foreach ($brand as $count => $brands)
                                            {{-- <option>{{$brands->brandname}}</option> --}}
                                            <option>{{$count}}</option>
                                        @endforeach
                                   </select>
                                   
                                   
            
                                   <button type="submit" class="btn btn-outline-primary my-sm-0">search</button>
                                </div>
                            </form>
                        </div> 

                    </div>
                </div>
            </div>
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th width="50px"><input type="checkbox" id="master"></th>
                  <th>Model Image</th>
                  <th>Model Name</th>
                  <th>Model Price</th>
                  <th>Model Downpayment</th>
                  <th>Model Brand</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($unit as $unit)
                    <tr>
                      <td>
                          <input type="checkbox" class="sub_chk" data-id={{$unit->id  }}>
                    </td>
                      <td><img src= "/storage/{{ $unit->unitimage[0]->image }}" style="width:120px;"></td>
                      <td>{{ $unit->modelname }}</td>
                      <td>&#8369 {{ number_format($unit->price) }}</td>
                      <td>&#8369 {{ number_format($unit->modeldownpayment) }}</td>
                      <td>{{ $unit->brand->brandname }}</td>
                      <td>
                        <div class="d-flex">
                        <form method="GET" action="{{ route('admin.unit.edit', $unit) }}">
                            <button type="submit" class="btn btn-warning" ><i class="fa-solid fa-eye"></i> View</button>
                        </form>
                        <form method="POST" action="{{ route('admin.unit.destroy', $unit) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can"></i> Delete</button>
                        </form>
                        </div>
                      </td>
                    </tr>
                  
                @endforeach
              </tbody>
            </table>



        </div>

    </div>
    <div class="d-flex justify-content-between">
        

    </div>
    <div class="d-flex justify-content-end">
        <button style="display:none;" class="btn btn-danger delete_all" data-url="{{ url('admin/unitDeleteAll') }}">Delete All Selected</button>
    </div>
</div>

<div class="modal fade" id="createUnitModal" tabindex="-1" role="dialog" aria-labelledby="createUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createUnitModalLabel">Create Unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.unit.store')}}">
                @csrf
                <div class="row mb-3">
                    <label for="modelName" class="col-md-4 col-form-label text-md-end">{{ __('Model name') }}</label>
                    <div class="col-md-6">
                      <input id="modelName" type="text" class="form-control @error('modelName') is-invalid @enderror" name="modelName" value="{{ old('modelName') }}" autocomplete="modelName" required>
    
                        @error('modelName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="brandName" class="col-md-4 col-form-label text-md-end">{{ __('Brand name') }}</label>
                    <div class="col-md-6">
                        <select name="brandName" id="brandName" class="form-select form-control @error('brandName') is-invalid @enderror">
                            @foreach ($brand as $brands)
                                <option value = {{$brands->id}}>{{$brands->brandname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="modelcaption" class="col-md-4 col-form-label text-md-end">{{ __('Model Caption') }}</label>
                    <div class="col-md-6">
                      <input id="modelcaption" type="text" class="form-control @error('modelcaption') is-invalid @enderror" name="modelcaption" value="{{ old('modelcaption') }}" required>
    
                        @error('modelcaption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="modeldescription" class="col-md-4 col-form-label text-md-end">{{ __('Model Description') }}</label>
                    <div class="col-md-6">
                      <input id="modeldescription" type="text" class="form-control @error('modeldescription') is-invalid @enderror" name="modeldescription" value="{{ old('modeldescription') }}">
    
                        @error('modeldescription')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Model Price') }}</label>
                    <div class="col-md-6">
                      <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
    
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="modeldownpayment" class="col-md-4 col-form-label text-md-end">{{ __('Model downpayment') }}</label>
                    <div class="col-md-6">
                      <input id="modeldownpayment" type="number" class="form-control @error('modeldownpayment') is-invalid @enderror" name="modeldownpayment" value="{{ old('modeldownpayment') }}" required>
    
                        @error('modeldownpayment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="modelDiscount" class="col-md-4 col-form-label text-md-end">{{ __('Model Discount') }}</label>
                    <div class="col-md-6">
                      <input id="modelDiscount" type="number" class="form-control @error('modelDiscount') is-invalid @enderror" name="modelDiscount" value="{{ old('modelDiscount') }}">
    
                        @error('modelDiscount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Model Image') }}</label>
                    <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
    
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ImageVariation" class="col-md-4 col-form-label text-md-end">{{ __('Model ImageVariation') }}</label>
                    <div class="col-md-6">
                      <input id="ImageVariation" type="text" class="form-control @error('ImageVariation') is-invalid @enderror" name="ImageVariation" value="{{ old('ImageVariation') }}" required>
    
                        @error('ImageVariation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>

<div class="modal fade" id="createBrandModal" tabindex="-1" role="dialog" aria-labelledby="createBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createBrandModalLabel">Create Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.brand.store')}}">
                @csrf
                <div class="row mb-3">
                    <label for="brandname" class="col-md-4 col-form-label text-md-end">{{ __('Brand name') }}</label>
                    <div class="col-md-6">
                      <input id="brandname" type="text" class="form-control @error('brandname') is-invalid @enderror" name="brandname" value="{{ old('brandname') }}" autocomplete="brandname" required>
    
                        @error('brandname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sixMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('six Month Rate') }}</label>
                    <div class="col-md-6">
                      <input id="sixMonthrate" type="number" step="0.01" class="form-control @error('sixMonthrate') is-invalid @enderror" name="sixMonthrate" value="{{ old('sixMonthrate') }}" required>
    
                        @error('sixMonthrate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="twelveMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('twelve Month Rate') }}</label>
                    <div class="col-md-6">
                      <input id="twelveMonthrate" type="number" step="0.01" class="form-control @error('twelveMonthrate') is-invalid @enderror" name="twelveMonthrate" value="{{ old('twelveMonthrate') }}" required>
    
                        @error('twelveMonthrate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="eighteenMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('eighteen Month Rate') }}</label>
                    <div class="col-md-6">
                      <input id="eighteenMonthrate" type="number" step="0.01" class="form-control @error('eighteenMonthrate') is-invalid @enderror" name="eighteenMonthrate" value="{{ old('eighteenMonthrate') }}" required>
    
                        @error('eighteenMonthrate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="twentyfourMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('twenty-four Month Rate') }}</label>
                    <div class="col-md-6">
                      <input id="twentyfourMonthrate" type="number" step="0.01" class="form-control @error('twentyfourMonthrate') is-invalid @enderror" name="twentyfourMonthrate" value="{{ old('twentyfourMonthrate') }}" required>
    
                        @error('twentyfourMonthrate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="thirthyMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('thirthy Month Rate') }}</label>
                    <div class="col-md-6">
                      <input id="thirthyMonthrate" type="number" step="0.01" class="form-control @error('thirthyMonthrate') is-invalid @enderror" name="thirthyMonthrate" value="{{ old('thirthyMonthrate') }}" required>
    
                        @error('thirthyMonthrate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="thirtysixMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('thirty-six Month Rate') }}</label>
                    <div class="col-md-6">
                      <input id="thirtysixMonthrate" type="number" step="0.01" class="form-control @error('thirtysixMonthrate') is-invalid @enderror" name="thirtysixMonthrate" value="{{ old('thirtysixMonthrate') }}" required>
    
                        @error('thirtysixMonthrate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>
<div class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteBrandModalLabel">Delete Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action={{route("admin.brand.try")}}>
        @csrf   
        <div class="modal-body">
            {{-- {{$brand->brandname}} --}}
            <select name="brandname" class="form-select form-control">
            @foreach ($brand as $count => $brands)
                <option>{{$brands->brandname}}</option>
                {{-- <option>{{$count}}</option> --}}
                
            @endforeach
            
            </select>
            {{-- @foreach ($brand as $count => $brands) --}}
                {{-- {{$count}} --}}
            {{-- @endforeach --}}

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="viewBrandModal" tabindex="-1" role="dialog" aria-labelledby="viewBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewBrandModalLabel">Create Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Brand Name</th>
                        <th>6 month rate</th>
                        <th>12 month rate</th>
                        <th>18 month rate</th>
                        <th>24 month rate</th>
                        <th>30 month rate</th>
                        <th>36 month rate</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brand as $brand)
                        <tr>
                            <td>{{$brand->brandname}}</td>
                            <td>{{$brand->sixMonthRate}}</td>
                            <td>{{$brand->twelveMonthRate}}</td>
                            <td>{{$brand->eigthteenMonthRate}}</td>
                            <td>{{$brand->twentyfourMonthRate}}</td>
                            <td>{{$brand->thirtyMonthRate}}</td>
                            <td>{{$brand->thirtysixMonthRate}}</td>
                            <td>
                            <form method="GET" action="{{ route('admin.brand.edit', $brand) }}">
                                    <button type="submit" class="btn btn-info" ><i class="fa-solid fa-eye"></i> Edit</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
        
        </div>
    </div>
</div>






  <script type="text/javascript">
    $(document).ready(function () {

        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);
            $(".delete_all").show();  
         } else {  
            $(".sub_chk").prop('checked',false); 
            $(".delete_all").hide();  
         }  
        });

        $('.sub_chk').on('click', function(e) {
            if($(this).is(':checked', true))  
         {
            //$(".delete_all").css("background-color", "yellow");
            $(".delete_all").show(); 
         } else {  
             $(".delete_all").hide();
            // $(".delete_all").css("background-color", "red");
         }  
        });

        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
                
            });  

            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  
            else 
            {  
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  
                    var join_selected_values = allVals.join(","); 

                    $.ajax(
                    {
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) 
                            {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } 
                            else if (data['error']) 
                            {
                                alert(data['error']);
                            } 
                            else 
                            {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

            return false;
        });
    });
</script>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
