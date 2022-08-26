
@extends('layouts.app')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach ($promo as $count => $promos)
    @if ($loop->first)
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$count}}" class="active" aria-current="true" aria-label="Slide {{$count}}"></button>
    @else
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$count}}" aria-label="Slide {{$count}}"></button>
    @endif
    
    @endforeach
    
    
{{--     
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
  </div>
  <div class="carousel-inner">
    @if (!$promo)
      <div class="carousel-item active" style="height:32rem;">
        <img src="https://picsum.photos/seed/picsum/800/700" class="d-block w-100" alt="...">
        <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
          <h5 class="card-title">Default Card title - Promotional Message insert here </h5>
          <button class="btn btn-secondary">Learn More</button>
        </div>
      </div>
    @endif

    @foreach ($promo as $count => $promos)
      @if($promos->PromoActive)
        @if ($loop->first)
        <div class="carousel-item active" style="height:32rem;">
          <img src= "/storage/{{ $promos->PromoImage }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
            <h5 class="card-title">{{$promos->PromoTitle}}</h5>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#LearnPromoModal{{$count+1}}">Learn More</button>
          </div>
        </div>
        @else
        <div class="carousel-item" style="height:32rem;">
          <img src= "/storage/{{ $promos->PromoImage }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
            <h5 class="card-title">{{$promos->PromoTitle}} </h5>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#LearnPromoModal{{$count+1}}">Learn More</button>
          </div>
        </div>
        @endif


      @endif
      @if ($loop->count == 0)
      <div class="carousel-item active" style="height:32rem;">
        <img src="https://picsum.photos/seed/picsum/800/700" class="d-block w-100" alt="...">
        <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
          <h5 class="card-title">Default Card title - Promotional Message insert here </h5>
          <button class="btn btn-secondary">Learn More</button>
        </div>
      </div>
      @endif


      {{-- modal-learn-more --}}
      <div class="modal fade" id="LearnPromoModal{{$count+1}}" tabindex="-1" role="dialog" aria-labelledby="LearnPromoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="LearnPromoModalLabel">{{$promos->PromoTitle}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{$promos->PromoCaption}}
              <br />
              {{$promos->PromoDescription}}
              
            </div>
            
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>


</div>

<div class="container">
    <div class="row justify-content-center">
      <div class="row row-cols-1 row-cols-md-4 row-cols-md-2 g-4">
        @foreach ($unit as $count => $unit)
        
          <div class="col col-lg-3 col-md-4 col-sm-6 col-xm-6">
            <div class="card h-100" style="max-height: 450px;overflow-y: auto;">
              <img src="/storage/{{ $unit->unitimage[0]->image }}" class="card-img-top w-100 h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $unit->brand->brandname}} :  {{ $unit->modelname }}</h5>
                <p class="card-text">{{ $unit->modeldescription }} </p>
                <p class="card-text">Php. {{ $unit->price }} </p>
              </div>
              <div class="card-footer">
                  <button class="btn btn-secondary" data-toggle="modal" data-target="#productModal{{$count+1}}">Buy Product</button>
                </div>   
            </div>
          </div>

          <div class="modal fade" id="productModal{{$count+1}}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="productModalLabel">{{$unit->brand->brandname}}:{{$unit->modelname}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form method="POST">
                @csrf   
                <div class="modal-body">
                  <div id="carouselExampleIndicatorsCard{{$count+1}}" class="carousel slide" data-bs-ride="carousel">
                    {{-- <div class="carousel-indicators">
                      @foreach ($unit->unitimage as  $counter => $unit->unitimage)
                      @if ($loop->first)
                      <button type="button" data-bs-target="#carouselExampleIndicatorsCard{{$count+1}}" data-bs-slide-to="{{$counter}}" class="active" aria-current="true" aria-label="Slide {{$counter}}"></button>
                      @else
                      <button type="button" data-bs-target="#carouselExampleIndicatorsCard{{$count+1}}" data-bs-slide-to="{{$counter}}" aria-label="Slide {{$counter}}"></button>
                      @endif
                      @endforeach
                      </div> --}}
                  <div class="carousel-inner">
                    @foreach ($unit->unitimage as  $unit->unitimage)
                      {{-- <img src="/storage/{{ $unit->unitimage->image }}" class="card-img-top w-10 h-10" alt="..."> --}}
                    @if ($loop->first)
                      <div class="carousel-item active" style="height:32rem;">
                        <img src= "/storage/{{ $unit->unitimage->image }}" class="card-img-top d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="card-title">Hello index</h5>
                          <p>white</p>
                        </div>
                      </div>
                      @else
                      <div class="carousel-item" style="height:32rem;">
                        <img src= "/storage/{{$unit->unitimage->image }}" class="card-img-top d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="card-title">Hello {{$count}} </h5>
                          <p>Red</p>
                        </div>
                      </div>
                    @endif
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicatorsCard{{$count+1}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicatorsCard{{$count+1}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </div>
                    
                    {{ $unit->modeldescription }}
                  </div>
                </form>


              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>



@endsection