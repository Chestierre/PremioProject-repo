@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <h2><b>Manage Employees</b></h2>
                    <div class="col-xs-6 d-flex justify-content-between mb-2">
                        <div>
                            <a href="#" class="btn btn-primary col-sm" data-toggle="modal" data-target="#createUserModal"> <span><i class="fa-solid fa-face-grin-hearts"></i> Add New Employee</span></a>
                        </div>
                        <div class="">
                            <form method="POST" action={{route("admin.user.search")}}>
                                @csrf 
                                <div class="d-flex">
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                                  <select name="user_type" class="btn btn-secondary dropdown-toggle" type="button">
                                        <option>All</option>
                                        <option>Super Admin</option>
                                        <option>Admin</option>
                                        <option>Collector</option>
                                        <option>Customer</option>
                                   </select>
                                   <button type="submit" class="btn btn-outline-primary my-sm-0">search</button>
                            </div>
                            </form>
                        </div> 
                    </div>
                </div>             
            </div>           
                <table class = "table">
                    <thead class = "table-dark">
                    <tr>
                        <th width="50px"><input type="checkbox" id="master"></th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>View</th>
                        <th>Actions</th>
                    <tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $count => $user)
                        <tr>
                            <td>
                                @can('edit', $user)
                                    <input type="checkbox" class="sub_chk" data-id={{$user->id  }}>
                                @endcan
                            </td>
                            <td class = "py-3">{{ $user->username }}</td>
                            <td>{{ $user->userrole }}</td>
                            <td>
                            @if($user->userrole == "Customer" && !$user->customer == null)
                            {{ $user->customer->firstname }} {{ $user->customer->lastname }}
                            @endif
                            <td>
                                @if($user->userrole == "Customer" && !$user->customer == null)
                                <form method="GET" action="{{ route('admin.user.edit', $user) }}">
                                    <button type="submit" class="btn btn-warning" ><i class="fa-solid fa-eye"></i> View</button>
                                </form>
                                @endif
                            </td>                            
                            <td>
                            @can('edit', $user)
                                <div class='d-flex'>
                                <form method="GET" action="{{ route('admin.user.edit', $user) }}">
                                    <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-pen"></i> Edit</button>
                                </form>
                                
                                <button type="button" class="btn btn-danger" onclick="loadDeleteModal({{ $user->id }}, `{{ $user->username }}`)">
                                    <i class="fa-solid fa-trash-can"></i> Delete</button>
                                </button>
                            </div>
                            @endcan
                            @cannot('edit', $user)
                                @if($user->userrole == "Super Admin")
                                    Can't Change Super Admin
                                @else
                                    Super Admin Authorization Needed
                                @endif        
                            @endcannot
                            </td>
                        </tr>

                    @endforeach   
                    </tbody>
                </table> 
        </div>
        
    </div>

{{-- delete all checkbox --}}
    <div class="d-flex justify-content-end">  
        <button  style="display:none;" class="btn btn-danger delete_all p-2" data-url="{{ url('admin/userDeleteAll') }}">Delete All Selected</button>
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

{{-- modal create --}}
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('admin.user.store') }}">
            @csrf
            <div class="row mb-3">
                <label for="userrole" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>
                <div class="col-md-6">

                    <select name="userrole" class="form-select form-control">
                        <option>{{ "Admin"}}</option>  
                        <option>{{ "Collector" }}</option>
                        <option>{{ "Customer"}}</option>
                    </select>

                </div>
            </div>
            <div class="row mb-3">
                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                <div class="col-md-6">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
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


  {{-- Scripts - checkbox --}}
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

    function loadDeleteModal(id, name) {
            $('#modal-category_name').html(name);
            $('#deleteCategory').modal('show');
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        }

        function confirmDelete(id) {
            $.ajax({
                url: 'user/' + id,
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

