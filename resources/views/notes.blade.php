@extends('layouts.app')

@section('content')


  <section class="meetings-page-notes" id="meetings">
    <div class="container">
      <div class="col-lg-12">
        <div class="accordions-url">
          <div class="accordion-head-url">
            <span>{{ $data->subject }} > {{ $data->topic }}</span>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="down-content">
                  <a href="meeting-details.html"><h4>{{ $data->topic }}</h4></a>
                  <p class="description">{!! $data->description !!}</p>
                  <div class="">
                    <div class="col-lg-12">
                      <div class="share">
                        <h5>Share:</h5>
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
              </div>
            </div>
          </div>
        </div>
          
          <div class="col-lg-4">
            <div class="meeting-single-item">
            <div class="down-content">
                <div class="categories">
                    <h4>Other {{ $data->subject }} topics</h4>
                    <ul>
                      @foreach ($subjectTopics as $subjectTopic)
                      <li><a href="/alevel/{{ $subjectTopic->subject }}/{{ $subjectTopic->slug }}">> {{ $subjectTopic->topic }}</a></li>
                      @endforeach
                    </ul>
                  </div>
              </div>
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