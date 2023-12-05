<?php 
	include '../core/config.php';
	$club_id 	= $mysqli -> real_escape_string($_POST['club_id']);
?>
<table class="table table-striped datatable" id="datatable">
    <thead>
        <tr>
            <th scope="col">Officers</th>
            <?php 
            	$fetch_cr = $mysqli->query("SELECT * FROM tbl_checklist_requirements ORDER BY cr_desc ASC") or die(mysqli_error());
				while ($cr_row = $fetch_cr->fetch_array()) {
					echo "<th scope='col'>$cr_row[cr_desc]</th>";
				}
            ?>
        </tr>
    </thead>
    <tbody>
    	<?php 
            	$fetch_of = $mysqli->query("SELECT * FROM tbl_organizational_officers WHERE club_id='$club_id'") or die(mysqli_error());
				while ($of_row = $fetch_of->fetch_array()) {
		?>
    	<tr>
            
				<td><?= userFullName($of_row['student_id']) ?></td>
				
			<?php
				$fetch_cr = $mysqli->query("SELECT * FROM tbl_checklist_requirements ORDER BY cr_desc ASC") or die(mysqli_error());
				while ($cr_row = $fetch_cr->fetch_array()) {
					$count_check = countChecklistByStudent($cr_row['cr_id'],$of_row['of_id']);
					$count_check_icon = $count_check>0?"<span>✅</span>":"<span>❌</span>";
					echo "<td class='qweqweqwe'><center>$count_check_icon</center></td>";
				}
            ?>
            
        </tr>
    <?php } ?>
    </tbody>
  </table>

 <script type="text/javascript">
 	$(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );

 </script>



 