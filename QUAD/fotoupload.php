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
if (isset($_FILES['fotofile'])) {
    if ($_FILES['fotofile']['type']=="image/jpeg" || $_FILES['fotofile']['type']=="image/png") {
        $uid=uniqid();
        $ext=ext($_FILES['fotofile']['name']);
        move_uploaded_file($_FILES['fotofile']['tmp_name'],"fotos/".$uid.$ext);
    }
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