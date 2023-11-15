<?php 
    include '../core/config.php';
    $user_id = $mysqli -> real_escape_string($_POST['user_id']);
    $disable_send_btn = $user_id>0?"":"disabled";
    $fetch = $mysqli->query("SELECT * FROM tbl_users WHERE user_id='$user_id'") or die(mysqli_error());
    $row = $fetch->fetch_array();
    $user_category = $row['category']=="A"?"Admin":"Student";    
?>
    <input type="hidden" id="receiver_id" value="<?= $user_id ?>">
    <div class="chat-header clearfix">
        <div class="row">
            <div class="col-lg-6">
                <?php 
                    if($user_id>0){ 
                        $profile_picture = !empty($row['profile_img'])? 'assets/upload/'.$row["profile_img"] : 'assets/upload/default.png';
                ?>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                    <img src="<?=$profile_picture?>" alt="avatar">
                </a>
                <div class="chat-about">
                    <h6 class="m-b-0 chat-heads-name"><?= $row['user_fname']." ".$row['user_lname']?><br>
                        <label style="color: #ccc;font-size: 14px;font-style: italic;"><?=$user_category?></label>
                    </h6>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="chat-history"></div>

    <div class="chat-message clearfix">
        <?php if($user_id>0){ ?>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Type your message" id="new_message">
            <button class="btn btn-primary" onclick="send_message()">Send</button>
        </div>
        <?php } ?>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    chat_history();
});

function send_message(){
    var receiver_id = $("#receiver_id").val();
    var new_message = $("#new_message").val();
    $.post("ajax/send_message.php",{
        receiver_id:receiver_id,
        new_message:new_message
    },function(data){
        if(data==1){
            chat_history();
            $("#new_message").val("").focus();
        }else{
            alert("Message unable to send!");
        }
        $(".chat").animate({ scrollTop: $('.chat').prop("scrollHeight")},1000);
    });
}

function chat_history(){
    var receiver_id = $("#receiver_id").val();
    $.post("ajax/message_history.php",{
        receiver_id:receiver_id
    },function(data){
        $(".chat-history").html(data);
        $(".chat-history").animate({ scrollTop: $('.chat-history').prop("scrollHeight")},1000);
    });
}
</script>