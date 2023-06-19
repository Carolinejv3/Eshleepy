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

$query=mysqli_query($link,"select * from productos where id=".$_GET["id_det"]."");


$producto=mysqli_fetch_assoc($query);

$categorias=consultar("select nombre_".$_SESSION["idioma"]." from categorias where id=".$producto["id_categoria"]."",$link);
$marcas=consultar("select nombre_".$_SESSION["idioma"]." from marcas where id=".$producto["id_marca"]."",$link);
$tipo=consultar("select nombre_".$_SESSION["idioma"]." from tipo where id=".$producto["id_tipo"]."",$link);
$modelo=consultar("select nombre_".$_SESSION["idioma"]." from modelo where id=".$producto["id_modelo"]."",$link);
$color=consultar("select nombre_".$_SESSION["idioma"]." from color where id=".$producto["id_color"]."",$link);




//buscar todas las tallas de ese producto
$ta1="";

 
$paso1=mysqli_query($link,"select * from productos_tallas where id_producto=".$_GET["id_det"]." and estatus='si' order by id ASC");
while($sql1=mysqli_fetch_assoc($paso1)){
	 
	$ta1.=consultar("select nombre_".$_SESSION["idioma"]." from tallas where id=".$sql1["id_talla"]."",$link).",";
	
}

$ta1=substr($ta1,0,-1);


?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <title>Detalle :: <?=$informativos["nombre_pagina"]?>  </title>
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
              <li><?=$producto["nombre_".$_SESSION["idioma"].""]?></li>
            </ul><br><br><br>
          
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-6">
            <div class="product-gallery"><!--<span class="product-badge text-danger">30% Off</span>-->
              <div class="gallery-wrapper">
			  
			     <?php  $i=0;$qgaleria=mysqli_query($link,"select * from productos_imagenes where id_producto=".$producto["id"]." order by orden  ASC");
                        while($row=mysqli_fetch_array($qgaleria)){?>
						 <div class="gallery-item <?php  if($i==0){echo "active";}?>"><a href="<?=BASE_PATH?>images/<?=$row["foto"]?>" data-hash="<?=$row["id"]?>" data-size="1000x667"></a></div>
						
				<?php $i++;} ?>
			   
				
              </div>
              <div class="product-carousel owl-carousel">
			  <?php  $i=0;$qgaleria=mysqli_query($link,"select * from productos_imagenes where id_producto=".$producto["id"]." order by orden  ASC");
                        while($row=mysqli_fetch_array($qgaleria)){?>
						
						<div data-hash="<?=$row["id"]?>"><img src="<?=BASE_PATH?>images/<?=$row["foto"]?>" alt="Product"></div>
				<?php $i++;}
				 ?>
			  
                
               
              </div>
              <ul class="product-thumbnails">
			  
			   <?php  $i=0;$qgaleria=mysqli_query($link,"select * from productos_imagenes where id_producto=".$producto["id"]." order by orden  ASC");
                        while($row=mysqli_fetch_array($qgaleria)){?>
						
						<li <?php if($i==0)echo "class='active'";  ?>><a href="#<?=$row["id"]?>"><img src="<?=BASE_PATH?>images/<?=$row["foto"]?>" alt="Product"></a></li>
				<?php $i++;}
				 ?>
			  
			  
              
              </ul>
            </div>
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
             

            <h2 class="padding-top-1x text-normal"><?=ucfirst(strtolower($producto["nombre_".$_SESSION["idioma"].""]))?>
			
			<div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                    </div>
			
			
			</h2>
			<span class="h2 d-block">
             <?=$informativos["moneda"]?> <?=fprecios($producto["precio"])?></span>
            <p><?=getSubString2($producto["descripcion_".$_SESSION["idioma"].""])?><a href="#details" class="scroll-to">Más información</a></p>
			
            <div class="row margin-top-1x">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="size"><?=$categorias?> <?=$texto[11]?></label>
				  
<script language="javascript" type="text/javascript">

function consultar_disponibilidad(valor) {                              

var size=$('#size').val();
 
$('#btn911').html('Consultando Disponibilidad');
//$('#cantidad').html('<option>Espere por favor...</option>');

var data = {  'size'   : size , 'valor':valor};

 
$.ajax({ type: 'POST',  dataType: 'text',  url: '../../consultar_disponibilidad.php', data: data, success: function(text){ $('#btn911').html(text);  }
 
});
 
}



</script>			  
				  
<select class="form-control" id="size" name="size" onchange="return consultar_disponibilidad(<?=$_GET["id_det"]?>);">
  <option value="">Seleccione opcion</option>                  
<?php 
$paso2=mysqli_query($link,"select * from productos_tallas where id_producto=".$_GET["id_det"]." and estatus='si' order by id ASC");

while($sql2=mysqli_fetch_assoc($paso2)){
	 
	$tallas=consultar("select nombre_".$_SESSION["idioma"]." from tallas where id=".$sql2["id_talla"]."",$link);
	
?>
                    <option value="<?=$sql2["id_talla"]?>"><?=$tallas?></option>
<?php  }  ?>          
</select>
                </div>
              </div>
			  
			  
			  
			  
			  
			  
            <div id="btn911"> 
              <div class="col-sm-12" >
			   <div class="row">
             <div class="col-md-4">
						  
							<div class="form-group">
							  <label for="quantity"><?=$texto[19]?></label>
							   
							  <select class="form-control" id="quantity" name="cantidad">
							   
							  <option value="0">1</option>
							  
							  </select>
							  
							</div>
				
				</div>
				<div class="col-md-8"><br>
				<button  disabled class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Producto"  onclick=""><i class="icon-bag"></i><?=$texto[17]?> </button>
              </div> </div>
			   </div>
			 
			  
			  </div>
			  <input type="hidden" name="id" id="id" value="<?=$producto["id"]?>">
				  <input type="hidden" name="precio" id="precio" value="<?=$producto["precio"]?>">
            </div>
			
			<div class="pt-1 mb-2"><span class="text-medium"><?=$texto[21]?>:</span> <?=$marcas?></div>
            <div class="pt-1 mb-2"><span class="text-medium"><?=$texto[22]?>:</span> <?=$tipo?></div>
			<div class="pt-1 mb-2"><span class="text-medium"><?=$texto[23]?>:</span> <?=$modelo?></div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium"><?=$texto[1]?>:&nbsp;</span><a class="navi-link" href="#"><?=$categorias?></a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="entry-share mt-2 mb-2"><span class="text-muted"><?=$texto[24]?>:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>
             
            </div>
          </div>
        </div>
		
		
		
		
		
		
		
		
		<br><br>
		
		
		
		
		
		
		
		<div class="bg-secondary padding-top-3x padding-bottom-2x mb-3" id="details">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3 class="h4">Detalles</h3>
            <p class="mb-4"><?=$producto["descripcion_".$_SESSION["idioma"].""]?></p>
            
          </div>
          <div class="col-md-6">
            <h3 class="h4">Caracteristicas</h3>
            <ul class="list-unstyled mb-4">
              <li><strong>Peso:</strong> <?=$producto["peso"]?></li>
              <li><strong>Dimensiones:</strong><?=$producto["dimensiones"]?></li>
              <li><strong>Talla(s):</strong> <?=$ta1?></li>
              <li><strong>Marca:</strong> <?=$marcas?></li>
              <li><strong>Color:</strong> <?=$color?></li>
            </ul>
            
           
          </div>
        </div>
      </div>
    </div>
		
		
		
		
		
		
		
		
		
		 
		
        <!-- Product Tabs-->
       <br><br>
        <!-- Related Products Carousel-->
        <?php require "productos_relacionados.php";?>
      <!-- Site Footer-->
     <?php  require "footer.php"; ?>
    </div>
    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
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