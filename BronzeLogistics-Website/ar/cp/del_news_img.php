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
    include('db.php');
    $q2=$db->query("select pic from news where id='".$_GET['id']."'");
    $row2=$q2->fetch_assoc();
    unlink('../news/'.$row2['pic']);
    $q1=$db->query("update news set pic='' where id='".$_GET['id']."'");
    echo '<script> window.location="edit_news.php?id='.$_GET['id'].'"; </script>';
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