@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>product page</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @foreach ($products as $product )
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->original_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/products/'. $product->image) }}" class="cate-image" alt="image">
                                </td>
                                <td>
                                    <a href="{{ url('edit-product/'.$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('delete-product/'.$product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>

            </table>
        </div>
    </div>
@endsection