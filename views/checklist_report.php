<main id="main" class="main">

    <div class="pagetitle">
      <h1>Checklist Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Report</li>
          <li class="breadcrumb-item active">Checklist Report</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      		<div class="card">
            <div class="card-body">
            	<div class="col-sm-12" style="padding: 10px;">
            		<div class="col-4">
                        <label class="form-label">Club</label>
                        <div class="input-group has-validation">
                        <select class="form-control" id="club_id" onchange="generate_report()">
                        	<option>--Select Club--</option>
                        	<?php 
								$fetch_club = $mysqli->query("SELECT * FROM tbl_clubs ORDER BY club_name ASC") or die(mysqli_error());
								while ($club_row = $fetch_club->fetch_array()) {
									echo "<option value='$club_row[club_id]'>$club_row[club_name]</option>";
								}
							?>
                        </select>
                        </div>
                    </div>
            	</div> <br><br><br>

           		<div id="report_body">
           			
           		</div>
              <!-- End Table with stripped rows -->
            </div>
          </div>
      </div>
    </section>
</main><!-- End #main -->

<?php require_once 'views/modals/add_user.php'; ?>

<script type="text/javascript">
$(document).ready(function() { 

});

function generate_report(){
	var club_id = $("#club_id").val();
	$.post("ajax/checklist_report.php",{
		club_id:club_id
	},function(data){
		$("#report_body").html(data);
	});
}
</script>