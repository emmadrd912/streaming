@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />
<div class="container">
<video controls crossorigin playsinline poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
                <!-- Video files -->
                <source src="{{ asset('storage/') }}" type="video/mp4">


                <!-- Caption files -->
                <!-- <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                    default>
                <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"> -->

                <!-- Fallback for browsers that don't support the <video> element -->
            </video>
            <p> {{ $data->path}} </p>
        
</div>
<script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>
<script>
  const player = new Plyr('#player');
  window.player = player;
</script>
@endsection