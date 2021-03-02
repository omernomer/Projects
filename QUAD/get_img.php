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
include 'db.php';
$q=$db->query("select * from fotos where id='".$_POST['img']."'");
$row=$q->fetch_assoc();
echo '<img id="img-st" src="fotos/'.$row['pic'].'" width="500" />';
?>
<div id="shout_comments_sec">
    <ul id="writing_comment_sec_shout">
    <li>Write Comment:</li>
    <li><textarea style="width:100%; resize: none;" id="text_comment_foto"></textarea></li>
    <li><a class="btn" id="foto_comment_btn" title="">Comment</a></li>
    <input id="foto_url" type="hidden" value="<?php echo $_POST['img']; ?>"/>
    </ul>
    <div id="shouts_comment_place">
    <?php
    $q1=$db->query("select * from fotos_comments where foto='".$_POST['img']."' order by id desc");
    $num1=$q1->num_rows;
    for($i=0; $i<$num1; $i++) {
        $row1=$q1->fetch_assoc();
    ?>
    <ul id="one_shout_comment">
        <li id="one_shout_top_comment"><img src="<?php echo profile_pic($row1['commenter']); ?>"/><span><?php echo finduser($row1['commenter']); ?></span><p><?php echo $row1['date']; ?></p></li>
        <li id="one_shout_bottom_comment"><?php echo $row1['comment']; ?></li>
    </ul>
    <?php } ?>
    </div>
</div>
<script>
$("textarea").autoResize();
$("#foto_comment_btn").click(function() {
    var comment=$("#text_comment_foto").val();
    var foto=$("#foto_url").val();
    if (comment=="") {
        syserror("You have to write something.");
    }
    else {
        $.ajax({
            type:"POST",
            url:"foto_comment.php",
            data:"foto="+foto+"&comment="+comment,
            cache:false,
            success: function(html) {
                $("#text_comment_foto").val();
                $("#shouts_comment_place").prepend(html).hide().fadeIn("slow");
            }
        })
    }
})
</script>
<?php
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>