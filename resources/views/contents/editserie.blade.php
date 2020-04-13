@extends('layouts.app')

@section('content')
<div class="container blacktext">
  <div class="card uper">
    <div class="card-header">
      Edit content
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('contents.updateserie', $serie->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name"> Serie name :</label>
            <input type="text" class="form-control" name="serie_name" value="{{ $serie->serie_name }}" />
          </div>
          <div class="form-group">
            <label for="email"> Season :</label>
            <input type="text" class="form-control" name="episode_season" value="{{ $serie->episode_season }}" />
          </div>
          <div class="form-group">
            <label for="name"> Episode name :</label>
            <input type="text" class="form-control" name="episode_name" value="{{ $serie->episode_name }}" />
          </div>
          <div class="form-group">
            <label for="name"> Episode id :</label>
            <input type="text" class="form-control" name="episode_id" value="{{ $serie->episode_id }}" />
          </div>
          <div class="form-group">
            <label for="name"> Comment :</label>
            <input type="text" class="form-control" name="comment" value="{{ $serie->comment }}" />
          </div>
          <div class="form-group">
            <label for="name"> Vote :</label>
            <input type="text" class="form-control" name="vote" value="{{ $serie->vote }}" />
          </div>
          <div class="form-group">
            <label for="name"> Date :</label>
            <input type="text" class="form-control" name="date" value="{{ $serie->release_date }}" />
          </div>
          <label for="name"> File :</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="upserie" class="custom-file-input" id="fileserie">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
</div>
<script>
   $('#fileserie').on('change',function(){
       var fileName = $(this).val().replace('C:\\fakepath\\', " ");
       $(this).next('.custom-file-label').html(fileName);
   });
</script>
@endsection
