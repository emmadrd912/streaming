@extends('layouts.app')

@section('content')
<div class="container">
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
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
            <input type="text" class="form-control" name="contentname" value={{ $content->contentname }} />
          </div>
          <div class="form-group">
            <label for="email">Id :</label>
            <input type="text" class="form-control" name="contentid" value={{ $content->contentid }} />
          </div>
          <div class="form-group">
            <label for="name"> Comment :</label>
            <input type="text" class="form-control" name="comment" value={{ $content->comment }} />
          </div>
          <div class="form-group">
            <label for="name"> Vote :</label>
            <input type="text" class="form-control" name="vote" value={{ $content->vote }} />
          </div>
          <div class="form-group">
            <label for="name"> Date :</label>
            <input type="text" class="form-control" name="date" value={{ $content->release_date }} />
          </div>
          <div class="form-group">
            <label for="name"> Film :</label>
            <input type="file" name="upvideo"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
</div>
@endsection
