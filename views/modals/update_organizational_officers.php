<div class="modal fade" id="modalUpdate" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form">
				<div class="modal-body">
                    <input type="hidden" id="update_of_id" name="update_of_id">
					

					<div class="col-12" style="margin-bottom:10px">
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

					<div class="col-12" style="margin-bottom:10px">
						<label class="form-label">Club</label>
							<select id="update_club_id" name="update_club_id" class="form-select" required>
							<option value=''>-- Select Club --</option>
							<?php 
								$fetch_club = $mysqli->query("SELECT * FROM tbl_clubs ORDER BY club_name ASC") or die(mysqli_error());
								while ($club_row = $fetch_club->fetch_array()) {
									echo "<option value='$club_row[club_id]'>$club_row[club_name]</option>";
								}
							?>
						</select>
					</div>

                    <div class="col-12">
                        <label class="form-label">Student</label>
                        <div class="input-group has-validation">
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
                    </div>

                    <div class="col-12">
                        <label class="form-label">Type</label>
                        <div class="input-group has-validation">
                        <select class="form-control" name="update_of_type" id="update_of_type" required>
	                        	<option>-- Select Type --</option>
	                        	<option>President</option>
	                        	<option>Vice President</option>
	                        	<option>Secretary</option>
	                        	<option>Treasurer</option>
	                        	<option>Member</option>
	                        </select>
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