@extends('layout')

@section('innerpage')

<section class="h-100 gradient-form" style="background-color: #eee;">
    <br>
  <div class="container py-5 h-100"style="background-color: white;">

<table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
      <th scope="col">Current Balance</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lims as $key=>$item)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $item->name }}</td>
      <td>{{ $item->contact }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->current_bal }}</td>
    </tr>
    @endforeach


  </tbody>
</table>

  </div>
</section>
@endsection
