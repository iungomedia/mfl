@extends('layouts.mfl')

@section('content')
<div class="superslider supersliderHome">
    <div class="slides-container">
        <img src="{{asset('/images/landing/Aguilas.jpg')}}">
        <img src="{{asset('/images/landing/Avispones.jpg')}}">
        <img src="{{asset('/images/landing/Halcones.jpg')}}">
        <img src="{{asset('/images/landing/Potros.jpg')}}">
        <img src="{{asset('/images/landing/Pumas.jpg')}}">
    </div>
    <div class="superSliderCaption">
        <h1 class="titleSuperSliderHome">
            MONTERREY FOOTBALL LEAGUE
        </h1>
        <p class="subtitleSuperSliderHome">
            La mejor liga de fútbol americano infantil y juvenil de México
        </p>
    </div>
</div>
@endsection
