<main id="main" class="main">

    <div class="pagetitle">
      <h1>Clubs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Organizations</li>
          <li class="breadcrumb-item active">Clubs</li>
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
	                    <th scope="col">Club Name</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Cheklist Requirements</th>
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
    require_once 'views/modals/update_club.php'; 
    require_once 'views/modals/add_club.php';
    require_once 'views/modals/view_checklist_requirements.php';
?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
    get_checklistReq();
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
                url:"ajax/update_club.php",
                data:$("#form_submit_update_form").serialize(),
                success:function(data){
                    console.log(data);
                    if(data==1){
                        Swal.fire({
                            icon: 'success',
                            title: 'All Good!',
                            text: 'Club Updated Successfully',
                        });
                        get_datatable();
                    }else{
                        Swal.fire({
                            icon: 'danger',
                            title: 'Opps!',
                            text: 'Failed Query',
                        });
                }
                $("#form_btn_update_form").prop('disabled', false);
                }
            });  
        }
        $("#modalUpdate").modal("hide");
    });
});

function show_details_modal(primary_id){
    $("#modalUpdate").modal('show');
    $.post("ajax/get_club.php",
        {
            primary_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_club_id").val(get_data[0].club_id);
            $("#update_club_name").val(get_data[0].club_name);
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
            $.post("ajax/delete_club.php",
            {
                id:checkedValues
            },function(data){
                console.log(data);
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Club deleted uccessfully'
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
        url:"ajax/add_club.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Club Added Successfully',
                });
            	$('#form_submit_add_form')[0].reset();
            	get_datatable();
            }else{
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

function checklistReq(id){
    $("#viewCheckList").modal('show');
    $("#club_id").val(id);
    get_aquiredChecklist();
}

function add_clubs_checklist(){
    var club_id = $("#club_id").val();

    var checkedValues = $('.check_requirements:checkbox:checked').map(function() {
        return this.value;
    }).get();
    id = [];

    Swal.fire({
            title: 'Add',
            text: "Are you sure you want to proceed?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Proceed'
        }).then((result) => {
            if(result.isConfirmed){
                $.post("ajax/add_clubs_requirements.php",{
                    id : checkedValues,
                    club_id : club_id
                },function(data){
                   if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Rquirements Added Successfully',
                    });
                    get_aquiredChecklist();
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
                    
                });
            }
        })
}

function get_datatable(){
    $("#datatable").DataTable().destroy();
    $("#datatable").DataTable({
        "responsive": true,
        "processing": true,
        "ajax":{
            "type":"POST",
            "url":"ajax/datatables/clubs.php",
            "dataSrc":"data", 
        },
        "columns":[
        {
            "mRender": function(data,type,row){
                return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.club_id+"'>";                
            }
        },
        {
            "mRender":function(data, type, row){
                return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.club_id+")'><i class='bi bi-pencil-square'></i></button>";
            }
        },
        {
            "data":"club_name"
        },
        {
            "data":"date_added"
        },
        {   
            "mRender":function(data, type, row){
                return "<button class='btn btn-primary' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Checklist Requirements' onclick='checklistReq("+row.club_id+")'><i class='bi bi-list'></i>Checklist</button>";
            }
        },
        ]
    });
}


function get_checklistReq(){
    $("#checklist_datatable").DataTable().destroy();
    $("#checklist_datatable").DataTable({
        "responsive": true,
        "processing": false,
        "bFilter": false, 
        "bInfo": false,
        "bPaginate": false,
        "ajax":{
            "type":"POST",
            "url":"ajax/datatables/checklist_requirements.php",
            "dataSrc":"data", 
        },
        "columns":[
        {
            "mRender": function(data,type,row){
                return "<input type='checkbox' class='check_requirements' name='check_requirements' value='"+row.cr_id+"'>";                
            }
        },
        {
            "data":"cr_desc"
        }
        ]
    });
}

function get_aquiredChecklist(){
    var club_id = $("#club_id").val();
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
                club_id:club_id
            }
        },
        "columns":[
        {
            "data":"cr_id"
        },
        {
            "data":"date_added"
        }

        ]
    });
}
</script>