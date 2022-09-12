@extends('layouts.app')

@section('content')
<section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>News</h6>
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
                  <div class="date">
                    <h6>Nov <span>12</span></h6>
                  </div>
                  <a href="/news/{{$news->id}}"><img style="max-height: 500px;" src="{{ asset('images-upload/'.$news->image) }}" alt=""></a>
                </div>
                <div class="down-content">
                  <a href="/news/{{$news->id}}"><h4>{{$news->title}}</h4></a>
                  <p class="description">
                    {{$news->description}}
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
                        <h4>Other News</h4>
                        <ul>
                            @foreach ($newsList as $newsList)
                            <li><a href="/news/{{$newsList->id}}">{{$newsList->title}}..</a></li><br>
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