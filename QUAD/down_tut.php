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
$q1=$db->query("select * from tuts where id='".$_POST['tut']."'");
$row1=$q1->fetch_assoc();
$handle = fopen('tutsdatabase/'.$row1['creator'].'/'.$row1['id'].'.txt', "rb");
$contents = stream_get_contents($handle);
fclose($handle);
$fp = fopen('down/'.$row1['id'].'.doc', 'wb');
fwrite($fp, '<html>');
fwrite($fp, $contents);
fwrite($fp, '</html>');
fclose($fp);
echo 'down/'.$row1['id'].'.doc';
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