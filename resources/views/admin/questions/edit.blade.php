@extends('layouts.admin')

@section('content')
<div class="col-12">
<div class="container-fluid pt-3">
       
    <div class="col-md-12 py-3">
        <!-- general form elements -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Edit Questions</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
         
          <form action="/admin/quiz/{{ $quizOlevel->id }}/question/{{ $quizOlevel->questionsOlevel[0]->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="topic">Question name:</label>
                    <textarea type="text" name="question_name" class="form-control"  placeholder="Enter qn"> {{ $quizOlevel->questionsOlevel[0]->question_name }}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-1:</label>
                    <input type="text" name="option1" value="{{ $quizOlevel->questionsOlevel[0]->choiceOlevel[0]->text }}" class="form-control"  placeholder="Enter option 1">
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-2:</label>
                    <input type="text" name="option2" value="{{ $quizOlevel->questionsOlevel[0]->choiceOlevel[1]->text }}" class="form-control"  placeholder="Enter option 2">
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-3:</label>
                    <input type="text" name="option3" value="{{ $quizOlevel->questionsOlevel[0]->choiceOlevel[2]->text }}" class="form-control"  placeholder="Enter option 3">
                  </div>
                  <div class="form-group">
                    <label for="topic">Option-4:</label>
                    <input type="text" name="option4" value="{{ $quizOlevel->questionsOlevel[0]->choiceOlevel[3]->text }}" class="form-control"  placeholder="Enter option 4">
                  </div>
                <div class="form-group">
                    <label for="subject">Select correct Option:</label>
                    <select class="form-control" name="is_correct">
                         <option value="">Choose</option>
                          @foreach ($quizOlevel->questionsOlevel[0]->choiceOlevel as $key => $option)
                          @if ($option->is_correct == 1)
                              @php $selected = 'selected="selected"'; @endphp
                          @else
                              @php $selected = ''; @endphp
                          @endif
                          <option value="{{  $key++ }}" {{ $selected }}>Option {{  $key++ }}</option>
                          @endforeach
                  </select>
               </div>
               <button type="submit" class="btn btn-success btn-sm">Submit</button>&nbsp;
              <a href="/admin/quiz/{{ $quizOlevel->id }}" type="submit" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
            <!-- /.card-body -->
          </form>
        </div>
        <!-- /.card -->

      
         
      </div>
</div>
</div>
@endsection
