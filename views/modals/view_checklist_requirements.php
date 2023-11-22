<div class="modal fade" id="viewCheckList" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  	<h5 class="modal-title">Checklist Requirments</h5>
			  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

      <input type="hidden" id="club_id">

        <div div class="col-sm-12" style="padding: 10px;">
          <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="float: right;">
              <button type="button" class="btn btn-primary" onclick="add_clubs_checklist()">Add</button>
            </div>
        </div>

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">REQUIREMENTS</h5>
              <table class="table" style="width: 100%;" id="checklist_datatable">
                <thead>
                  <tr>
                    <th><input type="checkbox" onchange="checkAll(this, 'check_requirements')"></th>
                    <th> Requirements</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          <hr>

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">AQUIRED</h5>
              <table class="table" style="width: 100%;" id="clubs_aquired_req">
                <thead>
                  <tr>
                    <th> Requirements</th>
                    <th> Date Aquired</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
		</div>
	</div>
</div>

