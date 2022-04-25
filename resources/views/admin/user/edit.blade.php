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
                    
                    {{ __('User Edit') }}
                    <form method="POST" action="{{ route('admin.user.update', $user)}}">
                        @method('PUT')
                        @csrf
                        Username:
                        <br />
                        <input type="text" class="form-control" name="username" value ="{{ $user->username }}" />
                        
                        @if ( $user->userrole == 'Customer' && !$user->customer == null )
                        First Name:
                        <br />
                            {{ $user->customer->firstname }}
                            <input type="text" class="form-control" name="firstname" value ="{{ $user->customer->firstname }}" />
                        @endif
                            
                        <br /><br />
                        <button type="submit" class="btn btn-primary"> Save </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
