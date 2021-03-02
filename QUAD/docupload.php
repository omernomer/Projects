<?php
session_start();
//CHECKING LOGIN SESSIONS
include 'db.php';
if ($_SESSION['email']!="" && $_SESSION['id']!="") {
    if (isset($_POST['privacy'])) {
        $pri=1;
    }
    else {
        $pri=0;
    }
	$q=$db->query("select * from users where email='".$_SESSION['email']."' and id='".$_SESSION['id']."'");
	$row=$q->fetch_assoc();
	$num=$q->num_rows;
	if ($num==1) {
//CHECKING LOGIN SESSIONS
if ($_FILES['file']['type']=="application/vnd.ms-excel" || $_FILES['file']['type']=="application/msword" || $_FILES['file']['type']=="application/pdf" || $_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
if (file_exists("docs/".$_SESSION['id'])) {
    
}
else {
    mkdir("docs/".$_SESSION['id']);
}
move_uploaded_file($_FILES['file']['tmp_name'],"docs/".$_SESSION['id']."/".$_FILES['file']['name']);
$q1=$db->query("insert into docs (uploader,title,date,privacy) values ('".$_SESSION['id']."','".$_FILES['file']['name']."','".date('d/m/Y')."','".$pri."')");
echo '<script> window.location="home.php#load_docs"; </script>';
}
else {
    echo '<script> alert("The format of the uploaded file is not supported by Docs."); </script>';
    echo '<script> window.location="home.php#load_docs"; </script>';
}
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>