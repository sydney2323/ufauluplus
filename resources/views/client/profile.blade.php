
@extends('layouts.client')

@section('content')
 <div class="container">
<div class="col-md-12 mt-5">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user shadow">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-danger">
        <h3 class="widget-user-username">{{Session::get('user')->fname.' '.Session::get('user')->lname}}</h3>
      </div>
      <div class="widget-user-image">
        @if (Session::get('user')->image == null)
        <img class="img-circle elevation-2" src="../dist/img/j5.png" alt="">
        @else
        <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="">    
        @endif
       
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Email</h5>
              <span>{{Session::get('user')->email}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Phone Number</h5>
              <span>{{Session::get('user')->number}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Level</h5>
              <span >{{Session::get('user')->level}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  {{-- <button class="btn btn-sm btn-info mb-3">Edit profile</button> --}}
</div>


@endsection













