<div class="modal fade" id="modalAddCourse" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Add data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_add_form" class="row g-3 needs-validation" novalidate>
				<div class="modal-body">
	                    <div class="col-12">
	                      <label class="form-label">Course Name</label>
	                      <div class="input-group has-validation">
	                        <input type="text" name="course_name" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label class="form-label">Course Code</label>
	                      <div class="input-group has-validation">
	                        <input type="text" name="course_code" class="form-control" required>
	                      </div>
	                    </div>

	                    <div class="col-12">
	                      <label class="form-label">Grade</label>
	                      <div class="input-group has-validation">
	                        <input type="number" name="grade" class="form-control" required>
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