@extends('layouts.admin')

@section('content')
<div class="col-12">
<div class="container-fluid pt-3">
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">O-level online Quiz</h3>
    <a href="#" class="btn btn-success btn-sm ml-3" data-toggle="modal" data-target="#add_quiz">Add Quiz</a>
  </div>
  <!-- ./card-header -->
  <div class="card-body">
      <div class="success_message"></div>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Name</th>
          <th>Description</th>
          <th>Time</th>
          <th>Activeness</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody> 
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
</div>
</div>

<!-- Modal adding-->
<div class="modal fade" id="add_quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="#" method="POST" id="quickForm">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <select class="form-control" name="subject" id="subject">
                  <option value="Mathematics">Mathematics</option>
                  <option value="Physics">Physics</option>
                  <option value="Biology">Biology</option>
                  <option value="Geography">Geography</option>
                  <option value="Chemistry">Chemistry</option>
                </select>
           </div>
          <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="Description">Description:</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
          </div>
          <div class="form-group">
            <label for="Time">Time:</label>
            <select class="form-control" name="time" id="time">
              <option value="5">5 Min</option>
              <option value="10">10 Min</option>
              <option value="15">15 Min</option>
              <option value="20">20 Min</option>
              <option value="25">25 Min</option>
              <option value="30">30 Min</option>
            </select>
         </div>
         <div class="form-group">
          <label for="Exam Activeness">Exam Activeness:</label>
          <select class="form-control" name="active" id="active">
            <option value="0">Not active</option>
            <option value="1">active</option>
          </select>
       </div>
          <input type="submit" class="btn btn-secondary btn-sm" id="add_quiz" value="save">
        </form>
        </div>
      </div>
    </div>
  </div>
  <!--End of Modal -->
  
<!------------ Modal editing  ------------------>
<div class="modal fade" id="edit_quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="#" method="POST" id="edit_quickForm">
            <input type="hidden" id="quiz_id">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <select class="form-control" name="edit_subject" id="edit_subject">
                  <option value="Mathematics">Mathematics</option>
                  <option value="Physics">Physics</option>
                  <option value="Biology">Biology</option>
                  <option value="Geography">Geography</option>
                  <option value="Chemistry">Chemistry</option>
                </select>
           </div>
          <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="edit_name" class="form-control" id="edit_name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="Description">Description:</label>
            <input type="text" name="edit_description" class="form-control" id="edit_description" placeholder="Enter description">
          </div>
          <div class="form-group">
            <label for="Time">Time:</label>
            <select class="form-control" name="edit_time" id="edit_time">
              <option value="5">5 Min</option>
              <option value="10">10 Min</option>
              <option value="15">15 Min</option>
              <option value="20">20 Min</option>
              <option value="25">25 Min</option>
              <option value="30">30 Min</option>
            </select>
         </div>
         <div class="form-group">
          <label for="Exam Activeness">Exam Activeness:</label>
          <select class="form-control" name="active" id="active">
            <option value="0">Not active</option>
            <option value="1">active</option>
          </select>
       </div>
          <input type="submit" class="btn btn-secondary btn-sm" id="update_quiz" value="update">
        </form>
        </div>
      </div>
    </div>
  </div>
  <!--End of Modal -->
@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        fetchQuiz();
        function fetchQuiz(){

            $.ajax({
            type : "GET",
			      url : '/admin/quiz/fetch',
            dataType : "json",
            success : function(response){
              console.log(response);
                $('tbody').html("");
                $.each(response.quizOlevel, function(key, value){
                  if (value.active == 0) {
                        var active = "Not active";
                      }else{
                        var active = "active";
                      }
					         $('tbody').append('<tr>\
                    <td>'+value.subject+'</td>\
                    <td>'+value.name+'</td>\
                    <td>'+value.description+'</td>\
                    <td>'+value.time+' Min</td>\
                    <td>'+active+'</td>\
                    <td>\
                        <a  href="/admin/quiz/'+value.id+'" class="btn btn-secondary btn-sm">Add Questions</a h>\
                    </td>\
                    <td>\
                        <div class="d-flex">\
                        <button type="button" value="'+value.id+'" class="edit_button btn btn-info btn-sm">\
                          <i class="fas fa-pencil-alt"></i>\
                          Edit</button>\
                        <button type="button"  value="'+value.id+'" class="delete_button ml-1 btn btn-danger btn-sm">\
                          <i class="fas fa-trash-alt"></i>\
                          Delete</a>\
                        </div>\
                    </td>\
                    </tr>');
				});
			}
		});

        }

        $(document).on("click",".edit_button", function(e){
      	e.preventDefault();
        var quiz_id = $(this).val();
        $('#edit_quiz').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : 'GET',
		      	url : '/admin/quiz/'+quiz_id+'/edit',
            dataType : "json",
	      		success : function(response){
                if (response.status == 200) {
                    $('#edit_subject').val(response.quizOlevel.subject); 
                    $('#edit_name').val(response.quizOlevel.name); 
                    $('#edit_description').val(response.quizOlevel.description); 
                    $('#edit_time').val(response.quizOlevel.time); 
                    $('#edit_active').val(response.quizOlevel.active);
                    $('#quiz_id').val(response.quizOlevel.id);
                    
                } else if(response.status == 404) {
                  $(".success_message").html('<div class="alert alert-danger alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>\
                            '+response.message+'</div>');
                    $("#edit_quickForm").trigger("reset");
				          	$('#edit_quiz').modal('hide'); 
                }
                
			}
		});
        });

        
//----------------Update quiz----------------------//
        $(document).on("click","#update_quiz", function(e){
      	e.preventDefault();
          var quiz_id = $('#quiz_id').val();
          var data = {
            'subject':$('#edit_subject').val(),
            'name':$('#edit_name').val(),
            'description':$('#edit_description').val(),
            'time':$('#edit_time').val(),
            'active':$('#edit_active').val() 
          }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : 'PUT',
                    url : '/admin/quiz/'+quiz_id,
                    dataType : "json",
                    data : data,
                    success : function(response){
                      if (response.status == 200) {
                        $(".success_message").html('<div class="alert alert-success alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>\
                            '+response.message+'</div>');
                          $("#edit_quickForm").trigger("reset");
                          $('#edit_quiz').modal('hide');
                          fetchQuiz();
                          
                      } else if(response.status == 400) {
                        console.log(response);
                        $(".success_message").html('<div class="alert alert-danger alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>\
                            '+response.message+'</div>');
                         $("#edit_quickForm").trigger("reset");
                         $('#edit_quiz').modal('hide');
                          
                      }
                      else if(response.status == 404) {
                        console.log(response);
                          
                      }
                    }
                });
        });
        //----------------Update quiz----------------------//

        //----------------Deleting quiz----------------------//
        $(document).on("click",".delete_button", function(e){
      	e.preventDefault();
        var quiz_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : 'DELETE',
                    url : '/admin/quiz/'+quiz_id,
                    dataType : "json",
                    success : function(response){
                      if (response.status == 200) {
                          $(".success_message").html('<div class="alert alert-success alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>\
                            '+response.message+'</div>');
                          fetchQuiz();
                          
                      } else if(response.status == 400) {
                        console.log(response);
                        $(".success_message").html('<div class="alert alert-danger alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>\
                            '+response.message+'</div>'); 
                      }
                    }
                });
        });
        //----------------Deleting quiz----------------------//


        //------------validates add quiz modal--------------//
    $.validator.setDefaults({
    submitHandler: function () {
        var data = {
            'subject':$('#subject').val(),
            'name':$('#name').val(),
            'description':$('#description').val(),
            'time':$('#time').val(),
            'active':$('#active').val() 
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            url : '/admin/quiz',
            data : data,
            dataType : "json",
            success : function(response){
                      if (response.status == 200) {
                        $(".success_message").html('<div class="alert alert-success alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>\
                            '+response.message+'</div>');
                          $("#quickForm").trigger("reset");
                          $('#add_quiz').modal('hide');
                          console.log(response);
                          fetchQuiz();
                          
                      } else if(response.status == 404) {
                        console.log(response);
                          
                      }
            }
		});
    }
  });
 $('#quickForm').validate({
    rules: {
        subject: {required: true},
        name: {required: true},
        description: {required: true},
        time: {required: true},
        active: {required: true}
    },
    messages: {
      subject: {required: "Please select a subject"},
      name: {required: "Please enter a name"},
      description: {required: "Please enter a description"},
      time: {required: "Please enter a time"},
      active: {required: "Please enter a active"},
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
//------------validates add quiz modal--------------//
</script>

@endsection

