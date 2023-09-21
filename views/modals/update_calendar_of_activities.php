<div class="modal fade" id="modalUpdate" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form" class="row g-3 needs-validation" novalidate>
			<div class="modal-body">
            <input type="hidden" id="update_activity_id" name="update_activity_id" class="form-control" required>

            	<div class="col-12">
                   	<label class="form-label">Academic Year</label>
	                  <select id="update_ay_id" name="update_ay_id" class="form-select">
	                    <?php 
	                    	$fetch_ay = $mysqli->query("SELECT * FROM tbl_academic_year ORDER BY ay_name ASC") or die(mysqli_error());
							while ($ay_row = $fetch_ay->fetch_array()) {
								echo "<option value='$ay_row[ay_id]'>$ay_row[ay_name]</option>";
							}
	                    ?>
	                </select>
                </div>
  
                <div class="col-12">
                	<label class="form-label">Description</label>
	                <textarea class="form-control" placeholder="Description" id="update_activity_desc" name="update_activity_desc"></textarea>
                </div>

                <div class="col-12">
                  	<label for="form-label" class="form-label">Activity Date</label>
                  	<div class="input-group">
                    	<input type="date" id="update_activity_date" name="update_activity_date" class="form-control" required>
                  	</div>
                </div> 

				</div>
				<div class="modal-footer">
				  	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  	<button class="btn btn-primary" type="submit" id="form_btn_update_form">Save</button>
				</div>

			</form>
		</div>
	</div>
</div>