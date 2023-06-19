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

?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <title>Shop :: <?=$informativos["nombre_pagina"]?>  </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="<?=$informativos["nombre_pagina"]?>">
    <meta name="keywords" content="ropa,camisas,nike,adidas,mujeres,hombres,jovenes">
    <meta name="author" content="TuPaginaOnline.com.ve">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
     <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?=BASE_PATH?>css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="<?=BASE_PATH?>css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="<?=BASE_PATH?>customizer/customizer.min.css">
   
    <!-- Modernizr-->
    <script src="/js/modernizr.min.js"></script>
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
	<?php  $tabs="";
if(isset($_GET["id"])){
	
	if($_GET["id"]=="colecciones"){
 $sql=" ";
		if(isset($_GET["marca"])){
			
		$marcas=consultar("select id from marcas where nombre_".$_SESSION["idioma"]." like '%".durl($_GET["marca"])."%' ",$link);    $sql.=" id_marca=".$marcas." and";

        $tabs='<a class="tag active" href="#">'.ucfirst(strtolower($_GET["marca"])).'</a>';
		
		}
		
		if(isset($_GET["color"])){
			
		$color=consultar("select id from color where nombre_".$_SESSION["idioma"]." like '%".durl($_GET["color"])."%' ",$link);    $sql.=" id_color=".$color." and";

        $tabs='<a class="tag active" href="#">'.ucfirst(strtolower($_GET["color"])).'</a>';
		
		}
		
		if(isset($_GET["talla"])){
			
		$color=consultar("select id from tallas where nombre_".$_SESSION["idioma"]." like '%".durl($_GET["color"])."%' ",$link);    $sql.=" id_color=".$color." and";

        $tabs='<a class="tag active" href="#">'.ucfirst(strtolower($_GET["color"])).'</a>';	
		}
		
		
		
    }else{
		
		
		$categorias=consultar("select id from categorias where nombre_".$_SESSION["idioma"]." like '%".str_replace("-", " ",$_GET["id"])."%' ",$link);    $sql=" id_categoria=".$categorias." and";
		
		$tabs.='<a class="tag active" href="#">'.ucfirst(strtolower($_GET["id"])).'</a>';
		
		if(isset($_GET["marca"])){
			
		$marcas=consultar("select id from marcas where nombre_".$_SESSION["idioma"]." like '%".durl($_GET["marca"])."%' ",$link);    $sql.=" id_marca=".$marcas." and";

        $tabs.='<a class="tag active" href="#">'.ucfirst(strtolower($_GET["marca"])).'</a>';
		
		}
		
		if(isset($_GET["color"])){
			
		$items=consultar("select id from color where id=".$_GET["color"]." ",$link);    $sql.=" id_color=".$items." and";	
		$items2=consultar("select nombre_".$_SESSION["idioma"]." from color where id=".$_GET["color"]." ",$link);    
		
		
		$tabs.='<a class="tag active" href="#">'.ucfirst(strtolower($items2)).'</a>';
		}
		
		if(isset($_GET["talla"])){
			
		$tallas=consultar("select id from tallas where id=".$_GET["talla"]." ",$link);    $sql.=" id_talla=".$tallas." and";

		$tallas2=consultar("select talla from tallas where id=".$_GET["talla"]." ",$link);    
		
		$tabs.='<a class="tag active" href="#">'.$tallas2.'</a>';		
		}
	}
	
	
	
	
	
}

if(isset($_POST["btn_price"])){
	
	$tabs.='<a class="tag active" href="#">'.$informativos["moneda"].' '.fprecios($_POST["precio1"]).' - '.fprecios($_POST["precio2"]).'</a>';	
    $sql.=" precio between ".$_POST["precio1"]." and ".$_POST["precio2"]." and ";	
	
}


$sqlSort = " order by id asc";
if(isset($_POST["sorting"])){
	
	$sqlSort='';
	
	if($_POST["sorting"]=="low"){
		$tabs.='<a class="tag active" href="#">Ordenado por precio m&aacute;s Bajo a Alto</a>';	
    $sqlSort.=" order by precio ASC";	
	}else{
		$tabs.='<a class="tag active" href="#">Ordenado por precio m&aacute;s Alto a Bajo</a>';	
    $sqlSort.=" order by precio DESC";	
	}
	
	
	
}



 ?>
      <!-- Page Title-->
       <ul class="breadcrumbs" style="float:left;padding-left:10%;">
              <li><a href="/"><?=$texto[3]?></a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Shop</li>
			
            </ul><br><br><br>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Products-->
          <div class="col-xl-9 col-lg-8 order-lg-2">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar padding-bottom-1x mb-2">
			
			<div class="column">
                Filtros Activos: <?=$tabs?>
              </div>
              <div class="column">
			  
			  
			  
                <div class="shop-sorting">
                  <label for="sorting">Ordenar por:</label>
				  <form action="" method="post">
                  <select class="form-control" id="sorting" name="sorting" onChange="this.form.submit()">
                    <option> Seleccione...</option>
                    <option value="low">Precio M&aacute;s bajo a Alto</option>
                    <option value="high">Precio M&aacute;s alto a Bajo</option>
                   
                   
                  </select>
				  </form>
                </div>
              </div>
              
            </div>
            <!-- Products Grid-->
            <div class="isotope-grid cols-3 mb-2">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>
			  

<?php 
	$conw="select * from productos where $sql estatus='si' $sqlSort";
	
			         $query=mysqli_query($link,$conw) ;
                     while($productos=mysqli_fetch_assoc($query)){
						 
					 $foto=consultar("select foto from productos_imagenes where id_producto=".$productos["id"]." order by orden ASC limit 0,1",$link); 
					 $tallas=consultar("select talla from tallas where id=".$productos["id_talla"]."",$link);
					 
?>
					 
					  <!-- Product-->
						  <div class="grid-item">
							<div class="product-card">
							  <a class="product-thumb" href="/detail/<?=url($productos["nombre_".$_SESSION["idioma"].""])?>/<?=$productos["id"]?>">
							  <img src="<?=BASE_PATH?>images/<?=$foto?>" alt="<?=$productos["nombre_".$_SESSION["idioma"].""]?>"></a>
							  
							  
							  
							  <h3 class="product-title">
							  <a href="<?=BASE_PATH?>detail/<?=url($productos["nombre_".$_SESSION["idioma"].""])?>/<?=$productos["id"]?>">
							  <?=ucfirst(strtolower($productos["nombre_".$_SESSION["idioma"].""]))?></a>
							 
							  </h3>
							  <h4 class="product-price">
								<?=$informativos["moneda"]?> <?=fprecios($productos["precio"]);?>
							  </h4>
							  <div class="product-buttons">
								<!--<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>-->
								
							
<a class="btn btn-outline-primary btn-sm" href="<?=BASE_PATH?>detail/<?=url($productos["nombre_".$_SESSION["idioma"].""])?>/<?=$productos["id"]?>"><?=$texto[26]?></a>
							  </div>
							</div>
						  </div>
					<!-- Product-->
			  <?php }   ?>
			  
			  
             
             
            </div>
            <!-- Pagination-->
           
          </div>
		  
          <!-- Sidebar          -->
          <?php  require "sidebar.php"; ?>
		  
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