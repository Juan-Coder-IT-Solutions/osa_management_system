<main id="main" class="main">

    <div class="pagetitle">
      <h1>OSA Checklist Requirements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Master Data</li>
          <li class="breadcrumb-item active">OSA Checklist Requirements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      		<div class="card">
            <div class="card-body">
            	<div class="col-sm-12" style="padding: 10px;">
            		<div class="btn-group" role="group" aria-label="Basic mixed styles example" style="float: right;">
	                	<button type="button" class="btn btn-primary" onclick="add()">Add</button>
	                	<button type="button" class="btn btn-danger" onclick="delete_entry()">Delete</button>
	              	</div>
            	</div> <br><br><br>

              	<!-- Table with stripped rows -->
              	<table class="table table-striped datatable" id="datatable">
                <thead>
	                <tr>
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check_checklist_requirements')"></th>
	                	<th scope="col"></th>
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

<?php require_once 'views/modals/add_checklist_requirements.php'; ?>
<?php require_once 'views/modals/update_checklist_requirements.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
  get_datatable();
});

function add(){
    $("#modalAdd").modal('show');
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
                url:"ajax/update_checklist_requirements.php",
                data:$("#form_submit_update_form").serialize(),
                success:function(data){
                    console.log(data);
                    if(data==1){
                        Swal.fire({
                            icon: 'success',
                            title: 'All Good!',
                            text: 'Checklist Requirements Updated Successfully',
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
    $.post("ajax/get_checklist_requirements.php",
        {
            cr_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_cr_id").val(get_data[0].cr_id);
            $("#update_cr_desc").val(get_data[0].cr_desc);
    });
}

function delete_entry(){
    var checkedValues = $('.check_checklist_requirements:checkbox:checked').map(function() {
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
            $.post("ajax/delete_checklist_requirements.php",
            {
                id:checkedValues
            },function(data){
                console.log(data);
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Checklist Requirements deleted successfully'
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
      url:"ajax/add_check_requirements.php",
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
 	$("#datatable").DataTable().destroy();
	$("#datatable").DataTable({
	    "responsive": true,
	    "processing": true,
	    "ajax":{
	        "type":"POST",
	        "url":"ajax/datatables/checklist_requirements.php",
	        "dataSrc":"data", 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='check_checklist_requirements' name='check_checklist_requirements' value='"+row.cr_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.cr_id+")'><i class='bi bi-pencil-square'></i></button>";
	        }
	    },
	    {
	        "data":"cr_desc"
	    },
	    {
	        "data":"date_added"
	    }
	    ]
	});
}
</script>