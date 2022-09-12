@extends('layouts.client')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Welcome to SchooNet Tanzania</h3>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div>

       
    
    <div class="container">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card-body clearfix">
                  <blockquote class="quote-info">
                    <p>One of the best E-learning platform in Tanzania.</p>
                    <small><cite title="Source Title">SchoolNet Tanzania</cite></small>
                  </blockquote>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-body clearfix">
                  <blockquote class="quote-danger">
                    <p>Best Instructors that will guide you through your learning process.</p>
                    <small><cite title="Source Title">SchoolNet Tanzania</cite></small>
                  </blockquote>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-body clearfix">
                  <blockquote class="quote-success">
                    <p>Used by students of St Joseph University during field for teaching.</p>
                    <small><cite title="Source Title">SchoolNet Tanzania</cite></small>
                  </blockquote>
                </div></div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   


 </div>

    
    @endsection

  