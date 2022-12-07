  @extends('layouts.app')
  @section('content')


  @if (Session::get('preorder_save'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('preorder_save') }}
    </div>
  @endif


  @if($unit->currentPage() == 1)
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    @if($promo->count() <= 0)
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
      </div>

    
    <div class="carousel-inner">

        <div class="carousel-item active" style="height:32rem;">
          <img src="https://picsum.photos/700/300?random=1" class="d-block w-100" alt="...">
          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
            <h5 class="card-title">Default Card title - Promotional Message insert here </h5>
            <button class="btn btn-secondary">Learn More</button>
          </div>
        </div>
        <div class="carousel-item" style="height:32rem;">
          <img src="https://picsum.photos/700/300?random=2" class="d-block w-100" alt="...">
          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
            <h5 class="card-title">Default Card title - Promotional Message insert here </h5>
            <button class="btn btn-secondary">Learn More</button>
          </div>
        </div>
        <div class="carousel-item" style="height:32rem;">
          <img src="https://picsum.photos/700/300?random=3" class="d-block w-100" alt="...">
          <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
            <h5 class="card-title">Default Card title - Promotional Message insert here </h5>
            <button class="btn btn-secondary">Learn More</button>
          </div>
        </div>
      @endif
      <div class="carousel-indicators">
        @foreach ($promo as $count => $promos)
          @if ($loop->first)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$count}}" class="active" aria-current="true" aria-label="Slide {{$count}}"></button>
          @else
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$count}}" aria-label="Slide {{$count}}"></button>
          @endif
        @endforeach
      </div>

      <div class="carousel-inner">
      @foreach ($promo as $count => $promos)
        
          @if ($loop->first)
            
            <div class="carousel-item active" style="height:32rem;">
              <img src= "/storage/{{ $promos->PromoImage }}" class="d-block w-100" alt="..." height="510">
              <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
                <h5 class="card-title">{{$promos->PromoTitle}}</h5>
                <button class="btn btn-secondary LearnMorebtn" data-id="{{$promos->id}}">Learn More</button>
              </div>
            </div>
          @else

          <div class="carousel-item" style="height:32rem;">
            <img src= "/storage/{{ $promos->PromoImage }}" class="d-block w-100" alt="..." height="510">
            <div class="carousel-caption d-flex flex-column align-items-end justify-content-end">
              <h5 class="card-title">{{$promos->PromoTitle}} </h5>
              <button class="btn btn-secondary LearnMorebtn" data-id="{{$promos->id}}">Learn More</button>
            </div>
          </div>
          @endif



        
 
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
  @endif

  <div class="container">
    <div class="row justify-content-center">
      <div class="row row-cols-1 row-cols-md-4 row-cols-md-2 g-2">
        @foreach ($unit as $count => $units)
          <div class="col">
            <div class="card h-100" style="">
              <img src="/storage/{{ $units->unitimage[0]->image }}" class="card-img-top" alt="..." height="160">
              <div class="card-body" style="max-height: 175px;overflow-y: auto;">
                <h5 class="card-title">{{ $units->brand->brandname}} :  {{ $units->modelname }}</h5>
                <p class="card-text">{{ $units->modelcaption }} </p>
              </div>
              <div class="card-footer d-flex">
                  <button class="btn btn-secondary buyProductbtn" data-id="{{$units->id}}" >Buy Product</button>
                  <p class="h5 mx-2">&#8369 {{ number_format($units->price) }} </p>
              </div>   
            </div>
          </div>
        @endforeach

        </div>
      </div>
      <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
          {{$unit->links()}}
        </div>
      </div>
  </div>

      


  <div class="modal fade" id="LearnPromoModal" tabindex="-1" role="dialog" aria-labelledby="LearnPromoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LearnPromoModalLabel"><span id="LearnPromoTitle"><span></h5>
          <button type="button" class="close LearnPromoModal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div id="LearnCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="LearnInnerCarousel">

                </div>
                <a class="carousel-control-prev" href="#LearnCarousel" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#LearnCarousel" data-slide="next" role="button">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
             
            
            
            
              </div>
            <div class="col-md-4">
              <span class="h6">Unit Model:</span> <span id="LearnModelName"></span>
              <br>
              <span class="h6">Unit Caption:</span> <span id="LearnModelCaption"></span>
              <br> 
              <span class="h6">Unit Brand:</span> <span id="LearnBrandName"></span> 
              <br>
              <span class="h6">Unit Price:</span> &#8369 <span id="LearnPrice"></span>
              <br>
              <a class="mt-2 btn btn-secondary" id="LearnBuybtn" href="">Buy Now</a>
              
            </div>
          </div>
          <span id="LearnPromoCaption"></span>
          <hr />
          <span id="LearnPromoDescription"></span>
        </div> 
        
      </div>
    </div>
  </div>


  <div id="productCardModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productCardModal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productCardModal-title"><span id="productCardModalTitle"></span></h5>
          <button class="close productCardModal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div id="my-carousel" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner" id="productCardCarousel">

                </div>
                <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <span class="h6">Unit Model:</span> <span id="ProductModelName"></span>
              <br>
              <span class="h6">Unit Caption:</span> <span id="ProductModelCaption"></span>
              <br> 
              <span class="h6">Unit Brand:</span> <span id="ProductBrandName"></span> 
              <br>
              <span class="h6">Unit Price:</span> &#8369 <span id="ProductPrice"></span>
              <br>
              <a class="mt-2 btn btn-secondary" id="ProductBuybtn" href="">Buy Now</a>
            </div>
            
            <hr class="mt-4"/>
            <span id="ProductUnitDescription"></span>
          </div>
        </div>
      </div>
    </div>
  </div>


  @endsection

  @section('scripts')

  <script type="text/javascript">
    $(document).ready(function(){
      $('.LearnMorebtn').on('click', function(){
        promo_id = $(this).attr('data-id');

        $.get('/getpromo/'+promo_id, function(data){

          var PromoTitle = data.PromoTitle;
          var modelname = data.unit.modelname;
          var modelcaption = data.unit.modelcaption;
          var brandname = data.unit.brand.brandname;
          var price = data.unit.price;
          var PromoCaption = data.PromoCaption;
          var PromoDescription = data.PromoDescription;


          $('#LearnPromoTitle').html(PromoTitle);
          $('#LearnModelName').html(modelname);
          $('#LearnModelCaption').html(modelcaption);
          $('#LearnBrandName').html(brandname);
          $('#LearnPrice').html(number_format(price));
          $('#LearnPromoCaption').html(PromoCaption);
          $('#LearnPromoDescription').html(PromoDescription);
          var appending = ""; 
          $.each(data.unit.unitimage, function(key, item){
              if (key === 0){
                appends = '<div class="carousel-item active LearnInnerDelete">\
                  <img class="d-block w-100 LearnInnerDelete" src="/storage/'+item.image+'" alt="" height="300">\
                    <div class="carousel-caption d-flex flex-column align-items-end justify-content-end LearnInnerDelete">\
                      <h5 class="LearnInnerDelete">'+item.ImageVariation+'</h5>\
                    </div>\
                  </div>'
                  appending = appending +appends;
              }else{
                appends = '<div class="carousel-item LearnInnerDelete">\
                    <img class="d-block w-100 LearnInnerDelete" src="/storage/'+item.image+'" alt="" height="300">\
                    <div class="carousel-caption d-flex flex-column align-items-end justify-content-end LearnInnerDelete">\
                      <h5 class="LearnInnerDelete">'+item.ImageVariation+'</h5>\
                    </div>\
                  </div>'
                  appending = appending +appends;
              };

              
          });
          $('#LearnInnerCarousel').append(appending);
          $('#LearnBuybtn').replaceWith("<a class=\"mt-2 btn btn-secondary\" id=\"LearnBuybtn\" href=\"/buyproduct/"+data.unit.id+"\">Buy Now</a>");


        });

        $('#LearnPromoModal').modal('show');
      });

      $('.LearnPromoModal-dismiss').on('click', function(){
        $('#LearnPromoModal').modal('hide');
      });

      $('#LearnPromoModal').on('hidden.bs.modal', function (e) {
            $('.LearnInnerDelete').remove();
      })

      $('#productCardModal').on('hidden.bs.modal', function (e) {
            $('.productCardDelete').remove();
      })

      $('.productCardModal-dismiss').on('click', function(){
        $('#productCardModal').modal('hide');
      });

      $('.buyProductbtn').on('click', function(){
        unit_id = $(this).attr('data-id');
        

        $.get('/getunit/'+unit_id, function(data){
          
          
          var modelname = data.modelname;
          var modelcaption = data.modelcaption;
          var brandname = data.brand.brandname;
          var price = data.price;
          var modeldescription = data.modeldescription;

          $('#productCardModalTitle').html(modelname);
  
          $('#ProductModelName').html(modelname);
          $('#ProductModelCaption').html(modelcaption);
          $('#ProductBrandName').html(brandname);
          $('#ProductPrice').html(number_format(price));
          
          $('#ProductUnitDescription').html(modeldescription);

          var appending = "";
          $.each(data.unitimage, function(key, item){
              if (key === 0){
                appends = '<div class="carousel-item active productCardDelete">\
                  <img class="d-block w-100 productCardDelete" src="/storage/'+item.image+'" alt="" height="300">\
                    <div class="carousel-caption d-none d-md-block d-flex flex-column align-items-end justify-content-end productCardDelete">\
                      <h5 class="productCardDelete">'+item.ImageVariation+'</h5>\
                    </div>\
                  </div>'
                  appending = appending +appends;
              }else{
                appends = '<div class="carousel-item productCardDelete">\
                    <img class="d-block w-100 productCardDelete" src="/storage/'+item.image+'" alt="" height="300">\
                    <div class="carousel-caption d-none d-md-block d-flex flex-column align-items-end justify-content-end productCardDelete">\
                      <h5 class="productCardDelete">'+item.ImageVariation+'</h5>\
                    </div>\
                  </div>'
                  appending = appending +appends;
              };

              
          });
          $('#productCardCarousel').append(appending);
          $('#ProductBuybtn').replaceWith("<a class=\"mt-2 btn btn-secondary\" id=\"ProductBuybtn\" href=\"/buyproduct/"+data.id+"\">Buy Now</a>");
        });
        $('#productCardModal').modal('show');
      });
    });

    function number_format (number, decimals, dec_point, thousands_sep) {
      // Strip all characters but numerical ones.
      number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
      var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
          s = '',
          toFixedFix = function (n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
          };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }
  </script>
    
  @endsection