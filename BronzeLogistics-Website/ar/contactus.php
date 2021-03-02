<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Bronze Logistics</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width"/>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/css.css"/>
        <link rel="stylesheet" href="css/stylesheet.css"/>
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
                        <form style="width: 500px; display:inline-block;" class="formee" action="send.php" method="post">
                            <label style="color: #fff;">الأسم الكامل</label>
                            <input required="required" type="text" name="fname" />
                            <label style="color: #fff;">البريد الألكتروني</label>
                            <input required="required" type="text" name="email" />
                            <label style="color: #fff;">رقم الهاتف</label>
                            <input required="required" type="text" name="phone" />
                            <label style="color: #fff;">الرسالة</label>
                            <textarea required="required" name="msg"></textarea>
                            <label></label>
                            <input value="أرسل" type="submit" />
                        </form>
                        <div style="width: 400px; display:inline-block; position: absolute; top:50px; font-size:14pt; right:540px;">
                            <p>العنوان: شارع سومر , عينكاوه, أربيل, العراق.</p>
                            <br />
                            <p>البريد الألكتروني: info@bronzelogistic.com</p>
                            <br />
                            <p>رقم الهاتف: +964 (066) 225 33 44</p>
                        </div>                        
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
            var css={
			     'background':'#ae2f28',
            }
            $("#menu li:contains('أتصل بنا')").css(css);
        });
        </script>
    </body>
</html>
