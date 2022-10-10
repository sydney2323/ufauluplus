<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UfauluPlus+ | Client</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/timecircles/css/TimeCircles.css') }}">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="{{ asset('../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
   <!-- Toastr -->
   <link rel="stylesheet" href="{{ asset('../../plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/client" class="navbar-brand">
        <img src="{{ asset('dist/img/j2.png') }}" alt=" Logo" class="brand-image  " style="opacity: .8">
        {{-- <span class="brand-text font-weight-light">UfauluPlus+</span> --}}
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Full Notes</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

              <li class="dropdown-divider"></li>
              @if (Session::get('user')->level == 'A')
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">A-Level</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="/client/A/level/{{ 'Mathematics' }}" class="dropdown-item">Mathematics</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/A/level/{{ 'Physics' }}" class="dropdown-item">Physics</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/A/level/{{ 'Chemistry' }}" class="dropdown-item">Chemistry</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/A/level/{{ 'Biology' }}" class="dropdown-item">Biology</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/A/level/{{ 'Geography' }}" class="dropdown-item">Geography</a>
                  </li>
                </ul>
              </li>

              @else 

              <!-- End Level two -->
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">O-Level</a>
                <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                    <li>
                        <a tabindex="-1" href="/client/O/level/{{ 'Mathematics' }}" class="dropdown-item">Mathematics</a>
                      </li>
                      <li>
                        <a tabindex="-1" href="/client/O/level/{{ 'Physics' }}" class="dropdown-item">Physics</a>
                      </li>
                      <li>
                        <a tabindex="-1" href="/client/O/level/{{ 'Chemistry' }}" class="dropdown-item">Chemistry</a>
                      </li>
                      <li>
                        <a tabindex="-1" href="/client/O/level/{{ 'Biology' }}" class="dropdown-item">Biology</a>
                      </li>
                      <li>
                        <a tabindex="-1" href="/client/O/level/{{ 'Geography' }}" class="dropdown-item">Geography</a>
                      </li>
                </ul>
              </li>
              @endif
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Question & Answers</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

              <li class="dropdown-divider"></li>
              @if (Session::get('user')->level == 'A')
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">A-Level</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="/client/alevel/question-answer-bank/{{ 'Mathematics' }}" class="dropdown-item">Mathematics</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/alevel/question-answer-bank/{{ 'Physics' }}" class="dropdown-item">Physics</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/alevel/question-answer-bank/{{ 'Chemistry' }}" class="dropdown-item">Chemistry</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/alevel/question-answer-bank/{{ 'Biology' }}" class="dropdown-item">Biology</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/alevel/question-answer-bank/{{ 'Geography' }}" class="dropdown-item">Geography</a>
                  </li>
                </ul>
              </li>

              @else 
              <!-- End Level two -->
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">O-Level</a>
                <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1"  href="/client/olevel/question-answer-bank/{{ 'Mathematics' }}" class="dropdown-item">Mathematics</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/olevel/question-answer-bank/{{ 'Physics' }}" class="dropdown-item">Physics</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/olevel/question-answer-bank/{{ 'Chemistry' }}" class="dropdown-item">Chemistry</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/olevel/question-answer-bank/{{ 'Biology' }}" class="dropdown-item">Biology</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="/client/olevel/question-answer-bank/{{ 'Geography' }}" class="dropdown-item">Geography</a>
                  </li>
                </ul>
              </li>
              @endif
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item">
            @if (Session::get('user')->level == 'O')
            <a href="/client/olevel/quiz/" class="nav-link">Online Quiz</a> 
            @else
            <a href="/client/alevel/quiz/" class="nav-link">Online Quiz</a>
            @endif 
          </li>
          
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu4" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{Session::get('user')->fname.' '.Session::get('user')->lname}}</a>
            <ul aria-labelledby="dropdownSubMenu4" class="dropdown-menu border-0 shadow">
                <li class="dropdown-divider"></li>
              <li><a href="/client/profile" class="dropdown-item">Profile </a></li>
              <li class="dropdown-divider"></li>
              <li><a href="/logout" class="dropdown-item">Logout</a></li>

              
              <!-- End Level two -->
            </ul>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <main>
    @yield('content')
    
  </main>

  <!-- Main Footer -->
  
  <footer class="main-footer mt-auto">
    <!-- Default to the left -->
    <div  class="container">
    Copyright &copy;2022  All rights reserved.
  </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('vendor/timecircles/js/TimeCircles.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('../../plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('../../plugins/toastr/toastr.min.js') }}"></script>

 @yield('script')
  

</body>
</html>
