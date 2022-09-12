@extends('layouts.client')

@section('content')

<div class="content-header">
    <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="m-0">Topics notes</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/client">Home</a></li>
                <li class="breadcrumb-item active">Topics notes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

<div class="container py-3">
    <div class="card card-danger card-outline ">
        <div class="card-header">
          <h3 class="card-title"><strong>Topic name:</strong> {{ $notes->topic }}</h3>
        </div> <!-- /.card-body -->
        <div class="card-body bg-light">
        {!! $notes->description !!}
        </div><!-- /.card-body -->
      </div>
</div>
@endsection