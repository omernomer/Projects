<?php
session_start();
//CHECKING LOGIN SESSIONS
error_reporting(0);
include 'db.php';
if ($_SESSION['username']!="" && $_SESSION['id']!="") {
	$q=$db->query("select * from users where username='".$_SESSION['username']."' and id='".$_SESSION['id']."'");
	$row=$q->fetch_assoc();
	$num=$q->num_rows;
	if ($num==1) {
//CHECKING LOGIN SESSIONS
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Bronze Logistics (ADMIN)</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width"/>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/css.css"/>
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
        <script src="js/jquery.tipsy.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/tipsy.css" type="text/css" media="screen" />
        <script type="text/javascript" src="js/formee.js"></script>
        <link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <div id="container">
        
            <div id="header">
                <?php include('header.php'); ?>
            </div><!--HEADER END-->
            
            <div id="content">
                <?php include('menu.php'); ?>
                <div id="row" style="height: auto;">
                    <div id="aboutus">
                        <div id="tr"></div>
                        <form class="formee" action="set_do.php" method="post">
                        <?php
                            if (isset($_GET['error'])) {
                                echo '<div class="formee-msg-error"><p style="font-size:15px;">'.$_GET['error'].'</p></div>';
                            }
                            if (isset($_GET['success'])) {
                                echo '<div class="formee-msg-success"><p style="font-size:15px;">'.$_GET['success'].'</p></div>';
                            }
                        ?>
                            <label style="color: #fff;">Current Password</label>
                            <input type="password" name="cp" />
                            <label style="color: #fff;">New Password</label>
                            <input type="password" name="p1" />
                            <label style="color: #fff;">Confirm Password</label>
                            <input type="password" name="p2" />
                            <label></label>
                            <input value="Update" type="submit" />
                        </form>                        
                    </div>
                </div>
                
            </div><!--CONTENT END-->
        
            <div id="footer">
                <?php include('footer.php'); ?>
            </div><!--FOOTER END-->
        
        </div>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
                controlNav: false,
                slices: 5,
                boxCols: 5,
                boxRows: 5,
            });
            $('*#part').tipsy({ fade:true });
        });
        </script>
    </body>
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