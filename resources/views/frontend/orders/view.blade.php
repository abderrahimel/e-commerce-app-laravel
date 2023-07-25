@extends('layouts.front')

@section('title')
    My orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order view</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                             <label for="">Frst Name</label>
                             <div class="border p-2"> {{ $order->fname }} </div>
                             <label for="">Last Name</label>
                             <div class="border p-2"> {{ $order->lname }} </div>
                             <label for="">Email</label>
                             <div class="border p-2"> {{ $order->email }} </div>
                             <label for="">Contact No.</label>
                             <div class="border p-2"> {{ $order->phone }} </div>
                             <label for="">Shipping Address</label>
                             <div class="border p-2">
                                {{ $order->address1 }} 
                                {{ $order->address2 }} 
                                {{ $order->city }} 
                                {{ $order->state }} 
                                {{ $order->country }} 
                                </div>
                             <label for="">Zip Code</label>
                             <div class="border p-2"> {{ $order->pincode }} </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ $order->tracking_no }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->status == '0' ? 'pending' : 'completed' }}</td>
                                            
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
</div>
@endsection