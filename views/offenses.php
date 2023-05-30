<main id="main" class="main">

    <div class="pagetitle">
      <h1>Offenses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Pages</a></li>
          <li class="breadcrumb-item active">Offenses</li>
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
            	</div> <br><br><br>

              	<!-- Table with stripped rows -->
              	<table class="table table-striped datatable" id="datatable">
                <thead>
	                <tr>
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check_user')"></th>
	                	<th scope="col"></th>
	                    <th scope="col">Violation</th>
                        <th scope="col">Student</th>
                        <th scope="col">Sanction</th>
                        <th scope="col">Academic Year</th>
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

<?php require_once 'views/modals/add_offense.php'; ?>
<?php require_once 'views/modals/update_offense.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

$("#form_submit_update_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/update_offense.php",
        data:$("#form_submit_update_form").serialize(),
        success:function(data){
            if(data==1){
            	alert("Success Update!");
            	get_datatable();
            	$("#modalUpdate").modal("hide");
            }else{
            	alert("Failed Query!");
           }
           $("#form_btn_update_form").prop('disabled', false);
        }
      });
});

function show_details_modal(primary_id){
    $("#modalUpdate").modal('show');
    $.post("ajax/get_offenses.php",
        {
            offense_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_offense_id").val(get_data[0].offense_id);
            $("#update_violation_id").val(get_data[0].violation_id);
            $("#update_student_id").val(get_data[0].student_id);
            $("#update_sanction_id").val(get_data[0].sanction_id);
            $("#update_ay_id").val(get_data[0].ay_id);
            $("#update_offense_desc").val(get_data[0].offense_desc);
    });
}

function delete_entry(){
    var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
        return this.value;
    }).get();
    id = [];

    var confirmation = confirm("Are you sure you want to delete?");

    if(confirmation == true){
        $.post("ajax/delete_offenses.php",
        {
            id:checkedValues
        },function(data){
            if(data == 1){
                alert("Success delete");
                get_datatable();
            }else{
               alert("Failed Query!");
            }   
        });
    }
}

$("#form_submit_add_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_add_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/add_offense.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
            	alert("Success Add!");
            	document.getElementById("form_submit_add_form").reset();
            	get_datatable();
            }else{
            	alert("Failed Query!");
           }
           $("#modalAdd").modal("hide");
           $("#form_btn_add_form").prop('disabled', false);
        }
      });
});

function get_datatable(){
 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/offenses.php",
	        "dataSrc":"data", 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.offense_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.offense_id+")'>Update</button>";
	        }
	    },
	    {
	        "data":"violation_id"
	    },
        {
	        "data":"student_id"
	    },
        {
	        "data":"sanction_id"
	    },
        {
	        "data":"ay_id"
	    },
        {
	        "data":"offense_desc"
	    },
	    {
	        "data":"date_added"
	    }
	    ]
	});
}
</script>