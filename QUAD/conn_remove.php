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
<?php
if (isset($_POST['num'])) {
$q1=$db->query("delete from conn where frm='".$_SESSION['id']."' and tt='".$_POST['num']."'");
$q2=$db->query("delete from conn where tt='".$_SESSION['id']."' and frm='".$_POST['num']."'");
}
else {
    echo '<script> window.location="index.php"; </script>';
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