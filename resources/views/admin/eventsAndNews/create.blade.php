@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Create Events and News</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/eventsAndNews" method="post" enctype="multipart/form-data">
                @csrf
                @if (Session::has('fail'))
                      <div class="alert alert-danger">{{Session::get('fail')}}</div>  
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="type">Type:</label>
                    <select id="choice" class="form-control" name="type">
                      <option value="">choose</option>
                      <option  value="Event">Event</option>
                      <option  value="News">News</option>
                    </select>
                    @error('type')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
               </div>
                  <div class="form-group">
                    <label for="">Title:</label>
                    <input type="text" name="title" value="{{ old('title') }}"  class="form-control">
                    @error('title')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Description:</label>
                    <input type="text" name="description" value="{{ old('description') }}"  class="form-control">
                    @error('description')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Image:</label>
                    <input type="file" name="image"  class="form-control">
                    @error('image')
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>
                     @enderror
                  </div>
                  <div id="fee">
                    
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

@section('scripts')
<script>
     $(document).ready(function(){
        $(document).on("click","#choice", function(e){
          var choice = $('#choice').val();
          if (choice == "Event") {
            $('#fee').html('<div class="form-group">\
                        <label for="">Fee:</label>\
                        <input type="text" name="fee"  value="{{ old("fee") }}" class="form-control">\
                      </div>\
                      @error("fee")\
                      <strong> <span class="error text-danger">{{ $message }}</span></strong>\
                     @enderror');
          } else {
            $('#fee').html('');
          } 
            
        });
    });
</script>
@endsection