<?php
session_start();
//error_reporting(0);
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
<div id="profile_all">
<div id="profile_sec">
    <img src="<?php echo profile_pic($_SESSION['id']); ?>" id="profile_pic"/>
    <table id="username_profile">
        <tr><td style="color: #666;">Name: </td><td><?php echo $row['username']; ?></td></tr>
        <tr><td style="color: #666;">Level: </td><td><?php echo $row['level']; ?></td></tr>
        <tr><td style="color: #666;">Department: </td><td><?php echo $row['depart']; ?></td></tr>
    </table>
    <a class="btn" style="right:0px; top:5px; position:absolute;" id="profile_edit">Edit</a>
</div>
<hr/>
<?php
$q1=$db->query("select * from users order by username asc");
$num1=$q1->num_rows;
for ($i=0; $i<$num1; $i++) {
    $row1=$q1->fetch_assoc();
    echo '
    <ul id="people_list">
    <li><img src="'.profile_pic($row1['id']).'"/><p>'.$row1['username'].'</p>'.checkconn($_SESSION['id'],$row1['id']).'</li>
    </ul>
    ';
}
?>
</div>
<script>
$(document).ready(function() {
    $("#profile_edit").click(function() {
       $("#profile_all").empty();
       $("#profile_all").hide().load("profile_edit.php").fadeIn("fast");
    });
    $("*#ikh").click(function() {
       var num=$(this).attr("num");
       $(this).fadeOut("slow");
       $.ajax({
        type:"POST",
        url:"conn_do.php",
        data:"num="+num,
        cache: false,
        success: function() {
            
        }
       });
    });
    $("*#remove_list").click(function() {
       var num=$(this).attr("num");
       if (confirm("Are you sure?")) {
       $(this).parent().slideUp('slow');
       $.ajax({
        type:"POST",
        url:"conn_remove.php",
        data:"num="+num,
        cache: false,
        success: function(html) {
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