<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

         
          <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">NO. OF USERS <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-user-follow-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=countUser()?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">NO. OF STUDENTS <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-user-2-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=countStudents()?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">NO. OF OFFENSES <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-file-2-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=countOffenses()?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">NO. OF SANCTIONS <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-file-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=countSanction()?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
        <!-- <div class="col-lg-12 col-md-12 col-sm-12">
          <a href="index.php?page=academic_year"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #F44336; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Academic Year</span>
          </div></a>
          <a href="index.php?page=users"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #E91E63; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Users</span>
          </div></a>
          <a href="index.php?page=students"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #2196F3; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Students</span>
          </div></a>
          <a href="index.php?page=courses"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #4CAF50; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Courses</span>
          </div></a>
          <a href="index.php?page=violations"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #FF9800; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Violations</span>
          </div></a>
          <a href="index.php?page=sanctions"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #ff5722; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Sanctions</span>
          </div></a>
          <a href="index.php?page=offenses"><div class="col-sm-3" style="float:left; width: 25%; margin: 10px; background: #9e9e9e; color: #fff; text-align: center; padding: 20px; border-radius: 5px;">
            <span>Offenses</span>
          </div></a>
          
        </div> -->

      </div>
    </section>

  </main><!-- End #main -->