<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <title>The Wedding Factory</title>  
    <meta name="description" content="Sailor is a Creative and Unique Corporate and Portfolio Web Template">
    <meta name="keywords" content="portfolio, creative, corporate, responsive, bootstrap">
    <meta name="author" content="JLT Media/ThemeForces">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Other Css Files
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.2.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/nivo-lightbox.css">
    <link rel="stylesheet" type="text/css" href="../css/themes/default/default.css"

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" href="assets/css/animate.css">       
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css"> 
     <link rel="stylesheet" href="fonts/font-face.css"> 
    <!-- Google Fonts
    ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Modernizr
    ================================================== -->
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/Gallery.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="icon/apple-icon-57x57.png">
                <link rel="apple-touch-icon" sizes="60x60" href="icon/apple-icon-60x60.png">
                <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="76x76" href="icon/apple-icon-76x76.png">
                <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-icon-114x114.png">
                <link rel="apple-touch-icon" sizes="120x120" href="icon/apple-icon-120x120.png">
                <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-icon-144x144.png">
                <link rel="apple-touch-icon" sizes="152x152" href="icon/apple-icon-152x152.png">
                <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-icon-180x180.png">
                <link rel="icon" type="image/png" sizes="192x192"  href="icon/android-icon-192x192.png">
                  <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
                <link rel="manifest" href="icon/manifest.json">    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-target=".navbar-example">

    <!-- Off Canvas Navigation
    ================================================== -->
   <div class="navbar navbar-default navbar-fixed-top menu-top2" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                                              
                    </div>
                    <div class="navbar-collapse collapse navbar-centered ">
                        <ul class="nav navbar-nav" >
                            <li><a href="index.html" class="Montserrat-Regular">Inicio</a></li>
                            <li><a href="quienes_somos.html" class="Montserrat-Regular">Quiénes Somos</a></li>
                            <li><a href="index.html#services" class="Montserrat-Regular">Servicios</a></li>
                            <li><a href="galery.php" class="Montserrat-Regular">Galería</a></li>
                            <li><a href="index.html#contact" class="Montserrat-Regular">Contacto</a></li>
                        </ul>
                    </div> 
                </div><!--- END CONTAINER -->
            </div> 


    <!-- Hero Slider
    ================================================== -->
    <!-- Portfolio Section
    ================================================== -->
    <section id="portfolio" > 
         <div class="section-title4 text-center wow zoomIn" style="padding-top: 150px;">
                <h1 class="Eyes-Wide" style="margin-bottom: 80px">Conoce &nbsp; nuestros &nbsp;eventos</h1>
            </div>
        <div class="container-fluid"> <!-- Start Container -->
           
            <div class="row" id="row-1"> <!-- Start Row -->
                <?php
                    include "api.php";
                    error_reporting(E_ALL);
                        $count = 1;
                        $row = 2;
                        $json = json_decode($json2, true); 
                        foreach ($json['images'] as $value) {
                        $path = $value['path'];
                        $tittle = $value['title'];
                       
                        $img_details = json_encode($value);
                        $RequestText = urlencode($img_details);
                        if($count <=9){
                ?>
                    <div class="col-sm-4 col-md-4 col-lg-4 nopadding"> <!-- First Column -->
                        <div class="small-box">
                            <div class="hover-bg">
                                <a href="<?php echo $path; ?>" class="btn btn-default read-more-btn" title="<?php echo $tittle; ?>" data-lightbox-gallery="gallery1">
                                  <img src="<?php echo $path; ?>" alt="img" class="img-responsive img-standar">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                       $count++;
                       }
                       else{
                ?>
                      </div>
                      <div class="row" id="row-<?php echo $row; ?>">
                <?php
                       $count= 1;
                       $row++;
                       }
                       }
                ?>
            </div> <!-- End Row -->
            <center>
                <div id="page-selection" style="margin-bottom: 70px;margin-top:70px;" >
                    <ul class="pagination">
                        <?php
                               for ($i=1; $i < $row; $i++) { 
                                   # code...
                               
                        ?>
                        <li id="<?php echo $i;?>" class="prev pagg"><a href="javascript:void(0);" style="color: #212121"><?php echo $i;?></a></li>
                        <?php
                               }
                        ?>
                    </ul>
                </div>
            </center>
    </section>

    <footer class="footer" style="background-color: #555e5d">
			<div class="container">
                            <div class="row center-block"  id="row-footer">
				<div class="col-md-12 text-center">
                                    <div  class="footer-copyright wow fadeInUp " data-wow-duration="1s" data-wow-delay="0.6s" data-wow-offset="0">
                                        <div class="col-sm-7" style="padding-bottom: 7px;">
                                            <div class="form-group col-sm-6 "></div>
                                            <a href="index.html"><img src="images/logo_2.png" style="height: 140px;float: right;" class="logo-footer" ></a>
                                        </div>
                                        <div class=" form-group col-sm-5 center-block img-footer" style="text-align: left;margin-top: 35px;" >
                                             <h4 style="color: #fff;margin-bottom:-4px" class="center-block Avenir-Roman siguenos">Síguenos en:</h4>
                                            <a href="https://www.facebook.com/theweddingfactorymx/" target="_blank"><img src="images/facebook.png" style="height: 67px;margin-left:-16px;margin-right:-26px" ></a>
                                             <a href="https://www.instagram.com/wedding_factory_mx/" target="_blank"><img src="images/instagram.png" style="height: 67px;margin-right: -26px;" ></a>
                                             <a href="https://twitter.com/weddfactorymx" target="_blank"><img src="images/twitter.png" style="height: 67px;">     </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
		</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    ================================================== -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Other JS Files -->
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.js"></script>

    <!-- Contact page-->

    <!-- Custom Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        $(".row").not("#row-1, #row-footer").hide("slow");
        // $('#page-selection').bootpag({
        //             total: 4
        //         }).on("page", function(event, /* page number here */ num){
        //              $("#row-" + num).show("slow");
        //              $(".row").not('#row-' + num).hide("slow");
        //         });
        
        $(".pagg").on('click', function(event) {
            var $data = $(this);
            $("#row-" + $data.attr("id")).show("slow");
            $(".row").not('#row-footer, #row-' + $data.attr("id")).hide("slow");
            $("html, body").animate({ scrollTop: 0 }, 2000);
            return false;
                 
        });
    });
    </script>
    <script type="text/javascript">
			/*partner carousel*/
			 $(".partner").owlCarousel({
				  autoPlay: 3000, //Set AutoPlay to 3 seconds
				  items : 4,
				  itemsDesktop : [1199,3],
				  itemsDesktopSmall : [979,3]
			});
			/*End partner carousel*/
		</script>
		<script type="text/javascript">
		/*  Stellar for background scrolling  */
		(function () {
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			 
			} else {
				$(window).stellar({
					horizontalScrolling: false,
					responsive: true
				});
			}
		}());
		/* End Stellar for background scrolling  */
		</script>
                <script type="text/javascript">
                    $(function() {
                        $(document).on('click', function(){ 
                        $('.navbar-collapse').removeClass('in')
                        });
                    });
                </script>
                <script type="text/javascript">
                 
                </script>
  </body>
</html>