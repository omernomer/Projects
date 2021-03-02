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
$q1=$db->query("select * from news where id='".$_GET['id']."'");
$row1=$q1->fetch_assoc();
if ($_POST['title']!=$row1['title']) {
    $q2=$db->query("update news set title='".$_POST['title']."' where id='".$_GET['id']."'");
}
if ($_POST['news']!=$row1['news']) {
    $q2=$db->query("update news set news='".$_POST['news']."' where id='".$_GET['id']."'");
}
if ($_FILES['pic']['name']!="") {
    if ($row1['pic']!="") {
        unlink("../news/".$row1['pic']);    
    }
    $uid=uniqid();
    $q2=$db->query("update news set pic='".$uid.$_FILES['pic']['name']."' where id='".$_GET['id']."'");
    move_uploaded_file($_FILES['pic']['tmp_name'],"../news/".$uid.$_FILES['pic']['name']);
}
if ($_FILES['pic2']['name']!="") {
    if ($row1['pic2']!="") {
        unlink("../news/".$row1['pic2']);    
    }
    $uid=uniqid();
    $q2=$db->query("update news set pic2='".$uid.$_FILES['pic2']['name']."' where id='".$_GET['id']."'");
    move_uploaded_file($_FILES['pic2']['tmp_name'],"../news/".$uid.$_FILES['pic2']['name']);
}
if ($_FILES['pic3']['name']!="") {
    if ($row1['pic3']!="") {
        unlink("../news/".$row1['pic3']);    
    }
    $uid=uniqid();
    $q2=$db->query("update news set pic3='".$uid.$_FILES['pic3']['name']."' where id='".$_GET['id']."'");
    move_uploaded_file($_FILES['pic3']['tmp_name'],"../news/".$uid.$_FILES['pic3']['name']);
}
if ($_FILES['pic4']['name']!="") {
    if ($row1['pic4']!="") {
        unlink("../news/".$row1['pic4']);    
    }
    $uid=uniqid();
    $q2=$db->query("update news set pic4='".$uid.$_FILES['pic4']['name']."' where id='".$_GET['id']."'");
    move_uploaded_file($_FILES['pic4']['tmp_name'],"../news/".$uid.$_FILES['pic4']['name']);
}
if ($_FILES['vid']['name']!="") {
    if ($row1['vid']!="") {
        unlink("../news/".$row1['vid']);    
    }
    $uid=uniqid();
    $q2=$db->query("update news set vid='".$uid.$_FILES['vid']['name']."' where id='".$_GET['id']."'");
    move_uploaded_file($_FILES['vid']['tmp_name'],"../news/".$uid.$_FILES['vid']['name']);
}
echo '<script> window.location="news.php"; </script>';
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