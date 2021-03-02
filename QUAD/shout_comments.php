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
<?php
$q1=$db->query("select * from shouts_comments where shout='".$_POST['snum']."' order by id desc");
$num1=$q1->num_rows;
for ($i=0; $i<$num1; $i++) {
    $row1=$q1->fetch_assoc();
?>
<ul id="one_shout_comment">
        <li id="one_shout_top_comment"><img src="<?php echo profile_pic($row1['commenter']); ?>"/><span><?php echo finduser($row1['commenter']); ?></span><p><?php echo $row1['date']; ?></p></li>
        <li id="one_shout_bottom_comment"><?php echo $row1['comment']; ?></li>
</ul>
<?php
}
?>
<?php
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>