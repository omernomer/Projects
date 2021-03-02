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
if (isset($_POST['elm1'])) {
$tut_without_style=strip_tags($_POST['elm1']);
$title=substr($tut_without_style,0,50);
if (isset($_GET['tut'])) {
$q1=$db->query("update tuts set date='".date('d/m/Y')."',title='$title' where id='".$_GET['tut']."'");
$fp = fopen('tutsdatabase/'.$_SESSION['id'].'/'.$_GET['tut'].'.txt', 'wb');
fwrite($fp, $_POST['elm1']);
fclose($fp);
}
else {
$uid=uniqid();
$q1=$db->query("insert into tuts(id,creator,date,title) values ('$uid','".$_SESSION['id']."','".date('d/m/Y')."','$title')");
if (file_exists("tutsdatabase/".$_SESSION['id'])) { 
}
else {
    mkdir("tutsdatabase/".$_SESSION['id']);
}
$fp = fopen('tutsdatabase/'.$_SESSION['id'].'/'.$uid.'.txt', 'w');
fwrite($fp, $_POST['elm1']);
fclose($fp);
}
redir("tut.php");
}
else {
    redir("index.php");
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