<?php
  include "config.php";
  error_reporting(E_ALL);
  session_start();
  if (!isset($_SESSION['user_name'])) {
      header("Location: admin.php");
  }
  $mail = $_SESSION['user_name'];
  $query = "SELECT nombre FROM Users WHERE user='$mail'";
  $res = mysqli_query($mysqli, $query);
  $num_row = mysqli_num_rows($res);
  $row = mysqli_fetch_array($res);
  $myuser=$row['nombre'];
  // Obtenemos la imagen
  $image = $_GET['u'];
  $query2 = "SELECT * FROM Images WHERE id='$image'";
  $res2 = mysqli_query($mysqli, $query2);
  $num_row2 = mysqli_num_rows($res2);
  $row2 = mysqli_fetch_array($res2);
  $mysqli->close();
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Editar Datos de Imagen</title>
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
    <link id="base-style-responsive" href="css_template/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    <link rel="shortcut icon" href="images/logo_gris.png">
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="css_template/ie.css" rel="stylesheet">
    <![endif]-->
    <!--[if IE 9]>
    <link id="ie9style" href="css_template/ie9.css" rel="stylesheet">
    <![endif]-->
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->
    <script src="js_template/jquery-1.9.1.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/update.js"></script>
  </head>
  <body>
    <div id="cargando" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body" style="text-align: center;padding:20px">
            <h3>Actualizando</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- start: Header -->
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </a>
          <a class="brand" href="principal.php">
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
                <?php echo $myuser; ?>
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
              <li>
                <a class="dropmenu" href="Home.php"><i class="icon-tags"></i><span >Galería por Drones</span></a>
                <ul>
                  <li><a class="submenu" href="phantom_2.php"><i class="icon-tags"></i><span class="hidden-tablet">Phantom 2</span></a></li>
                  <li><a class="submenu" href="inspire.php"><i class="icon-tags"></i><span class="hidden-tablet">Inspire 1</span></a></li>
                  <li><a class="submenu" href="osmo.php"><i class="icon-tags"></i><span class="hidden-tablet">Osmo</span></a></li>
                  <li><a class="submenu" href="hexacoptero.php"><i class="icon-tags"></i><span class="hidden-tablet">Hexacoptero</span></a></li>
                </ul>
              </li>
              <li>
                <a class="dropmenu" href="gallery_by_service.php"><i class="icon-tags"></i><span >Galería por Categorias</span></a>
                <ul>
                  <li><a class="submenu" href="productoras_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Productoras</span></a></li>
                  <li><a class="submenu" href="constructoras_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Construcutoras</span></a></li>
                  <li><a class="submenu" href="eventos_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Eventos</span></a></li>
                  <li><a class="submenu" href="hoteles_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Hoteles</span></a></li>
                  <li><a class="submenu" href="gobierno_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Gobierno</span></a></li>
                  <li><a class="submenu" href="privado_gallery.php"><i class="icon-tags"></i><span class="hidden-tablet">Privado</span></a></li>
                </ul>
              </li>
            </ul>
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
              <a href="Home.php">Home</a>
              <i class="icon-angle-right"></i>
            </li>
            <li><a href="images.php">Actualizar Imagen</a></li>
          </ul>
          <p><br/></p>
          <div class="panel panel-default">
            <div class="panel-body">
              <form id="update" class="form-horizontal">
                <input type="hidden" value="<?php echo $row2['id'] ?>" name="id" id="id"/>
                <div class="control-group col-sm-7 mar-top40">
                  <label class="control-label" for="focusedInput">Titulo De la Imagen: </label>
                  <div class="controls">
                    <input class="input-xlarge focused" id="title" type="text" value="<?php echo $row2['title'] ?>"
                      id="title" name="title" pattern="[^'\x22]+"
                      title="este campo no acepta caracteres especiales, solo letras">
                  </div>
                </div>
                <div class="control-group  col-sm-5 mar-top41" >
                  <label class="control-label" for="selectError">Tipo De Drone:</label>
                  <div class="controls" >
                    <select class="selectpicker" id="drone" name="drone" >
                      <optgroup label="Drones">
                        <option value="Ninguno">Ninguno</option>
                        <?php
                          if ($row2['drone']=="Phantom 2") {
                        ?>
                          <option selected value="Phantom 2">Phantom 2</option>
                        <?php
                          } else {
                        ?>
                          <option value="Phantom 2">Phantom 2</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['drone']=="Inspire 1") {
                        ?>
                          <option selected value="Inspire 1">Inspire 1</option>
                        <?php
                          } else {
                        ?>
                          <option value="Inspire 1">Inspire 1</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['drone']=="Osmo") {
                        ?>
                          <option selected value="Osmo">Osmo</option>
                        <?php
                          } else {
                        ?>
                          <option value="Osmo">Osmo</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['drone']=="Hexacoptero") {
                        ?>
                          <option selected value="Hexacoptero">Hexacoptero</option>
                        <?php
                          } else {
                        ?>
                          <option value="Hexacoptero">Hexacoptero</option>
                        <?php
                          }
                        ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="control-group  col-sm-5 mar-top41" >
                  <label class="control-label" for="selectError">Categoría:</label>
                  <div class="controls" >
                    <select class="selectpicker" id="category" name="category" >
                      <optgroup label="Categorias" >
                        <?php
                          if ($row2['category']=="Productoras") {
                        ?>
                          <option selected value="Productoras">Productoras</option>
                        <?php
                          } else {
                        ?>
                          <option value="Productoras">Productoras</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['category']=="Constructoras") {
                        ?>
                          <option selected value="Constructoras">Constructoras</option>
                        <?php
                          } else {
                        ?>
                          <option value="Constructoras">Constructoras</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['category']=="Eventos") {
                        ?>
                          <option selected value="Eventos">Eventos</option>
                        <?php
                          } else {
                        ?>
                          <option value="Eventos">Eventos</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['category']=="Hoteles") {
                        ?>
                          <option selected value="Hoteles">Hoteles</option>
                        <?php
                          } else {
                        ?>
                          <option value="Hoteles">Hoteles</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['category']=="Gobierno") {
                        ?>
                          <option selected value="Gobierno">Gobierno</option>
                        <?php
                          } else {
                        ?>
                          <option value="Gobierno">Gobierno</option>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row2['category']=="Privado") {
                        ?>
                          <option selected value="Privado">Privado</option>
                        <?php
                          } else {
                        ?>
                          <option value="Privado">Privado</option>
                        <?php
                          }
                        ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="control-group  col-sm-12 mar-top41">
                  <center>
                    <a href="images.php" class="btn btn-primary btn-md center-block"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span><i class="icon-arrow-left"></i>&nbsp;Regresar</a>
                    <button type="button" id="btnSubmit" class="btn btn-success center-block"><i class="icon-refresh"></i>&nbsp;Guardar Cambios</button>
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--/.fluid-container-->
        <!-- end: Content -->
      </div>
      <!--/#content.span10-->
    </div>
    <!--/fluid-row-->
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
    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <ul class="list-inline item-details">
          <li><a href="http://themifycloud.com">Admin templates</a></li>
          <li><a href="http://themescloud.org">Bootstrap themes</a></li>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
    <footer>
      <p>
        <span style="text-align:left;float:left">&copy; 2016 <a >Blick</a></span>
      </p>
    </footer>
    <!-- start: JavaScript-->
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
    <!-- end: JavaScript-->
  </body>
</html>
