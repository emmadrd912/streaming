@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h1 style="text-align:center;"> With premium access </h1>
  <br/>
  <h2> Some movies </h2>
  <br/>
    <div class="row">
      @foreach ($contents as $content)
        @if (is_null($content->poster_path))
        <div class="conteneur" style="margin:1%; width:14%">
            <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg" style="width:99%; margin-top:6%;"/>
          <div class="middle">
            <div class="text">
              <p>
                {{$content->contentname}}
              </p>
              <p> {{$content->vote}}/10 </p>
            </div>
          </div>
        </div>
        @else
          <div class="conteneur" style="margin:1%;">
              <img src="https://image.tmdb.org/t/p/w154{{ $content->poster_path}}" class="catalogimg"/>
            <div class="middle">
              <div class="text">
                <p>
                  {{$content->contentname}}
                </p>
                <p> {{$content->vote}}/10 </p>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  <br/>
</div>
@endsection
