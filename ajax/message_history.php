  
 <?php 
include '../core/config.php';
 	$session_user_id = $_SESSION['user_id'];
    $receiver_id = $mysqli -> real_escape_string($_POST['receiver_id']);
	$fetch = $mysqli->query("SELECT * FROM tbl_messages WHERE (receiver_id='$session_user_id' OR receiver_id='$receiver_id') AND (sender_id='$session_user_id' OR sender_id='$receiver_id') ORDER BY date_added ASC") or die(mysqli_error());
	if($fetch->num_rows > 0){

		while ($row = $fetch->fetch_array()) {
			$message_placement = $row['sender_id']==$session_user_id?"message other-message float-right":"message my-message";
					echo "<ul class='m-b-5 clearfix'>
					
					<li class='clearfix $message_placement'>
						<div style='font-size: 12px;'> $row[date_added]</div>
						<br>
						<div> $row[message]
						</div>
					</li>
		    	</ul>";
		}
	}else{
		if($receiver_id>0){
			echo "<center><h5>No message found ..</h5></center>";
		}else{
			echo "<center><h5>Osa Management Messaging Module</h5></center>";
		}
		
	}
 ?>
 	

       