@extends('layouts.adminlayout')

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
                           
                        Password1:
                                             
                            <input id="password" type="password" name="password"  class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" value ="{{ $user->password }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">


                        <br /><br />
                        <button type="submit" class="btn btn-primary"> Save </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
