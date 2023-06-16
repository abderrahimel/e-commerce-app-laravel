@extends('layouts.front')

@section('title', $products->name)

@section('content')

<div class="py-3 mb-3 shadow-sm bg-warning border-top">
    <div class="container">
        <div class="mb-0">Collections : {{ $products->category->name }} : {{ $products->name }}</div>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 bg-secondary text-light d-flex">
                    <div style="margin-top: 25px">
                        <img width="100px" height="100px" src="{{ asset('assets/uploads/products/'.$products->image) }}" alt=" smart phone">
                    </div>
                    <div class="ms-5">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                               <label style="font-size: 16px;margin-top: 15px" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <p>Original Price: <s>Rs  {{ $products->original_price }}</s> Selling Price: Rs{{ $products->selling_price }}</p>
                        <p>{{ $products->small_description }}</p>
                        <hr>
                        @if ($products->qty > 0)
                                <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-success">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="margin-right: 30px;width: 120px;">
                                    <div ><button class="input-group-text decrement-btn" style="border-radius: 0%">-</button></div>
                                    <input type="text" name="quantity" value="1" style="border-radius: 0%" class="form-control qty-input" />
                                    <button class="input-group-text increment-btn" style="border-radius: 0%;">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br/>
                                <button type="button" class="btn btn-primary me-3 float-start addToCartBtn" style="margin-left: 40px;">Add to Cart</button>
                                <button type="button" class="btn btn-success me-3 float-start" >Add to Wishlist</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {{!! $products->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
