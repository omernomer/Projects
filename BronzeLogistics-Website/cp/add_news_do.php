<?php
session_start();
//CHECKING LOGIN SESSIONS
//error_reporting(0);
include 'db.php';
if ($_SESSION['username']!="" && $_SESSION['id']!="") {
	$q=$db->query("select * from users where username='".$_SESSION['username']."' and id='".$_SESSION['id']."'");
	$row=$q->fetch_assoc();
	$num=$q->num_rows;
	if ($num==1) {
//CHECKING LOGIN SESSIONS
?>
<?php
    if ($_FILES['pic']['name']!="") {
        $uid=uniqid().$_FILES['pic']['name'];   
    }
    if ($_FILES['pic2']['name']!="") {
        $uid22=uniqid().$_FILES['pic2']['name'];   
    }
    if ($_FILES['pic3']['name']!="") {
        $uid3=uniqid().$_FILES['pic3']['name'];   
    }
    if ($_FILES['pic4']['name']!="") {
        $uid4=uniqid().$_FILES['pic4']['name'];   
    }
    if ($_FILES['vid']['name']!="") {
        $uid2=uniqid().$_FILES['vid']['name'];   
    }
    $q1=$db->query("insert into news (title,news,pic,vid,pic2,pic3,pic4) values ('".$_POST['title']."','".$_POST['news']."','".$uid."','".$uid2."','".$uid22."','".$uid3."','".$uid4."')");
    move_uploaded_file($_FILES['pic']['tmp_name'],"../news/".$uid);
    move_uploaded_file($_FILES['pic2']['tmp_name'],"../news/".$uid22);
    move_uploaded_file($_FILES['pic3']['tmp_name'],"../news/".$uid3);
    move_uploaded_file($_FILES['pic4']['tmp_name'],"../news/".$uid4);
    move_uploaded_file($_FILES['vid']['tmp_name'],"../news/".$uid2);
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