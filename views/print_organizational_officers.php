<?php
    include '../core/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Osa Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
        
  <style>
    /* Normal table styles */
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }

    /* Print-specific styles */
    @media print {
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        border: 1px solid #000000;
        text-align: left;
        padding: 8px;
      }
      th {
        background-color: #ffffff;
        color: #000000;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      tr:nth-child(odd) {
        background-color: #ffffff;
      }
    }
  </style>
</head>

<?php
   $fetch_of = $mysqli->query("SELECT * FROM tbl_organizational_officers") or die(mysqli_error());
?>

<body id="simulate_prt">

    <div class="header">
        <img src="../assets/img/header.png" alt="Header Image" style="max-width:100%">
    </div>
    <table>
        <thead>
        <tr>
            <th>Club</th>
            <th>Student</th>
            <th>Type</th>
            <th>Academic Year</th>
            <th>Date Added</th>
        </tr>
        </thead>
        <tbody>

        <?php while($row = $fetch_of->fetch_array()){?>
        <tr>
        
            <td><?=clubName($row['club_id'])?></td>
            <td><?=userFullName($row['student_id'])?></td>
            <td><?=$row['of_type']?></td>
            <td><?= ayName($row['ay_id'])?></td>
            <td><?=$row['date_added']?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
<script type="text/javascript">

window.onload = function() {
    window.print();
};

</script>
