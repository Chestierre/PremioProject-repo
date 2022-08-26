@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>                
                <div class="card-body">
                    {{ __('Create Brand') }}
                    <form method="POST" action="{{ route('admin.brand.store')}}">
                        @csrf
                        <br />
                        <input type="text" class="form-control" name="brandname" />
                        <br />
                        <br /><br />
                        <button type="submit" class="btn btn-primary"> Save </button>
                        <a href = {{ url()->previous() }} type="button" class="btn btn-success"> Go Back </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
