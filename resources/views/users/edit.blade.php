@extends('layouts.app')

@section('content')
<div class="container" style="color:black;">
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      Edit Users
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
        <form method="post" action="{{ route('users.update', $user->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <label for="name">User Name :</label>
            <input type="text" class="form-control" name="name" value={{ $user->name }} />
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" name="email" value={{ $user->email }} />
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" class="form-control" name="password" value={{ $user->password }} />
          </div>
          <div class="form-group">
            <label for="password"> Role : {{ $user->getRoleNames() }}</label>
          </div>
          <div class="form-group">
              <label for="role"> Nouveau Role:</label>
              <select name="roles" class="browser-default custom-select">
                @foreach($roles as $role)
                <option value="{{$role->id}}"> {{$role->name }} </option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
</div>
@endsection
