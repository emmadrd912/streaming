@extends('layouts.app')

@section('content')
<div class="container">
  <h2> Film </h2>
  <br/>
  <div class="row">
    @foreach ($contents as $content)
    <div style="margin:1%;">
      <a href="{{ route('film.go',$content->id)}}">
        <img src="https://image.tmdb.org/t/p/w154{{ $content->poster_path}}" style=""/>
      </a>
    </div>
    @endforeach
  </div>
  <br/>
  <h2> Série </h2>
  <br/>
</div>
@endsection
