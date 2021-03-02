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
<div id="profile_sec">
    <img src="<?php echo profile_pic($_SESSION['id']); ?>" id="profile_pic"/>
    <form action="profile_edit_do.php" method="post" enctype="multipart/form-data">
    <table id="username_profile">
        <tr><td style="color: #666;">Name: </td><td><input type="text" id="fname" name="fname" value="<?php echo $row['username']; ?>"/></td></tr>
        <tr><td style="color: #666;">Level:</td><td><select id="lvl" name="lvl"><option value="Access 1">Access 1</option><option value="Access 2">Access 2</option><option value="UG1">UG1</option><option value="UG2">UG2</option><option value="UG3">UG3</option></select></td></tr>
        <tr><td style="color: #666;">Department: </td><td><input id="depart" value="<?php echo $row['depart']; ?>" name="depart" type="text"/></td></tr>
        <tr><td style="color: #666;">Profile Photo: </td><td><input name="propic" type="file"/></td></tr>
        <tr><td style="color: #666;">Password: </td><td><input name="pass" id="pass" value="<?php echo $row['password']; ?>" type="password"/></td></tr>
        <tr><td style="color: #666;">Re-Password: </td><td><input name="pass2" id="pass2" value="<?php echo $row['password']; ?>" type="password"/></td></tr>
        <tr><td><input id="submit_profile" type="submit" class="btn"/></td></tr>
    </table>
    </form>
    <a class="btn" style="right:5px; top:5px; position:absolute;" id="profile_close">Back</a>
</div>
<script>
$(document).ready(function() {
    $("#profile_close").click(function() {
       $("#content").empty();
       $("#content").hide().load("profile.php").fadeIn("fast");
    });
    $("#submit_profile").click(function() {
       var fname=$("#fname").val();
       var depart=$("#depart").val();
       var pass=$("#pass").val(); 
       var pass2=$("#pass2").val();
       if (fname=="" || depart=="" || pass=="" || pass2=="" || pass!=pass2) {
        syserror("You have a problem.");
        return false;
       }
       else {}
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