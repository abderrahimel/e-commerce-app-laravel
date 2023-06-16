@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>category page</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @foreach ($categories as $category )
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/category/'. $category->image) }}" class="cate-image" alt="image">
                                </td>
                                <td>
                                    <a href="{{ url('edit-category/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete-category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>

            </table>
        </div>
    </div>
@endsection