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
                                First Name
                            </th>
                            <th>
                                Last Name
                            </th>
                            <th>
                                Mobile Number
                            </th>
                            <th>
                                Email Address
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Userrole
                            </th>
                        <tr>
                        </thead>
                        <tbody>
 
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
