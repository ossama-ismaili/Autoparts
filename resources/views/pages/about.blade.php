@extends('layouts.app')

@section('content')
<div class="about-section">
    <div class="inner-container">
        <h1>{{__('about.title')}}</h1>
        <p class="text">
            {{__('about.body')}}
        </p>
    </div>
</div>
@endsection
