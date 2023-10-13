<div class="modal fade" id="modalAddUsers" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Add data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_add_form">
				<div class="modal-body">
						<div class="row" style="margin-bottom:10px">
							<div class="col-4">
								<label class="form-label">First Name</label>
								<div class="input-group">
									<input type="text" name="user_fname" class="form-control" required>
								</div>
							</div>

							<div class="col-4">
								<label class="form-label">Middle Name</label>
								<div class="input-group">
									<input type="text" name="user_mname" class="form-control" required>
								</div>
							</div>

							<div class="col-4">
								<label class="form-label">Last Name</label>
								<div class="input-group">
									<input type="text" name="user_lname" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row" style="margin-bottom:10px">
							<div class="col-4">
								<label for="gender" class="form-label">Gender</label>
								<select id="gender" name="gender" class="form-select">
									<option value="M">Male</option>
									<option value="F">Female</option>
								</select>
							</div>

							<div class="col-4">
								<label class="form-label">Birth Date</label>
								<div class="input-group">
									<input type="date" id="birthdate" name="birthdate" class="form-control" required>
								</div>
							</div>

							<div class="col-4">
								<label class="form-label">Contact Number</label>
								<div class="input-group">
									<input type="number" name="contact_number" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row" style="margin-bottom:10px">
							<div class="col-12">
								<label class="form-label">Address</label>
								<div class="input-group">
									<textarea type="text" name="address" class="form-control"></textarea>
								</div>
							</div>
						</div>

						<div class="row" style="margin-bottom:10px">
							<div class="col-6">
								<label for="category" class="form-label">Category</label>
								<select id="category" name="category" class="form-select" onchange="courses()">
									<option value="A">Admin</option>
									<option value="S">Student</option>
								</select>
							</div>

							<div class="col-6" style="display:none;" id="course_stat">
								<label for="course_id" class="form-label">Course</label>
								<select id="course_id" name="course_id" class="form-select">
									<?php 
										$fetch_course = $mysqli->query("SELECT * FROM tbl_courses ORDER BY course_name ASC") or die(mysqli_error());
										while ($course_row = $fetch_course->fetch_array()) {
											echo "<option value='$course_row[course_id]'>$course_row[course_name]</option>";
										}
									?>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<label class="form-label">Username</label>
								<div class="input-group has-validation">
									<input type="text" name="username" class="form-control">
								</div>
							</div>
							
							<div class="col-6">
								<label	label class="form-label">Password</label>
								<div class="input-group">
									<input type="password" id="password" name="password" class="form-control">
									<span class="input-group-text" onclick="show_pass()" style="cursor:pointer"><span id="icon"></span></span>
								</div>
							</div>
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

