<div class="col-xl-3 col-lg-4 order-lg-1">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
            <aside class="sidebar sidebar-offcanvas">
              <!-- Widget Categories-->
              <section class="widget widget-categories">
			  
			 
			  
                <h3 class="widget-title"><?=$texto[1]?></h3>
                <ul>
				
<?php  $query=mysqli_query($link,"select * from categorias where estatus='si' order by orden ASC");
               while($row=mysqli_fetch_assoc($query)){?>
				
				
				
                  <li class=" "><a style="cursor:pointer" href="<?=BASE_PATH?>category/<?=url($row["nombre_".$_SESSION["idioma"].""])?>"><?=ucfirst(strtolower($row["nombre_".$_SESSION["idioma"].""]))?></a>
				  
				  
				  
				  
                   
				</li>  
<?php   }  ?>
                 
                </ul>
              </section>
              <!-- Widget Price Range-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Color</h3>
				 <ul>
				 <?php  $query1=mysqli_query($link,"select * from color where estatus='si' order by orden asc");
                     while($row1=mysqli_fetch_assoc($query1)){?>
                
                  <li class=" ">
                 
				  <a style="text-decoration:none" href="<?=BASE_PATH?>category/colecciones&color=<?=url($row1["nombre_".$_SESSION["idioma"].""])?>"><?=ucfirst(strtolower($row1["nombre_".$_SESSION["idioma"].""]))?></a><span></span>
                </li>  
				
				 <?php }  ?>
                </ul>
              </section>
              <!-- Widget Brand Filter-->
              <section class="widget widget-categories">
                <h3 class="widget-title"><?=$texto[15]?></h3>
				<ul>
				 <?php  $query1=mysqli_query($link,"select * from marcas where estatus='si' order by orden");
                     while($row1=mysqli_fetch_assoc($query1)){?>
                
                <li class=" "> 
                 
				  <a style="text-decoration:none" href="<?=BASE_PATH?>category/colecciones&marca=<?=url($row1["nombre_".$_SESSION["idioma"].""])?>"><?=ucfirst(strtolower($row1["nombre_".$_SESSION["idioma"].""]))?></a><span></span>
                  </li>  
				 <?php }  ?>
                 </ul>
              </section>
              <!-- 
              <section class="widget">
                <h3 class="widget-title"><?=$texto[16]?></h3>
				 <?php  $query1=mysqli_query($link,"select * from tallas where estatus='si' ");
                     while($row1=mysqli_fetch_assoc($query1)){?>
				
                <div class="custom-control custom-checkbox">
                  
<a style="text-decoration:none" href="/category/colecciones&talla=<?=url($row1["nombre_".$_SESSION["idioma"].""])?>"><?=$row1["nombre_".$_SESSION["idioma"].""]?> </a>
                </div>
				
				<?php }  ?>
				
               
              </section>-->
             
            </aside>
          </div>