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
    <script src="js/resize.js" type="text/javascript"></script>
    <script src="js/docs.js" type="text/javascript"></script>
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
    <a href="logout.php">Logout</a>
    <img src="images/logo_s.png" id="logo_s"/>
</div>
<div id="content">
</div>
</div>
<div id="footer">Quad &copy; 2012</div>
</body>
<script>
$(document).ready(function() {
    $("#content").empty();
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
    setInterval(function() {
        $("#pronotout").load("pro_notes.php");
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