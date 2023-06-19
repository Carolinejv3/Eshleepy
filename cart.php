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


if(isset($_POST["act"])){
		//recorro el carrito
	$carrito=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");
	while($tut=mysqli_fetch_array($carrito)){
		mysqli_query($link,"update _carrito set cantidad=".$_POST["cantidad".$tut["id"]]." where id=".$tut["id"]."");
	}
}

if(isset($_GET["eliminar"])){
 mysqli_query($link,"delete from  _carrito where id=".$_GET["eliminar"]."  and aux=".$_SESSION["aux"]." ");
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cart :: <?=$informativos["nombre_pagina"]?>  </title>
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
    <?php  require "modal_sidebar.php"; ?>
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
              <li>Cart</li>
            </ul><br><br><br>
			
			
<?php
if(isset($_POST["act"])){
		//recorro el carrito
	$carrito=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");
	while($tut=mysqli_fetch_array($carrito)){
		mysqli_query($link,"update _carrito set cantidad=".$_POST["cantidad".$tut["id"]]." where id=".$tut["id"]."");
	}?>
<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-help"></i>&nbsp;&nbsp;  <?=$texto[27]?></div>	
<?php
}

if(isset($_GET["eliminar"])){
 mysqli_query($link,"delete from  _carrito where id=".$_GET["eliminar"]."  and aux=".$_SESSION["aux"]." ");?>
 <div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-help"></i>&nbsp;&nbsp;  <?=$texto[27]?></div>
 <?php 
 }

?>			
			
			
			
			
			
			
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <!-- Alert-->
        
        <!-- Shopping Cart-->
		 <form action="" method="post">
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th><?=$texto[28]?></th>
                <th class="text-center"><?=$texto[29]?></th>
                <th class="text-center">Subtotal</th>
                
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
			
			
			<?php  $ptotal=0;
			         $carrito=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");
					  if(!$carrito){}else{$filas=mysqli_num_rows($carrito);
					 
						while($rr=mysqli_fetch_assoc($carrito)){
                         $product=mysqli_fetch_assoc(mysqli_query($link,"select * from productos where id=".$rr["id_producto"].""));
						 $foto=consultar("select foto from productos_imagenes where id_producto=".$product["id"]." order by orden ASC limit 0,1",$link); 
						 $ptotal=$rr["cantidad"]*$rr["precio"];
						 
					 
$categorias=consultar("select nombre_".$_SESSION["idioma"]." from categorias where id=".$product["id_categoria"]."",$link);
$marcas=consultar("select nombre_".$_SESSION["idioma"]." from marcas where id=".$product["id_marca"]."",$link);
$tipo=consultar("select nombre_".$_SESSION["idioma"]." from tipo where id=".$product["id_tipo"]."",$link);
$modelo=consultar("select nombre_".$_SESSION["idioma"]." from modelo where id=".$product["id_modelo"]."",$link);

$tallas=consultar("select nombre_".$_SESSION["idioma"]." from tallas where id=".$rr["id_talla"]."",$link);

//consultar de ese producto cuanto me queda

$stock=consultar("select stock_actual from productos_tallas where id_talla=".$rr["id_talla"]."  and id_producto=".$product["id"]."",$link)

?>
			 <tr>
                <td>
                  <div class="product-item"><a class="product-thumb" href="<?=BASE_PATH?>detail/<?=url($product["nombre_".$_SESSION["idioma"].""])?>/<?=$product["id"]?>">
				  <img src="/images/<?=$foto?>" alt="<?=$product["nombre_".$_SESSION["idioma"].""]?>"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="<?=BASE_PATH?>detail/<?=url($product["nombre_".$_SESSION["idioma"].""])?>/<?=$product["id"]?>">
					  <?=ucfirst(strtolower($product["nombre_".$_SESSION["idioma"].""]))?></a></h4>
					  
					  <span><em><?=$texto[1]?>:</em> <?=$categorias?></span>
					  <span><em><?=$texto[21]?>:</em> <?=$marcas?></span>
					  <span><em><?=$texto[22]?>:</em> <?=$tipo?></span>
					  <span><em><?=$texto[23]?>:</em> <?=$modelo?></span>
					  
					  <span><em><?=$texto[11]?>:</em> <b><?=$tallas?></b></span>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="count-input">
                    <select class="form-control" name="cantidad<?=$rr["id"]?>">
<?php   for($i=1;$i<=$stock;$i++){?>
				  
				  <option <?php  if($rr["cantidad"]==$i){echo "selected";} ?> value="<?=$i?>"><?=$i?></option>
<?php } ?>
                    </select>
                  </div>
                </td>
                <td class="text-center text-lg text-medium"><?=$informativos["moneda"]?> <?=fprecios($ptotal)?></td>
                 
<td class="text-center"><a class="remove-from-cart" href="<?=BASE_PATH?>cart.php?eliminar=<?=$rr["id"]?>" data-toggle="tooltip" title="Item Removido"><i class="icon-cross"></i></a></td>
              </tr>
			
			<?php }}  ?>
             
			  
			  
             
             
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
         
          <div class="column text-lg">Total: <span class="text-medium"><?=$informativos["moneda"]?> <?=fprecios($total_final=consultar("SELECT sum(cantidad*precio) as total FROM `_carrito` WHERE aux=".$_SESSION["aux"]."",$link))?></span></div>
        </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="<?=BASE_PATH?>category/colecciones"><i class="icon-arrow-left"></i>&nbsp;<?=$texto[30]?></a></div>
          <div class="column">
		  
		  
		  <input type="submit" name="act" class="btn btn-primary" name="update-cart" value="<?=$texto[31]?>">
		  <?php  if(isset($_SESSION["logged_in"])){?> 
		  <a class="btn btn-success" href="<?=BASE_PATH?>checkout-address.php">Checkout</a></div>
		  <?php }else{?>
		  <a class="btn btn-warning" href="<?=BASE_PATH?>login.php">DEBE INICIAR SESIÓN</a></div>
		  <?php }  ?>
        </div>
		
		</form>
		
		 
		
        <!-- Related Products Carousel-->
     
	 <?php  require "productos_destacados.php"; ?>
	 
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