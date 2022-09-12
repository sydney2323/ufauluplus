@extends('layouts.client')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Take exam</h3>
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
                  <div class="row">
                    <div class="col-8">
                      <div id="question_card">
                        <p><span id="question_area"></span></p>
                        <hr>
                        <div id="question_message"></div>
                        <div id="choice_area">
        
                        </div>
                        <div id="button_area">
        
                        </div>
                        </div>
                    </div>
                    <div class="col-4">
                      <div id="quiz_timer" data-timer="{{ $quizOlevel->time*60 }}" style="max-width:400px; width: 100%; height: 200px;"></div>
                    </div>
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
        $('#question_card').html('<a href="/client/olevel/quiz/{{$quizOlevel->id}}/take/question/results" class="btn btn-info btn-sm">Finish Quiz</a>');
       // window.location.href="/client/quiz/{{$quizOlevel->id}}/take/question/results";
           
      }
    }
        
        load_question();
        function load_question(question_id='',button_type=''){
          var quiz_id = <?php echo $quizOlevel->id; ?>;
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url:'/client/olevel/quiz/take/question/'+quiz_id+'',
            type : 'POST',
            dataType : 'json',
            data : {question_id:question_id,button_type:button_type},
            success:function(res)
            {
              console.log(res);
              $('#question_message').html("");
              $('#choice_area').html("");
              $('#question_area').html("");
              if (res.question.quizOlevel.questions_olevel[0] == null) {
                if (res.status == 201) {
                 $('.next').val('Finish Quiz');
                }else{
                  $('#question_area').html('<p class="text-info  pt-2">No question, Click next.</p>');
                }
               
              }else {
              $('#question_area').html('<strong>Qn: </strong>'+res.question.quizOlevel.questions_olevel[0].question_name);
        
                  $.each(res.question.quizOlevel.questions_olevel[0].choice_olevel, function(key, value){
                    $('#choice_area').append('\
                    <div class="form-check mb-2">\
                      <input name="choice" id="answer_choice" qid='+res.question.quizOlevel.questions_olevel[0].id+' cid='+res.question.quizOlevel.questions_olevel[0].choice_olevel[key].id+' class="form-check-input isEmpty" type="radio">\
                      <label class="form-check-label">'+value.text+'</label>\
                    </div>\
                    '); 
                  });

                  $('#button_area').html('\
                          <button class="btn btn-sm btn-warning previous" pid='+res.question.quizOlevel.questions_olevel[0].id+'>Previous</button>&nbsp;\
                         <input value="Next" type="button" class="btn btn-sm btn-info next_btn next" nid='+res.question.quizOlevel.questions_olevel[0].id+' quiz_id='+res.question.quizOlevel.id+'>\
                  ');   
            }
          }
          })
      }
      $(document).on('click', '.next', function(){
        var question_id = $(this).attr('nid');
        var quiz_id = $(this).attr('quiz_id');
        var button_type = 'next';
        var check_finish_btn = $('input[value]').val();
        var check_radio = $('input:radio[name=choice]:checked').val();

        if (check_finish_btn === "Finish Quiz") {
          window.location.href="/client/olevel/quiz/{{$quizOlevel->id}}/take/question/results";
        } else {
          if (check_radio == undefined) {
            Toast.fire({
              icon: 'error',
              title: 'Choose the answer before going to another question.'
            })
            //toastr.error('Choose the answer before going to another question')
          }else{
            load_question(question_id,button_type);
          }
          
        }
      });

      $(document).on('click', '.previous', function(){
        var question_id = $(this).attr('pid');
        var button_type = 'previous';
        load_question(question_id,button_type);
      });

      //finish button
      $(document).on('click', '.finish_btn', function(){
        var quiz_id = $(this).attr('quiz_id');
       // window.location.href="/client/quiz/take/question/results";
      });

      //for choice issue`````
      function userChoice() {
        var user_choice = $("input[name='choice']").val();
        if (user_choice == "on") {
          return 0;
        }
        return 1;
      }


      $(document).on('click', '#answer_choice', function(){
        var user_id = <?php echo Session::get('user')->id ?>;
        var choice_id = $(this).attr('cid');
        var question_id = $(this).attr('qid');
        var quiz_id = <?php echo $quizOlevel->id; ?>;
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
          url:'/client/olevel/quiz/take/question',
          type : 'POST',
          dataType : 'json',
          data : {choice_id:choice_id,question_id:question_id,quiz_id:quiz_id,user_id:user_id},
          success:function(res)
            {
             // console.log(res);
            }
          }) 
        
      });

  });


  $(".submit").click(function() {
       if ($('input[name="muuttuminen"]:checked').length == 0) {
         alert('please...');
         return false; } 
          else {
          $.ajax({
           //...
         })
       }
       return false;
    }); 
</script>
@endsection