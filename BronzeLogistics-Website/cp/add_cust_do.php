<?php
session_start();
//CHECKING LOGIN SESSIONS
error_reporting(0);
include 'db.php';
if ($_SESSION['username']!="" && $_SESSION['id']!="") {
	$q=$db->query("select * from users where username='".$_SESSION['username']."' and id='".$_SESSION['id']."'");
	$row=$q->fetch_assoc();
	$num=$q->num_rows;
	if ($num==1) {
//CHECKING LOGIN SESSIONS
?>
<?php
include ('db.php');
$uid=uniqid();
$q1=$db->query("insert into customers (name,pic) values ('".$_POST['name']."','".$uid.$_FILES['pic']['name']."')");
move_uploaded_file($_FILES['pic']['tmp_name'],"../custs/".$uid.$_FILES['pic']['name']);
echo '<script> window.location="customers.php"; </script>';
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