<?php
include 'db.php';
$q1=$db->query("select * from docs where id='".$_POST['dnum']."'");
$row1=$q1->fetch_assoc();
unlink("docs/".$row1['uploader']."/".$row1['title']);
$q2=$db->query("delete from docs where id='".$_POST['dnum']."'");
?>