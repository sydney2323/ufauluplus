@extends('layouts.app')

@section('content')
<section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          @if ($subjects->isEmpty())
          <h2>{{ $subject }}
           @else
             <h2>{{ $subjects->first()->subject }}</h2>  
          @endif
         
        </div>
      </div>
    </div>
  </section>
<section class="accordions-background"> 
<div class="container">
<div class="row">
  @if ($subjects->isEmpty())
  <div class="col-lg-12">
    <div class="meeting-single-item">
    <div class="down-content">
        <div class="categories">
            <p>There are no topic at the moment.</p>
          </div>
      </div>
    </div>
  </div>
  @else
  <div class="col-lg-8">
    <div class="accordions is-first-expanded">
   @foreach ($subjects as $subject)
   <article class="accordion">
       <div class="accordion-head">
           <span>{{ $subject->topic }}</span>
           <span class="icon">
               <i class="icon fa fa-chevron-right"></i>
           </span>
       </div>
       <div class="accordion-body" style="height: 0px;">
           <div class="content">
               <p> {!!  substr(strip_tags($subject->description), 0, 300) !!}...<a href="/client">Read more</a></p>
               
           </div>
       </div>
   </article>
   @endforeach
  </div>
  </div>
  <div class="col-lg-4">
    <div class="meeting-single-item">
    <div class="down-content">
        <div class="categories">
            <h4>List of topics</h4>
            <ul>
              @foreach ($subjects as $subject)
              <li><a href="/client">{{ $subject->topic }}</a></li>   
              @endforeach
            </ul>
          </div>
      </div>
    </div>
  </div>  
  @endif
   
  </div>
</div>
  <div class="footer">
    <p>Copyright © 2022 UfauluPlus+. All Rights Reserved. 
        <br>Created by: <a href="#" target="_parent" title="free css templates">Sydney Kibanga</a></p>
  </div>
</section> 
@endsection