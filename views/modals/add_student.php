<div class="modal fade" id="modalAdd" tabindex="-1">
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
								<input type="text" id="student_fname" name="student_fname" class="form-control" required>
							</div>
						</div>

						<div class="col-4">
							<label class="form-label">Middle Name</label>
							<div class="input-group">
								<input type="text" id="student_mname" name="student_mname" class="form-control" required>
							</div>
						</div>

						
						<div class="col-4">
							<label class="form-label">Last Name</label>
							<div class="input-group">
								<input type="text" id="student_lname" name="student_lname" class="form-control" required>
							</div>
						</div>
	                </div>


					<div class="row" style="margin-bottom:10px">
						<div class="col-4">
							<label for="gender" class="form-label">Gender</label>
							<select id="student_gender" name="student_gender" class="form-select" required>
								<option value=''>-- Select Gender --</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						</div>

						
						<div class="col-4">
							<label class="form-label">Birth Date</label>
							<div class="input-group">
								<input type="date" id="student_birthdate" name="student_birthdate" class="form-control" required>
							</div>
						</div>

						<div class="col-4">
							<label class="form-label">Contact Number</label>
							<div class="input-group">
								<input type="number" id= 'student_contact_num' name="student_contact_num" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="row" style="margin-bottom:10px">
						<div class="col-12">
							<label class="form-label">Address</label>
							<div class="input-group">
								<textarea type="text" placeholder="Address" id="student_address" name="student_address" class="form-control"></textarea>
							</div>
						</div>
					</div>

					<div class="row" style="margin-bottom:10px">
						<div class="col-12">
							<label for="course_id" class="form-label">Course</label>
							<select  id="course_id" name="course_id" class="form-select" required>
								<option value=''>-- Select Course --</option>
								<?php 
									$fetch_course = $mysqli->query("SELECT * FROM tbl_courses ORDER BY course_name ASC") or die(mysqli_error());
									while ($course_row = $fetch_course->fetch_array()) {
										echo "<option value='$course_row[course_id]'>$course_row[course_name]</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row" style="margin-bottom:10px">
						<div class="col-6">
							<label class="form-label">Username</label>
							<div class="input-group has-validation">
								<input type="text" name="username" id="username" class="form-control">
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