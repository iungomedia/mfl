@extends('layouts.mfl')

@section('content')
<div class="pagesCheerleader containerMFL paddingTopPages">
     <div class="containerFilters">
        <h1 class="titlePages">Porristas MFL</h1>
    </div>
    <div class="containerCards">
        <div class="listCardsResult">
            @foreach ($teams as $team)
                <div class="mix itemCardsResult">
                    <a href="https://simplelightbox.com/img/full/04.jpg" class="linkCardsResult glightbox">
                         <div class="containCardsResult">
                            <div class="imageCard"></div>
                            <div class="captionCard">
                                <p class="textCaptionCard">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                            </div>
                        </div>
                    </a>
                    </a>
                </div>
                <div class="mix itemCardsResult">
                    <a href="https://biati-digital.github.io/glightbox/demo/pexels-video-1550080.mp4" class="linkCardsResult glightbox">
                        <div class="containCardsResult">
                            <div class="imageCard"></div>
                            <div class="captionCard">
                                <p class="textCaptionCard">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod consectetur adipisicing elit, sed do eiusmod< </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection