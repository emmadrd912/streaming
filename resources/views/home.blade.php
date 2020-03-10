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


                    <form action="/add-video" method="POST">
                        @csrf
                        <div class="field">
                            <label class="label"> New video </label>
                            <div class="control">
                                <input class="input" type="file" name="video">
                            </div>
                            @if($errors->has('video'))
                                <p class="help is-danger">{{ $errors->first('video') }}</p>
                            @endif
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-link" type="submit">Add video</button>
                            </div>
                        </div>            
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
