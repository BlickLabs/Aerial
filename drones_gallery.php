<?php
  include "config.php";
  error_reporting(E_ALL);
  session_start();
  if (!isset($_SESSION['user_name'])) {
      header("Location: admin.php");
  }
  $mail = $_SESSION['user_name'];
  $query3 = "SELECT nombre FROM Users WHERE user='$mail'";
  $res3 = mysqli_query($mysqli3, $query3);
  $mysqli3->close(); //cerramos la conexió
  $num_row3 = mysqli_num_rows($res3);
  $row3 = mysqli_fetch_array($res3);
  $myuser=$row3['nombre'];
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Galería Por Drones</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    <!-- start: CSS -->
    <link id="bootstrap-style" href="css_template/bootstrap.min.css" rel="stylesheet">
    <link href="css_template/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css_template/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css_lightbox/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="css_template/style_common.css" />
    <link rel="stylesheet" type="text/css" href="css_template/style1.css" />
    <link id="base-style-responsive" href="css_template/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    <link rel="shortcut icon" href="images/logo_gris.png">
  </head>
  <body>
    <!-- start: Header -->
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.html">
            <span>
              <h2><img src="images/logo_blanco.png" style="height: 60px"></h2>
            </span>
          </a>
          <!-- start: Header Menu -->
          <div class="nav-no-collapse header-nav">
            <ul class="nav pull-right">
              <!-- start: User Dropdown -->
              <li class="dropdown">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="halflings-icon white user"></i>
                <?php echo $myuser ?>
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-menu-title">
                    <span>Opciones</span>
                  </li>
                  <li><a href="logout.php?logout"><i class="halflings-icon off"></i> Cerrar Sesión</a></li>
                </ul>
              </li>
              <!-- end: User Dropdown -->
            </ul>
          </div>
          <!-- end: Header Menu -->
        </div>
      </div>
    </div>
    <!-- start: Header -->
    <div class="container-fluid-full">
      <div class="row-fluid">
        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
          <div class="nav-collapse sidebar-nav">
            <ul class="nav nav-tabs nav-stacked main-menu">
              <li><a href="images.php"><i class="icon-upload-alt"></i><span class="hidden-tablet">&nbsp;Subir Imagenes</span></a></li>
              <li><a href="drones_gallery.php"><i class="icon-upload-alt"></i><span class="hidden-tablet">&nbsp;Galería Por Drones</span></a></li>
              <li><a href="categories_gallery.php"><i class="icon-upload-alt"></i><span class="hidden-tablet">&nbsp;Galería Por Categorías</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end: Main Menu -->
      <noscript>
        <div class="alert alert-block span10">
          <h4 class="alert-heading">Warning!</h4>
          <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
      </noscript>
      <!-- start: Content -->
      <div id="content" class="span10">
        <ul class="breadcrumb">
          <li>
            <i class="icon-home"></i>
            <a href="principal.php">Home</a>
            <i class="icon-angle-right"></i>
          </li>
          <li><a href="#">Galería Por Drones</a></li>
        </ul>
        <?php
          include "config.php";
          error_reporting(E_ALL);
          $res = $mysqli->query("SELECT DISTINCT drone FROM Images");
          $mysqli->close();
          while ($row = $res->fetch_assoc()){
              $drone=$row['drone'];
          ?>
        <div class="row-fluid sortable">
          <div class="box span12">
            <div class="box-header" data-original-title>
              <h2><i class="halflings-icon white picture"></i><span class="break">&nbsp;<?php echo $row['drone'] ?></span></h2>
              <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
              </div>
            </div>
            <div class="box-content">
              <div class="masonry-gallery">
                <?php
                  $res2 = $mysqli2->query("SELECT * FROM Images WHERE drone='$drone'");
                  while ($row2 = $res2->fetch_assoc()) {
                    $path2= 'php/album/' . $row2['file'];
                  ?>
                <div class="masonry-thumb view view-first">
                  <img class="example-image" src="<?php echo $path2= 'php/album/' . $row2['file'];?>" />
                  <div class="mask">
                    <h2><?php echo $row2['title']?></h2>
                    <p><?php echo $row2['id']?></p>
                    <a button type="button" href="#<?php echo $row2['id'] ?>" data-toggle="modal" class="btn btn-danger"  > <i class="icon-trash"></i> Eliminar</a>
                    <a button type="button" href="<?php echo $path2= 'php/album/' . $row2['file'];?>" class="example-image-link btn btn-primary"  data-lightbox="example-set" ><i class="icon-zoom-in"></i> Zoom</a>
                    <a class="btn btn-lg btn-success mar-toptable" href="update_photo.php?u=<?php echo $row2['id'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                  </div>
                  <div class="modal fade" id="<?php echo $row2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Atención</h4>
                        </div>
                        <div class="modal-body">
                          <h3>¿Estas seguro de eliminar el contenido?</h3>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-ban-circle"></i>&nbsp;Cerrrar</button>
                          <a href="Delete_Photo.php?d=<?php echo $row2['id']?>&f=<?php echo $row2['file']?>"><button type="button" class="btn btn-success"><i class="icon-ok"></i>Aceptar</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php	}	?>
              </div>
            </div>
          </div>
        </div>
        <?php	}	?>
      </div>
    </div>
    <div class="modal hide fade" id="myModal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
      </div>
      <div class="modal-body">
        <p>Here settings can be configured...</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div>
    <div class="clearfix"></div>
    <footer>
      <p>
        <span style="text-align:left;float:left">&copy; 2016 <a >Blick</a></span>
      </p>
    </footer>
    <!-- start: JavaScript-->
    <script src="js_template/jquery-1.9.1.min.js"></script>
    <script src="js_template/jquery-migrate-1.0.0.min.js"></script>
    <script src="js_template/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="js_template/jquery.ui.touch-punch.js"></script>
    <script src="js_template/modernizr.js"></script>
    <script src="js_template/bootstrap.min.js"></script>
    <script src="js_template/jquery.cookie.js"></script>
    <script src='js_template/fullcalendar.min.js'></script>
    <script src='js_template/jquery.dataTables.min.js'></script>
    <script src="js_template/excanvas.js"></script>
    <script src="js_template/jquery.flot.js"></script>
    <script src="js_template/jquery.flot.pie.js"></script>
    <script src="js_template/jquery.flot.stack.js"></script>
    <script src="js_template/jquery.flot.resize.min.js"></script>
    <script src="js_template/jquery.chosen.min.js"></script>
    <script src="js_template/jquery.uniform.min.js"></script>
    <script src="js_template/jquery.cleditor.min.js"></script>
    <script src="js_template/jquery.noty.js"></script>
    <script src="js_template/jquery.elfinder.min.js"></script>
    <script src="js_template/jquery.raty.min.js"></script>
    <script src="js_template/jquery.iphone.toggle.js"></script>
    <script src="js_template/jquery.uploadify-3.1.min.js"></script>
    <script src="js_template/jquery.gritter.min.js"></script>
    <script src="js_template/jquery.imagesloaded.js"></script>
    <script src="js_template/jquery.masonry.min.js"></script>
    <script src="js_template/jquery.knob.modified.js"></script>
    <script src="js_template/jquery.sparkline.min.js"></script>
    <script src="js_template/counter.js"></script>
    <script src="js_template/retina.js"></script>
    <script src="js_template/custom.js"></script>
    <script src="js_lighbox/lightbox.js"></script>
    <!-- end: JavaScript-->
  </body>
</html>
