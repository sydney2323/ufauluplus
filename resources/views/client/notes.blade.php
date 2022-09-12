@extends('layouts.client')


@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Full notes</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/client">Home</a></li>
            <li class="breadcrumb-item active">Full notes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container py-3">
    <div class="card card-danger card-outline">
        <div class="card-header">
          <h3 class="card-title">{{$subjectTitle}}</h3>
        </div> <!-- /.card-body -->
        <div class="card-body">
        @if ($subjects->first() === null)
          <p class="text-info">There are no topics for this subject at the moment.!</p>  
        @else
        @foreach ($subjects as $subject)
        <a href="/client/{{Session::get('user')->level}}/level/{{$subject->subject}}/{{$subject->slug}}"><p class="text-dark">>{{ $subject->topic }}</p></a>
        @endforeach  
        @endif
        </div><!-- /.card-body -->
      </div>
</div>

@endsection

{{-- <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> --}}