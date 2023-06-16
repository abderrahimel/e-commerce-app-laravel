@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
<div class="py-5">
    <div class="container">
       <div class="row">
        <div class="col-md-12">
            <h2>All categories</h2>
            <div class="row">
                @foreach ($category as $categorie)
                <div class="col-md-3 mb-3">
                    <a href="{{ url("view-category/".$categorie->slug) }}">
                        <div class="card" style="heigh: 200px;">
                            <img width="150px"  src="{{ asset('assets/uploads/category/'.$categorie->image) }}" alt="category image"/>
                            <div class="card-body">
                                <h5>{{ $categorie->name }}</h5>
                                <p>{{  $categorie->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
           </div>
       </div>
    </div>
</div>
@endsection