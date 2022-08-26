@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>                
                <div class="card-body">
                    {{ __('Create Brand') }}
                    
                    <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.unit.store')}}">
                        @csrf
                        Unit Brand:
                        
                        <select name="brandName" id="brandName" class="form-select form-control @error('brandName') is-invalid @enderror">
                            @foreach ($brand as $brands)
                
                                <option value = {{$brands->id}}>{{$brands->brandname}}</option>
                            @endforeach
                        </select>

                        <br />

                        @error('brandName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <br />
                        Unit Model:
                        <br />
                        <input type="text" id="modelName" class="form-control @error('modelName') is-invalid @enderror" name="modelName" placeholder="Sniper"/>
                        
                        @error('modelName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br />
                        
                        Unit Description:
                        <br />
                        <input type="text" id="modeldescription" class="form-control" name="modeldescription" placeholder="Optional ..."/>
                        @error('modeldescription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br />
                        
                        Brand Price:
                        <br />
                        <input type="text" id="price" class="form-control" name="price" placeholder="100000"/>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br />
                        
                        Brand Image:
                        <br />
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br/>
                        <br />
                        Brand Image Variation name:
                        <br />
                        <input type="text" id="caption" class="form-control" name="caption" placeholder="Red or Blue... etc"/>
                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br/>
                        
                        <br /><br />
                        <br />
                        <button type="submit" class="btn btn-primary"> Save </button>
                        <a href = {{ url()->previous() }} type="button" class="btn btn-success"> Go Back </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
