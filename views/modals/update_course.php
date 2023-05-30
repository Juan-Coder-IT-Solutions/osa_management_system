<div class="modal fade" id="modalUpdateCourses" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form" class="row g-3 needs-validation" novalidate>
				<div class="modal-body">
                    <input type="hidden" id="update_course_id" name="update_course_id">

                    <div class="col-12">
                        <label class="form-label">Course Name</label>
                        <div class="input-group has-validation">
                        <input type="text" id="update_course_name" name="update_course_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Course Code</label>
                        <div class="input-group has-validation">
                        <input type="text" id="update_course_code" name="update_course_code" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Course Grade</label>
                        <div class="input-group has-validation">
                        <input type="text" id="update_course_grade" name="update_course_grade" class="form-control" required>
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