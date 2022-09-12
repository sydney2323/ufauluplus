@extends('layouts.admin')

@section('content')
@foreach($quizOlevel as $quizOlevel)
<div class="col-12">
    <div class="container-fluid pt-3">
        <div class=" m-3">
          <h5 class="">Exam name: {{ $quizOlevel->name }}</h5><hr>
          <div class="d-flex">
             <a href="/admin/quiz/{{ $quizOlevel->id }}/question/create" class="btn btn-success btn-sm mr-2">Add Qn</a>
             <a href="/admin/quiz/" class="btn btn-secondary btn-sm">Go back</a>
          </div>
        </div>
        @foreach($quizOlevel->questionsOlevel as $question)
        <div class="ml-3 card card-outline card-secondary collapsed-card">
          <div class="card-header">
            <p class="card-title">{{ $question->question_name }}</p>
      
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: none;">
            <ul>
              @foreach($question->choiceOlevel as $choice)
                <li class="mb-2">{{ $choice->text }}</li> 
              @endforeach
           </ul>
            <div class="d-flex">
              <a href="/admin/quiz/{{ $quizOlevel->id }}/question/{{ $question->id }}/edit" class="btn btn-info btn-sm mr-2">Edit</a>
            
            <form action="/admin/quiz/question/{{ $question->id }}" method="post">
                @method('DELETE')
                @csrf
              <button type="submit" class="btn btn-danger  btn-sm">Delete</a>
            </form>
          </div>
          </div>
          <!-- /.card-bod -->
        </div>
        @endforeach
   </div>
</div>
@endforeach
@endsection

