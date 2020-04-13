@extends('layouts.app')

@section('content')
<div class="container blacktext">
  <div class="card uper">
    <div class="card-header">
      Add User
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
        <form method="post" action="{{ route('users.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" class="form-control" name="email"/>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password"/>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="roles" class="browser-default custom-select">
                  @foreach($roles as $role)
                  <option value="{{$role->id}}"> {{$role->name }} </option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
  </div>
</div>
@endsection
