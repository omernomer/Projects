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
	       echo '<script> window.location="home.php"; </script>';
	   }}
//CHECKING LOGIN SESSIONS
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="omernomer" />
    <link rel="stylesheet" href="css.css" type="text/css" media="screen" />
	<title>Action CMS</title>
    <style>
        ul {
            list-style: none;
        }
    </style>
</head>

<body style="background:url('images/gg.jpg'); background-repeat: no-repeat; background-position: top; background-color: #000;">
    <div style="margin:0 auto; margin-left:20%; margin-top:120px;">
    <ul>
        <form action="login.php" method="post">
        <li><input name="username" type="text" placeholder="Username" /></li>
        <li><input name="password" type="password" placeholder="Password" /></li>
        <li><input type="submit" value="Login" /></li>
        </form>
    </ul>
    </div>
</body>
</html>