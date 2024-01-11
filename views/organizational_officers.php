<main id="main" class="main">

    <div class="pagetitle">
      <h1>Organizational Officers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Organizations</li>
          <li class="breadcrumb-item active">Organizational Officers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      		<div class="card">
            <div class="card-body">
            	<div class="col-sm-12" style="padding: 10px;">
            		<div class="btn-group" role="group" aria-label="Basic mixed styles example" style="float: right;">
	                	<button type="button" class="btn btn-primary" onclick="add_entry()">Add</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href='views/print_organizational_officers.php'"> Print</button>
	                	<button type="button" class="btn btn-danger" onclick="delete_entry()">Delete</button>
	              	</div>
            	</div> 
                <div class="col-sm-4">
            		<label class="form-label">Academic Year</label>
	                  <select id="ay_id" class="form-select" onchange="get_datatable()">
                        <option value="">-- Select Academic Year --</option>
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
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check')"></th>
	                	<th scope="col" style="color:transparent;">--------</th>
                        <th scope="col">Club</th>
	                    <th scope="col">Student</th>
                        <th scope="col">Type</th>
                        <th scope="col">Academic Year</th>
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

<?php 
    require_once 'views/modals/add_organizational_officers.php';
    require_once 'views/modals/update_organizational_officers.php'; 
    require_once 'views/modals/view_checklist_requirements.php';
 ?>

<script type="text/javascript">
$(document).ready(function(){
  get_datatable();
});

function add_entry(){
    $("#modalAdd").modal('show');
}

function show_details_modal(primary_id){
    $("#modalUpdate").modal('show');
    $.post("ajax/get_organizational_officers.php",
        {
            of_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_of_id").val(get_data[0].of_id);
            $("#update_club_id").val(get_data[0].club_id);
            $("#update_student_id").val(get_data[0].student_id);
            $("#update_of_type").val(get_data[0].of_type);
            $("#update_ay_id").val(get_data[0].ay_id);
    });
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
                url:"ajax/update_organizational_officer.php",
                data:$("#form_submit_update_form").serialize(),
                success:function(data){
                    if(data==1){
                        Swal.fire({
                            icon: 'success',
                            title: 'All Good!',
                            text: 'Organizational Officers updated successfully'
                        });
                        get_datatable();
                        $("#modalUpdate").modal("hide");
                    }else{
                        Swal.fire({
                            icon: 'danger',
                            title: 'Opps!',
                            text: 'Failed Query'
                        });
                }
                $("#form_btn_update_form").prop('disabled', false);
                }
            });
        }
    });
});

function delete_entry(){
    var checkedValues = $('.check:checkbox:checked').map(function() {
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
            $.post("ajax/delete_organizational_officers.php",
            {
                id:checkedValues
            },function(data){
                console.log(data);
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Organizational Officers deleted successfully'
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
        url:"ajax/add_organizational_officers.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Sanction Added Successfully',
                });
            	$('#form_submit_add_form')[0].reset();
            	get_datatable();
            }else{
                alert(data);
            	Swal.fire({
                    icon: 'warning',
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
    var ay_id = $("#ay_id").val();
    $("#datatable").DataTable().destroy();
    $("#datatable").DataTable({
        "responsive": true,
        "processing": true,
        "ajax":{
            "type":"POST",
            "url":"ajax/datatables/organizational_officers.php",
            "dataSrc":"data",
            "data":{
                ay_id:ay_id
            } 
        },
        "columns":[
        {
            "mRender": function(data,type,row){
                return "<input type='checkbox' class='check' name='check' value='"+row.of_id+"'>";                
            }
        },
        {
            "mRender":function(data, type, row){
                return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.of_id+")'><i class='bi bi-pencil-square'></i></button> <button class='btn btn-primary' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Checklist Requirements' onclick='checklistReq("+row.of_id+")'><i class='bi bi-card-checklist'></i></button>";
            }
        },
        {
            "data":"club"
        },
        {
            "data":"student"
        },
        {
            "data":"of_type"
        },
        {
            "data":"academic_year"
        },
        {
            "data":"date_added"
        }
        ]
    });
}

function checklistReq(id){
    $("#viewCheckList").modal('show');
    $("#of_id").val(id);
    get_checklistReq();
    get_aquiredChecklist();
}

function add_clubs_checklist(cr_id){
	var of_id = $("#of_id").val();

	 	 var formData = new FormData();

	 	 $(".file-"+cr_id+"-"+of_id).each(function() {
		    formData.append("file", this.files[0]);
		});

	 	formData.append("of_id",of_id);
	 	formData.append("cr_id",cr_id);

    	$.ajax({
		    url: 'ajax/add_clubs_requirements.php',
		    data: formData,
		    type: 'POST',
		    contentType: false, 
		    processData: false,
		    success : function(data){
		    	if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Rquirements Added Successfully',
                    });
                    
                   }else if(data == 2){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Opps!',
                        text: 'Requirements already aquired!',
                    });
                   }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Opps!',
                        text: 'Failed Query!',
                    });
                   }
                get_checklistReq();
                get_aquiredChecklist();
		    }
		});
   

    

    // var checkedValues = $('.check_requirements:checkbox:checked').map(function() {
    //     return this.value;
    // }).get();
    // id = [];

    // Swal.fire({
    //         title: 'Add',
    //         text: "Are you sure you want to proceed?",
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: 'Proceed'
    //     }).then((result) => {
    //         if(result.isConfirmed){
    //             $.post("ajax/add_clubs_requirements.php",{
    //                 id : checkedValues,
    //                 of_id : of_id
    //             },function(data){
    //             	alert(data);
    //             //    if(data == 1){
    //             //     Swal.fire({
    //             //         icon: 'success',
    //             //         title: 'All Good!',
    //             //         text: 'Rquirements Added Successfully',
    //             //     });
                    
    //             //    }else if(data == 2){
    //             //     Swal.fire({
    //             //         icon: 'warning',
    //             //         title: 'Opps!',
    //             //         text: 'Requirements already aquired!',
    //             //     });
    //             //    }else{
    //             //     Swal.fire({
    //             //         icon: 'warning',
    //             //         title: 'Opps!',
    //             //         text: 'Failed Query!',
    //             //     });
    //             //    }
    //             // get_checklistReq();
    //             // get_aquiredChecklist();
    //             });
    //         }
    //     })
}

function get_checklistReq(){
    var of_id = $("#of_id").val();
    $("#checklist_datatable").DataTable().destroy();
    $("#checklist_datatable").DataTable({
        "responsive": true,
        "processing": false,
        "bFilter": false, 
        "bInfo": false,
        "bPaginate": false,
        "ajax":{
            "type":"POST",
            "url":"ajax/datatables/clubs_checklist_requirements.php",
            "dataSrc":"data",
            "data":{
                of_id:of_id
            },
        },
        "columns":[
        {
            "mRender": function(data,type,row){
                return "<button class='btn btn-primary' onclick='add_clubs_checklist("+row.cr_id+")'><span class='bi bi-check-circle'></span></button>";                
            }
        },
        {
            "data":"cr_desc"
        },
        {
            "mRender": function(data,type,row){
                return "<input type='file' class='form-control file-"+row.cr_id+"-"+of_id+"' >";                
            }
        }
        ]
    });
}

function delete_aquired_requirements(){
    var checkedValues = $('.acquired_check_requirements:checkbox:checked').map(function() {
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
            $.post("ajax/delete_aquired_requirements.php",{
                id:checkedValues
            },function(data){
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Rquirements Deleted Successfully',
                    });
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Opps!',
                        text: 'Failed Query!',
                    });
                }
                get_checklistReq();
                get_aquiredChecklist();
            }); 
        }
    })
}

function get_aquiredChecklist(){
    var of_id = $("#of_id").val();
    $("#clubs_aquired_req").DataTable().destroy();
    $("#clubs_aquired_req").DataTable({
        "responsive": true,
        "processing": false,
        "bFilter": false, 
        "bInfo": false,
        "bPaginate": false,
        "ajax":{
            "type":"POST",
            "url":"ajax/datatables/clubs_aquired_requirements.php",
            "dataSrc":"data",
            "data" : {
                of_id:of_id
            }
        },
        "columns":[
        {
            "mRender": function(data,type,row){
                return "<input type='checkbox' class='acquired_check_requirements' name='acquired_check_requirements' value='"+row.id+"'>";
            }
        },
         {
            "mRender": function(data,type,row){
                return "<a class='btn btn-primary' href=\"assets/uploaded_files/"+row.attached_file+"\" download><span class='bi bi-download'></span></a>";
            }
        },
        {
            "data":"cr_id"
        },
        {
            "data":"date_added"
        }

        ]
    });
}

function download_file(attached_file){
	window.location = "assets/uploaded_files/"+attached_file;
}
</script>