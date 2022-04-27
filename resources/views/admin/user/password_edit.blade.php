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
                    
                    {{ __('Password Edit') }}
                    <form method="POST" action="{{ route('admin.password_update', $user)}}">
                        @method('PUT')
                        @csrf
                        <br />
                        {{ $user->username }}   
                        Password1:
                                             
                            <input id="password" type="password" name="password" autocomplete="new-password" value ="{{ $user->password }}">

                        Confirm Password:
                        
                        <br /><br />
                        <button type="submit" class="btn btn-primary"> Save </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
