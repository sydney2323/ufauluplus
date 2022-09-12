@extends('layouts.app')

@section('content')
<section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form action="{{ route('register-user') }}" id="contact" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Register here!</h2>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input name="first-name"  value="{{ old('first-name') }}" type="text" placeholder="First Name">
                      @error('first-name')
                           <strong> <span class="error text-danger">{{ $message }}</span></strong>
                      @enderror
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input name="last-name"  value="{{ old('last-name') }}" type="text" placeholder="Last Name">
                      @error('last-name')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input name="number"  value="{{ old('number') }}" type="number" placeholder="Phone Number">
                      @error('number')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <select name="level">
                        <option value="">Choose Level</option>
                        <option value="O">O-level</option>
                        <option value="A">A-level</option>
                    </select>
                    @error('level')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input name="email" value="{{ old('email') }}" type="text"  placeholder="Email">
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
                  {{-- <div class="col-lg-12">
                    <fieldset>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password">
                    @error('password')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </fieldset>
                  </div> --}}
                  <div class="col-lg-12">
                    <fieldset style="padding-top: 20px">
                      <button type="submit" id="form-submit" class="button">register</button>
                    </fieldset>
                  </div>
                   <a href="/login" style="padding-top:20px; color: #a12c2f; font-size:14px;"><span>Already have an account? login here.</span></a>
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







