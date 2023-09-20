<div class="modal fade" id="modalUpdate" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form" class="row g-3 needs-validation" novalidate>
				<div class="modal-body">
					<div class="row">
	                    <div class="col-12">
	                    	<input type="hidden" id="update_student_id" name="update_student_id" class="form-control" required>

	                      <label for="update_student_fname" class="form-label">First Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="update_student_fname" name="update_student_fname" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label for="update_student_mname" class="form-label">Middle Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="update_student_mname"  name="update_student_mname" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label for="update_student_lname" class="form-label">Last Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="update_student_lname" name="update_student_lname" class="form-control" required>
	                      </div>
	                    </div>
	                </div>

	                <div class="row">
	                	 <div class="col-12">
	                      <label for="update_student_code" class="form-label">Student Code</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="update_student_code" name="update_student_code" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label for="update_student_birthdate" class="form-label">Birthday</label>
	                      <div class="input-group has-validation">
	                        <input type="date" id="update_student_birthdate" name="update_student_birthdate" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                        <label for="update_student_gender" class="form-label">Gender</label>
			                  <select id="update_student_gender" name="update_student_gender" class="form-select">
			                    <option value="Male">Male</option>
			                    <option value="Female">Female</option>
			                </select>
	                    </div>
	                </div>

                    <div class="col-12">
                    	<label for="update_student_address" class="form-label">Address</label>
		                <textarea class="form-control" placeholder="Address" id="update_student_address" name="update_student_address"></textarea>
                    </div>

                    <div class="col-12">
                      <label for="update_student_contact_num" class="form-label">Contact #</label>
                      <div class="input-group has-validation">
                        <input type="number" id="update_student_contact_num" name="update_student_contact_num" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-12">
                       	<label for="update_course_id" class="form-label">Course</label>
		                  <select id="update_course_id" name="update_course_id" class="form-select">
		                    <?php 
		                    	$fetch_course = $mysqli->query("SELECT * FROM tbl_courses ORDER BY course_name ASC") or die(mysqli_error());
								while ($course_row = $fetch_course->fetch_array()) {
									echo "<option value='$course_row[course_id]'>$course_row[course_name]</option>";
								}
		                    ?>
		                </select>
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