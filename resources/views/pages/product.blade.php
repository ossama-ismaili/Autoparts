
@extends('layouts.app')

@section('content')
<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger text-center">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-primary text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <h2>{{$product->title}}</h2>
            </div>
        </div>
        <div class="row">
            <img src="{{env('APP_URL')}}/storage/{{$product->image}}" alt="product img" class="col-md-4" />
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 mt-3">
                        Price <span class="float-right">{{$product->price}} DH</span>
                    </div>
                    <div class="col-12 mt-3">
                        Category <span class="float-right">{{$product->subcategory->name}}</span>
                    </div>
                    @if(Auth::check())
                        <div class="col-12 mt-3">
                            <form action="{{route('make-payment')}}" method="POST">
                                @csrf
                                <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{env('STRIPE_KEY')}}"
                                    data-amount="{{$product->price*100}}"
                                    data-name="Stripe Payment"
                                    data-description="Product Payment"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-currency="MAD">
                                </script>
                                <input type="hidden" name="product" value="{{$product->id}}">
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="border-bottom border-danger" style="width: min-content;">Description</h3>
                <p>{!! $product->description !!}</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
@endsection
