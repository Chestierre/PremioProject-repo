@extends('layouts.app')

@section('content')
@if (Session::get('preorder_save'))
  <div class="alert alert-success" role="alert">
      {{ Session::get('preorder_save') }}
  </div>
@endif 

    <div class="container">
        <div class="d-flex">
            <h4 class="text-white">Search Item = {{$SearchTerm}}</h4>
            <p class="text-white mx-2 mt-2" style="font-size:13px">Number shown in page: {{$units->count()}}</p>  
        </div>
        <div class="card">
            <div class="card-body">

                @foreach ($units as $unit)
                <div class="row-9 my-1" style="height: 19em;">
                    <div class="shadow-lg p-5 my-2 bg-white rounded d-flex">
                        <div class="col-md-3">
                            <img src="/storage/{{ $unit->unitimage[0]->image}}" alt="{{$unit->modelname}}" width="235" height="170">
                        </div>
                        <div class="col-md-7">
                            <h4>{{$unit->brand->brandname}}: {{$unit->modelname}}</h4>
                            <p class="opacity-75" style="font-size:13px">{{$unit->modelcaption}}</p>
                            <p style="overflow-y:scroll;max-height: 7em;">{{$unit->modeldescription}}</p>
                        </div>
                        <div class="col-md-2">
                            <p class = "h4 mb-4"><strong>₱ {{number_format($unit->price)}}</strong></p>
                            <a href= "/buyproduct/{{$unit->id}}" class="btn btn-secondary">Buy Now</a>
                            

                        </div>

                    </div>
                </div>
                @endforeach
                <div class="row mt-4">
                  <div class="col-12 d-flex justify-content-center">
                    {{$units->links()}}
                  </div>
                </div>

            </div>

        </div> 
    </div>

@endsection