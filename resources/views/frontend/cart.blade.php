@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
              Home
            </a> /
            <a href="{{ url('cart') }}">
               Cart
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="cart shadow product_data">
        @if ($cartitems->count()>0)
          <div class="cart-body">
            @php $total = 0;@endphp
            @foreach ($cartitems as $item)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="70px" heigh="70px" alt="Image here">
                    </div>
                    <div class="col-md-2 my-auto">
                        <h3>{{ $item->products->name }}</h3>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6> Rs {{ $item->products->selling_price }}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        @if($item->products->qty >= $item->prod_qty)
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                            @php $total += $item->products->selling_price   *  $item->prod_qty; @endphp
                        @else
                            <h6>Out of stock</h6>
                       @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
            @endforeach
           </div>
            <div class="card-footer">
                <h6>Total price : Rs {{ $total }}</h6>
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </div>  
        @else
          <div class="card-body text-center">
               <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
               <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
          </div>
        @endif
        
    </div>
</div>
   
</div>
@endsection