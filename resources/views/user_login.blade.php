@extends('layouts.app')


@section('content')
<section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto align-self-center">
          <div class="row ">
            <div class="col-lg-12">
              <form id="contact" action="{{ route('login-user') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Login here!</h2>
                    @if (Session::has('fail'))
                      <div class="alert alert-danger">{{Session::get('fail')}}</div>  
                    @endif
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input name="email" value="{{ old('email') }}" type="text" placeholder="Email">
                      @error('email')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                    <input name="password" type="password" placeholder="Password">
                    @error('password')
                    <strong> <span class="error text-danger">{{ $message }}</span></strong>
                   @enderror
                  </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset style="padding-top: 20px">
                      <button type="submit" id="form-submit" class="button">login</button>
                    </fieldset>
                  </div>
                  <a href="/register" style="padding-top:20px; 
                  color: #a12c2f; 
                  font-size:14px;"><span>You don't have an account yet? Register here.</span></a>
                </div>
              </form>
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







