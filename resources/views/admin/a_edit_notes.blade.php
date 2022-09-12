@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Edit A level Notes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/a/notes/post/{{ $notesAlevel->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <select class="form-control" name="subject">
                          <option value="Mathematics">Mathematics</option>
                          <option value="Physics">Physics</option>
                          <option value="Biology">Biology</option>
                          <option value="Geography">Geography</option>
                          <option value="Chemistry">Chemistry</option>
                        </select>
                   </div>
                  <div class="form-group">
                    <label for="topic">Topic:</label>
                    <input type="text" name="topic" class="form-control"  placeholder="Enter topic" value="{{ $notesAlevel->topic }}">
                  </div>
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea type="text" name="description" id="summernote" class="form-control" placeholder="Enter description">{{ $notesAlevel->description }}</textarea>
                  </div>
                  <div class="form-group">
                  <label for="Status">Status:</label>
                  <select class="form-control" name="status">
                    <option value="0">Not Active</option>
                    <option value="1">Active</option>
                  </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-secondary">Save</button>
                  <a href="/admin/a/notes" class="btn btn-success">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
             
          </div>
    </div>
@endsection