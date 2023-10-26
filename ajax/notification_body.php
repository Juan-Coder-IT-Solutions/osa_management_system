<?php 
  include '../core/config.php';
  $receiver_id  = $_SESSION['user_id'];
  $user_category = user_info("category",$receiver_id);
  $user_list_param = $user_category=="A"?"category='S'":"category='A'";
  $fetch_user = $mysqli->query("SELECT * FROM tbl_users WHERE $user_list_param ORDER BY user_fname ASC") or die(mysqli_error());
  while ($row = $fetch_user->fetch_array()) {

    $fetch_count = $mysqli->query("SELECT * FROM tbl_messages WHERE receiver_id='$receiver_id' AND status='U' AND sender_id='$row[user_id]'") or die(mysqli_error());
    $count_messages = mysqli_num_rows($fetch_count);

    $fetch_messages = $mysqli->query("SELECT * FROM tbl_messages WHERE receiver_id='$receiver_id' AND sender_id='$row[user_id]' ORDER BY msg_id DESC") or die(mysqli_error());
    $message_row = $fetch_messages->fetch_array();

    $icon_css = $count_messages>0?"ri-message-3-fill":"ri-message-3-line";
    $message = $count_messages>0?$message_row['message']:"No message";

      if($count_messages>0){
        echo "<li class='notification-item' onclick='redirect_to_message($row[user_id])'>
              <i class='".$icon_css." text-success'></i>
              <div>
                <h4>".$row['user_fname']." ".$row['user_lname']."</h4>
                <p style='max-width: 40ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'>$message</p>
                <br>
                <p>".$count_messages." New message(s)</p>
              </div>
            </li>

          <li><hr class='dropdown-divider'></li>";
      }
    }
  
?>