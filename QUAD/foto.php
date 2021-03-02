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
    <img src="images/logo_s.png" id="logo_s"/>
</div>
<div id="content">
<?php
$path = "fotos/";
$uid=uniqid();
?>
<link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
<script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>
<script type="text/javascript">
function getSizes(im,obj)
	{
		var x_axis = obj.x1;
		var x2_axis = obj.x2;
		var y_axis = obj.y1;
		var y2_axis = obj.y2;
		var thumb_width = obj.width;
		var thumb_height = obj.height;
		if(thumb_width > 0)
			{
						$.ajax({
							type:"GET",
							url:"ajax_image.php?t=ajax&img="+$("#image_name").val()+"&w="+thumb_width+"&h="+thumb_height+"&x1="+x_axis+"&y1="+y_axis,
							cache:false,
							success:function(rsponse)
								{
								 $("#cropimage").hide();
								    $("#thumbs").html("");
									$("#thumbs").html("<img id='small' chk='1' src='fotos/"+rsponse+"' />");
								}
						});
			}
		else {
			syserror("Please select portion..!");
            }
	}

$(document).ready(function () {
    $('img#photo').imgAreaSelect({
        aspectRatio: '1:1',
        onSelectEnd: getSizes
    });
});
</script>
<?php

	$valid_formats = array("jpg", "png");
	if(isset($_POST['submit']))
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats) && $size<(1024*1024))
						{
							$actual_image_name = $uid.".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								$q2=$db->query("insert into fotos(dd,uploader,pic) values ('".date('d/m/Y')."','".$_SESSION['id']."','$actual_image_name')");
									$image="<h3>Please drag on the image</h3><img src='fotos/".$actual_image_name."' id=\"photo\" style='max-width:500px'>";
									
								}
							else
								echo "<script> syserror('failed'); </script>";
						}
					else
						echo "<script> syserror('Invalid file formats.'); </script>";					
				}
			else
				echo "<script> syserror('Please, select an image.'); </script>";
		}
?>

<?php if (isset($image)) {echo '<div class="crop">'.$image.'<div id="thumbs"></div><a href="foto.php" id="crop_done" class="btn">Done</a><style> #fotos-holder{ display:none; } </style></div>'; } ?>
<div class="platform">
<form id="cropimage" method="post" enctype="multipart/form-data">
	Upload your image <input type="file" name="photoimg" id="photoimg" />
	<input type="hidden" name="image_name" id="image_name" value="<?php echo($actual_image_name)?>" />
	<input type="submit" name="submit" value="Submit" class="btn"/>
</form>
</div>
<div id="foto-holder">

</div>
<div id="fotos-holder">
<?php
$q3=$db->query("select * from fotos order by id desc limit 0,20");
$num3=$q3->num_rows;
for ($i=0; $i<$num3; $i++) {
    $row3=$q3->fetch_assoc();
?>
    <div id="img" pd="<?php echo $row3['id']; ?>">
        <img src="fotos/<?php if($row3['thumb']!="") {echo $row3['thumb'];} else { echo '404.png'; } ?>"/>
        <?php echo comn_img($row3['id']); ?>
    </div>
<?php
}
?>
</div>
</div>
</div>
<div id="footer">Quad &copy; 2012</div>
</body>
<script>
$(document).ready(function() {
    $("*#img").click(function() {
        var img=$(this).attr('pd');
        $("#fotos-holder").fadeOut("slow",function() {
            $.ajax({
            type:"POST",
            url:"get_img.php",
            data:"img="+img,
            cache:false,
            success:function(html) {
                $("#foto-holder").prepend(html).hide().fadeIn("slow");
                $("#writing_comment_sec_shout").fadeIn("slow");
            }
        });
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