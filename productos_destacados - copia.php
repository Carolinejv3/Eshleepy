<h3 class="text-center padding-top-2x mt-2 padding-bottom-1x"><?=$texto[25]?></h3>
        <!-- Carousel-->
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
		
		<?php  $relat=mysqli_query($link,"select * from productos where  estatus='si' order by id desc limit 0,12");
		
		       while($prod=mysqli_fetch_assoc($relat)){
				   $foto=consultar("select foto from productos_imagenes where id_producto=".$prod["id"]." order by orden ASC limit 0,1",$link); 
				   ?>
			    <!-- Product-->
          <div class="grid-item">
            <div class="product-card">
             <a class="product-thumb" href="<?=BASE_PATH?>detail/<?=url($prod["nombre_".$_SESSION["idioma"].""])?>/<?=$prod["id"]?>"><img src="<?=BASE_PATH?>images/<?=$foto?>" alt="<?=$prod["nombre_".$_SESSION["idioma"].""]?>"></a>
              <h3 class="product-title"><a href=""><?=ucfirst(strtolower($prod["nombre_".$_SESSION["idioma"].""]))?></a></h3>
              <h4 class="product-price">
                <?=$informativos["moneda"]?> <?=fprecios($prod["precio"]);?>
              </h4>
              <div class="product-buttons">
                
                <a class="btn btn-outline-primary btn-sm"  href="<?=BASE_PATH?>detail/<?=url($prod["nombre_".$_SESSION["idioma"].""])?>/<?=$prod["id"]?>"><?=$texto[26]?></a>
              </div>
            </div>
          </div>
          <!-- Product-->
			   
<?php }  ?>
		
		
          
        </div>
      </div>