<div class="modal fade" id="modalUpdateSanction" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Update data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form role="form" method="POST" id="form_submit_update_form">
				<div class="modal-body">
                    <input type="hidden" id="update_services_id" name="update_services_id">

                    <div class="col-12">
                        <label class="form-label">Service</label>
                        <div class="input-group has-validation">
                        	<input type="text" id="update_services_desc" name="update_services_desc" class="form-control" required>
                        </div>

                        <div class="col-12">
							<label class="form-label">Description</label>
							<div class="input-group">
								<textarea id="update_services_remarks" name="update_services_remarks" class="form-control"></textarea>
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