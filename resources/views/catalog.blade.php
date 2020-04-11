@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h2> Film </h2>
  <br/>
  @if ($contents->isEmpty())
    <div class="notyet">
      <p> No film yet, it will happen soon :) </p>
    </div>
  @else
    <div class="row">
      @foreach ($contents as $content)
        @if (is_null($content->poster_path))
        <div class="conteneur goodplace">
          <a href="{{ route('film.go',$content->id)}}">
              <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg movieplaceholder"/>
          </a>
          <div class="middle">
            <div class="text">
              <p>
                <a class="awhite" href="{{ route('film.go',$content->id)}}">{{$content->contentname}} </a>
              </p>
              <p> {{$content->vote}}/10 </p>
            </div>
          </div>
        </div>
        @else
          <div class="conteneur contmar">
            <a href="{{ route('film.go',$content->id)}}">
                <img src="https://image.tmdb.org/t/p/w154{{ $content->poster_path}}" class="catalogimg"/>
            </a>
            <div class="middle">
              <div class="text">
                <p>
                  <a class="awhite" href="{{ route('film.go',$content->id)}}">{{$content->contentname}} </a>
                </p>
                <p> {{$content->vote}}/10 </p>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  @endif
  <br/>
  <h2> Série </h2>
  <br/>
  @if ($series->isEmpty())
    <div class="notyet">
      <p> No serie yet, it will happen soon :) </p>
    </div>
  @else
    <div class="row">
      @foreach ($series as $serie)
        @if (is_null($serie->still_path))
          <div class="conteneur goodplace">
            <a href="{{ route('serie.go',$serie->id)}}">
                <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg serieplaceholder"/>
            </a>
            <div class="middle">
              <div class="text">
                <p>
                  <a class="awhite" href="{{ route('serie.go',$serie->id)}}">
                    {{$serie->episode_name}}
                    {{$serie->serie_name}}
                  </a>
                </p>
                <p> {{$serie->vote}}/10 </p>
              </div>
            </div>
          </div>
          @else
            <div class="conteneur contmar">
              <a href="{{ route('serie.go',$serie->id)}}">
                  <img src="https://image.tmdb.org/t/p/w154{{ $serie->still_path}}" class="catalogimg" style=""/>
              </a>
              <div class="middle">
                <div class="text">
                  <p>
                    <a class="awhite" href="{{ route('serie.go',$serie->id)}}">
                      {{$serie->episode_name}} {{$serie->serie_name}}
                    </a>
                  </p>
                  <p> {{$serie->vote}}/10 </p>
                </div>
              </div>
            </div>
        @endif
      @endforeach
    </div>
  @endif
</div>
@endsection
