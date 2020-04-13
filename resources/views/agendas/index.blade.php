@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <td><a href="{{ route('agendas.create')}}" class="btn btn-danger"> Create Agenda </a></td>
  <div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <h3> Agenda :</h3>
    <br/>
    <table class="table table-bordered">
      <thead>
          <tr>
            <th><strong>Film </th>
            <th colspan="2"><strong>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($agendas as $agenda)
          <tr>
              <td data-label="NAME">{{$agenda->name}}</td>
              <td>
                  <form action="{{ route('agendas.destroy', $agenda->id)}}" method="post">
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
