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


                    
                    {{ __('Promo Edit') }}


                    <form method="POST" action="{{ route('admin.promo.update', $promo)}}">
                        @method('PUT')
                        @csrf
                        <br />

                        Title:
                        <br />
                        <input type="text" class="form-control" name="PromoTitle" value ="{{ $promo->PromoTitle }}" />
                        <br />
                        Caption:
                        <br />
                        <input type="text" class="form-control" name="PromoCaption" value ="{{ $promo->PromoCaption }}" />
                        <br />
                        Description
                        <br />
                        <input type="text" class="form-control" name="PromoDescription" value ="{{ $promo->PromoDescription }}" />
                        <br />
                        {{-- {{$promo->unit->id}} --}}
                        
                        Model:
                        <br />
                        <select name="unit_id" class="btn btn-secondary dropdown-toggle" type="button">
                            @foreach ($unit as $units)
                            
                            @if ($promo->unit->id == $units->id)
                                
                                    <option value="{{ $units->id }}" selected>  {{$units->modelname}} </option>

                            @else

                                <option value="{{$units->id}}">{{$units->modelname}}</option>
                            @endif
                                {{-- <option value= {{$units->id}} >{{$units->modelname}}</option> --}}
                                {{-- <option value= {{$units->id}} {{ (Input::old("unit_id") == ${{$units->id}} ? "selected":"") }} >  {{$units->modelname}} </option> --}}
                            @endforeach
                       </select>
                       
                       <br />
                       <br />
                       Status:
                       <br />
                       <select name="PromoActive" class="btn btn-secondary dropdown-toggle" type="button">
                            @if ($promo->PromoActive)
                                <option value= '1' selected>Active</option>
                                <option value= '0' >Disabled</option>
                            @else
                                <option value= '1' >Active</option>
                                <option value= '0' selected>Disabled</option>
                            @endif
                       </select>
                        
                        <br />

                            
                        <br /><br />

                        <button type="submit" class="btn btn-primary"> Save </button>
                        <a href = {{ route('admin.promo.index') }} type="button" class="btn btn-success"> Go Back </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
