<?php
include 'db.php';
$q=$db->query("delete from docs_comments where id='".$_POST['dcnum']."'");
?>