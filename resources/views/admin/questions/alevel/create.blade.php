@extends('layouts.admin')

@section('content')
<div class="col-12">
<div class="container-fluid pt-3">
       
    <div class="col-md-12 py-3">
        <!-- general form elements -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Create Questions</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/admin/quiz/alevel/{{ $quiz_id }}/question/" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="topic">Question name:</label>
                    <textarea type="text" name="question_name" class="form-control"    placeholder="Enter qn">{{ old('question_name') }}</textarea>
                    @error('question_name')
                     <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-1:</label>
                    <input type="text" name="option1" value="{{ old('option1') }}" class="form-control"  placeholder="Enter option 1">
                    @error('option1')
                     <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-2:</label>
                    <input type="text" name="option2" value="{{ old('option2') }}" class="form-control"  placeholder="Enter option 2">
                    @error('option2')
                     <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-3:</label>
                    <input type="text" name="option3" value="{{ old('option3') }}" class="form-control"  placeholder="Enter option 3">
                    @error('option3')
                     <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-4:</label>
                    <input type="text" name="option4" value="{{ old('option4') }}" class="form-control"  placeholder="Enter option 4">
                    @error('option4')
                     <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="subject">Select correct Option:</label>
                    <select class="form-control" name="is_correct">
                      <option value="">Choose</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                      <option value="4">Option 4</option>
                    </select>
                    @error('is_correct')
                     <span class="error text-danger">{{ $message }}</span>
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
</div>
@endsection
