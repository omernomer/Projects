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
include('db.php');
$q2=$db->query("select * from fotos where uploader='".$_SESSION['id']."' order by id desc limit 0,1");
$row2=$q2->fetch_assoc();
$t_width = 100;	// Maximum thumbnail width
$t_height = 100;	// Maximum thumbnail height
$uid=uniqid();
$new_name = $uid.".jpg"; // Thumbnail image name
$path = "fotos/";
if(isset($_GET['t']) and $_GET['t'] == "ajax")
	{
		extract($_GET);
		$ratio = ($t_width/$w); 
		$nw = ceil($w * $ratio);
		$nh = ceil($h * $ratio);
		$nimg = imagecreatetruecolor($nw,$nh);
		$im_src = imagecreatefromjpeg($path.$img);
		imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w,$h);
		imagejpeg($nimg,$path.$new_name,90);
		$q1=$db->query("UPDATE fotos SET thumb='$new_name' WHERE id='".$row2['id']."'");
		echo $new_name."?".time();
		exit;
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