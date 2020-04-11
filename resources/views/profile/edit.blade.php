@include('layouts.app')

@section('content')
<div class="container">
<div class="card uper">
  <div class="card-header">
    Edit my profile
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
    <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
      </div>
      <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
      </div>
      <div class="form-group">
          <label for="password">New password</label>
          <input type="password" name="password" value="" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">
        Update
      </button>
  </form>
  </div>
</div>
</div>
