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
                    <div id="aboutus" style="background-image: url('images/contract.png'); background-position:left">
                        <div id="tr"></div>
                        <p style="font-weight: bold; color:#cb7b3e">العقود</p>
                        <p style="width: 800px; background:url('images/1.png'); padding:5px;">　　　　واحدة من الاهتمامات الرئيسية لشركة برونز لوجيستك  هو الحفاظ على رضا العملاء، وبالتالي فإن الشركة تقدم  بتوفير الخدمات للأفراد والمؤسسات، كما ذكر من قبل، وبدون عقد. اما الآن، ولأجل مصلحة العملاء ورضاهم، والذي هو في مقدمة أولوياتنا، فأن الشركة تقوم ايضا بتوفير خدماتها وفق عقد مبرم للشركات. ويشمل العقد كل أو بعض الخدمات التي نقدمها على أساس الشروط المتفق عليها بين الطرفين المتعاقدين. وان مدة العقد نافذة لغاية ستة أشهر (6) فقط، وهو الحد الأدنى لأي عقد، ولكن يمكن تمديد هذه المدة لفترة أطول من الزمن بنائا على موافقة كلا الطرفين المتعاقدين. ويجب أن تدفع المبالغ المتفق عليها في العقد شهريا . وبالاضافة الى ذلك، فإن الشركة ليست مسؤولة عن دفع تكاليف المالية المترتبة على أي إيصال رسمي أو غير رسمي، متعلق بالمعاملات الحكومية، وينبغي دفعها من قبل العميل. </p>                        
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
            $("#menu li:contains('عقود')").css(css);
        });
        </script>
    </body>
</html>
