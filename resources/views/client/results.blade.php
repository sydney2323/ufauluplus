@extends('layouts.client')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">View results</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">view results</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-danger card-outline">
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No:</th>
                        <th>Subject</th>
                        <th>Quiz Name</th>
                        <th>view</th>
                      </tr>
                    </thead>
                      <tbody>
                        @foreach ($fetchUserQuizs as $fetchUserQuiz)
                        <tr >
                          <td>{{ $fetchUserQuiz->quiz_id }}</td>
                          <td>{{ $fetchUserQuiz->subject }}</td>
                          <td>{{ $fetchUserQuiz->name }}</td>
                          
                          <td><a href="#" rid="{{ $fetchUserQuiz->id }}" class="btn btn-sm btn-secondary view_results" >view</a></td>
                        </tr> 
                     @endforeach
                     </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


      {{-- <div class="container">
        @foreach ($quizOlevels as $quizOlevel)
        <div class="card card-danger card-outline">
          <div class="card-body">
            <h5 class="card-title">Quiz name: {{ $quizOlevel->name }}</h5><br>
            <p>Time: {{ $quizOlevel->time }} Min</p>
            <hr>
      
            <p class="card-text">{{ $quizOlevel->description }} </p>
            <a href="/client/olevel/quiz/{{ $quizOlevel->subject }}/take/{{ $quizOlevel->id }}" class="card-link btn btn-sm btn-danger">Take Quiz</a>
            <a href="#" rid="{{ $quizOlevel->id }}" class="card-link btn btn-sm btn-secondary view_results">View results</a>
          </div>
        </div>
        @endforeach
      </div> --}}
    


 </div>


 <div class="modal fade" id="modal_view">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">SchooNet Tanzania</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
          url:'/client/alevel/quiz/test',
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

  });
</script>
@endsection


