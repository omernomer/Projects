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
                        <p style="font-weight: bold; color:#cb7b3e">عملاؤنا وشركاؤنا</p>
                        <p>تتعاون شركة برونز لوجيستك مع:</p>
                        <br />
                        <p><b>مديرية الإقامة والجوازات</b>:  ترتبط الشركة  بعلاقات مهنية وقانونية مع هذه المديرية الهامة مما يتيح لها الحصول على جميع الوثائق الضرورية في وقت قصير جدا  بمساعدة من المتخصصين فيها.</p>
                        <br />
                        <p><b>الوزارات والمديريات في حكومة إقليم كردستان</b>: لدى الشركة فريق  عمل متخصص يعمل مع كافة الوزارات والمديريات لمتابعة سير المعاملات واكمالها  قانونيا.</p>
                        <br />
                        <p><b>الشركات الامنية</b>:  تتعاون مع شركتين امنيتين  تدعى (Co. ARDAN  ) و (Co. Mendo  ) لتقديم كافة الاحتياجات الأمنية والخدمات والتسهيلات التي يحتاجها العميل مثل الحراس الشخصيين والمدرعات وكل ما هو مرخص له للعمل داخل العراق. </p>
                        <br />
                        <p><b>مطار اربيل الدولي</b>: وتعتبر شركتنا  واحدة من الشركات المتعاقدة  مع مطار اربيل الدولي للعمل على تسهيل شحن البضائع بطريقة منظمة ومهنية، وفي الوقت نفسه، سوف تكون الشركة  الوسيط بين عملائنا وإدارة المطار في حكومة إقليم كردستان.  </p>           
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
            $("#menu li:contains('عملائنا وشركائنا')").css(css);
        });
        </script>
    </body>
</html>
