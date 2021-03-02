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
<script>
    $("textarea").autoResize();
</script>
<div id="shouts_sec">
    <ul id="shouts_sec_cont">
        <li>Shout anything:</li>
        <li><textarea id="shouts_write_sec" style="resize: none; overflow-y: hidden; height: 30px; "></textarea></li>
        <li><a id="shout_write_btn" class="btn">Shout</a></li>
    </ul>
</div>
    <hr/>
<div id="people_shouts">
<?php
include 'functions.php';
$q1=$db->query("select * from shouts order by id desc");
$num1=$q1->num_rows;
for ($i=0; $i<$num1; $i++) {
    $row1=$q1->fetch_assoc();
?>
    <ul id="one_shout">
        <li id="one_shout_top"><img src="<?php echo profile_pic($row1['shouter']); ?>"/><span><?php echo finduser($row1['shouter']); ?></span><p><?php echo $row1['date']; ?></p></li>
        <li id="one_shout_bottom"><?php echo $row1['content']; ?></li>
        <li id="shout_actions" class="<?php echo $row1['id']; ?>"><div id="shout_comments" snum="<?php echo $row1['id']; ?>"><img src="images/comment.png"/><p><?php echo shouts_comments($row1['id']); ?></p></div><div id="love_btn" snum="<?php echo $row1['id']; ?>"><img src="images/hearth.png"/><p><?php echo shouts_loves($row1['id']); ?></p></div><div id="hate_btn" snum="<?php echo $row1['id']; ?>"><img src="images/hearth.png"/><p><?php echo shouts_hates($row1['id']); ?></p></div><?php if($row1['shouter']==$_SESSION['id']) {?><div snum="<?php echo $row1['id']; ?>" id="shout_del_btn">Remove</div><?php } ?></li>
    </ul>
<?php
}
?>
<div id="shout_comments_sec">
    <ul id="writing_comment_sec_shout">
    <li>Write Comment:</li>
    <li><textarea id="text_comment_shout"></textarea></li>
    <li><a class="btn" id="shout_comment_btn" title="">Comment</a></li>
    <input id="snum" type="hidden" value=""/>
    </ul>
    <div id="shouts_comment_place">
    </div>
</div>
</div>
<script>
$(document).ready(function() {
$("#shout_write_btn").click(function() {
        var content=$("#shouts_write_sec").val();
        var datas="content="+content;
            if (content=="") {
                syserror("You have to write something.");
            return false;
        }
        else {
            $("#shouts_write_sec").val("");
        $.ajax({
            type:"POST",
            url:"write_shout.php",
            data:datas,
            cache:false,
            success:function(html) {
                $("#people_shouts").prepend(html);
                return false;
            }
        });
        return false;
        }
    });
    $("#love_btn").live("click",function(event) {
        var snum=$(this).attr("snum");
        var datas="snum="+snum;
        $.ajax({
            type:"POST",
            url:"love.php",
            data:datas,
            cache:false,
            success:function(html) {
                $("."+snum).empty().html(html);
            }
        });
        event.stopImmediatePropagation();
    });
    $("#hate_btn").live("click",function(event) {
        var snum=$(this).attr("snum");
        var datas="snum="+snum;
        $.ajax({
            type:"POST",
            url:"hate.php",
            data:datas,
            cache:false,
            success:function(html) {
                $("."+snum).empty().html(html);
            }
        });
        event.stopImmediatePropagation();
    });
    $("#shout_comments").live("click",function(event) {
        var snum=$(this).attr("snum");
        $("#snum").val(snum);
        $("#shouts_sec").fadeOut("slow");
        $("hr").hide();
        $("*#one_shout").not($(this).parent().parent()).fadeOut("slow", function() {
            $("#writing_comment_sec_shout").fadeIn("slow");
            $("*#shout_actions").css({
                display:"block"
            });
        });
        $.ajax({
            type:"POST",
            url:"shout_comments.php",
            data:"snum="+snum,
            cache:false,
            success:function(html) {
                $("#shouts_comment_place").empty();
                $("#shouts_comment_place").prepend(html);
                return false;
            }
        });
        event.stopImmediatePropagation();
    });
    $("#shout_comment_btn").click(function() {
        var snum=$("#snum").val();
        var comment=$("#text_comment_shout").val();
        var datas="comment="+comment+"&snum="+snum;
        if (comment=="") {
            syserror("You have to write a comment.");
            return false;
        }
        else {
            $.ajax({
                type:"POST",
                url:"shout_comment.php",
                data:datas,
                cache:false,
                success:function(html) {
                    $("#text_comment_shout").val("");
                    $("#shouts_comment_place").prepend(html);
                }
            });
        }
    });
    $("#shout_del_btn").live("click",function(event) {
        var snum=$(this).attr("snum");
        $(this).parent().parent().slideUp("slow");
        $.ajax({
            type:"POST",
            url:"shout_del.php",
            data:"snum="+snum,
            cache:false,
            success:function() {
                
            }
        });
        event.stopImmediatePropagation();
    });
});

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