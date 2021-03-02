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
if (isset($_POST['dnum'])) {
    $q1=$db->query("select * from docs_comments where doc='".$_POST['dnum']."' order by id desc");
    $num1=$q1->num_rows;
?>
<script src="js/docs.js" type="text/javascript"></script>
<div id="docscomments">
    <div class="dc" dnum="<?php echo $_POST['dnum']; ?>">
        <ul>
            <li>Write comment:</li>
            <li><textarea name="doccomment" id="doccomment_writsec"></textarea></li>
            <li><a class="btn" id="comment_do">Comment</a></li>
        </ul>
    </div>
    <div id="wheredcgos">
    <?php
    for ($i=0; $i<$num1; $i++) {
        $row1=$q1->fetch_assoc();
    ?>
    <div id="dc">
        <ul>
            <?php
            if ($_SESSION['id']==$row1['commenter']) {
                echo '<a title="Delete" dcnum="'.$row1['id'].'" id="doc_comment_del_btn"></a>';
            }
            ?>
            <li style="background: #ddd;" id="doccomments_username"><?php echo finduser($row1['commenter']); ?> <span id="doccomments_date"><?php echo $row1['date']; ?></span></li>
            <li><?php echo $row1['comment']; ?></li>
        </ul>
    </div>
    <?php
    }
    ?>
    </div>
</div>
<script>
    $("#doccomment_writsec").autoResize();
</script>
<?php
}
else {
    echo '<script> window.location="home.php#load_docs"; </script>';
}
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>