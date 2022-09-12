@extends('layouts.client')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Take Quiz</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Take quiz</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
       

            <div class="container">
              <div class="card card-danger card-outline">
                <div class="card-body">
                    <div class="col-12">
                        <p><span id="question_name"></span></p>
                        <hr>
                       <div id="choice_area"></div>
                       <div id="button_area"></div>
                    </div>

                </div>
              </div>

              <div class="card card-danger card-outline">
                <div class="card-body">
                    <div class="col-12">
                      <div id="quiz_timer" data-timer="{{ $quizAlevel->time*60 }}" style="max-width:400px; width: 100%; height: 200px;"></div>
                    </div>

                </div>
              </div>

            </div>


        </div><!-- /.container-fluid -->
      </div>

    


 </div>
@endsection

@section('script')
<script>
    
//fetching qns
  $(document).ready(function(){ 
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    }); 

    $("#quiz_timer").TimeCircles({
        time: { Days: { show: false },
        Hours: { show: false },
        Minutes: { color: "#17a2b8" },
        Seconds: { color: "#e83e8c" }}
    });

    $("#quiz_timer").TimeCircles({count_past_zero: false}).addListener(countdownComplete);
    function countdownComplete(unit, value, total){
      if(total<=0){
        $(this).fadeOut('slow').replaceWith("<h2 class='bg-secondary text-center'>Time's up!</h2>");
        $('#question_card').html("");
        $('#question_card').html('<a href="/client/alevel/quiz/{{$quizAlevel->id}}/take/question/results" class="btn btn-info btn-sm">Finish Quiz</a>');
        window.location.href="/client/alevel/quiz/{{$quizAlevel->id}}/take/question/results";
           
      }
    }
        
        load_question();
        function load_question(question_id='',button_type=''){
          var quiz_id = <?php echo $quizAlevel->id; ?>;
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url:'/client/alevel/quiz/take/question/'+quiz_id+'',
            type : 'POST',
            dataType : 'json',
            data : {question_id:question_id,button_type:button_type},
            success:function(res)
            {
              console.log(res);
              $('#question_name').html('');
              $('#choice_area').html('');

              if (res.question.quizAlevel.questions_alevel[0] == null) {
                
                if (res.status == 201) {
                  $("#next_btn").addClass("finish_quiz");
                  $("#next_btn").html('Finish Quiz');
                } else {
                  $('#question_area').html('<p class="text-info  pt-2">No question, Click next.</p>');
                
                }
              } else {
                $('#question_name').html('<strong>Qn: </strong>'+res.question.quizAlevel.questions_alevel[0].question_name);
                $.each(res.question.quizAlevel.questions_alevel[0].choice_alevel, function(key, value){
                    $('#choice_area').append('\
                    <div class="form-check mb-1">\
                      <input class="form-check-input" type="radio" name="choice"  value='+res.question.quizAlevel.questions_alevel[0].choice_alevel[key].id+'>\
                      <label class="form-check-label" for="exampleRadios1">'+value.text+'</label>\
                    </div>'); 
                  });
                  $('#button_area').html('\
                  <button id="prev" class="btn btn-sm btn-warning previous"  pid='+res.question.quizAlevel.questions_alevel[0].id+'>Prev</button>&nbsp;\
                  <button id="next_btn" class="btn btn-sm btn-info next" nid='+res.question.quizAlevel.questions_alevel[0].id+'>Next</button>');
                  $("#prev").attr("disabled", true);
                  if (res.status == 201) {
                 $("#prev").attr("disabled", false);
                }
              }

             }
          })
      }

      //$("input").attr("disabled", true);

      $(document).on('click', '.next', function(){
        var user_id = <?php echo Session::get('user')->id ?>;
        var quiz_id = <?php echo $quizAlevel->id; ?>;
        var choice_id = $('input:radio[name=choice]:checked').val();
        var question_id = $(this).attr('nid');
        var button_type = 'next';

        var statusResult = save_user_choice(user_id,quiz_id,question_id,choice_id);
        console.log(statusResult);
        if (choice_id == undefined && statusResult.status == 400) {
          Toast.fire({
              icon: 'error',
              title: 'Choose the answer before going to the next question.'
            })
        } else {
         save_user_choice(user_id,quiz_id,question_id,choice_id);
         load_question(question_id,button_type);
         
        }
      });

      $(document).on('click', '.previous', function(){
        var question_id = $(this).attr('pid');
        var button_type = 'previous';
        load_question(question_id,button_type);
      });

      //Finish Quiz
      $(document).on('click', '.finish_quiz', function(){
        var quiz_id = $(this).attr('quiz_id');
        window.location.href="/client/alevel/quiz/{{$quizAlevel->id}}/take/question/results";
      });

      function save_user_choice(user_id,quiz_id,question_id,choice_id){
       var response = '';
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
          url:'/client/alevel/quiz/take/question',
          type : 'POST',
          dataType : 'json',
          async: false,
          data : {choice_id:choice_id,question_id:question_id,quiz_id:quiz_id,user_id:user_id},
          success:function(res)
            {
              response = res;
            }
          }); 
          return response;
      }

  });


</script>
@endsection

