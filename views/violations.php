<main id="main" class="main">

    <div class="pagetitle">
      <h1>Violations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Sanctions & Violations</li>
          <li class="breadcrumb-item active">Violations</li>
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
	                    <th scope="col">Violation Name</th>
                        <th scope="col">Violation Description</th>
                        <th scope="col">Violation Remarks</th>
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

<?php require_once 'views/modals/add_violation.php'; ?>
<?php require_once 'views/modals/update_violation.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});

$("#form_submit_update_form").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/update_violation.php",
        data:$("#form_submit_update_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Violations updated successfully',
                });
            	get_datatable();
            	$("#modalUpdate").modal("hide");
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
});

function show_details_modal(primary_id){
    $("#modalUpdate").modal('show');
    $.post("ajax/get_violation.php",
        {
            violation_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_violation_id").val(get_data[0].violation_id);
            $("#update_violation_name").val(get_data[0].violation_name);
            $("#update_violation_remarks").val(get_data[0].violation_remarks);
            $("#update_violation_desc").val(get_data[0].violation_desc);
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
            $.post("ajax/delete_violations.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All good!',
                        text: 'Violation deleted successfully!',
                    });
                    get_datatable();
                }else{
                    Swal.fire({
                        icon: 'danger',
                        title: 'Opps!',
                        text: 'Failed Query!',
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
        url:"ajax/add_violation.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All good!',
                    text: 'Violation added successfully!',
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
 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/violations.php",
	        "dataSrc":"data", 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.violation_id +"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.violation_id +")'><i class='bi bi-pencil-square'></i></button>";
	        }
	    },
	    {
	        "data":"violation_name"
	    },
        {
	        "data":"violation_remarks"
	    },
        {
	        "data":"violation_desc"
	    },
	    {
	        "data":"date_added"
	    }
	    ]
	});
}
</script>