@extends('layouts.adminlayout')

@section('content')


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <h2 class="col-6"><b>Manage Promo</b></h2>
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <div class="">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createPromoModal">  <span>Add New Promo</span></a>
                        </div>   
                        <div class="">
                            <form method="POST" action={{route("admin.promo.search")}}>
                                @csrf 
                                <div class="d-flex">
                                
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                                   
                                   
            
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Model Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promo as $promo)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" data-id={{$promo->id  }}>
                            </td>
                            <td>{{$promo->PromoTitle}}</td>
                            <td><img src= "/storage/{{ $promo->PromoImage }}" style="width:120px;"></td>
                            <td>{{$promo->unit->modelname}}</td>
                            <td>{{$promo->PromoActive }}</td>
                            <td>
                                <div class="d-flex">
                                    <form method="GET" action="{{ route('admin.promo.edit', $promo) }}">
                                        <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-pen"></i> Edit</button>
                                    </form>

                                    <button type="button" class="btn btn-danger" onclick="loadDeleteModal({{ $promo->id }}, `{{ $promo->PromoTitle }}`)">
                                        <i class="fa-solid fa-trash-can"></i> Delete</button>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button style="display:none;" class="btn btn-danger delete_all" data-url="{{ url('admin/promoDeleteAll') }}">Delete All Selected</button>
    </div>
</div>


{{-- create promo modal --}}
<div class="modal fade" id="createPromoModal" tabindex="-1" role="dialog" aria-labelledby="createPromoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createPromoModalLabel">Create Promo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.promo.store') }}">
            @csrf


            <div class="row mb-3">
                <label for="unitmodel_name" class="col-md-4 col-form-label text-md-end">{{ __('Unit Modelname') }}</label>
                <div class="col-md-6">

                    <select name="unit_id" class="btn btn-secondary dropdown-toggle" type="button">
                        {{-- <option>None</option> --}}
                        @foreach ($unit as $units)
                            <option value= {{$units->id}} >{{$units->modelname}}</option>
                        @endforeach
                   </select>

                </div>
            </div>



            <div class="row mb-3">
                <label for="PromoImage" class="col-md-4 col-form-label text-md-end">{{ __('PromoImage') }}</label>
                <div class="col-md-6">
                  <input type="file" class="form-control-file @error('PromoImage') is-invalid @enderror" id="PromoImage" name="PromoImage" >
                    @error('PromoImage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="PromoTitle" class="col-md-4 col-form-label text-md-end">{{ __('PromoTitle') }}</label>
                <div class="col-md-6">
                  <input id="PromoTitle" type="text" class="form-control @error('PromoTitle') is-invalid @enderror" name="PromoTitle" value="{{ old('PromoTitle') }}" autocomplete="PromoTitle" autofocus>

                    @error('PromoTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="PromoCaption" class="col-md-4 col-form-label text-md-end">{{ __('PromoCaption') }}</label>
                <div class="col-md-6">
                  <input id="PromoCaption" type="text" class="form-control @error('PromoCaption') is-invalid @enderror" name="PromoCaption" value="{{ old('PromoCaption') }}" autocomplete="PromoCaption">

                    @error('PromoCaption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="PromoDescription" class="col-md-4 col-form-label text-md-end">{{ __('PromoDescription') }}</label>
                <div class="col-md-6">
                  <input id="PromoDescription" type="text" class="form-control @error('PromoDescription') is-invalid @enderror" name="PromoDescription" value="{{ old('PromoDescription') }}" autocomplete="PromoDescription">

                    @error('PromoDescription')
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

{{-- modal delete on-click --}}
<div class="modal fade" id="deleteCategory"  tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">This action is not reversible.</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
       
            <div class="modal-body">
                Are you sure you want to delete <span id="modal-category_name"></span>?
                <input type="hidden" id="category" name="category_id">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-white" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
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

        // master and subchk is the checkbox
        $('.sub_chk').on('click', function(e) {
            if($(this).is(':checked', true))  
         {
            
            $(".delete_all").show(); 
         } else {  
             $(".delete_all").hide();
            
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

    function loadDeleteModal(id, name) {
            $('#modal-category_name').html(name);
            
            $('#deleteCategory').modal('show');
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        }

        function confirmDelete(id) {
            $.ajax({
                url: 'promo/' + id,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete',
                },
                success: function (data) {
                    // Success logic goes here..!

	            $('#deleteCategory').modal('hide');
                location.reload();
                },
                error: function (error) {
                    // Error logic goes here..!
                }
            });
        }
</script>
@endsection
