@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="font-style:italic"> Search </h2>
    <br/>
    @if ($contents->isEmpty() & $series->isEmpty())
      <div class="" style="text-align:center; font-size:x-large; margin-top:10%;">
        <p> No results for : {{$search}} </p>
        Search for a series or movie name.
      </div>
    @else
      <div class="row">
        @foreach ($contents as $content)
          @if (is_null($content->poster_path))
          <div class="conteneur" style="margin:1%; width:14%">
            <a href="{{ route('film.go',$content->id)}}">
                <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg" style="width:99%; margin-top:6%;"/>
            </a>
            <div class="middle">
              <div class="text">
                <p>
                  <a style="text-decoration:none; color: white;" href="{{ route('film.go',$content->id)}}">{{$content->contentname}} </a>
                </p>
                <p> {{$content->vote}}/10 </p>
              </div>
            </div>
          </div>
          @else
            <div class="conteneur" style="margin:1%;">
              <a href="{{ route('film.go',$content->id)}}">
                  <img src="https://image.tmdb.org/t/p/w154{{ $content->poster_path}}" class="catalogimg"/>
              </a>
              <div class="middle">
                <div class="text">
                  <p>
                    <a style="text-decoration:none; color: white;" href="{{ route('film.go',$content->id)}}">{{$content->contentname}} </a>
                  </p>
                  <p> {{$content->vote}}/10 </p>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
      <div class="row">
        @foreach ($series as $serie)
          @if (is_null($serie->still_path))
            <div class="conteneur" style="margin:1%; width:14%">
              <a href="{{ route('serie.go',$serie->id)}}">
                  <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg" style="width:99%; height:35%; margin-top:5%;"/>
              </a>
              <div class="middle">
                <div class="textserie">
                  <p>
                    <a style="text-decoration:none; color: white;" href="{{ route('serie.go',$serie->id)}}">
                      {{$serie->episode_name}}
                      {{$serie->serie_name}}
                    </a>
                  </p>
                  <p> {{$serie->vote}}/10 </p>
                </div>
              </div>
            </div>
            @else
              <div class="conteneur" style="margin:1%;">
                <a href="{{ route('serie.go',$serie->id)}}">
                    <img src="https://image.tmdb.org/t/p/w154{{ $serie->still_path}}" class="catalogimg" style=""/>
                </a>
                <div class="middle">
                  <div class="textserie">
                    <br/>
                    <p>
                      <a style="text-decoration:none; color: white;" href="{{ route('serie.go',$serie->id)}}">
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



@section('styles')
    <style>
        body {
          background-color: rgb(26, 29, 41);
        }
        main {
          color: white;
        }
        .textserie {
          color: white;
        }
        .text {
          color: white;
        }
    </style>
@endsection
