@extends('layouts.app')

@section('content')
<div class="container">
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <br/>
  <td><a href="{{ route('users.create')}}" class="btn btn-danger"> Create User</a></td>
  <div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <table class="table table-bordered">
      <thead>
          <tr>
            <!-- <td>ID</td> -->
            <th><strong>Name</th>
            <th><strong>Email</th>
            <td data-label="PASSWORD"><strong>Password</td>
            <th><strong>Role</th>
            <th colspan="2"><strong>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
              <!-- <td>{{$user->id}}</td> -->
              <td data-label="NAME">{{$user->name}}</td>
              <td data-label="EMAIL">{{$user->email}}</td>
              <td style="-webkit-text-security: disc;">{{$user->password}}</td>
              <td data-label="ROLE">
                @if(!empty($user->getRoleNames()))
                  @foreach($user->getRoleNames() as $v)
                     <label class="badge badge-success">{{ $v }}</label>
                  @endforeach
                @endif
              </td>
              <td data-label="ACTION"><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('users.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
</div>
</div>
</div>
@endsection
