@extends('layouts.app')

@section('content')
<div class="container">
  <br>
  <h2> My account </h2>
  <div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <table class="table table-bordered">
      <thead>
          <tr>
            <th><strong>Name</th>
            <th><strong>Email</th>
            <td data-label="PASSWORD"><strong>Password</td>
            <th colspan="2"><strong>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
              <td data-label="NAME">{{$user->name}}</td>
              <td data-label="EMAIL">{{$user->email}}</td>
              <td style="-webkit-text-security: disc;"> password </td>
              <td data-label="ACTION"><a href="{{ route('profile.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
    <br>
  <form action="{{ route('profile.destroy', $user->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit"> Delete my account </button>
  </form>
</div>
</div>
</div>
@endsection
