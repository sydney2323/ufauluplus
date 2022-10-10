@extends('layouts.admin')

@section('content')


  <div class="container-fluid pt-2">
    <div class="col-sm-6">
      <h3 class="m-0">O-Level Details</h3>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-edit"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Quiz</span>
            <span id="quizOlevel" class="info-box-number">
              
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-copy"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Notes</span>
            <span  id="NotesOlevel" class="info-box-number">
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Registered Users</span>
            <span id="User_O" class="info-box-number">
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <div class="col-sm-6">
      <h3 class="m-0">A-Level Details</h3>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-edit"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Quiz</span>
            <span id="quizAlevel" class="info-box-number">
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-copy"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Notes</span>
            <span id="NotesAlevel" class="info-box-number">
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Registered Users</span>
            <span id="User_A" class="info-box-number">
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
   $(document).ready(function(){ 
    fetchDashboardData();
        function fetchDashboardData(){
          $.ajax({
            url:'/admin/fetch-dashboard-data',
            type : 'GET',
            dataType : 'json',
            success:function(res)
            {
             //console.log(res);
              $('#quizOlevel').html(res.quizOlevel);
              $('#quizAlevel').html(res.quizAlevel);
              $('#NotesOlevel').html(res.NotesOlevel);
              $('#NotesAlevel').html(res.NotesAlevel);
              $('#User_O').html(res.User_O);
              $('#User_A').html(res.User_A);
             }
          })
      }
    });


</script>

@endsection