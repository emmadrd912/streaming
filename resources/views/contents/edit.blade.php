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
        <form method="post" action="{{ route('contents.update', $content->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <label for="name"> Name :</label>
            <input type="text" class="form-control" name="contentname" value="{{ $content->contentname }}" />
          </div>
          <div class="form-group">
            <label for="email">Id :</label>
            <input type="text" class="form-control" name="contentid" value="{{ $content->contentid }}" />
          </div>
          <div class="form-group">
            <label for="name"> Comment :</label>
            <input type="text" class="form-control" name="comment" value="{{ $content->comment }}" />
          </div>
          <div class="form-group">
            <label for="name"> Vote :</label>
            <input type="text" class="form-control" name="vote" value="{{ $content->vote }}" />
          </div>
          <div class="form-group">
            <label for="name"> Date :</label>
            <input type="text" class="form-control" name="date" value="{{ $content->release_date }}" />
          </div>
          <label for="name"> File :</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="upvideo" class="custom-file-input" id="filemovie">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
</div>
<script>
   $('#filemovie').on('change',function(){
       var fileName = $(this).val().replace('C:\\fakepath\\', " ");
       $(this).next('.custom-file-label').html(fileName);
   });
</script>
@endsection
