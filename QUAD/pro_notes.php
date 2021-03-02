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
$q1=$db->query("select * from users where id!='".$_SESSION['id']."'");
$num1=$q1->num_rows;
$cc=0;
for ($i=0; $i<$num1; $i++) {
    $row1=$q1->fetch_assoc();
    $q2=$db->query("select * from conn where frm='".$_SESSION['id']."' and tt='".$row1['id']."'");
    $q3=$db->query("select * from conn where frm='".$row1['id']."' and tt='".$_SESSION['id']."'");
    $num2=$q2->num_rows;
    $num3=$q3->num_rows;
    if ($num2!=$num3) {
        $cc++;
    }
}

if ($cc>0) {
echo '<span id="pronot">'.$cc.'</span>';
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