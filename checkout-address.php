<?php session_start(); include "conex.php";
if(!isset($_SESSION["logged_in"])){?> 
<script>window.location="/";</script>
<?php }
require_once 'Mobile_Detect.php'; 
$detect = new Mobile_Detect(); 
$texto=array();$ix=1;
if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }


        $query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}
$informativos=mysqli_fetch_array(mysqli_query($link,"select * from _informativos where id=1"));

?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Checkout 1 :: <?=$informativos["nombre_pagina"]?>  </title>
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
              <li>Checkout</li>
			
            </ul><br><br><br>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
            <div class="checkout-steps">
			<a >4. Crear pedido</a>
			<a ><span class="angle"></span>3. Resumen Compra</a>
			<a ><span class="angle"></span>2. Método Envío</a>
			<a class="active" href="<?=BASE_PATH?>checkout-address.php"><span class="angle"></span>1. Datos Básicos</a>
			</div>
            <h4>Datos Básicos</h4>
            <hr class="padding-bottom-1x">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="checkout-fn">Nombres/Apellidos</label>
                  <input class="form-control" disabled type="text" value="<?=$_SESSION["name"]?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-ln">Cedula/Pasaporte/id:</label>
                  <input class="form-control"  disabled type="text" value="<?=$_SESSION["social_id"]?>">
                </div>
              </div>
             
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-email">Nacionalidad</label>
                  <input class="form-control"  disabled type="text" value="<?=$_SESSION["razon_social"]?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone">Email</label>
                  <input class="form-control"  disabled type="text" value="<?=$_SESSION["email"]?>">
                </div>
              </div>
             
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-company">Teléfono Oficina</label>
                  <input class="form-control"  disabled type="text" value="<?=$_SESSION["telefono1"]?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-country">Teléfono Celular</label>
                  <input class="form-control"  disabled type="text" value="<?=$_SESSION["telefono2"]?>">
                </div>
              </div>
             
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="checkout-city">Dirección</label>
                  <input class="form-control"  disabled type="text" value="<?=$_SESSION["direccion"]?>">
                </div>
              </div>
             
            </div>
           
           
            
            
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="<?=BASE_PATH?>cart.php"><i class="icon-arrow-left"></i><span class="">&nbsp;Regresar</span></a></div>
			  
			  
			  
			  <?php  if($total_final=consultar("SELECT sum(cantidad*precio) as total FROM `_carrito` WHERE aux=".$_SESSION["aux"]."",$link)==0){?>
			   <div class="column"><a class="btn btn-warning" href="<?=BASE_PATH?>category/colecciones"><span class="">No Hay items en el carrito</a></div>
			  <?php 
			  }else{?>
			   <div class="column"><a class="btn btn-primary" href="<?=BASE_PATH?>checkout-shipping.php"><span class="">Continuar&nbsp;</span></a></div>
			  
			  <?php } ?>
			  
             
			  
			  
			  
			  
            </div>
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Order Summary Widget-->
              <section class="widget widget-order-summary">
                <h3 class="widget-title">Order Summary</h3>
                <table class="table">
				
				
                  
                  <tr>
                    <td>TOTAL</td>
                    <td class="text-lg text-medium"><?=$informativos["moneda"]?> <?=fprecios($total_final=consultar("SELECT sum(cantidad*precio) as total FROM `_carrito` WHERE aux=".$_SESSION["aux"]."",$link))?></td>
                  </tr>
                </table>
              </section>
              
              
             
            </aside>
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