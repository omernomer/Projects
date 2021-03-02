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
<script src="js/docs.js" type="text/javascript"></script>
<div class="platform">
    <form action="docupload.php" method="post" enctype="multipart/form-data">
    <span>Upload:</span>
    <input name="file" id="docfile" type="file"/>
    <input style="" name="privacy" type="checkbox" value="1"/>
    <label style="margin-right:5px;">Private</label>
    <input value="Upload" type="submit" class="btn" id="docsubmit"/>
    </form>
</div>
<div class="doc-search">
    <span>Search:</span>
    <input name="term" type="search" id="search_doc_term"/>
    <input value="Search" type="submit" id="search_doc" class="btn"/>
</div>
<div id="doc_search_res"></div>
<div id="docssec">
<?php
    $q1=$db->query("select * from docs where privacy='0' or (privacy='1' and uploader='".$_SESSION['id']."') order by id desc");
    $num1=$q1->num_rows;
    if ($num1==0) {
        echo '<br/>&nbsp;&nbsp;&nbsp;There are no documents yet.<br/>';
    }
    else {
    for ($i=0; $i<$num1; $i++) {
        $row1=$q1->fetch_assoc();
        echo '
        <div id="doc">
    <span id="filename"><a href="http://docs.google.com/viewer?url=docs/'.$row1['uploader']."/".$row1['title'].'">'.$row1['title'].'</a> '.doc_privacy($row1['id']);
    if ($_SESSION['id']==$row1['uploader']) {
        echo '<img id="del_btn" src="images/delete.png" dnum="'.$row1['id'].'"/>';
    }
    echo '</span><span id="docdate">'.$row1['date'].'</span>
    <span id="docsize">'.doc_size("docs/".$row1['uploader']."/".$row1['title']).' |</span>
    <ul id="doccomments" dnum="'.$row1['id'].'" title="comments"><li><img id="click" src="images/Comment.png"/></li><li style="padding:2px;"><p>('.count_comments($row1['id']).')</p></li></ul>
    <span id="docsback" title="Back"><img src="images/left.png"/></span>
    </div>
        ';
    }}
    echo '<div id="commentssec"></div>';
?>
</div>
<script>
$(document).ready(function() {
    $("#doccomments").live("click",function(event) {
        var data=$(this).attr("dnum");
        datas="dnum="+data;
        $("*#doc").not($(this).parent()).slideUp("slow");
        $(this).fadeOut("slow", function() {
            $("*#docsback").fadeIn("slow");
        });
        $.ajax({
                type: "POST",
                url: "doccomments.php",
                data: datas,
                cache: false,
                success: function(html){ 
                    //$("#commentssec").empty();
                    $("#commentssec").append(html);
				}
				});
    event.stopImmediatePropagation()
    });
    $("#kk").toggle(function() {
        $("*#n").fadeIn("fast");
    },function() {
        $("*#n").fadeOut("fast");
    })
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