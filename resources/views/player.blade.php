@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />
<div class="" style="padding-left:4%;">
  @if(Auth::check())
      @if (Auth::user()->isPremium())
        <a href="{{ url('catalog')}}" class="awhite">
          <i class="fas fa-arrow-left fa-lg"></i>
        </a>
      @endif
  @endif
  @if(Auth::check())
      @if (Auth::user()->isAdmin())
        <a href="{{ url('catalog')}}" class="awhite">
          <i class="fas fa-arrow-left fa-lg"></i>
        </a>
      @endif
  @endif
  @if(Auth::check())
      @if (Auth::user()->isFree())
        <a href="{{ url('catalogfree')}}" class="awhite">
          <i class="fas fa-arrow-left fa-lg"></i>
        </a>
      @endif
  @endif
</div>
<div class="container">
  <br/>
  <video controls buffered preload="none" poster="https://image.tmdb.org/t/p/w1280{{$data->backdrop_path}}" id="player">
                  <!-- Video files -->
                  <source src="{{ asset('storage/'.$data->path) }}" type="video/mp4">


                  <!-- Caption files -->
                  <!-- <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                      default>
                  <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"> -->

                  <!-- Fallback for browsers that don't support the <video> element -->
  </video>
  <br/>
  <div class="playerdiv">
    <div style="width:95%;">
      @if (is_null($data->contentname))
        <h3> {{$data->serie_name}}</h3>
      @else
        <h3> {{$data->contentname}}</h3>
      @endif
    </div>
    <div style="width:5%;">
        <h5> {{ $data->vote}}/10</h5>
    </div>
  </div>
    @if (is_null($data->contentname))
      <p style="font-style:italic"> {{ $data->episode_name }} </p>
    @endif
    <p> {{ $data->release_date }} </p>
    <p> {{ $data->comment }} </p>
</div>

<script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const player = new Plyr('#player');
    window.player = player;
  });
</script>
@endsection
