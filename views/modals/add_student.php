<div class="modal fade" id="modalAdd" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Add data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_add_form">
				<div class="modal-body">
					<div class="row">

	                    <div class="col-12">
	                      <label for="student_fname" class="form-label">First Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="student_fname" name="student_fname" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label for="student_mname" class="form-label">Middle Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="student_mname" name="student_mname" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label for="student_lname" class="form-label">Last Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="student_lname" name="student_lname" class="form-control" required>
	                      </div>
	                    </div>
	                </div>

	                <div class="row">
	                	 <div for="student_code" class="col-12">
	                      <label class="form-label">Student Code</label>
	                      <div class="input-group has-validation">
	                        <input type="text" id="student_code" name="student_code" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label for="student_birthdate" class="form-label">Birthday</label>
	                      <div class="input-group has-validation">
	                        <input type="date" id="student_birthdate" name="student_birthdate" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                        <label for="student_gender" class="form-label">Gender</label>
			                  <select id="student_gender" name="student_gender" class="form-select" required>
			                  	<option value=''>-- Select Gender --</option>
			                    <option value="Male">Male</option>
			                    <option value="Female">Female</option>
			                </select>
	                    </div>
	                </div>

                    <div class="col-12">
                    	<label for="student_address" class="form-label">Address</label>
		                <textarea class="form-control" placeholder="Address" id="student_address" name="student_address"></textarea>
                    </div>

                    <div class="col-12">
                      <label for="student_contact_num" class="form-label">Contact #</label>
                      <div class="input-group has-validation">
                        <input type="number"  id="student_contact_num" name="student_contact_num" class="form-control" required>
                      </div>
                    </div>

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
				<div class="modal-footer">
				  	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  	<button class="btn btn-primary" type="submit" id="form_btn_add_form">Save</button>
				</div>

			</form>
		</div>
	</div>
</div>