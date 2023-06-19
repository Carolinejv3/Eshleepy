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


function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWUYZ';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
 return $key;
}



if(isset($_GET["crearpedido"])){
	
if(!isset($_SESSION["aux"])){?>

<script>window.location="checkout-end.php";</script>
<?php }else{
	
$codigo=generarCodigo(8);	
mysqli_query($link,"insert into orden values(NULL,NULL,'por_pagar',".$_SESSION["shipping-method"].",NOW(),NULL,".$_SESSION["user_id"].",NULL,NULL,NULL,'".$codigo."','".$_SESSION["direccion_retiro"]."','".$_SESSION["persona_retiro"]."','".$_SESSION["cedula_retiro"]."','".$_SESSION["telefono_retiro"]."') ");
$id=mysqli_insert_id($link);	
	
$consulta=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");

while($row=mysqli_fetch_assoc($consulta)){

   mysqli_query($link,"insert into orden_carrito values(NULL,".$row["id_producto"].",".$row["cantidad"].",".$row["precio"].",NOW(),".$id.",".$row["id_talla"].")");
   
   $cdes=$row["cantidad"];
   //descuento del inventario -> productos ->
   mysqli_query($link,"update productos_tallas set stock_actual=stock_actual-".$cdes." where id=".$row["id_producto"]." and id_talla=".$row["id_talla"]."");
  
}


mysqli_query($link,"delete from _carrito where aux=".$_SESSION["aux"]."");

unset($_SESSION['aux']);	
	unset($_SESSION['shipping-method']);
	unset($_SESSION['direccion_retiro']);
	unset($_SESSION['persona_retiro']);
	unset($_SESSION['cedula_retiro']);
	unset($_SESSION['telefono_retiro']);
	
	}	
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <title>Checkout 4 :: <?=$informativos["nombre_pagina"]?>  </title>
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
              <li>Checkout - Crear pedido</li>
			
            </ul><br><br><br>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="card text-center">
          <div class="card-body padding-top-2x">
            <h3 class="card-title">¡Gracias por su compra!</h3>
            
            <p class="card-text">Se ha generado una factura&nbsp;&nbsp;<span class="text-medium">Código Ref.   <b style="color:red"><?=$codigo?></b></span></p>
           
			 <p class="card-text"><div class="alert alert-info alert-dismissible fade show text-center margin-bottom-1x"><i class="icon-bell"></i>&nbsp;&nbsp;Tienes 24 Horas para reportar el pago, de lo contrario tu pedido será eliminado</div></p>
			 
			  <p class="card-text">
             Ingresa en tu perfil para <b>reportar</b> el pago.
            </p>
            <div class="padding-top-1x padding-bottom-1x">
			<a class="btn btn-outline-secondary" href="<?=BASE_PATH?>"><?=$texto[3]?></a>
			<a class="btn btn-outline-primary" href="<?=BASE_PATH?>perfil.php"><i class="icon-location"></i>&nbsp;Perfil</a></div>
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