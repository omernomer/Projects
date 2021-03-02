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
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>Quad</title>
    <link href="css.css" rel="stylesheet" type="text/css" />
    <!--<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>-->
    <script src="js/jq.js" type="text/javascript"></script>
	<script src="js/msgs.js" type="text/javascript"></script>
    <style>
    a {
        text-decoration:none;
    }
    </style>
</head>

<body>
<div id="container">

<div id="apps">
    <a href="home.php#load_docs" id="docs">Docs</a>
    <a href="home.php#load_msgs" id="msgs">Messages <span id="msgsnotout"></span></a>
    <a href="home.php#load_prof" id="prof">Profile <span id="pronotout"></span></a>
    <a href="home.php#load_ann" id="ann">Posts</a>
    <a href="foto.php" id="foto">Photos</a>
    <a href="tut.php" id="foto">Tutorials</a>
    <a href="search.php" id="sea">Search</a>
    <img src="images/logo_s.png" id="logo_s"/>
</div>
<div id="content">
    <div id="msgs_menu"><a class="btn" href="tutgen.php">Create New Tut</a></div>
    <ul id="msgs_list_sent">
<?php
$q1=$db->query("select * from tuts order by id desc");
$num1=$q1->num_rows;
for ($i=0; $i<$num1; $i++) {
    $row1=$q1->fetch_assoc();
    echo '<li id="read_sent_msg"><p><u>'.$row1['title'].'</u> <i>by</i>&nbsp;&nbsp;'.finduser($row1['creator']).' - <span id="brif_msg">'.$row1['date'].'</span></p><img id="view-tut" tut="'.$row1['id'].'" src="images/open.png" title="View"/><img id="down-tut" tut="'.$row1['id'].'" title="Download" src="images/download.png"/>'.tut_own($row1['id'],$_SESSION['id']).'</li>';
}
if ($num1==0) {
    echo '<li>There are no tutorials yet.</li>';
}
?>
</ul>
<div id="show_msg_here"></div>
</div>
</div>
<div id="footer">Quad &copy; 2012</div>
</body>
<script>
$(document).ready(function() {
    $("*#view-tut").click(function() {
        var tut=$(this).attr('tut');
        var not=$(this).parent();
        $("#msgs_list_sent li").not(not).fadeOut("slow");
        $.ajax({
            type:"POST",
            url:"view_tut.php",
            data:"tut="+tut,
            cache:false,
            success:function(html) {
                $("#show_msg_here").empty();
                $("#show_msg_here").append(html).show("fast");
                return false;
            }
        });
        return false;
    });
    
    $("*#delt-tut").click(function() {
        var tut=$(this).attr('tut');
        if (confirm("Are you sure you want to delete this tutorial?")) {
            $(this).parent().slideUp("slow");
            $.ajax({
                type:"POST",
                url:"del_tut.php",
                data:"tut="+tut,
                cache:false,
                success: function() {
                    
                }
            });
        }
        
    });
    
    $("*#down-tut").click(function(e) {
        var tut=$(this).attr('tut');
        $.ajax({
            type:"POST",
            url:"down_tut.php",
            data:"tut="+tut,
            cache:false,
            success:function(html) {
                e.preventDefault();
                window.location=""+html+"";
            }
        });
    });
    var hashtag = window.location.hash;
    //Docs
    function load_docs() {
        $("#content").empty();
        $("#content").load("docs.php");
    }
    $("#docs").click(function() {
        $("#content").empty();
        $("#content").load("docs.php").hide().fadeIn("fast");
    });
    if (hashtag == "#load_docs") load_docs();
    //msgs
    function load_msgs() {
        $("#content").empty();
        $("#content").load("msgs.php");
    }
    $("#msgs").click(function() {
        $("#content").empty();
        $("#content").load("msgs.php").hide().fadeIn("fast");
    });
    if (hashtag == "#load_msgs") load_msgs();
    //Profile
    function load_prof() {
        $("#content").empty();
        $("#content").load("profile.php");
    }
    $("#prof").click(function() {
        $("#content").empty();
        $("#content").load("profile.php").hide().fadeIn("fast");
    });
    if (hashtag == "#load_prof") load_prof();
    //Announcements
    function load_ann() {
        $("#content").empty();
        $("#content").load("ann.php");
    }
    $("#ann").click(function() {
        $("#content").empty();
        $("#content").load("ann.php").hide().fadeIn("fast");
    });
    if (hashtag == "#load_ann") load_ann();
    
    
    setInterval(function() {
        $("#msgsnotout").load("msgs_notes.php");
    },1000);
    $("#logout").click(function() {
        window.location="logout.php";
    });
});
</script>
</html>
<?php
//CHECKING LOGIN SESSIONS
	}
}
else {
	echo '<script> window.location="index.php"; </script>';
}
//CHECKING LOGIN SESSIONS
?>