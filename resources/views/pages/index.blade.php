@extends('layouts.app')

@section('content')
<div class="home-section">
    <div class="container">
        <h1 class="text-center border-bottom border-danger">Recent Products</h1>
        <div class="row">
            @if (count($products) > 0)
                @foreach ($products as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card my-2 card">
                            <div class="product-card-container">
                                <a href="/products/{{$item->id}}">
                                    <img src="{{env('APP_URL')}}/storage/{{$item->image}}" alt="product img" class="card-img-top product-card-img" width="100%" height="250px">
                                    <div class="product-card-middle">
                                        <div class="product-card-text">
                                            <i class="fa fa-shopping-bag"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="product-title card-title">
                                    <h1>{{$item->title}}</h1>
                                </div>
                                <p class="product-text card-text">Price : {{$item->price}} DH</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No product</p>
            @endif
            <div class="col-12 row mt-3">
                <a class="btn btn-danger col-md-4 mx-auto" href="/products/all">View All Products</a>
            </div>
        </div>
    </div>
</div>
@endsection
