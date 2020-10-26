@extends('layouts.mfl')
@section('content')

<div class="pagesContact containerFullMFL">
  <div class="leftContainer" style="background-image:url('data:image/png;base64, {{$contact->img_contacto}}')">
  </div>
  <div class="rightContainer">
    <div class="contactContainer">
      <div class="headContact">
        <h1 class="titleHeadContact">CONTACTO</h1>
        <p class="infoHeadContact">
          <span class="labelContact">Encargado: </span>
          <span class="dataContact">{{$contact->manger}}</span>
        </p>
        <p class="infoHeadContact">
          <span class="labelContact">Dirección: </span>
          <span class="dataContact">{{$contact->address}}</span>
        </p>
        <p class="infoHeadContact">
          <span class="labelContact">Telefono: </span>
          <span class="dataContact">{{$contact->telephone}}</span>
        </p>
      </div>
      <div class="socialContact">
        <p class="infoSocialContact">
          <a class="linkSocialContact" href="https://www.facebook.com/{{$contact->facebook}}" target="_blank">
            <span class="iconSocial fab fa-facebook"></span>
            <span class="nameSocial">{{$contact->facebook}}</span>
          </a>
        </p>
        <p class="infoSocialContact">
          <a class="linkSocialContact" href="https://www.instagram.com/{{$contact->instagram}}" target="_blank">
            <span class="iconSocial fab fa-instagram"></span>
            <span class="nameSocial">{{$contact->instagram}}</span>
          </a>
        </p>
        <p class="infoSocialContact">
          <a class="linkSocialContact" href="https://www.twitter.com/{{$contact->twitter}}" target="_blank">
            <span class="iconSocial fab fa-twitter"></span>
            <span class="nameSocial">{{$contact->twitter}}</span>
          </a>
        </p>
        <p class="infoSocialContact">
          <a class="linkSocialContact" href="https://{{$contact->web}}" target="_blank">
            <span class="iconSocial fab fa-chrome"></span>
            <span class="nameSocial">{{$contact->web}}</span>
          </a>
        </p>
      </div>
      <div class="mapContact" id="map" data-lat="{{$contact->mapLat}}" data-lon="{{$contact->mapLang}}"></div>
    </div>
  </div>
</div>

@endsection
