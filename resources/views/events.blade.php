@extends('layouts.app')

@section('content')
<section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Events</h6>
          <h2>Online Teaching and Learning Tools</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span>{{$event->fee}}</span>
                  </div>
                  <div class="date">
                    <h6>{{$event->created_at->format('M')}} <span>{{$event->created_at->format('d')}}</span></h6>
                  </div>
                  <a href="/events/{{$event->id}}"><img src="{{ asset('images-upload/'.$event->image) }}" alt=""></a>
                </div>
                <div class="down-content">
                  <a href="/events/{{$event->id}}"><h4>{{$event->title}}</h4></a>
                  <p class="description">
                    {{$event->description}}
                   </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
                <div class="meeting-single-item">
                <div class="down-content">
                    <div class="categories">
                        <h4>Other Events</h4>
                        <ul>
                            @foreach ($eventsList as $eventsList)
                            <li><a href="/events/{{$eventsList->id}}">{{$eventsList->title}}..</a></li><br>
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