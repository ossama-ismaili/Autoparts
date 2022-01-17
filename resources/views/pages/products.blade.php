@extends('layouts.app')

@section('content')
<div class="products-section">
    <div class="container">
        <div class="products-container row">
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
                <p class="mx-auto">No product</p>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link text-danger" href="{{$products->previousPageUrl()}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item"><a class="page-link text-danger" href="/products/all?page={{$i}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link text-danger" href="{{$products->nextPageUrl()}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
