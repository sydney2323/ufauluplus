@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">A-Level Question & Answers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/a/question-bank" method="post">
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
                    <label for="description">Question:</label>
                    <textarea type="text" name="question" id="summernote1" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Answer:</label>
                    <textarea type="text" name="answer" id="summernote2" class="form-control"></textarea>
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