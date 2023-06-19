<?php session_start(); include "conex.php";require_once 'config.php';
require_once 'Mobile_Detect.php'; 
$detect = new Mobile_Detect(); 
$texto=array();$ix=1;
if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }

$RUTA="users/";

        $query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}
$informativos=mysqli_fetch_array(mysqli_query($link,"select * from _informativos where id=1"));


if(!isset($_SESSION["logged_in"])){?>
	<script>alert("Debe iniciar Sesion"); window.location='/';</script>
<?php 	 }  ?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Datos Bancarios :: <?=$informativos["nombre_pagina"]?>  </title>
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
	.hide{display:none!important}
	
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
  <!-- Open Ticket Modal-->
    <div class="modal fade" id="orderDetails" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalpagoresumen">
          
        </div>
      </div>
    </div>
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
              <li>Datos Bancarios</li>
			
            </ul><br><br><br>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
	   
	  
	  
        <div class="row">
          <div class="col-lg-4">
            <aside class="user-info-wrapper">
			

			
			
			<div class="user-cover" style="background-image: url(<?=BASE_PATH?>img/account/user-cover-img.jpg);">
			
              
			  
			  
			  
			  
			  <?php  $tipouser=consultar("select tipo_".$_SESSION["idioma"]." from tipo_usuario where id=".$_SESSION["id_tipo_usuario"]."",$link); ?>	
			  
			  
			  
			  
			  
                <div class="info-label" data-toggle="tooltip" title=""><?=$tipouser?></div>
              </div>
              <div class="user-info">
                <div class="user-avatar"><a class="edit-avatar" href="#"></a>
				
				<?php

if($_SESSION["picture"]==""){
							
							 echo '<img src="img/account/user-ava.jpg" alt="User"></div>';  
							
						}else{?><img src="<?=BASE_PATH?>users/<?=$_SESSION["picture"]?>" alt="User"></div>
							  
<?php 	}  ?>
				
				
				
				
				
				
                <div class="user-data">
                  <h4><?php echo strtoupper($_SESSION['name']); ?></h4><span><?php echo $_SESSION['email']; ?></span>
                </div>
              </div>
            </aside>
            <nav class="list-group">
			
			<a class="list-group-item " href="<?=BASE_PATH?>perfil.php"><i class="icon-head"></i>Perfil</a>
			<a class="list-group-item with-badge " href="<?=BASE_PATH?>ordenes-compra"><i class="icon-bag"></i>Ordenes de Compra 
			<span class="badge badge-primary badge-pill">
			<?=$ordenes=consultar("SELECT count(id) as total FROM orden WHERE  id_cliente=".$_SESSION["user_id"]." and estatus != 'eliminada'",$link)?></span></a>
			<a class="list-group-item active" href="<?=BASE_PATH?>datosbancarios.php"><i class="icon-check"></i>Datos Bancarios, <?=$informativos["nombre_pagina"]?></a>
			
			
			</nav>
          </div>
          <div class="col-lg-8">
		  
		  <h4 style="color:red">Transferir o depósitar a las siguientes cuentas:</h4>
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                      
					   <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>Banco</th>
                    <th>Nro.Cuenta</th>
                    <th>A nombre de</th>
                    <th>Identificación</th>
					<th>Email</th>
					<th></th>
                  </tr>
                </thead>
                <tbody>
				
				
				
<?php $consultar=mysqli_query($link,"select * from datosbancarios  order by orden ASC");
while($row=mysqli_fetch_assoc($consultar)){
						   
?>
					   
				 <tr>
                    <td><?=$row["banco"]?></a></td>
					<td><?=$row["cuenta"]?></a></td>
					<td><?=$row["contacto"]?></a></td>
					<td><?=$row["identificacionid"]?></a></td>
					<td><?=$row["email"]?></a></td>
                </tr>	   
<?php } ?>
			 
                  
                </tbody>
              </table>
            </div>
           
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