<?php
    include "config.php";
    error_reporting(E_ALL);
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: admin.php");
    }       
    $mail = $_SESSION['user_name'];
    $query2 = "SELECT nombre FROM Users WHERE user='$mail'";
    $res = mysqli_query($mysqli, $query2);
    $mysqli->close(); //cerramos la conexió
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Editar Galería</title>
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
	   <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">

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
                            <a class="brand" href="Home.php"><span>The Wedding Factory</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">


						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> 
                                                                <?php echo $row['nombre']; ?>
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
						
                                           	
                                            <li class="active"><a href="salon.php"><i class="icon-edit"></i><span class="hidden-tablet">Galerías</span></a></li>
                                            <li><a href="images.php"><i class="icon-upload-alt"></i><span class="hidden-tablet"> Subir Imagenes</span></a></li>
					    <li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Ver Imagenes</span></a></li>
						
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
				<li><i class="icon-calendar"></i><a href="salon.php">&nbsp;Editar Galería</a></li>
			</ul>
                            <?php
include "config.php";

error_reporting(E_ALL);

  
if (isset($_GET['u'])):
    if (isset($_POST['bts'])):
        $stmt = $mysqli2->prepare("UPDATE galery SET title_galery=?, short_description=?,status=?,modification_date=? WHERE id_galery=?");
        $stmt->bind_param('sssss', $title, $short_decription,$status_galery, $modification_date,$id_galery);
        $title = $_POST['title_galery'];
        $short_decription = $_POST['short_desc'];
       
        $status_galery = $_POST['status'];
        $modification_date = $_POST['modification_date'];
       
        $id_galery = $_POST['id_galery'];
        if ($stmt->execute()):
            echo "<script>location.href='galeries.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
    $res = $mysqli2->query("SELECT * FROM galery WHERE id_galery=" . $_GET['u']);
    $row = $res->fetch_assoc();
    $mysqli2->close();
endif;
?>
<p><br/></p>
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="form" method="post" class="form-horizontal">
                <input type="hidden" value="<?php echo $row['id_galery'] ?>" name="id_galery"/>
                <div class="control-group col-sm-5 mar-top40">
                    <label class="control-label" for="title_galery">Nombre de la Galería: </label>
		    <div class="controls">
		        <input class="input-xlarge focused" id="title_galery" type="text" value="<?php echo $row['title_galery'] ?>"
                        name="title_galery">
		    </div>
                </div>
                <div class="control-group col-sm-5 mar-top41">
                    <label class="control-label" for="short_desc">Descripción:</label>
		    <div class="controls">
		        <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['short_description'] ?>"
                               id="short_desc" name="short_desc">
		    </div>
                </div>
                
                <div class="control-group col-sm-5 mar-top41">
		<label class="control-label" for="selectError">Estatus:</label>
		<div class="controls">
                     <?php if ($row['status'] == 'true') { ?>
                            <select id="selectError" data-rel="chosen" name="status">
                                <option value="true"><?php echo 'Activo' ?></option>
                                <option value="false">Inactivo</option>
                            </select>
                        <?php } else {?>
                        <select id="selectError" data-rel="chosen" name="status">
                            <option value="false"><?php echo 'Inactivo' ?></option>
                            <option value="true">activo</option>
                        </select>
                         <?php } ?>
		</div>
            </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="modification_date" id="tl" value="<?php echo date("Y/m/d") ?>">
                </div>
                <center>
                    <a href="galeries.php" class="btn btn-primary btn-md center-block mar-right"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span><i class="icon-arrow-left"></i>&nbsp;Regresar</a>
                    <button type="submit" name="bts" class="btn btn-success"><i class="icon-refresh"></i>&nbsp;Guardar Cambios</button>
                </center>
            </form>
        </div>

		
			

                        </div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
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
	<!-- end: JavaScript-->
	
</body>
</html>
