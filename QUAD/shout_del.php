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
if (isset($_POST['snum'])) {
    $q1=$db->query("delete from shouts where id='".$_POST['snum']."'");
    $q2=$db->query("delete from shouts_comments where shout='".$_POST['snum']."'");
    $q3=$db->query("delete from shouts_rates where shout='".$_POST['snum']."'");
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