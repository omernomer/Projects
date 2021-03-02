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
if (isset($_POST['fname']) && isset($_POST['lvl']) && isset($_POST['pass'])) {
    $q1=$db->query("update users set username='".$_POST['fname']."',password='".$_POST['pass']."',level='".$_POST['lvl']."',depart='".$_POST['depart']."' where id='".$_SESSION['id']."'");
    if ($_FILES['propic']['name']!="") {
        $q2=$db->query("update users set profile_pic='".$_FILES['propic']['name']."' where id='".$_SESSION['id']."'");
    } 
    if (file_exists("profiles/".$_SESSION['id'])) {}
    else {
        mkdir("profiles/".$_SESSION['id']);
    }
    move_uploaded_file($_FILES['propic']['tmp_name'],"profiles/".$_SESSION['id']."/".$_FILES['propic']['name']);
    echo '<script> window.location="home.php#load_prof"; </script>';
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