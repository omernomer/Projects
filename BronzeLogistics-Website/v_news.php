<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Bronze Logistics</title>
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
        <script src="player/flowplayer-3.2.11.min.js"></script>
        <script src="js/lightbox.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
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
                <?php
                    $q1=$db->query("select * from news where id='".$_GET['id']."'");
                    $num1=$q1->num_rows;
                    for ($i=0; $i<$num1; $i++) {
                        $row1=$q1->fetch_assoc();
                ?>
                <div id="row" style="height: auto;">
                    <div id="aboutus">
                        <div id="tr"></div>
                        <p style="font-weight: bold; color:#cb7b3e"><?php echo $row1['title']; ?></p>
                        <p style="background: url('images/1.png'); padding:5px; width:40%; display:inline-block; vertical-align: top;"><?php echo $row1['news']; ?></p>
                        <?php if ($row1['pic']!="") { echo '<img src="news/'.$row1['pic'].'" style=" display:inline-block; vertical-align: top; position:relative; margin-top:5px;" width="50%" />';} ?>
                        <?php
                        echo '<div style="width:330px; margin:0 auto; margin-top:10px; border:thin solid #ddd; padding:5px;">';
                        if ($row1['pic2']!="") {
                            echo '<a style="padding:5px;" href="news/'.$row1['pic2'].'" rel="lightbox[g]" title="TITLE"><img src="cp/thumb.php?src='.$link.'/news/'.$row1['pic2'].'&w=100&h=100" /></a>';
                        }
                        if ($row1['pic3']!="") {
                            echo '<a style="padding:5px;" href="news/'.$row1['pic3'].'" rel="lightbox[g]" title="TITLE"><img src="cp/thumb.php?src='.$link.'/news/'.$row1['pic3'].'&w=100&h=100" /></a>';
                        }
                        if ($row1['pic4']!="") {
                            echo '<a style="padding:5px;" href="news/'.$row1['pic4'].'" rel="lightbox[g]" title="TITLE"><img src="cp/thumb.php?src='.$link.'/news/'.$row1['pic4'].'&w=100&h=100" /></a>';
                        }
                        echo '</div>';
                        if ($row1['vid']!="") {
                            echo '<a href="news/'.$row1['vid'].'" style="display:block; width:425px; height:300px; border:medium solid #fff; margin-top:10px;" id="player"></a>';
                            echo '<script language="JavaScript"> flowplayer("player", "player/flowplayer-3.2.15.swf"); </script>';
                        }
                        ?>                      
                    </div>
                </div>
                <?php
                }
                ?>
                
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
            $("#menu li:contains('News')").css(css);
        });
        </script>
    </body>
</html>
