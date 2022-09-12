@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Edit o-Level Question & Answers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/eventsAndNews/{{$eventAndNews->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (Session::has('fail'))
                      <div class="alert alert-danger">{{Session::get('fail')}}</div>  
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="type">Type:</label>
                    <select id="choice" class="form-control" name="type">
                        @if ($eventAndNews->type == "Event")
                        <option  value="Event">Event</option>  
                        @else
                        <option  value="News">News</option>  
                        @endif   
                    </select>
                    @error('type')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
               </div>
                  <div class="form-group">
                    <label for="">Title:</label>
                    <input type="text" name="title" value="{{ $eventAndNews->title }}"  class="form-control">
                    @error('title')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Description:</label>
                    <input type="text" name="description" value="{{ $eventAndNews->title }}" class="form-control">
                    @error('description')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  @if ($eventAndNews->type == "Event")
                  <div class="form-group">
                    <label for="">Fee:</label>
                    <input type="text" name="description" value="{{ $eventAndNews->fee }}" class="form-control">
                    @error('description')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="">Image:</label>
                    <input type="file" name="image"  class="form-control">
                    <img height="40" width="40" src="{{ asset('images-upload/'.$eventAndNews->image) }}" /><br>
                    @error('image')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
              </form>
              
            </div>
            <!-- /.card -->

          
             
          </div>
    </div>
@endsection
