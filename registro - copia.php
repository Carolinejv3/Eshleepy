<?php session_start(); include "conex.php";
require_once 'Mobile_Detect.php'; 
$detect = new Mobile_Detect(); 
$texto=array();$ix=1;
if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }



        $query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}
$informativos=mysqli_fetch_array(mysqli_query($link,"select * from _informativos where id=1"));

require_once 'config.php'; 

	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->registration( $_POST );
			if($data)$success = USER_REGISTRATION_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registro :: <?=$informativos["nombre_pagina"]?>  </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="<?=$informativos["nombre_pagina"]?>">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?=BASE_PATH?>css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="<?=BASE_PATH?>css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="<?=BASE_PATH?>customizer/customizer.min.css">
   
    <!-- Modernizr-->
    <script src="<?=BASE_PATH?>js/modernizr.min.js"></script>
		<style>
	.has-error{color:#ff0000 !important;}
.has-success{color:#78b310 !important;}
.has-error input{border:1px solid red !important;}
.has-success input{border:1px solid #78b310 !important;}

.message_success{background-color: #78b310; color:#fff;padding: 5px;}
.message_error{background-color: #e74c3c; color:#fff;padding: 5px;}
h1{font-family: Pacifico;}
</style>
  </head>
  <!-- Body-->
  <body>
   <?php  require "menu_pc.php"; ?>
	<?php  require "menu_movil.php"; ?>
    <?php  require "tolbar.php"; ?>
    <?php  require "header.php"; ?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
       <ul class="breadcrumbs" style="float:left;padding-left:10%;">
              <li><a href="<?=BASE_PATH?>"><?=$texto[3]?></a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Registro</li>
			
            </ul><br><br><br>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          
          <div class="col-md-6">
            <div class="padding-top-3x hidden-md-up"></div>
           <?php require_once 'templates/message.php';?>
            <p>Formulario de registro</p>
            <form class="row" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="register-form">
			
			<div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-fn">Tipo De Usuario</label>
                  <select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control" required>
					<option value="">Seleccione...</option>
					 <?php  $con=mysqli_query($link,"select * from tipo_usuario where estatus='si'");
                             while($row=mysqli_fetch_array($con)){?>
							 
							 <option value="<?=$row["id"]?>"><?=$row["tipo_".$_SESSION["idioma"].""]?></option>
							 
							 <?php }
					 ?>
					</select>
                </div>
              </div>
			
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn"> Nombres/Apellidos</label>
                  <input class="form-control" type="text" id="reg-fn" name="name" id="name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Cedula/Id/Pasaporte</label>
                  <input class="form-control" type="text" name="social_id" id="social_id" required>
                </div>
              </div>
			    <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-ln">Nacionalidad</label>
                  <input class="form-control" type="text" name="razon_social" id="razon_social" required>
                </div>
              </div>
			   
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-email">E-mail </label>
                  <input class="form-control" name="email" id="email" type="email"  required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Teléfono Oficina</label>
                  <input class="form-control" type="text" name="telefono1" id="telefono1" required>
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Teléfono Celular</label>
                  <input class="form-control" type="text" name="telefono2" id="telefono2" required>
                </div>
              </div>
			  <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-email">Dirección</label>
                  <input class="form-control" name="direccion" id="direccion" type="text"  required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass">Password</label>
                  <input class="form-control" type="password" name="password" id="password"  required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass-confirm">Confirm Password</label>
                  <input class="form-control" type="password" name="confirm_password" id="confirm_password"  required>
                </div>
              </div>
              <div class="col-12 text-center text-sm-right">
                <button class="btn btn-primary margin-bottom-none"  type="submit" id="submit_btn">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Site Footer-->
      <?php  require "footer.php"; ?>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?=BASE_PATH?>js/vendor.min.js"></script>
    <script src="<?=BASE_PATH?>js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="<?=BASE_PATH?>customizer/customizer.min.js"></script>
  </body>
</html>