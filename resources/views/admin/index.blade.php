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
            <span class="info-box-number">
              10
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
            <span class="info-box-number">6</span>
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
            <span class="info-box-number">2</span>
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
            <span class="info-box-number">
              10
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
            <span class="info-box-number">6</span>
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
            <span class="info-box-number">2</span>
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
    fetch_dashboard_data();
        function fetch_dashboard_data(){
          $.ajax({
            url:'/admin/fetch-dashboard-data',
            type : 'GET',
            dataType : 'json',
            success:function(res)
            {
              console.log(res);
              $('#feedback_count').html(res.count);
              $('#feedback_count2').html(res.count);
              $.each(res.data, function(key, value){
                $('#feedback_area').append(' <div class="dropdown-divider"></div>\
                                          <a href="/admin/fetch-user-feedback-all" class="dropdown-item">\
                                          <i class="fas fa-envelope mr-2"></i>'+value.name+'\
                                          <span class="float-right text-muted text-sm">3 mins</span>\
                                        </a>');
                }); 
             }
          })
      }
    });
</script>

@endsection