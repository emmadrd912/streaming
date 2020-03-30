@extends('layouts.app')

@section('content')
<div class="container">
  <style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <br/>
  <td><a href="{{ route('contents.create')}}" class="btn btn-danger"> Create Content</a></td>
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
            <th><strong>Film </th>
            <th><strong>ID (id de moviedb)</th>
            <th colspan="2"><strong>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($contents as $content)
          <tr>
              <!-- <td>{{$content->id}}</td> -->
              <td data-label="NAME">{{$content->contentname}}</td>
              <td data-label="ID">{{$content->contentid}}</td>
              <td data-label="ACTION"><a href="{{ route('contents.edit',$content->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('contents.destroy', $content->id)}}" method="post">
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