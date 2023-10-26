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
                       	<label class="form-label">Student</label>
		                  <select name="student_id" class="form-select" required>
		                  	<option value="">-- Select Student --</option>
		                    <?php 
		                    	$fetch_student = $mysqli->query("SELECT * FROM tbl_users WHERE category='S' ORDER BY user_fname ASC") or die(mysqli_error());
								while ($student_row = $fetch_student->fetch_array()) {
									echo "<option value='$student_row[user_id]'>$student_row[user_lname], $student_row[user_fname] $student_row[user_mname]</option>";
								}
		                    ?>
		                </select>
                    </div>

					<div class="col-12">
                    	<label class="form-label">Description</label>
		                <textarea class="form-control" placeholder="Description" name="es_desc"></textarea>
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