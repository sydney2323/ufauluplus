@extends('layouts.client')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Online Examination</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Online quiz</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="">
          @if (Session::get('user')->level === 'O')
          <div class="container py-3">
            <div class="card card-danger card-outline">
                <div class="card-header">
                  <h3 class="card-title">Test your knowldge by our available O-level Quiz</h3>
                </div> <!-- /.card-body -->
                <div class="card-body">
                    <p>> <a href="/client/olevel/quiz/{{"Mathematics"}}">Mathematics</a></p>
                    <p>> <a href="/client/olevel/quiz/{{"Physics"}}">Physics</a></p>
                    <p>> <a href="/client/olevel/quiz/{{"Chemistry"}}">Chemistry</a></p>
                    <p>> <a href="/client/olevel/quiz/{{"Biology"}}">Biology</a></p>
                    <p>> <a href="/client/olevel/quiz/{{"Geography"}}">Geography</a></p>
                </div><!-- /.card-body -->
              </div>
          </div> 
          @else
          <div class="container py-3">
            <div class="card card-warning card-outline">
                <div class="card-header">
                  <h3 class="card-title">Test your knowldge by our available A-level Quiz</h3>
                </div> <!-- /.card-body -->
                <div class="card-body">
                    <p>> <a href="/client/alevel/quiz/{{"Mathematics"}}">Mathematics</a></p>
                    <p>> <a href="/client/alevel/quiz/{{"Physics"}}">Physics</a></p>
                    <p>> <a href="/client/alevel/quiz/{{"Chemistry"}}">Chemistry</a></p>
                    <p>> <a href="/client/alevel/quiz/{{"Biology"}}">Biology</a></p>
                    <p>> <a href="/client/alevel/quiz/{{"Geography"}}">Geography</a></p>
                </div><!-- /.card-body -->
              </div>
          </div>  
          @endif
        </div><!-- /.container-fluid -->
      </div>

    


 </div>

    
    @endsection
