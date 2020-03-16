@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="card">
                <div class="card-header">Ajouter un contenu</div>
                <div class="card-body">
                <form>
                <label class="radio-inline"><input type="radio" name="ContentSelect" checked>Film</label>
                <label class="radio-inline"><input type="radio" name="ContentSelect">Série</label>
                </form>
                <form action="{{ route('content.store')}}" method="POST" enctype="multipart/form-data">
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
                                <button class="btn btn-primary" type="submit">Add video</button>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
