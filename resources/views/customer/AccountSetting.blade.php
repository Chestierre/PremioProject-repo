@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Account Settings</div>
                <div class="card-body">
                    <form method="POST" action="{{route("customer.updateCustomer")}}">
                        @method('PATCH')
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row mb-3">
                            <label for="username" class="col-md-2 col-form-label text-md-end">{{ __('Username') }}</label>
                            <div class="col-md-8">
                              <input id="username" type="text" class="form-control" name="username" value={{auth()->user()->username}} autocomplete="username" >
                                
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="usernameerrorlabel">hello</strong>
                                </span>
                                
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-8">
                              <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" autocomplete="username" >
                                
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="passworderrorlabel">hello</strong>
                                </span>
                                
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('Confirm Password:') }}</label>
                            <div class="col-md-8">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password-confirm') }}" autocomplete="username" >
                                
                                <span class="invalid-feedback" role="alert" >
                                    <strong id="password-confirmerrorlabel">hello</strong>
                                </span>
                                
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary col-md-2" >Save</button>    
                        </div>
                        
                    </form>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection