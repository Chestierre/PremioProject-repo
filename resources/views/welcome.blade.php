
@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header h3">{{ __('Promo and Sales') }}</div>

                <div class="card-body">
                    {{-- <div class="card bg-dark text-white">
                            <img src = "https://picsum.photos/seed/picsum/700/300" alt = "" class = "h-100 w-100"/>
                        <div class="card-img-overlay d-flex flex-column align-items-end justify-content-end">
                            <h5 class="card-title">Card title - Promotional Message insert here </h5>
                            <button class="btn btn-secondary">Learn More</button>
                        </div>
                    </div> --}}

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active" style="height:32rem;">
                          <img src="https://picsum.photos/seed/picsum/300/300" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
                            <h5 class="card-title">Card title - Promotional Message insert here </h5>
                            <button class="btn btn-secondary">Learn More</button>
                          </div>
                        </div>
                        <div class="carousel-item" style="height:32rem;">
                          <img src="https://picsum.photos/seed/13/300/200" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
                            <h5 class="card-title">Card title - Promotional Message insert here </h5>
                            <button class="btn btn-secondary">Learn More</button>
                          </div>
                        </div>
                        <div class="carousel-item " style="height:32rem;">
                          <img src="https://picsum.photos/seed/20/300/200" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
                            <h5 class="card-title">Card title - Promotional Message insert here </h5>
                            <button class="btn btn-secondary">Learn More</button>
                          </div>
                        </div>
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
                </div> 
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 row-cols-md-2 g-4">
            <div class="col col-lg-3 col-md-4 col-sm-6 col-xm-6">
              <div class="card">
                <img src="https://picsum.photos/seed/1/300/200" class="card-img-top w-100 h-100" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary">Buy Product</button>
                  </div>   
              </div>
            </div>
            <div class="col col-lg-3  col-md-4 col-sm-6  col-xm-6">
              <div class="card">
                <img src="https://picsum.photos/seed/{seed}/300/200" class="card-img-top w-100 h-100" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a short card.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary">Buy Product</button>
                  </div>  
              </div>
            </div>
            <div class="col col-lg-3 col-md-4 col-sm-6  col-xm-6">
              <div class="card">
                <img src="https://picsum.photos/seed/13/300/200" class="card-img-top w-100 h-100" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary">Buy Product</button>
                  </div>  
              </div>
            </div>
            <div class="col col-lg-3  col-md-4 col-sm-6  col-xm-6">
              <div class="card">
                <img src="https://picsum.photos/300/200" class="card-img-top w-100 h-100" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary">Buy Product</button>
                  </div>  
              </div>
              
            </div>
            <div class="col col-lg-3  col-md-4 col-sm-6 col-xm-6">
                <div class="card h-100">
                  <img src="https://picsum.photos/300/200" class="card-img-top w-100 h-100" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-secondary">Buy Product</button>
                  </div>  
                </div>
          </div>
 
</div>
</div>
</div>
@endsection