@extends('layouts.client')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">{{$subject}} online Quiz</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Online quiz</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
          @if ($quizOlevels->first() === null)
          <div class="card card-danger card-outline">
            <div class="card-body">
              <p class="text-info">There are no quiz for this subject at the moment.!</p>
            </div>
          </div>
          @else
          @foreach ($quizOlevels as $quizOlevel)
          <div class="card card-danger card-outline">
            <div class="card-body">
              <h4 class="card-title"><strong>Name:</strong> {{ $quizOlevel->name }}</h4><br>
              <p><strong>Time:</strong> {{ $quizOlevel->time }} Min </p>
              <hr>
        
              <p class="card-text">{{ $quizOlevel->description }} </p>
              {{-- @if ($quizOlevel->total_marks == "") --}}
              <a href="/client/olevel/quiz/{{ $quizOlevel->subject }}/take/{{ $quizOlevel->id }}" class="card-link btn btn-sm btn-danger">Take Quiz</a>
              {{-- @else --}}
              <a href="#" rid="{{ $quizOlevel->id }}" class="card-link btn btn-sm btn-secondary view_results">View results</a>  
              {{-- @endif --}}
              
            </div>
          </div>
          @endforeach   
          @endif 
          
           {{ $quizOlevels->onEachSide(1)->links() }} 
          
        </div><!-- /.container-fluid -->
      </div>

 </div>

 
 <div class="modal fade" id="modal_view">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ufaulu Plus+ Tanzania</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="viewless" class="modal-body">
        <p>Thanks for using our Online Quiz <span class="text-info">{{Session::get('user')->fname.' '.Session::get('user')->lname}}</span> here is your score.</p>
        <ul class="nav flex-column">
          <li class="nav-item ">Total questions:
              <strong><span class="total_questions text-info"></span></strong> <hr>
          </li>
          
          <li class="nav-item">Marks obtained:
              <strong><span class="total_marks text-info"> </span></strong>  
          </li>
        </ul>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-danger btn-sm">PDF</button> --}}
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
    
    @endsection

       
@section('script')
<script>
    
//fetching qns
  $(document).ready(function(){ 

      $(document).on('click', '.view_results', function(){
        var result_id = $(this).attr('rid');
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
          url:'/client/olevel/quiz/test',
          type : 'POST',
          data : {result_id:result_id},
          success:function(res)
            {
              if (res.data == 400) {
              $('#viewless').html("");
              $('#viewless').html("<p>No results for this quiz, Please take a Quiz.</p>");
              $('#modal_view').modal("show");
              } else {
                $('.total_questions').html(res.data.total_questions);
              $('.total_marks').html(res.data.total_marks);
              $('#modal_view').modal("show"); 
              }
             
            }
          }) 
        
      });

  });

  function checkIfUserTookTheQuiz(){
    $(document).on('click', '.view_results', function(){
        var result_id = $(this).attr('rid');

        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
          url:'/client/olevel/quiz/test',
          type : 'POST',
          data : {result_id:result_id},
          success:function(res)
            {
              console.log(res);
              $('.total_questions').html(res.data.total_questions);
              $('.total_marks').html(res.data.total_marks);
              $('#modal_view').modal("show");
            }
          }) 
        
      });
  }
</script>
@endsection


    