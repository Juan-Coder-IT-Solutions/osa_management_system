<div class="modal fade" id="modalUpdate" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form">
			<div class="modal-body">
            <input type="hidden" id="update_offense_id" name="update_offense_id" class="form-control" required>
                    <div class="col-12">
                       	<label class="form-label">Violation</label>
		                  <select id="update_violation_id" name="update_violation_id" class="form-select" required>
		                  	<option value=''>-- Select Violation --</option>
		                    <?php 
		                    	$fetch_violation = $mysqli->query("SELECT * FROM tbl_violations ORDER BY violation_name ASC") or die(mysqli_error());
								while ($violation_row = $fetch_violation->fetch_array()) {
									echo "<option value='$violation_row[violation_id]'>$violation_row[violation_name]</option>";
								}
		                    ?>
		                </select>
                    </div>

                    <div class="col-12">
                       	<label class="form-label">Student</label>
		                  <select id="update_student_id" name="update_student_id" class="form-select" required>
		                  	<option value=''>-- Select Student --</option>
		                    <?php 
								$fetch_student = $mysqli->query("SELECT * FROM tbl_users WHERE category='S' ORDER BY user_fname ASC") or die(mysqli_error());
								while ($student_row = $fetch_student->fetch_array()) {
									echo "<option value='$student_row[user_id]'>$student_row[user_lname], $student_row[user_fname] $student_row[user_mname]</option>";
								}
							?>
		                </select>
                    </div>

                    <div class="col-12">
                       	<label class="form-label">Sanction</label>
		                  <select id="update_sanction_id" name="update_sanction_id" class="form-select" required>
		                  	<option value=''>-- Select Sanction --</option>
		                    <?php 
		                    	$fetch_sanction = $mysqli->query("SELECT * FROM tbl_sanctions ORDER BY sanction_name ASC") or die(mysqli_error());
								while ($sanction_row = $fetch_sanction->fetch_array()) {
									echo "<option value='$sanction_row[sanction_id]'>$sanction_row[sanction_name]</option>";
								}
		                    ?>
		                </select>
                    </div>

                    <div class="col-12">
                       	<label class="form-label">Academic Year</label>
		                  <select id="update_ay_id" name="update_ay_id" class="form-select" required>
		                  	<option value=''>-- Select Academic Year --</option>
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
		                <textarea class="form-control" placeholder="Description" id="update_offense_desc" name="update_offense_desc"></textarea>
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