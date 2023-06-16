@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>
            @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                                <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="product image">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <small>{{ $prod->selling_price }}</small>
                                </div>
                           </a>
                        </div>
                    </div>
                @endforeach
            <div class="owl-carousel featured-carousel owl-theme">
                
            </div>             
        </div>
    </div>
</div>
@endsection