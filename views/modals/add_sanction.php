<div class="modal fade" id="modalAddSanction" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Add data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_add_form" class="row g-3 needs-validation" novalidate>
				<div class="modal-body">
                    <div class="col-12">
                        <label class="form-label">Sanction Name</label>
                        <div class="input-group has-validation">
                        <input type="text" name="sanction_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Sanction Desc</label>
                        <div class="input-group has-validation">
                        <input type="text" name="sanction_desc" class="form-control" required>
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