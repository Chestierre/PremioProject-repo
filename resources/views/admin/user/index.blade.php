@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 d-flex justify-content-between mb-2">
                        <h2><b>Manage Employees</b></h2>
                        <a href="{{route('register')}}" class="btn btn-success "> <span>Add New Employee</span></a>
                        {{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 --}}
                    </div>
                </div>
            </div>
                <table class = "table">
                    <thead class = "table-dark">
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    <tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
                            <td class = "py-3">
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->userrole }}
                            </td>
     
                            @can('edit', $user)                            
                            <td>
                                <form method="GET" action="{{ route('admin.user.edit', $user) }}">
                                    <button type="submit" class="btn btn-primary" >Edit</button>
                                </form>
                                
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
            
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            {{-- <div class="card "> --}}
                {{-- <a class = "ms-auto"href="{{ route('register') }}">Add new User</a>
                <div class="d-flex justify-content-center">{{ __('Dashboard') }}</div>
                <div class="d-flex justify-content-center">  --}}