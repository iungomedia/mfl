@extends('layouts.mfl')

@section('content')
<script>
  const teams = <?php printJson($teams); ?>;
</script>
<div class="pagesCheerleader containerMFL paddingTopPages">
  <div class="containerFilters">
    <h1 class="titlePages">Porristas MFL</h1>
  </div>
  <div class="cheerlanders">
    @foreach ($teams as $index => $team)
    <div class="team" data-index="{{$index}}">
      <div class="assets">
        {{sortCheerlandersAssets($team->assets)}}
        @foreach ($team->assets as $key => $asset)
        @if ($asset->type == "image")
        <div class="asset {{$asset->type}} {{$key == 0 ? '' : 'hidden'}}">
          <img src="{{$asset->source}}" loading="lazy" alt="...">
        </div>
        @endif
        @endforeach
      </div>
      <div class="details">
        <p class="title">{{$team->teamName}}</p>
        <p class="slogan">{{$team->teamSlogan}}</p>
        <img class="logo" src="data:image/png;base64, {{$team->teamLogo}}" alt="team logo" loading="lazy">
      </div>
    </div>

    @endforeach
  </div>
</div>
@endsection
