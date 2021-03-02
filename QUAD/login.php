<?php
	session_start();
	include 'db.php';
	$q1=$db->query("select email,password,id from users where email='".$_POST['email']."' and password='".$_POST['pass']."'");
	$row1=$q1->fetch_assoc();
	$num1=$q1->num_rows;
	if ($num1==1) {
		$_SESSION['email']=$_POST['email'];
		$_SESSION['id']=$row1['id'];
		echo '<script> window.location="home.php#load_docs"; </script>';
	}
	else {
		echo '<script>syserror("unSuccessful login.");</script>';
	}
?>