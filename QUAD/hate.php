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
if (isset($_POST['snum'])) {
    $q1=$db->query("select * from shouts_rates where shout='".$_POST['snum']."' and rater='".$_SESSION['id']."'");
    $q2=$db->query("select * from shouts where id='".$_POST['snum']."'");
    $row1=$q1->fetch_assoc();
    $row2=$q2->fetch_assoc();
    if ($row1['rate']=="1") {
        $q2=$db->query("update shouts_rates set rate='0' where shout='".$_POST['snum']."' and rater='".$_SESSION['id']."'");
        echo '<div id="shout_comments" snum="'.$_POST['snum'].'"><img src="icons/comments.png"/><p>'.shouts_comments($_POST['snum']).'</p></div><div id="love_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_loves($_POST['snum']).'</p></div><div id="hate_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_hates($_POST['snum']).'</p></div>';
        if ($row2['shouter']==$_SESSION['id']) {echo '<div snum="'.$_POST['snum'].'" id="shout_del_btn">Remove</div>';}
    }
    elseif ($row1['rate']=="0") {
        $q3=$db->query("update shouts_rates set rate='5' where shout='".$_POST['snum']."' and rater='".$_SESSION['id']."'");
        echo '<div id="shout_comments" snum="'.$_POST['snum'].'"><img src="icons/comments.png"/><p>'.shouts_comments($_POST['snum']).'</p></div><div id="love_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_loves($_POST['snum']).'</p></div><div id="hate_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_hates($_POST['snum']).'</p></div>';
        if ($row2['shouter']==$_SESSION['id']) {echo '<div snum="'.$_POST['snum'].'" id="shout_del_btn">Remove</div>';}
    }
    elseif ($row1['rate']=="5") {
        $q4=$db->query("update shouts_rates set rate='0' where shout='".$_POST['snum']."' and rater='".$_SESSION['id']."'");
        echo '<div id="shout_comments" snum="'.$_POST['snum'].'"><img src="icons/comments.png"/><p>'.shouts_comments($_POST['snum']).'</p></div><div id="love_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_loves($_POST['snum']).'</p></div><div id="hate_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_hates($_POST['snum']).'</p></div>';
        if ($row2['shouter']==$_SESSION['id']) {echo '<div snum="'.$_POST['snum'].'" id="shout_del_btn">Remove</div>';}
    }
    else {
        $q5=$db->query("insert into shouts_rates(rater,rate,shout) values ('".$_SESSION['id']."','0','".$_POST['snum']."')") or die("errrr");
        echo '<div id="shout_comments" snum="'.$_POST['snum'].'"><img src="icons/comments.png"/><p>'.shouts_comments($_POST['snum']).'</p></div><div id="love_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_loves($_POST['snum']).'</p></div><div id="hate_btn" snum="'.$_POST['snum'].'"><img src="images/hearth.png"/><p>'.shouts_hates($_POST['snum']).'</p></div>';
        if ($row2['shouter']==$_SESSION['id']) {echo '<div snum="'.$_POST['snum'].'" id="shout_del_btn">Remove</div>';}
    }
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