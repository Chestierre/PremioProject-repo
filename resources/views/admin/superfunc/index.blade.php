@extends('layouts.adminlayout')
@section('content')
<div class="container">

    @if (Session::get('about_us_saved'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('about_us_saved') }}
    </div>   
    @endif

    <div class="d-flex justify-content-center mb-3">
        <h1>Super Adminstrator Functions</h1>
    </div>
    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">CSV import and export function for users</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>
            <form action="{{ route('admin.user.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">
                        Import User Data
                </button>
                <a class="btn btn-warning" href="{{ route('admin.user.export-users') }}">
                            Export User Data
                </a>
            </form>
        </div>
    </div>
    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex mb-3">
                <div class="h4">About Us Configuration</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>
            
            <div class="col-md-12">
                <form action="{{ route('admin.superfunc.aboutusedit') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <label for="introduction" class="col-md-12 col-form-label">{{ __('Introduction:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="introduction" name="introduction" class="form-control" value="{{$companydetail->introduction}}" >
                    </div>

                    <div class="row mt-3">
                        <label for="vision" class="col-md-12 col-form-label">{{ __('Vision:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="vision" name="vision" class="form-control" value="{{$companydetail->vision}}">
                    </div>

                    <div class="row mt-3">
                        <label for="corevalues" class="col-md-12 col-form-label">{{ __('Core Values:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="corevalues" name="corevalues" class="form-control" value="{{$companydetail->corevalues}}">
                    </div>

                    <div class="row mt-3">
                        <label for="history" class="col-md-12 col-form-label">{{ __('History:') }}</label>
                    </div>    
                    <div class="col-md-12 mb-5">
                        <input type="text" id="history" name="history" class="form-control" value="{{$companydetail->history}}">
                    </div>

                    <div class="row mt-3">
                        <label for="mission" class="col-md-12 col-form-label">{{ __('Mission:') }}</label>
                    </div>    
                    <div class="col-md-12 mb-5">
                        <input type="text" id="mission" name="mission" class="form-control" value="{{$companydetail->mission}}">
                    </div>
                    <button class="btn btn-success float-end col-md-2" type="submit">Save</button>
                </form>
            </div>
        </div> 
    </div>
 
    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">Deleted/unlinked Units Brand</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>
   
            </div>
            <div class="table-responisve">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="h2">Deleted Unit</div>
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
                                <th>Number of Orders</th>
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
                              <td> Null </td>
                              <td>{{$unit->order->count()}}</td>
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
                                <a href="#" class="btn btn-primary addBrandbtn" id="" data-id ={{$unit->id}}><i class="fa-solid fa-thumbs-up" ></i> Add Brand</a>
                                </div>
                                {{-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#unitReportModal{{$"><i class="fa-regular fa-lightbulb"></i></button> --}}
                              </td>
                            </tr>
                            
                          
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
{{-- 
    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">Buy Product: Order Applications</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>

            User with order buttons in which what orders the user blah. must have customer info
        </div>
    </div>

    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">report generation</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>
        </div>
    </div>
    
</div> --}}


<!-- Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBrandModalLabel">Add Brand to Unit</h5>
          <button type="button" class="close addBrandModal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input type="hidden" id="unit_id" value="">
          <select name="brand_id" class="form-select form-control" id="brandSelect">
            @foreach ($brand as $brand)
                <option value={{$brand->id}}>{{$brand->brandname}}</option>  
            @endforeach
          </select>
          <p class="mt-4" style="font-size: 12px;">Adding Brand to this unit will move this to viewable content in both unit and product page</p>            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary addBrandModal-dismiss" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addBrandConfirmbtn">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).ready(function(){
        $('.addBrandbtn').on('click', function(){
            $('#addBrandModal').modal('show');
            $('#unit_id').val($(this).attr('data-id'));

        });
        $('.addBrandModal-dismiss').on('click', function(){
            $('#addBrandModal').modal('hide');
        });
        $('#addBrandConfirmbtn').on('click', function(){
            var unit_id = $('#unit_id').val();
            var brand_id = $('#brandSelect').val();
            console.log(unit_id);
            console.log(brand_id);
            $.ajax({
                url: '/admin/superfunc/addBrand',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    brand_id: brand_id,
                    unit_id: unit_id,
                },
                success: function(data){
                    window.location.reload(true);
                },
                error: function(error){
                    alert(error.responseText);
                    
                }
            });
        });
    });
</script>

@endsection