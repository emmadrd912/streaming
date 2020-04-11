@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h2> Soon </h2>
  <br/>
  @if ($agendas->isEmpty())
    <div class="notyet">
      <p> No new film or series planned. </p>
    </div>
  @else
    <div class="row">
      @foreach ($agendas as $agenda)
        @if (is_null($agenda->poster_path))
          @if (is_null($agenda->still_path))
          <div class="conteneur goodplace">
              <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg movieplaceholder"/>
            <div class="middle">
              <div class="text">
                <p>
                  {{$agenda->episode_name}} {{$agenda->name}}
                </p>
                <p> {{$agenda->vote}}/10 </p>
                <p> {{$agenda->release_date}} </p>
              </div>
            </div>
          </div>
            @else
              <div class="conteneur contmar">
                    <img src="https://image.tmdb.org/t/p/w154{{ $agenda->still_path}}" class="catalogimg"/>
                <div class="middle">
                  <div class="textserie">
                    <br/>
                    <p>
                        {{$agenda->episode_name}} {{$agenda->name}}
                    </p>
                    <p> {{$agenda->vote}}/10 </p>
                    <p> {{$agenda->release_date}} </p>
                  </div>
                </div>
              </div>
          @endif
        @else
          <div class="conteneur contmar">
              <img src="https://image.tmdb.org/t/p/w154{{ $agenda->poster_path}}" class="catalogimg"/>
            <div class="middle">
              <div class="text">
                <p>
                  {{$agenda->name}}
                </p>
                <p> {{$agenda->vote}}/10 </p>
                <p> {{$agenda->release_date}} </p>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  @endif
</div>
@endsection
