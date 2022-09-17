<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>UfauluPlus+ Admin-Panel</title>

 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ secure_asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
       <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown mr-3">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span id="feedback_count" class="badge badge-info navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><span id="feedback_count2"></span> feedback</span>
          
          <div id="feedback_area">
            {{-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i>John kisombo
              <span class="float-right text-muted text-sm">3 mins</span>
            </a> --}}
          </div>
          <div class="dropdown-divider"></div>
          <a href="/admin/fetch-user-feedback-all" class="dropdown-item dropdown-footer">See All</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UfauluPlus+ Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Notes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/a/notes" class="nav-link">
                  <i class="far fa-circle nav-icon  text-primary"></i>
                  <p>A-level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/o/notes" class="nav-link">
                  <i class="far fa-circle nav-icon  text-warning"></i>
                  <p>O-level</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Online Quiz
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin-quiz-alevel" class="nav-link ">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>A-level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/quiz/" class="nav-link ">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>O-level</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Questions & Answers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/a/question-bank/" class="nav-link ">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>A-level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/o/question-bank/" class="nav-link ">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>O-level</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Others</li>
          <li class="nav-item">
            <a href="/admin/auth" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin Auth
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/eventsAndNews" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                News & Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/logout" class="text-danger nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
               <strong>Logout</strong> 
              </p>
            </a>
          </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <main>
        @yield('content')
    </main>
  
   </div>
   <!-- /.content-wrapper -->  
   <footer class="main-footer">
    <strong>Copyright &copy;2022 <a href="#">UfauluPlus+ Admin</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ secure_asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ secure_asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ secure_asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ secure_asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ secure_asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ secure_asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ secure_asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ secure_asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ secure_asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ secure_asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ secure_asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ secure_asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ secure_asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ secure_asset('dist/js/adminlte.js') }}"></script>
<script>
    $('#summernote').summernote({
        placeholder:'Enter description..',
        tabsize: 2,
        height:150
    })
    $('#summernote1').summernote({
        placeholder:'Type Question..',
        tabsize: 1,
        height:90
    })
    $('#summernote2').summernote({
        placeholder:'Type answer..',
        tabsize: 1,
        height:90
    })
</script>
<script>
  $(document).ready(function(){ 
    fetch_user_feedback();
        function fetch_user_feedback(){
          $.ajax({
            url:'/admin/fetch-user-feedback',
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


  @yield('scripts')

</body>
</html>