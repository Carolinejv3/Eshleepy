<!-- Shop Filters Modal-->
    <div class="modal fade" id="modalShopFilters" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?=$texto[1]?></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
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
           
          </div>
        </div>
      </div>
    </div>
    