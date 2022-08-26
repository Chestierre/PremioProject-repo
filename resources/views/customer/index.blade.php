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
                        @foreach ($customer as $customer)
                            <tr>
                                <td>
                                    {{ $customer->FillOutDate }}
                                </td>
                                <td>
                                    {{ $customer->FirstName }}
                                </td>
                                <td>
                                    {{ $customer->MiddleName }}
                                </td>
                                <td>
                                    {{ $customer->LastName }}
                                </td>
                                <td>
                                    {{ $customer->user->username }}
                                </td>
                                <td>
                                    {{ $customer->user->userrole }}
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
