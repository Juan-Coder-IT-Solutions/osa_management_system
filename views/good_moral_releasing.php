<main id="main" class="main">

    <div class="pagetitle">
      <h1>Good Moral Releasing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Master Data</li>
          <li class="breadcrumb-item active">Good Moral Releasing</li>
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
            		<label class="form-label">Academic Year</label>
	                  <select id="ay_id" class="form-select" onchange="get_datatable()">
                        <option value=''>-- Select Academic Year--</option>
	                    <?php 
	                    	$fetch_ay = $mysqli->query("SELECT * FROM tbl_academic_year ORDER BY ay_name ASC") or die(mysqli_error());
							while ($ay_row = $fetch_ay->fetch_array()) {
								echo "<option value='$ay_row[ay_id]'>$ay_row[ay_name]</option>";
							}
	                    ?>
	                </select>
            	</div>

            	 <br><br><br>

              	<!-- Table with stripped rows -->
              	<table class="table table-striped datatable" id="datatable">
                <thead>
	                <tr>
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check_user')"></th>
	                	<th scope="col"></th>
                        <th scope="col">Academic Year</th>
                        <th scope="col">Student</th>
	                    <th scope="col">Description</th>
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

<?php require_once 'views/modals/add_good_moral_releasing.php'; ?>
<?php require_once 'views/modals/update_good_moral_releasing.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

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
                url:"ajax/update_good_moral_releasing.php",
                data:$("#form_submit_update_form").serialize(),
                success:function(data){
                    if(data==1){
                        Swal.fire({
                            icon: 'success',
                            title: 'All good!',
                            text: 'Good Moral updated successfully'
                        });
                        get_datatable();
                        $("#modalUpdate").modal("hide");
                    }else{
                        Swal.fire({
                            icon: 'danger',
                            title: 'Opps!',
                            text: 'Failed Query!'
                        });
                    }
                }
            });
            $("#form_btn_update_form").prop('disabled', false);
        }
    });
});

function show_details_modal(primary_id){
    $("#modalUpdate").modal('show');
    $.post("ajax/get_good_moral_releasing.php",
        {
            good_moral_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_good_moral_id").val(get_data[0].good_moral_id);
            $("#update_ay_id").val(get_data[0].ay_id);
            $("#update_good_modal_desc").val(get_data[0].good_modal_desc);
            $("#update_student_id").val(get_data[0].student_id);
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
        $.post("ajax/delete_good_moral_releasing.php",
        {
            id:checkedValues
        },function(data){
            if(data == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'All good!',
                    text: 'Good Moral deleted successfully!'
                });
                get_datatable();
            }else{
                Swal.fire({
                    icon: 'danger',
                    title: 'Opps!',
                    text: 'Failed Query!'
                });
            }   
        });
    });    
}

$("#form_submit_add_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_add_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/add_good_moral_releasing.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All good!',
                    text: 'Good Moral added successfully!'
                });
            	document.getElementById("form_submit_add_form").reset();
            	get_datatable();
            }else{
                Swal.fire({
                    icon: 'danger',
                    title: 'Opps!',
                    text: 'Failed Query!'
                });
           }
           $("#modalAdd").modal("hide");
           $("#form_btn_add_form").prop('disabled', false);
        }
      });
});

function get_datatable(){
	var ay_id = $("#ay_id").val();
 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/good_moral_releasing.php",
	        "dataSrc":"data",
	        "data": {
                ay_id: ay_id
            },
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.good_moral_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.good_moral_id+")'><i class='bi bi-pencil-square'></i></button>";
	        }
	    },
        {
            "data":"academic_year"
        },
        {
            "data":"student"
        },
	    {
	        "data":"description"
	    },
	    {
	        "data":"date_added"
	    }
	    ]
	});
}
</script>