@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h1 class="center"> With premium access </h1>
  <br/>
  <h2> Some movies </h2>
  <br/>
    <div class="row">
      @if ($contents->isEmpty())
        <p class="notyet"> No film on the site yet. </p>
      @else
        @foreach ($contents as $content)
          @if (is_null($content->poster_path))
          <div class="conteneur goodplace">
              <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg movieplaceholder"/>
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
      @endif
    </div>
    <br/>
    @if ($contents->isEmpty())
      <br>
    @else
      <p>
        Go <a style="color: white;" href="{{ route('billing') }}"> PREMIUM</a> for $9.99 and access all the movies you dream about.
      </p>
    @endif
  <br/>
</div>
@endsection
