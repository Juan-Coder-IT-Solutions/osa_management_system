<?php 
    include 'core/config.php';
    $user_id = $_SESSION['user_id'];
    $page = (isset($_GET['page']) && $_GET['page'] !='') ? $_GET['page'] : '';
    userlogin($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Osa Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/vendor/sweet-alert/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
  <!-- Template Main JS File -->
  <script src="assets/js/main2.js"></script>
  <script src="assets/datatables/jquery.dataTables.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

 
  

  <!-- ======= Header ======= -->
  <?php require_once 'components/topbar.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php require_once 'components/sidebar.php' ?>  

  <!-- ======= MAIN BODY ======= -->
  <?php require_once 'routes/routes.php' ?>

  <!-- ======= Footer ======= -->
  <?php require_once 'components/footer.php' ?>  
  <?php require_once 'views/modals/logout_modal.php'; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
</body>

<script type="text/javascript">
  $(document).ready(function() { 
  });

    function logout(){
      $.post("ajax/logout.php",{},function(data){
        window.location.href = "auth/login.php";
      });
    }
</script>
</html>