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
<ul id="msgs_list_sent">
<?php
$q1=$db->query("select * from msgs where sender='".$_SESSION['id']."' order by id desc");
$num1=$q1->num_rows;
for ($i=0; $i<$num1; $i++) {
    $row1=$q1->fetch_assoc();
    echo '<li id="read_sent_msg" num="'.$row1['id'].'"><p>'.finduser($row1['reciver']).' - '.$row1['date'].' - <span id="brif_msg">'.substr($row1['msg'],0,30).'...</span></p>'.check_read_msg($row1['id']).'</li>';
    
}
?>
</ul>
<div id="show_msg_here"></div>
<script>
$(document).ready(function() {
    $("*#cancel_msg").click(function() {
        var cannum=$(this).attr("can_num");
        $(this).parent().slideUp("slow");
        $.ajax({
            type:"POST",
            url:"cancel_msg.php",
            data:"num="+cannum,
            cache:false,
            success:function(html) {
                syssucs("Your message have been canceled.");
            }
        });
        return false;
    })
    $("*#read_sent_msg").click(function() {
        var num=$(this).attr("num");
        $("#msgs_list_sent li").not(this).fadeOut("slow");
        $("*#brif_msg").hide();
        $.ajax({
            type:"POST",
            url:"read_sent_msgs.php",
            data:"num="+num,
            cache:false,
            success:function(html) {
                $("#show_msg_here").empty();
                $("#show_msg_here").append(html).show("fast");
                return false;
            }
        });
        return false;
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