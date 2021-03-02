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
                        <p style="font-weight: bold; color:#cb7b3e">Our Services</p>
                        <p>BLC provides logistic support for both private and public sectors through our Professional team who facilitate accomplishing the official documents in foundations such as:</p>
                        <br />
                        <p><b>Directorate of Residency and Passports</b>: it is one of the most important directorates in KRG as it is required of any individual who enters KRG to visit this directorate in order to get the required Visas and residency papers. BLC staff is always available to assist getting these documents in short time.</p>
                        <br />
                        <p><b>Ministries and Official Directorates</b>: They are key providers for registration documents. Our mission is to accelerate and facilitate the issuance of these documents due to the needs of the clients weather they were local or international. However, our mission does not stop to this end as we continue working with the client in order to provide assistance in companies and foundations establishment.</p>
                        <br />
                        <p><b>Banks and Financial Institutions</b>: B.L.C work as a facilitator to insure all the financial deals, and starting bank accounts for the investors in an y bank within KRG.</p>
                        <br />
                        <p><b>Employment services</b>: BLC is able and willing to help people finding suitable jobs according to their qualifications. This service comes through our coordination with other companies that we have close professional relations with.</p>
                        <br />
                        <p><b>Hospitality Office & CIP Special Service</b>: BLC provides a unique service for the CIP people by granting elite reception, plane to residency automobiles, Visas and residency papers accomplishment, Five stars hotel reservations, and renting villas and/or apartments.</p>
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
            $("#menu li:contains('Services')").css(css);
        });
        </script>
    </body>
</html>
