@extends('layouts.admin')

@section('content')
<div class="col-12">
<div class="container-fluid pt-3">
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">Admins Authentications</h3>
    <a href="#" class="btn btn-success btn-sm ml-3" data-toggle="modal" data-target="#add">Add Admin</a>
  </div>
  <!-- ./card-header -->
  <div class="card-body">
      <div class="success_message"></div>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th colspan="2">Actions</th>
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="#" method="POST" id="quickForm">
          <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="Description">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
          </div>
         <div class="form-group">
            <label for="title">Password:</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Enter password">
          </div>
          <input type="submit" class="btn btn-secondary btn-sm" id="add" value="save">
        </form>
        </div>
      </div>
    </div>
  </div>
  <!--End of Modal -->
  
<!------------ Modal editing  ------------------>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="#" method="POST" id="edit_quickForm">
          <input type="hidden" id="admin_id">
          <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" name="name" class="form-control" id="edit_name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="edit_email" placeholder="Enter email">
          </div>
         <div class="form-group">
            <label for="title">Password:</label>
            <input type="text" name="password" class="form-control" id="edit_password" placeholder="Enter password">
          </div>
          <input type="submit" class="btn btn-secondary btn-sm" id="edit_btn" value="update">
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
        fetchAdmin();
        function fetchAdmin(){

            $.ajax({
            type : "GET",
			url : '/admin/auth/fetch',
            dataType : "json",
			success : function(response){
                $('tbody').html("");
                $.each(response.data, function(key, value){
					$('tbody').append('<tr>\
                    <td>'+value.name+'</td>\
                    <td>'+value.email+'</td>\
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
        var id = $(this).val();
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : 'GET',
		      	url : '/admin/auth/'+id+'/edit',
            dataType : "json",
	      		success : function(response){
              console.log(response);
                if (response.status == 200) {
                  $('#admin_id').val(response.admin.id); 
                    $('#edit_name').val(response.admin.name); 
                    $('#edit_email').val(response.admin.email); 
                    $('#edit_password').val(response.admin.password); 
                    $('#edit').modal('show');
                    
                } else if(response.status == 404) {
                  $(".success_message").html('<div class="alert alert-danger alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>\
                            '+response.message+'</div>');
                    $("#edit_quickForm").trigger("reset");
				          	$('#edit').modal('hide'); 
                }
                
			}
		});
        });

        
//----------------Update ----------------------//
        $(document).on("click","#edit_btn", function(e){
      	e.preventDefault();
          var admin_id = $('#admin_id').val();
          var data = {
            'name':$('#edit_name').val(),
            'email':$('#edit_email').val(),
            'password':$('#edit_password').val()
          }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : 'PUT',
                    url : '/admin/auth/'+admin_id,
                    dataType : "json",
                    data : data,
                    success : function(response){
                      if (response.status == 200) {
                        $(".success_message").html('<div class="alert alert-success alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>\
                            '+response.message+'</div>');
                          $("#edit_quickForm").trigger("reset");
                          $('#edit').modal('hide');
                          fetchAdmin();
                          
                      } else if(response.status == 400) {
                        console.log(response);
                        $(".success_message").html('<div class="alert alert-danger alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>\
                            '+response.message+'</div>');
                         $("#edit_quickForm").trigger("reset");
                         $('#edit').modal('hide');
                          
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
        var admin_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : 'DELETE',
                    url : '/admin/auth/'+admin_id,
                    dataType : "json",
                    success : function(response){
                      if (response.status == 200) {
                          $(".success_message").html('<div class="alert alert-success alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>\
                            '+response.message+'</div>');
                          fetchAdmin();
                          
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
            'name':$('#name').val(),
            'email':$('#email').val(),
            'password':$('#password').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            url : '/admin/auth/create',
            data : data,
            dataType : "json",
            success : function(response){
              console.log(response);
                      if (response.status == 200) {
                        $(".success_message").html('<div class="alert alert-success alert-dismissible">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>\
                            '+response.message+'</div>');
                          $("#quickForm").trigger("reset");
                          $('#add').modal('hide');
                          console.log(response);
                          fetchAdmin();
                          
                      } else if(response.status == 404) {
                        console.log(response);
                          
                      }
            }
		});
    }
  });
 $('#quickForm').validate({
    rules: {
        name: {required: true},
        email: {required: true},
        password: {required: true}
    },
    messages: {
      name: {required: "Please enter a name"},
      email: {required: "Please enter a email"},
      password: {required: "Please enter a password"},
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
// //------------validates add quiz modal--------------//
</script>

@endsection

