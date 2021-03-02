<?php
session_start();
//error_reporting(0);
include ('db.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $q=$db->query("select * from users where username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
    $num=$q->num_rows;
    $row=$q->fetch_assoc();
    if ($num==1) {
        $_SESSION['username']=$_POST['username'];
        $_SESSION['id']=$row['id'];
        echo '<script> window.location="home.php"; </script>';
    }
    else {
        echo '<script> window.location="index.php?error=yes"; </script>';
    }
}
?>