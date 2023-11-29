<main id="main" class="main">
    <div class="pagetitle">
      <h1>Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      		<div class="card">
            <div class="card-body">
            	<div class="col-sm-12" style="padding: 10px;">
            		<div class="btn-group" role="group" aria-label="Basic mixed styles example" style="float: right;">
	                	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">Add</button>
	                	<button type="button" class="btn btn-danger" onclick="delete_entry()">Delete</button>
	              	</div>
            	</div>

                <div class="col-sm-4">
            		<label class="form-label">Course</label>
	                  <select id="course_id" class="form-select" onchange="get_datatable()">
                        <option value=''>-- Select Course--</option>
	                    <?php 
	                    	$fetch = $mysqli->query("SELECT * FROM tbl_courses ORDER BY course_name ASC") or die(mysqli_error());
							while ($row = $fetch->fetch_array()) {
								echo "<option value='$row[course_id]'>$row[course_name]</option>";
							}
	                    ?>
	                </select>
            	</div>


                <br><br><br>

              	<!-- Table with stripped rows -->
              	<table class="table table-striped datatable" id="datatable">
                <thead>
	                <tr>
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check_students')"></th>
	                	<th scope="col"></th>
	                    <th scope="col">Full Name</th>
	                    <th scope="col">Gender</th>
                        <th scope="col">Course</th>
                        <th scope="col">Contact #</th>
	                    <th scope="col">Date Added</th>
	                </tr>
	            </thead>
                <tbody>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
      </div>
    </section>
</main><!-- End #main -->

<?php require_once 'views/modals/add_student.php'; ?>
<?php require_once 'views/modals/update_student.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
    $("#icon").html("<span class='ri-eye-line'></span>");
});

function show_pass(){
    var x = document.getElementById("password");

    if(x.type === "password"){
        x.type = "text";
        $("#icon").html("<span class='ri-eye-off-fill'></span>");
    }else{
        x.type = "password";
        $("#icon").html("<span class='ri-eye-line'></span>");
    }
}

$("#form_submit_update_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_form").prop('disabled', true);

    Swal.fire({
        title: 'Update',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
            type:"POST",
            url:"ajax/update_student.php",
            data:$("#form_submit_update_form").serialize(),
            success:function(data){
                if(data==1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Students updated uccessfully',
                    });
                    get_datatable();
                    $("#modalUpdate").modal("hide");
                }else if(data==2){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Opps!',
                        text: 'Username Already Used!',
                    });
                }else{
                    Swal.fire({
                        icon: 'danger',
                        title: 'Opps!',
                        text: 'Failed Query!',
                    });
            }
            $("#form_btn_update_form").prop('disabled', false);
            }
        });
        }

    });

    
});

function show_details_modal(primary_id){
    $("#modalUpdate").modal('show');
    $.post("ajax/get_student.php",
        {
            student_id:primary_id
        },function(data){
         	var get_data = JSON.parse(data);
          $("#update_student_id").val(get_data[0].student_id);
          $("#update_student_code").val(get_data[0].student_code);
          $("#update_student_fname").val(get_data[0].student_fname);
          $("#update_student_mname").val(get_data[0].student_mname);
          $("#update_student_lname").val(get_data[0].student_lname);
          $("#update_student_birthdate").val(get_data[0].student_birthdate);
          $("#update_student_gender").val(get_data[0].student_gender);
          $("#update_student_address").val(get_data[0].student_address);
          $("#update_student_contact_num").val(get_data[0].student_contact_num);
          $("#update_course_id").val(get_data[0].course_id);
    });
}

function delete_entry(){
    var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
        return this.value;
    }).get();
    id = [];

    Swal.fire({
        title: 'Delete',
        text: "Are you sure you want to proceed?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Proceed'
    }).then((result) => {
        if(result.isConfirmed){
            $.post("ajax/delete_student.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Student deleted successfully'
                    });
                    get_datatable();
                }else{
                    Swal.fire({
                        icon: 'danger',
                        title: 'Opps!',
                        text: 'Failed Query'
                    });
                }   
            });
        }
    });
}

$("#form_submit_add_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_add_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/add_student.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Students added successfully',
                });
            	document.getElementById("form_submit_add_form").reset();
            	get_datatable();
            }else{
                Swal.fire({
                    icon: 'danger',
                    title: 'Opps!',
                    text: 'Failed Query!',
                });
           }
           $("#modalAdd").modal("hide");
           $("#form_btn_add_form").prop('disabled', false);
        }
      });
});

function get_datatable(){
    var course_id = $("#course_id").val();
 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/students.php",
	        "dataSrc":"data",
            "data":{
                course_id:course_id
            } 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_students' value='"+row.student_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.student_id+")'><i class='bi bi-pencil-square'></i></button>";
	        }
	    },
	    {
	        "data":"name"
	    },
	    {
	        "data":"student_gender"
	    },
        {
            "data":"course"
        },
        {
            "data":"student_contact_num"
        },
	    {
	        "data":"date_added"
	    }
	    ]
	});
}
</script>