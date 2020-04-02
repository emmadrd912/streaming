@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h2> Film </h2>
  <br/>
  @if ($contents->isEmpty())
    <div class="" style="font-style:italic; padding-left:2%;">
      <p> No film yet, it will happen soon :) </p>
    </div>
  @else
    <div class="row">
      @foreach ($contents as $content)
        @if (is_null($content->poster_path))
        <div style="margin:1%; width:14%">
          <a href="{{ route('film.go',$content->id)}}">
              <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" style="width:99%; margin-top:6%;"/>
          </a>
        </div>
        @else
          <div style="margin:1%;">
            <a href="{{ route('film.go',$content->id)}}">
                <img src="https://image.tmdb.org/t/p/w154{{ $content->poster_path}}" style=""/>
            </a>
          </div>
        @endif
      @endforeach
    </div>
  @endif
  <br/>
  <h2> Série </h2>
  <br/>
  @if ($series->isEmpty())
    <div class="" style="font-style:italic; padding-left:2%;">
      <p> No serie yet, it will happen soon :) </p>
    </div>
  @else
    <div class="row">
      @foreach ($series as $serie)
        @if (is_null($serie->still_path))
          <div style="margin:1%; width:14%">
            <a href="{{ route('serie.go',$serie->id)}}">
                <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" style="width:99%; height:35%; margin-top:5%;"/>
            </a>
          </div>
          @else
            <div style="margin:1%;">
              <a href="{{ route('serie.go',$serie->id)}}">
                  <img src="https://image.tmdb.org/t/p/w154{{ $serie->still_path}}" style=""/>
              </a>
            </div>
        @endif
      @endforeach
    </div>
  @endif
</div>
@endsection
