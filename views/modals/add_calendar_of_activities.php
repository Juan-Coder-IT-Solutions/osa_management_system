<div class="modal fade" id="modalAdd" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Add data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_add_form" class="row g-3 needs-validation">
				<div class="modal-body">
					<div class="col-12">
                      	<label for="form-label" class="form-label">Activity Date</label>
                      	<div class="input-group">
                        	<input type="date" name="activity_date" class="form-control" required>
                      	</div>
                    </div>

					<div class="col-12">
                       	<label class="form-label">Academic Year</label>
		                  <select name="ay_id" class="form-select" required>
		                  	<option value="">-- Select Academic Year --</option>
		                    <?php 
		                    	$fetch_ay = $mysqli->query("SELECT * FROM tbl_academic_year ORDER BY ay_name ASC") or die(mysqli_error());
								while ($ay_row = $fetch_ay->fetch_array()) {
									echo "<option value='$ay_row[ay_id]'>$ay_row[ay_name]</option>";
								}
		                    ?>
		                </select>
                    </div>
					
					<div class="col-12">
                    	<label class="form-label">Activity Description</label>
		                <textarea class="form-control" placeholder="Description" name="activity_desc" required></textarea>
                    </div>
				</div>
				<div class="modal-footer">
				  	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  	<button class="btn btn-primary" type="submit" id="form_btn_add_form">Save</button>
				</div>

			</form>
		</div>
	</div>
</div>