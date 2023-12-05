<div class="modal fade" id="modalAdd" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Add data</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<form role="form" method="POST" id="form_submit_add_form">
					<div class="modal-body">
						<div class="col-12">
							<label class="form-label">Service</label>
							<div class="input-group">
								<input type="text" name="service_desc" class="form-control" required>
							</div>
						</div>	

						<div class="col-12">
							<label class="form-label">Description</label>
							<div class="input-group">
								<textarea name="service_remarks" class="form-control"></textarea>
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

