

<style type="text/css">
body{
    background-color: #f4f7f6;
}
.chat-history {
    height: 300px;
    overflow-y: auto;
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    overflow-y: auto;
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

.chat-heads-name {
    font-weight: bold;
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>


<main id="main" class="main">
    <input type="hidden" id="chosen_user_id" value="<?= $_GET['chosen_user_id']?>">
    <div class="pagetitle">
      <h1>Messages</h1>
    </div>

    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="flex-grow-1">
                        <input type="text" class="form-control my-3" placeholder="Search...">
                    </div>
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    <?php 
                        $session_user_id = $_SESSION['user_id'];
                        $user_category = user_info("category",$session_user_id);
                        $user_list_param = $user_category=="A"?"category='S'":"category='A'";
                        $fetch_user_list = $mysqli->query("SELECT * FROM tbl_users WHERE $user_list_param ORDER BY user_fname ASC") or die(mysqli_error());
                        while ($user_list_row = $fetch_user_list->fetch_array()) {
                            
                            $profile_picture = !empty($user_list_row['profile_img'])? 'assets/upload/'.$user_list_row["profile_img"] : 'assets/upload/default.png';

                            $fetch_count_message = $mysqli->query("SELECT * FROM tbl_messages WHERE receiver_id='$session_user_id' AND status='U' AND sender_id='$user_list_row[user_id]'") or die(mysqli_error());
                            $count_messages = mysqli_num_rows($fetch_count_message);

                            $new_message_badge = $count_messages>0?"<span class='badge bg-primary badge-number' id='new_message_badge_$user_list_row[user_id]'>$count_messages</span>":"";

                            echo "<li class='clearfix user_message<?=$user_list_row[user_id]?>' onclick='open_user_messages($user_list_row[user_id])'>
                                    <img src='$profile_picture' style='object-fit: cover;height: 45px;width: 45px;
                                }' alt='avatar'>
                                    <div class='about'>
                                        <div class='name'>".$user_list_row['user_fname']." ".$user_list_row['user_lname']." $new_message_badge</div> 
                                    </div>
                                </li>";
                        }
                    ?>
                </ul>
            </div><br><br>
            <div class="chat"></div>
        </div>
    </div>

</main>

<script type="text/javascript">
$(document).ready(function() {
    var chosen_user_id = $("#chosen_user_id").val()*1;
    if(chosen_user_id>0){
        open_user_messages(chosen_user_id);
        window.history.pushState("", "", 'index.php?page=messages');
    }else{
        open_user_messages("");
    }
});
function open_user_messages(user_id){
    $.post("ajax/message_box.php",{
        user_id:user_id
    },function(data){
        $(".chat").html(data);
        $("#new_message").focus();
        mark_messages_as_read(user_id);
        $("#new_message_badge_"+user_id).html("");

    });
}

function mark_messages_as_read(sender_id){
    $.post("ajax/mark_messages_as_read.php",{
        sender_id:sender_id
    },function(data){
        count_notification();
    });
}
</script>