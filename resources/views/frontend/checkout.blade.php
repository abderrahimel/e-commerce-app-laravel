@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                Home
                </a> /
                <a href="{{ url('checkout') }}">
                Checkout
                </a>
            </h6>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" placeholder="Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" placeholder="Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control" placeholder="State">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)
                                <tr>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->prod_qty }}</td>
                                    <td>{{ $item->products->selling_price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button class="btn btn-primary float-end col-12">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection