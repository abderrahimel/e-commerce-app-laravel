@extends('layouts.front')

@section('title')
    Welcome to E-Shop 
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="card" style="width: 18rem;height:20rem">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" width="100px" height="100%" alt="product image" class="card-img-top">
                            <div class="card-body">
                              <p class="card-text">
                                <h5>{{ $prod->name }}</h5>
                                <small>{{ $prod->selling_price }}</small>
                              </p>
                            </div>
                          </div>
                    @endforeach
                </div>             
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $prod)
                        <div class="card" style="width: 18rem;height:100%">
                                <a href="{{ url('view-category/'.$prod->slug) }}">
                                    <img src="{{ asset('assets/uploads/category/'.$prod->image) }}" width="100px" height="100%" alt="product image" class="card-img-top">
                                    <div class="card-body">
                                    <div class="card-text">
                                        <h5>{{ $prod->name }}</h5>
                                      <p>{{ $prod->description }}</p>
                                    </div>
                                    </div>
                                </a>
                          </div>
                    @endforeach
                </div>             
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>

window.onload = function() {
   if (window.jQuery) {  
       // jQuery is loaded  
           $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    } else {
    location.reload();

   }
}
</script>
@endsection