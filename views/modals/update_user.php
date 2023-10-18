<div class="modal fade" id="modalUpdateUsers" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form">
				<div class="modal-body">
					<input type="hidden" id="update_user_id" name="update_user_id">

					<div class="row" style="margin-bottom:10px">
						<div class="col-4">
							<label class="form-label">First Name</label>
							<div class="input-group has-validation">
								<input type="text" id="update_user_fname" name="update_user_fname" class="form-control" required>
							</div>
						</div>

						<div class="col-4">
							<label class="form-label">Middle Name</label>
							<div class="input-group has-validation">
								<input type="text" id="update_user_mname" name="update_user_mname" class="form-control" required>
							</div>
						</div>

						<div class="col-4">
							<label class="form-label">Last Name</label>
							<div class="input-group has-validation">
								<input type="text" id="update_user_lname" name="update_user_lname" class="form-control" required>
							</div>
						</div>
					</div>
	                    
					<div class="row" style="margin-bottom:10px">
						<div class="col-4">
							<label for="update_gender" class="form-label">Gender</label>
							<select id="update_gender" name="update_gender" class="form-select">
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						</div>

						<div class="col-4">
							<label class="form-label">Birth Date</label>
							<div class="input-group">
								<input type="date" id="update_birthdate" name="update_birthdate" class="form-control" required>
							</div>
						</div>

						<div class="col-4">
							<label class="form-label">Contact Number</label>
							<div class="input-group">
								<input type="number" id="update_contact_number" name="update_contact_number" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="row" style="margin-bottom:10px">
						<div class="col-12">
							<label class="form-label">Address</label>
							<div class="input-group">
								<textarea type="text" id="update_address" name="update_address" class="form-control"></textarea>
							</div>
						</div>
					</div>

					<div class="row" style="margin-bottom:10px">
						<div class="col-6">
							<label for="update_course_id" class="form-label">Course</label>
							<select  id="update_course_id" name="update_course_id" class="form-select">
								<?php 
									$fetch_course = $mysqli->query("SELECT * FROM tbl_courses ORDER BY course_name ASC") or die(mysqli_error());
									while ($course_row = $fetch_course->fetch_array()) {
										echo "<option value='$course_row[course_id]'>$course_row[course_name]</option>";
									}
								?>
							</select>
						</div>
					
						<div class="col-6">
							<label for="category" class="form-label">Category</label>
							<select id="update_category" name="update_category" class="form-select">
								<option value="A">Admin</option>
								<option value="S">Student</option>
							</select>
						</div>
					</div> 

					<div class="row" style="margin-bottom:10px">				
						<div class="col-6">
						<label class="form-label">Username</label>
						<div class="input-group has-validation">
							<input type="text" id="update_username" name="update_username" class="form-control" required>
						</div>
						</div>

						<div class="col-6">
						<label class="form-label">Password</label>
						<div class="input-group has-validation">
							<input type="password" id="update_password" name="update_password" class="form-control" required>
						</div>
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