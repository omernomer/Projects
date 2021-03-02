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
$q1=$db->query("insert into shouts(shouter,date,content) values ('".$_SESSION['id']."','".date('d/m/Y')."','".$_POST['content']."')");
$q2=$db->query("select * from shouts where shouter='".$_SESSION['id']."' order by id desc limit 0,1");
$row2=$q2->fetch_assoc();
?>
<ul id="one_shout">
        <li id="one_shout_top"><img src="<?php echo profile_pic($_SESSION['id']); ?>"/><span><?php echo finduser($_SESSION['id']); ?></span><p><?php echo date('d/m/Y') ?></p></li>
        <li id="one_shout_bottom"><?php echo $_POST['content']; ?></li>
        <li id="shout_actions" class="<?php echo $row2['id']; ?>"><div id="shout_comments" snum="<?php echo $row2['id']; ?>"><img src="images/comment.png"/><p><?php echo shouts_comments($row2['id']); ?></p></div><div id="love_btn" snum="<?php echo $row2['id']; ?>"><img src="images/hearth.png"/><p><?php echo shouts_loves($row2['id']); ?></p></div><div id="hate_btn" snum="<?php echo $row2['id']; ?>"><img src="images/hearth.png"/><p><?php echo shouts_hates($row2['id']); ?></p></div><div snum="<?php echo $row2['id']; ?>" id="shout_del_btn">Remove</div></li>
</ul>
<?php
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>