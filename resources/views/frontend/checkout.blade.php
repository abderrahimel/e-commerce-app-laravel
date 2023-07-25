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
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->fname }}" name="fname" placeholder="Enter First Name">
                                    @if ($errors->has('fname'))
                                        <span class="help-block text-danger">
                                            <strong>First Name field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                    @if ($errors->has('lname'))
                                        <span class="help-block text-danger">
                                            <strong>Last Name field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                            <strong>Email field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" class="form-control"value="{{ Auth::user()->phone }}" name="phone" placeholder="Phone Number">
                                    @if ($errors->has('phone'))
                                        <span class="help-block text-danger">
                                            <strong>Phone Number field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Address 1">
                                    @if ($errors->has('address1'))
                                        <span class="help-block text-danger">
                                            <strong>Address 1 field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Address 2">
                                    @if ($errors->has('address2'))
                                        <span class="help-block text-danger">
                                            <strong>Address 2 field is required</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="City">
                                    @if ($errors->has('city'))
                                        <span class="help-block text-danger">
                                            <strong>City field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="State">
                                    @if ($errors->has('state'))
                                        <span class="help-block text-danger">
                                            <strong>State field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Country">
                                    @if ($errors->has('country'))
                                        <span class="help-block text-danger">
                                            <strong>Country field is required</strong>
                                        </span>
                                     @endif
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Pin Code">
                                    @if ($errors->has('pincode'))
                                        <span class="help-block text-danger">
                                            <strong>Pin Code field is required</strong>
                                        </span>
                                     @endif
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
                            <button type="submit" class="btn btn-primary float-end col-12">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection