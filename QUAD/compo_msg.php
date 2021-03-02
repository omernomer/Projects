<?php
session_start();
//CHECKING LOGIN SESSIONS
include 'db.php';
if ($_SESSION['email']!="" && $_SESSION['id']!="") {
	$q=$db->query("select * from users where email='".$_SESSION['email']."' and id='".$_SESSION['id']."'");
	$row=$q->fetch_assoc();
	$num=$q->num_rows;
	if ($num==1) {
//CHECKING LOGIN SESSIONS
include 'functions.php';
?>
<script src="js/resize.js" type="text/javascript"></script>
<ul id="comp_msg_sec">
    <li>To</li>
    <li><select id="recver_msg"><?php echo msgusers($_SESSION['id']); ?></select></li>
    <li>Message</li>
    <li><textarea id="comp_msg_textarea"></textarea></li>
    <li><a class="btn" id="send_msg">Send</a></li>
</ul>
<script>
$(document).ready(function(){
$("#comp_msg_textarea").autoResize();
$("#send_msg").click(function() {
   var user = $("#recver_msg").val(); 
   var msg = $("#comp_msg_textarea").val();
   if (msg=="") {
        syserror("You have to write something.");
   }
   else {
        $.ajax({
           type:"POST",
           url:"send_msg.php",
           data:"user="+user+"&msg="+msg,
           cache:false,
           success: function() {
                $("#comp_msg_textarea").val("");
                syssucs("Message have been sent.");
                window.location="home.php#load_msgs";
           }
        });
   }
});
});
</script>
<?php
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>