<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>SchoolNet</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

    <style>
      .img {
                    max-width:100px;
                    max-height:100px;
                    min-width:100px;
                    min-height:100px;
        }
      .event-img {
                    max-height:215px;
                    min-height:215px;
                }
    </style>
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>
  <!-- Sub Header -->
 <div class="sub-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-sm-8">
        <div class="left-content">
          <p>Check us <em>ON SOCIAL MEDIA.</em></p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4">
        <div class="right-icons">
          <ul>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                     <div class="">
                      <img class="logo img" src="assets/images/logo2.png" alt="">
                     </div>
                    
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/">Home</a></li>
                        <li class="has-sub">
                            <a href="javascript:void(0)">O-level Notes</a>
                            <ul class="sub-menu">
                                <li><a href="">Mathematics</a></li>
                                <li><a href="">Physics</a></li>
                                <li><a href="">Chemistry</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Geography</a></li>
                            </ul>
                        </li>
                        <li class="has-sub">
                          <a href="javascript:void(0)">A-level Notes</a>
                          <ul class="sub-menu">
                            <li><a href="/alevel/{{ 'Mathematics' }}">Mathematics</a></li>
                            <li><a href="/alevel/{{ 'Physics' }}">Physics</a></li>
                            <li><a href="/alevel/{{ 'Chemistry' }}">Chemistry</a></li>
                            <li><a href="/alevel/{{ 'Biology' }}">Biology</a></li>
                            <li><a href="/alevel/{{ 'Geography' }}">Geography</a></li>
                          </ul>
                      </li> 
                        <li class="scroll-to-section"><a href="#contact">Online Quiz</a></li> 
                        <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> 
                        <div class="main-button-red">
                          <div class="scroll-to-section"><a href="#">Login</a></div>
                      </div>
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

    <main>
        @yield('content')
        
    </main>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>