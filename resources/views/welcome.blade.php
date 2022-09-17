@extends('layouts.app')

@section('content')
 

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
      <source src="assets/videos/video1.mp4" type="video/mp4" />
  </video>

    <div class="video-overlay header-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="caption">
                <h2>Welcome to Ufaulu Plus+</h2>
                <p>UfauluPlus+ is designed to allow every high-school student to deliver modern, curriculum-aligned courses  to their students.

                  Easy to join and simple to implement in the classroom, you’ll get access to interactive courses, class and student management tools and more.
                  <br/><br/>
                  UfauluPlus+ offer Materials for science subjects this includes Physics, Mathematics, Chemistry and Geography.
                 </p>
                <div class="main-button-red">
                <div><a href="/client">Getting Started!</a></div>
            </div>
        </div>
            </div>
          </div>
        </div>
    </div>
</section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-01.png" alt="">
              </div>
              <div class="down-content">
                <h4>Questions & Answers Bank</h4>
                <p>We provide most appearing Examination Questions with thier answers in all science subjects.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Best Teachers</h4>
                <p>We have best and professional Teachers that may help and guide you on your learning process.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>A & O Level Notes</h4>
                <p>Limited number of notes is available in all science subjects, Please join us!</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Practical Videos</h4>
                <p>Enough practical videos that may help a student perform better in all science subjects.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Online Quiz</h4>
                <p>Yes!, Get a chance to test your knowlodge, This includes all science subjects.</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>News & Events</h2>
          </div>
        </div>
        @if (!$news->isEmpty())
        <div class="col-lg-4">
          <div class="categories">
            <h4>News</h4>
            <ul>
              @foreach ($news as $news)
              <li><a href="/news/{{$news->id}}">{{$news->title}}..</a></li><br>
              @endforeach
            </ul>
          </div>
        </div>  
        @endif
        
        <div class="col-lg-8">
          <div class="row">
            @foreach ($events as $event)
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>{{$event->fee}}</span>
                  </div>
                  <a href="/events/{{$event->id}}"><img class="event-img" src="{{ asset('images-upload/'.$event->image) }}" alt="error"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>{{$event->created_at->format('M')}} <span>{{$event->created_at->format('d')}}</span></h6>
                  </div>
                  <a href="/events/{{$event->id}}"><h4>{{$event->title}}</h4></a>
                  <p>{{$event->description}}.</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  

  {{-- <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 align-center">
          <div class="section-heading">
            <h2>Study Materials</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="Course One">
              <div class="down-content">
                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <div class="main-button-red">
                        <div class="scroll-to-section"><a href="#">view</a></div>
                    </div>
                    </div>
                    <div class="col-4">
                       <span>Free</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="Course One">
              <div class="down-content">
                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <div class="main-button-red">
                        <div class="scroll-to-section"><a href="#">view</a></div>
                    </div>
                    </div>
                    <div class="col-4">
                       <span>Tsh 35,000</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="Course One">
              <div class="down-content">
                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <div class="main-button-red">
                        <div class="scroll-to-section"><a href="#">view</a></div>
                    </div>
                    </div>
                    <div class="col-4">
                       <span>Free</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="assets/images/course-02.jpg" alt="Course One">
              <div class="down-content">
                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>
                <div class="info">
                  <div class="row">
                    <div class="col-8">
                      <div class="main-button-red">
                        <div class="scroll-to-section"><a href="#">view</a></div>
                    </div>
                    </div>
                    <div class="col-4">
                       <span>Tsh 35,000</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>A Few Facts About Ufaulu Plus+</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content percentage">
                    <div class="count-digit">94</div>
                    <div class="count-title">Succesed Students</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">3</div>
                    <div class="count-title">Current Teachers</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content new-students">
                    <div class="count-digit">10</div>
                    <div class="count-title">New Students</div>
                  </div>
                </div> 
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">1</div>
                    <div class="count-title">Awards</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="#" target="_blank"><img src="assets/images/play-icon.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="/user_feedback_form" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>  
                    @endif
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input name="name" type="text" id="name" required placeholder="YOURNAME...*" >
                      @error('name')
                    <strong> <span class="error text-danger">{{ $message }}</span></strong>
                   @enderror
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" required placeholder="YOUR EMAIL..." >
                    @error('email')
                    <strong> <span class="error text-danger">{{ $message }}</span></strong>
                   @enderror
                  </fieldset>
                  </div>
                  <div class="col-lg-12 mt-3">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" required placeholder="YOUR MESSAGE..." ></textarea>
                      @error('message')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>+255 754 866 314</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>sunguraedson19<br>@gmail.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Dar es salaam, Tanzania</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 UfauluPlus+. All Rights Reserved. 
          <br>Created by: <a href="#" target="_parent" title="free css templates">Sydney Kibanga</a></p>
    </div>
  </section>
  @endsection