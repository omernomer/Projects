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
    include'functions.php';
?>
<?php
    if (isset($_POST['dnum']) && isset($_POST['comment'])) {
        $q=$db->query("insert into docs_comments (commenter,date,comment,doc) values ('".$_SESSION['id']."','".date('d/m/Y')."','".$_POST['comment']."','".$_POST['dnum']."')") or die($db->error);
        $q2=$db->query("select id from docs_comments order by id desc limit 0,1");
        $row2=$q2->fetch_assoc();
        echo '<div id="dc">
        <ul>
            <a title="Delete" dcnum="'.$row2['id'].'" id="doc_comment_del_btn"></a>
            <li id="doccomments_username" style="background:#ddd">'.finduser($_SESSION['id']).'<span id="doccomments_date">'.date('d/m/Y').'</span></li>
            <li>'.$_POST['comment'].'</li>
        </ul>
    </div>';
    }
    else {
        echo '<script> window.location="index.php"; </script>';
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