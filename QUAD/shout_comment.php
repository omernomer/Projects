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
if (isset($_POST['comment']) && isset($_POST['snum'])) {
    $q1=$db->query("insert into shouts_comments(commenter,date,comment,shout) values ('".$_SESSION['id']."','".date('d/m/Y')."','".$_POST['comment']."','".$_POST['snum']."')");
}
else {
    redir("index.php");
}
?>
<ul id="one_shout_comment">
        <li id="one_shout_top_comment"><img src="<?php echo profile_pic($_SESSION['id']); ?>"/><span><?php echo finduser($_SESSION['id']); ?></span><p><?php echo date('d/m/Y'); ?></p></li>
        <li id="one_shout_bottom_comment"><?php echo $_POST['comment']; ?></li>
</ul>
<?php
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>