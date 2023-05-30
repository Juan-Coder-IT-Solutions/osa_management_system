<!DOCTYPE html>
<html lang="en">
<body>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>Kevin Anderson</h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?=userFullName($user_id)?></div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
               
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2" style="margin-bottom: 10px;">
                        
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>

                        <input type="file" class="form-control" id="customFile" />
                      </div>
                    </div>
                

                <form role="form" method="POST" id="form_submit">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_fname" type="text" class="form-control" id="fname" value="<?=userData($user_id, 'user_fname')?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_mname" type="text" class="form-control" id="user_mname" value="<?=userData($user_id, 'user_mname')?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_lname" type="text" class="form-control" id="user_lname" value="<?=userData($user_id, 'user_lname')?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="<?=userData($user_id, 'username')?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" id="form_btn_update_form" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form role="form" method="POST" id="form_submit_password">
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" id="form_btn_password" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
</body>

</html>
<script>
    $("#form_submit").submit(function(e){
    e.preventDefault();
    $("#form_btn_update_form").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/update_profile.php",
        data:$("#form_submit").serialize(),
        success:function(data){
            if(data==1){
            	Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Profile Updated Successfully',
                });
            }else if(data==2){
            	Swal.fire({
                    icon: 'warning',
                    title: 'Opps!',
                    text: 'Username already exist!',
                });
            }else{
            	Swal.fire({
                    icon: 'danger',
                    title: 'Opps!',
                    text: 'Failed query!',
                });
           }
           $("#form_btn_update_form").prop('disabled', false);
        }
      });
});

$("#form_submit_password").submit(function(e){
    e.preventDefault();
    $("#form_btn_password").prop('disabled', true);
    $.ajax({
        type:"POST",
        url:"ajax/change_password.php",
        data:$("#form_submit_password").serialize(),
        success:function(data){
            if(data==1){
            	Swal.fire({
                    icon: 'success',
                    title: 'All Good!',
                    text: 'Password Updated Successfully',
                });
            }else if(data==2){
                Swal.fire({
                    icon: 'warning',
                    title: 'Opps!',
                    text: "Password didn't match!",
                });
            }else{
            	Swal.fire({
                    icon: 'danger',
                    title: 'Opps!',
                    text: 'Failed query!',
                });
           }
           $("#form_btn_password").prop('disabled', false);
        }
      });
});

</script>