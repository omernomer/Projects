<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Bronze Logistics</title>
        <meta name="description" content="It is one of the most important companies in Kurdistan Region that has proved its existence through the deep impact ,which is left in the business domain."/>
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
                        <p style="font-weight: bold; color:#cb7b3e">شركة برونز لوجيستك</p>
                        <p>تعتبر شركة برونز لوجيستك من الشركات الرائدة في اقليم كوردستان العراق لمساعدة وتسهيل انجاز كافة المعاملات الرسمية للشركات والمستثمرين في الاقليم ، حيث تقوم الشركة بتامين كافة الاحتياجات الادارية والقانونية ومتابعة المعاملات الرسمية واستصدار التأشيرات (الفيز) للافراد والمؤسسات ،</p>...
                        <p id="readmore"><a href="aboutus.php">أقرأ المزيد</a></p>
                    </div>
                </div>
                <div id="row" style="height: auto;">
                    <div id="aboutus" class="moz">
                        <div id="tr"></div>
                        <p style="font-weight: bold; color:#cb7b3e">عملائنا</p>
                        <div id="part" title="Erbil International Airport">
                            <img src="images/eia.jpg" />
                        </div>
                        <div id="part" title="Mobitel">
                            <img src="images/mobi.jpg" />
                        </div>
                        <div id="part" title="OMV Oil">
                            <img src="images/omv.jpg" />
                        </div>
                        <div id="part" title="Rotana Hotel">
                            <img src="images/rotana.jpg" />
                        </div>
                        <div id="part" title="Al Faysaliah Group">
                            <img src="images/sony.jpg" />
                        </div>
                        <div id="part" title="ZTE Company">
                            <img src="images/zte.jpg" />
                        </div>
                        <div id="part" title="Zain Iraq">
                            <img src="images/zain.jpg" />
                        </div>
                        <div id="part" title="Newroz Telecom">
                            <img src="images/newroz.jpg" />
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
            $("#menu li:contains('الرئيسية')").css(css);
        });
        </script>
    </body>
</html>
