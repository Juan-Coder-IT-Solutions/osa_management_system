<main id="main" class="main">

    <div class="pagetitle">
      <h1>Services Under OSA</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Master Data</li>
          <li class="breadcrumb-item active">Services Under OSA</li>
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
	                	<button type="button" class="btn btn-danger" onclick="delete_entry()">Delete</button>
	              	</div>
            	</div> <br><br><br>

              	<!-- Table with stripped rows -->
              	<table class="table table-striped datatable" id="datatable">
                <thead>
	                <tr>
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check_services')"></th>
	                	<th scope="col"></th>
	                  <th scope="col">Service</th>
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

<?php require_once 'views/modals/add_services.php'; ?>
<?php require_once 'views/modals/update_services.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
  get_datatable();
});

function add_entry(){
  $('#modalAdd').modal('show');
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
                url:"ajax/update_services.php",
                data:$("#form_submit_update_form").serialize(),
                success:function(data){
                    if(data==1){
                        Swal.fire({
                            icon: 'success',
                            title: 'All Good!',
                            text: 'Services Updated Successfully',
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
        $("#modalUpdateSanction").modal("hide");
    });
});

function show_details_modal(primary_id){
    $("#modalUpdateSanction").modal('show');
    $.post("ajax/get_services.php",
        {
          services_id:primary_id
        },function(data){
           	var get_data = JSON.parse(data);
            $("#update_services_id").val(get_data[0].services_id);
            $("#update_services_desc").val(get_data[0].services_desc);
            $("#update_services_remarks").val(get_data[0].services_remarks);
    });
}

function delete_entry(){
    var checkedValues = $('.check_box:checkbox:checked').map(function() {
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
            $.post("ajax/delete_services.php",
            {
                id:checkedValues
            },function(data){
                console.log(data);
                if(data == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'All Good!',
                        text: 'Sanction deleted uccessfully'
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
  $.ajax({
    type:"POST",
    url:"ajax/add_service.php",
    data:$("#form_submit_add_form").serialize(),
    success:function(data){
      if(data==1){
          Swal.fire({
              icon: 'success',
              title: 'All Good!',
              text: 'Services Added Successfully',
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
      $("#modalAdd").modal('hide');
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
	        "url":"ajax/datatables/services.php",
	        "dataSrc":"data", 
	    },
	    "columns":[
	    {
	        "mRender": function(data,type,row){
	            return "<input type='checkbox' class='check_box' name='check_services' value='"+row.services_id+"'>";                
	        }
	    },
	    {
	        "mRender":function(data, type, row){
	            return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.services_id+")'><i class='bi bi-pencil-square'></i></button>";
	        }
	    },
	    {
	        "data":"services_desc"
	    },
      {
          "data":"services_remarks"
      },
      {
          "data":"date_added"
      }
	    ]
	});
}
</script>