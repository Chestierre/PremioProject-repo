@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <table>
                        <thead>
                        <tr>
                            <th>
                                User
                            </th>
                            <th>
                                Role
                            </th>
                        <tr>
                        </thead>
                        <tbody>
                        @foreach ($user as $user)
                            <tr>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->userrole }}
                                </td>

                                

                                <td>
                                    <form method="GET" action="{{ route('admin.user.edit', $user) }}">
                                        <button type="submit" class="btn btn-primary" >Edit</button>
                                    </form>
                                    
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach   
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
