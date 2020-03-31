@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">Ajouter un contenu</div>
                <div class="card-body">
                <form>
                <label class="radio-inline"><input type="radio" onclick="magueule('film');" name="select" id=filmcheck checked>Film</label>
                <label class="radio-inline"><input type="radio" onclick="magueule('serie');" name="select" id=seriecheck >Série</label>
                </form>
                <div id="videodiv">
                    <form action="{{ route('contents.moviestore')}}" method="POST" enctype="multipart/form-data" id="video">
                        @csrf
                        <div class="field">
                            <div class="form-group">
                                <label for="film_name">Film name :</label>
                                <input type='text' class="form-control" name="filmname" placeholder="Name of the movie"></input>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="file" name="video">
                            </div>
                            @if($errors->has('video'))
                                <p class="help is-danger">{{ $errors->first('video') }}</p>
                            @endif
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="btn btn-primary" type="submit">Add movie</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id=seriediv>
                    <form action="{{ route('contents.seriestore')}}" enctype="multipart/form-data" method="POST" id="serie">
                        @csrf
                        <div class="field">
                            <div class="form-group">
                                <label for="serie_name">Serie name :</label>
                                <input type='text' class="form-control" name="serie_name" placeholder="Name of the serie"></input>
                            </div>
                        </div>
                        <div class="field">
                          <div class="form-group">
                              <label for="quantity">Number of season you want to add :</label>
                              <input type="number" id="quantity" name="number_season" min="0" max="100" step="1" value="1">
                          </div>
                        </div>
                        <div class="field">
                          <div class="form-group">
                              <label for="quantity">Number of episode you want to add :</label>
                              <input type="number" id="quantity" name="number_episode" min="0" max="100" step="1" value="1">
                          </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="file" name="serie">
                            </div>
                            @if($errors->has('serie'))
                                <p class="help is-danger">{{ $errors->first('serie') }}</p>
                            @endif
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="btn btn-primary" type="submit">Add serie</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('videodiv').style.display='block';
document.getElementById('seriediv').style.display='none';
function magueule(value)
{
    if(value=='film')
    {
        document.getElementById('videodiv').style.display='block';
        document.getElementById('seriediv').style.display='none';
    }
    else if(value=='serie')
    {
        document.getElementById('seriediv').style.display='block';
        document.getElementById('videodiv').style.display='none';
    }
}
</script>
@endsection
