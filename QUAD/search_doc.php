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
    $q1=$db->query("select * from docs where privacy='0' and title like '%".$_POST['term']."%' order by id desc");
    $num1=$q1->num_rows;
    for ($i=0; $i<$num1; $i++) {
        $row1=$q1->fetch_assoc();
        echo '<script src="js/docs.js" type="text/javascript"></script>
        <div id="doc">
    <span id="filename"><a href="http://docs.google.com/viewer?url=docs/'.$row1['uploader']."/".$row1['title'].'">'.$row1['title'].'</a>';
    if ($_SESSION['id']==$row1['uploader']) {
        echo '<a id="del_btn" dnum="'.$row1['id'].'"></a>';
    }
    echo '</span><span id="docdate">'.$row1['date'].'</span>
    <span id="docsize">'.doc_size("docs/".$row1['uploader']."/".$row1['title']).' |</span>
    <ul id="doccomments" dnum="'.$row1['id'].'" title="comments"><li><img id="click" src="icons/Comments.png"/></li><li style="padding:2px;"><p>('.count_comments($row1['id']).')</p></li></ul>
    <span id="docsback" title="Back"><img src="images/left.png"/></span>
    </div>
        ';
    }
    echo '<div id="commentssec"></div>';
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