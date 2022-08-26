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


                    
                    {{ __('Brand Edit1') }}


                    <form method="POST" action="{{ route('admin.brand.update', $brand)}}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="brandname" class="col-md-4 col-form-label text-md-end">{{ __('Brand name') }}</label>
                            <div class="col-md-6">
                              <input id="brandname" type="text" class="form-control @error('brandname') is-invalid @enderror" name="brandname" value="{{ $brand->brandname }}" autocomplete="brandname" required>
            
                                @error('brandname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sixMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('six Month Rate') }}</label>
                            <div class="col-md-6">
                              <input id="sixMonthrate" type="text" class="form-control @error('sixMonthrate') is-invalid @enderror" name="sixMonthrate" value="{{ $brand->sixMonthRate }}" required>
            
                                @error('sixMonthrate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="twelveMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('twelve Month Rate') }}</label>
                            <div class="col-md-6">
                              <input id="twelveMonthrate" type="number" step="0.01" class="form-control @error('twelveMonthrate') is-invalid @enderror" name="twelveMonthrate" value="{{ $brand->twelveMonthRate }}" required>
            
                                @error('twelveMonthrate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="eighteenMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('eighteen Month Rate') }}</label>
                            <div class="col-md-6">
                              <input id="eighteenMonthrate" type="number" step="0.01" class="form-control @error('eighteenMonthrate') is-invalid @enderror" name="eighteenMonthrate" value="{{ $brand->eigthteenMonthRate }}" required>
            
                                @error('eighteenMonthrate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="twentyfourMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('twenty-four Month Rate') }}</label>
                            <div class="col-md-6">
                              <input id="twentyfourMonthrate" type="number" step="0.01" class="form-control @error('twentyfourMonthrate') is-invalid @enderror" name="twentyfourMonthrate" value="{{ $brand->twentyfourMonthRate }}" required>
            
                                @error('twentyfourMonthrate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="thirthyMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('thirthy Month Rate') }}</label>
                            <div class="col-md-6">
                              <input id="thirthyMonthrate" type="number" step="0.01" class="form-control @error('thirthyMonthrate') is-invalid @enderror" name="thirthyMonthrate" value="{{ $brand->thirtyMonthRate }}" required>
            
                                @error('thirthyMonthrate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="thirtysixMonthrate" class="col-md-4 col-form-label text-md-end">{{ __('thirty-six Month Rate') }}</label>
                            <div class="col-md-6">
                              <input id="thirtysixMonthrate" type="number" step="0.01" class="form-control @error('thirtysixMonthrate') is-invalid @enderror" name="thirtysixMonthrate" value="{{ $brand->thirtysixMonthRate }}" required>
            
                                @error('thirtysixMonthrate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="modal-footer">
                            <a href = {{ route('admin.unit.index') }} type="button" class="btn btn-secondary" >Go back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
