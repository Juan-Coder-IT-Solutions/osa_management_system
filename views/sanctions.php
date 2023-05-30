<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sanctions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Pages</a></li>
          <li class="breadcrumb-item active">Sanctions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      		<div class="card">
            <div class="card-body">
            	<div class="col-sm-12" style="padding: 10px;">
            		<div class="btn-group" role="group" aria-label="Basic mixed styles example" style="float: right;">
	                	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddSanction">Add</button>
	                	<button type="button" class="btn btn-danger" onclick="delete_entry()">Delete</button>
	              	</div>
            	</div> <br><br><br>

              	<!-- Table with stripped rows -->
              	<table class="table table-striped datatable" id="datatable">
                <thead>
	                <tr>
	                	<th scope="col"><input type="checkbox" onchange="checkAll(this, 'check_user')"></th>
	                	<th scope="col"></th>
	                    <th scope="col">Sanction Name</th>
	                    <th scope="col">Sanction Desc</th>
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

<?php require_once 'views/modals/add_sanction.php'; ?>
<?php require_once 'views/modals/update_course.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 
	get_datatable();
});


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
            $.post("ajax/delete_sanction.php",
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
    e.preventDefault();
    $("#form_btn_add_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/add_sanction.php",
        data:$("#form_submit_add_form").serialize(),
        success:function(data){
            if(data==1){
                Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Sanction Added Successfully',
                })
            	$('#form_submit_add_form')[0].reset();
            	get_datatable();
            }else{
            	Swal.fire({
                    icon: 'warning',
                    title: 'Opps!',
                    text: 'Failed Query!',
                })
           }
           $("#modalAddSanction").modal("hide");
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
            "url":"ajax/datatables/sanctions.php",
            "dataSrc":"data", 
        },
        "columns":[
        {
            "mRender": function(data,type,row){
                return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.sanction_id+"'>";                
            }
        },
        {
            "mRender":function(data, type, row){
                return "<button class='btn btn-success' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='show_details_modal("+row.sanction_id+")'>Update</button>";
            }
        },
        {
            "data":"sanction_name"
        },
        {
            "data":"sanction_desc"
        },
        {
            "data":"date_added"
        }
        ]
    });
}
</script>