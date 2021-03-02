<?php
session_start();
//CHECKING LOGIN SESSIONS
include 'db.php';
if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
	$q=$db->query("select * from users where email='".$_SESSION['email']."' and id='".$_SESSION['id']."'");
	$row=$q->fetch_assoc();
	$num=$q->num_rows;
	if ($num==1) {
	   echo '<script> window.location="home.php#load_docs"; </script>';
	}
 }
 else {
//CHECKING LOGIN SESSIONS
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>Quad</title>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script src="js/jq.js" type="text/javascript"></script>
    <link href="css.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/msgs.js"></script>
    <script>
    $(document).ready(function(){
        $("#register").click(function(){
            $("#regblok").animate({
                top:'0'
            });
            $("#login").animate({
               top:'-340' 
            });
            $("#register").fadeOut("slow");
            });
        $("#close").click(function(){
            $("#regblok").animate({
                top:'-340'
            });
            $("#login").animate({
               top:'200' 
            });
            $("#register").fadeIn("slow");
        });
        $("#regsubmit").click(function() {
           var email=$("#email").val();
           var fname=$("#fname").val();
           var pass=$("#pass").val();
           var pass2=$("#pass2").val();
           if (email=="" || fname=="" || pass=="" || pass2=="") {
				syserror("You have to fill all the feilds");
           }
		   else if (pass!=pass2) {
				syserror("Your passwords does not match each other");
		   }
		   else {
				$.ajax({
                type: "POST",
                url: "register.php",
                data: $("#rform").serialize(),
                cache: false,
                success: function(html){
                    $("#container").append(html);
					$("#regblok").animate({
						top:'-340'
					});
					$("#login").animate({
						top:'100' 
					});
					$("#register").fadeIn("slow");
				}
				});
           }
           
           return false;
        });
        $("#logsubmit").click(function(){
			var emaillog=$("#emaillog").val();
			var passlog=$("#passlog").val();
			if (emaillog=="" || passlog=="") {
				syserror("You have to fill all the fields.");
			}
			else {
				$.ajax({
					type:"POST",
					url: "login.php",
					data:$("#flog").serialize(),
					success: function(html) {
						$("#container").append(html);
					}
				})
			}
			return false;
        })
		});
    </script>
</head>

<body style="background: url('images/bg.jpg'); background-repeat: repeat;">
<center>
<div id="content" style="background: none; float:left; z-index:10; border:none; position:absolute; top:200px; right:0px; width:300px;"></div>
<div id="container">
<div id="regblok">
    <div id="regform">
    <a class="btn" id="close" style="position: absolute; width:100%; padding:0px; border-left:0px; border-right:0px; text-align:center">Close</a>
        <form id="rform" method="post" action="#">
        <table>
        <tr><td></td></tr>
        <tr><td colspan="2" style="width: 200px; font-size:13px;"><p>* You have to use UKH email address, otherwise you can not register.</p></td></tr>
        <tr><td>Full Name</td><td><input id="fname" name="fname" type="text" class="ftext"/></td></tr>
        <tr><td>Email</td><td><input name="email" type="email" id="email" class="ftext"/></td></tr>
        <tr><td>Password</td><td><input id="pass" type="password" name="pass" class="ftext"/></td></tr>
        <tr><td>Re-Password</td><td><input id="pass2" type="password" class="ftext"/></td></tr>
        <tr><td colspan="2"><input type="submit" id="regsubmit" class="btn" value="Register" /></td></tr>
        </table>
        </form>
    </div>
    <a class="btn" id="register" style="position: absolute;">Register</a>
</div>
<div id="login">
	<form id="flog" method="post" action="">
    <table>
        <tr><td>Email:</td><td><input class="ftext" name="email" id="emaillog" type="email"/></td></tr>
        <tr><td>Password:</td><td><input class="ftext" name="pass" id="passlog" type="password"/></td></tr>
        <tr><td colspan="2"><input value="Login" type="submit" id="logsubmit" class="btn"/></td></tr>
    </table>
	</form>
</div>
</div>
<div style="position: absolute; box-shadow:#000 0px 0px 20px; left:0px; bottom:0px; background:#fff; width:100%; height:160px; border-top:thin #ddd solid">
<img src="images/logo.png" style="position: absolute; left:0px; bottom:0px; width:300px; margin:10px;"/><p style="color: #888; font-size:50px; margin-top:50px; margin-right:100px; float:right">Quad is a place for Ukhian to meet.</p>
</div>
</center>
</body>
</html>
<?php
}
?>