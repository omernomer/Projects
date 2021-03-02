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
$q1=$db->query("select * from users where id='".$_SESSION['id']."'");
$row1=$q1->fetch_assoc();
if (isset($_POST['cp']) && isset($_POST['p1']) && isset($_POST['p2'])) {
    if (md5($_POST['cp'])==$row1['password']) {
        if ($_POST['p1']==$_POST['p2']) {
            $q2=$db->query("update users set password='".md5($_POST['p1'])."' where id='".$_SESSION['id']."'");
            echo '<script> window.location="set.php?success=The password have been changed."; </script>';
        }
        else {
            echo '<script> window.location="set.php?error=The passwords do not match."; </script>';
        }
    }
    else {
        echo '<script> window.location="set.php?error=Current password does not match."; </script>';
    }
}
else {
    echo '<script> window.location="set.php?error=You have to fill all the fields."; </script>';
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