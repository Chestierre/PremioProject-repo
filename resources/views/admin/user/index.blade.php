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

                                @can('superadmin', App\Models\User::class)
                                <select name="user_type" class="btn btn-secondary dropdown-toggle" type="button">
                                    <option>All</option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Collector</option>
                                    <option>Customer</option>
                                </select>
                                @else
                                <select name="user_type" class="btn btn-secondary dropdown-toggle" type="button">
                                    <option>All</option>
                                    <option>Collector</option>
                                    <option>Customer</option>
                                </select>
                                @endcan
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
                        <th>View</th>
                        <th>Actions</th>
                    <tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $count => $user)
                        @if (Auth::user()->userrole == 'Super Admin' || !( $user->userrole == 'Admin' || $user->userrole == 'Super Admin'))
                        <tr>
                            <td>
                                @can('edit', $user)
                                    <input type="checkbox" class="sub_chk" data-id={{$user->id  }}>
                                @endcan
                            </td>
                            <td class = "py-3">{{ $user->username }}</td>
                            <td>{{ $user->userrole }}</td>

                            <td>
                                @if ($user->userrole == 'Customer')
                                    @if($user->customer()->exists())
                                    <form method="GET" action="{{ route('admin.admincustomer.edit', $user) }}">
                                        <button type="submit" class="btn btn-warning" style="width:6em"><i class="fa-solid fa-eye"></i> View</button>
                                    </form>
                                    @elseif ($user->userrole == "Customer")
                                    <form method="GET" action="{{ route('admin.admincustomer.createCustomer', $user) }}">
                                        <button type="submit" class="btn btn-success" style="width:6em"><i class="fa-solid fa-user-secret"></i> Add</button>
                                    </form>
                                    @endif
                                @endif
                            </td>                            
                            <td>
                            @can('edit', $user)
                                <div class='d-flex'>
                                <form method="GET" action="{{ route('admin.user.edit', $user) }}">
                                    <a href="#" class="btn btn-primary col-sm mx-2 editButton" data-id={{$user->id}}> <span><i class="fa-solid fa-pen"></i> Edit</span></a>
                                    {{-- <button type="submit" class="btn btn-primary mx-2" ><i class="fa-solid fa-pen"></i> Edit</button> --}}
                                </form>
                                
                                <button type="button" class="btn btn-danger" onclick="loadDeleteModal({{ $user->id }}, `{{ $user->username }}`)">
                                    <i class="fa-solid fa-trash-can"></i> Delete</button>
                                </button>
                            </div>
                            @endcan
                            @cannot('edit', $user)
                                @can('superadmin', App\Models\User::class)
                                    Can't Change Super Admin
                                @else
                                    Super Admin Authorization Needed
                                @endcan        
                            @endcannot
                            </td>
                        </tr>
                        @endif
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
                        <div id="deletecustomerrelation"></div>
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
          <button type="button" class="close createmodal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
        @can('superadmin', App\Models\User::class)
        <form method="POST" action="{{ route('admin.user.store') }}">    
        @else
        <form method="POST" action="{{ route('admin.user.adminstore') }}">    
        @endcan
        
            @csrf
            
            <div class="row mb-3">
                <label for="userrole" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>
                <div class="col-md-6">
                    @can('superadmin', App\Models\User::class)
                    <select name="userrole" class="form-select form-control">
                        <option {{ old('userrole') ==  'Admin' ? 'selected' : ''}}>{{ "Admin"}}</option>  
                        <option {{ old('userrole') ==  'Collector' ? 'selected' : ''}}>{{ "Collector" }}</option>
                        <option {{ old('userrole') ==  'Customer' ? 'selected' : ''}}>{{ "Customer"}}</option>
                    </select>
                    @else
                    <select name="userrole" class="form-select form-control"> 
                        <option {{ old('userrole') ==  'Collector' ? 'selected' : ''}}>{{ "Collector" }}</option>
                        <option {{ old('userrole') ==  'Customer' ? 'selected' : ''}}>{{ "Customer"}}</option>
                    </select>

                    @endcan

                </div>
            </div>
            <div class="row mb-3">
                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                <div class="col-md-6">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username">

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
            <button type="button" class="btn btn-secondary createmodal-dismiss" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>

      </div>
    </div>
</div>

{{-- modal edit --}}
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User: <span id="editUserSpan"></span></h5>
          <button type="button" class="close editmodal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form>
            <div class="row mb-3">
                <label for="editusername" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                <div class="col-md-6">
                  <input id="editusername" type="text" class="form-control" name="editusername" value="{{ old('editusername') }}" autocomplete="username" >
                    
                    <span class="invalid-feedback" role="alert" >
                        <strong id="editusernameerrorlabel">hello</strong>
                    </span>
                    
                </div>
            </div>
            <div class="row mb-3">
                <label for="editpassword" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>
                <div class="col-md-6">
                  <input id="editpassword" type="password" class="form-control" name="editpassword" value="{{ old('editpassword') }}" >

                        <span class="invalid-feedback" role="alert">
                            <strong id="editpassworderrorlabel"></strong>
                        </span>

                </div>
            </div>
            <div class="row mb-3">
                <label for="userrole" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>
                <div class="col-md-6">
                    @can('superadmin', App\Models\User::class)
                    <select name="userrole" id="userrole-select" class="form-select form-control">
                        <option>{{ "Admin"}}</option>  
                        <option>{{ "Collector" }}</option>
                        <option>{{ "Customer"}}</option>
                    </select>
                    @else
                    <select name="userrole" id="userrole-select" class="form-select form-control"> 
                        <option>{{ "Collector" }}</option>
                        <option>{{ "Customer"}}</option>
                    </select>

                    @endcan

                </div>
            </div>
            <input type="hidden" value="" id="edit_id">
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary editmodal-dismiss" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="editSubmitButton">Edit</button>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>


@endsection


@section('scripts')


  {{-- Scripts - checkbox --}}
  <script type="text/javascript">
    $(document).ready(function () {

        // validation modal
        @if ($errors->has('password') || $errors->has('username'))
            $('#createUserModal').modal('show');
        @endif

        $('.createmodal-dismiss').on('click', function(){
            $('#createUserModal').modal('hide');
            
        });

        $('.editmodal-dismiss').on('click', function(){
            $('#editUserModal').modal('hide');
            
        });

        $('#editSubmitButton').on('click', function(e){
            e.preventDefault();
            var id = $("#edit_id").val();
            var editusername = $("#editusername").val();
            var editpassword = $("#editpassword").val();
            var userrole = $("#userrole-select").val();
            // var userrole2 = $("#userrole-select2").val();

            $.ajax({
                    url: 'user/' + id,
                    type: "PUT",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        id: id,
                        editusername: editusername,
                        editpassword: editpassword,
                        userrole: userrole,
                        // userrole2: userrole2,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if(data.hasOwnProperty('errors')){
                            // console.log("hello");
                            console.log(data.errors);
                            if(data.errors.hasOwnProperty('editusername')){
                                $('#editusername').addClass("is-invalid");
                                $('#editusernameerrorlabel').html(data.errors.editusername);
                            }
                            else{
                                $('#editusername').removeClass("is-invalid"); 
                            }

                            if(data.errors.hasOwnProperty('editpassword')){
                                $('#editpassword').addClass("is-invalid");
                                console.log( $('#editpassword').attr('class'));
                                $('#editpassworderrorlabel').html(data.errors.editpassword);
                            }else{
                                $('#editpassword').removeClass("is-invalid");
                            }
                        }else{
                            window.location.reload(true);
                        }

                    
                    },
                    error: function (data) {
                            // console.log(data.responseText);
                            alert(data.responseText);
                            // console.log(data.responseJSON.errors);
                    }
                    
  });

        });

        // $('#editButton').click(function(event){
        //     event.preventDefault();
        //     console.log("hello");
        //     console.log("$(this).attr('data-id')");
        //     //$.get('user/getuser/'+ $(this).attr('data-id'),)
        // });

        $('.editButton').on('click', function(e) {
            $.get('user/getuser/'+ $(this).attr('data-id'), function(data){
                //console.log(data);
                $('#editUserSpan').html(data.username);
                $('#editusername').val(data.username);
                $('#editpassword').val("");
                $('#userrole-select').val(data.userrole);
                $('#edit_id').val(data.id);
                $('#editpassword').removeClass("is-invalid");
                $('#editusername').removeClass("is-invalid");
                $('#editUserModal').modal('show');
            })
        });

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
            $.get('user/getcustomeruserrelation/'+ id, function(data){
                if((data.hasOwnProperty('firstname'))&&(data.hasOwnProperty('lastname'))){
                    var name = data.firstname + " " + data.lastname;
                    console.log(name);
                }

            });
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
        function getuser(id) {
        $.ajax({
            url: 'user/getuser/' + id,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {

            },
            error: function (error) {
                console.log(error);
            }
        });
    }

</script>
@endsection
