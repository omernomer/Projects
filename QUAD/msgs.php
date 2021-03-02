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
?>
<div id="msgs_menu"><a class="btn" style="" id="msgs_compose">Compose</a><a class="btn" id="msgs_sent">Sents</a><a id="msgs_inbox" class="btn">Inbox</a></div>
<div id="msgs_dock"></div>
<script>
$(document).ready(function() {
    $('#msgs_dock').load('load_msgs.php').fadeIn("slow");
    $("#msgs_compose").click(function() {
        $('#msgs_dock').empty();
        $('#msgs_dock').load('compo_msg.php').fadeIn("slow");
    });
    $("#msgs_inbox").click(function() {
        $('#msgs_dock').empty();
        $('#msgs_dock').load('load_msgs.php').fadeIn("slow");
    });
    $("#msgs_sent").click(function() {
        $('#msgs_dock').empty();
        $('#msgs_dock').load('sent_msgs.php').fadeIn("slow");
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