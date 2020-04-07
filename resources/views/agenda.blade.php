@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h2> Soon </h2>
  <br/>
  @if ($agendas->isEmpty())
    <div class="" style="font-style:italic; padding-left:2%;">
      <p> Not yet :) </p>
    </div>
  @else
    <div class="row">
      @foreach ($agendas as $agenda)
        @if (is_null($agenda->poster_path))
          @if (is_null($agenda->still_path))
          <div class="conteneur" style="margin:1%; width:14%">
            <a href="#">
                <img src="https://www.flixdetective.com/web/images/poster-placeholder.png" class="catalogimg" style="width:99%; margin-top:6%;"/>
            </a>
            <div class="middle">
              <div class="text">
                <p>
                  <a style="text-decoration:none; color:black;" href="#">{{$agenda->episode_name}} {{$agenda->name}} </a>
                </p>
                <p> {{$agenda->vote}}/10 </p>
              </div>
            </div>
          </div>
            @else
              <div class="conteneur" style="margin:1%;">
                <a href="#">
                    <img src="https://image.tmdb.org/t/p/w154{{ $agenda->still_path}}" class="catalogimg" style=""/>
                </a>
                <div class="middle">
                  <div class="textserie">
                    <br/>
                    <p>
                      <a style="text-decoration:none; color:black;" href="#">
                        {{$agenda->episode_name}} {{$agenda->name}}
                      </a>
                    </p>
                    <p> {{$agenda->vote}}/10 </p>
                  </div>
                </div>
              </div>
          @endif
        @else
          <div class="conteneur" style="margin:1%;">
            <a href="#">
                <img src="https://image.tmdb.org/t/p/w154{{ $agenda->poster_path}}" class="catalogimg"/>
            </a>
            <div class="middle">
              <div class="text">
                <p>
                  <a style="text-decoration:none; color:black;" href="#">{{$agenda->name}} </a>
                </p>
                <p> {{$agenda->vote}}/10 </p>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  @endif
</div>
@endsection
