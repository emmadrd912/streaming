@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h1> Invoices </h1>
  <div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <table class="table table-bordered">
      <thead>
          <tr>
            <th><strong> Date </th>
            <th><strong> Price </th>
            <th colspan="2"><strong>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                <td>{{ $invoice->total() }}</td>
                <td> <a style="color:grey;" href="account/invoices/{{ $invoice->id }}">Download</a> </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  <div>
</div>
</div>
</div>
@endsection
