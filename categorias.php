<div class="container-fluid px-0">
        <div class="row mx-0">
		
		
		<?php  $query=mysqli_query($link,"select * from categorias where estatus='si' order by orden ASC");
                while($row=mysqli_fetch_assoc($query)){?>
				
				<!-- Category-->
          <div class="category-card col-md-6 col-sm-12 fw-section padding-top-7x padding-bottom-7x" style="background-image: url(<?=BASE_PATH?>images/<?=$row["foto"]?>);"><span class="overlay" style="background-color: #000; opacity: .5;"></span>
            <div class="d-flex justify-content-center">
              <div class="px-3 text-center">
                <h2 class="display-4 text-white text-shadow"><?=$row["nombre_".$_SESSION["idioma"].""]?></h2>
                
                <div class="view-button"><a class="btn btn-primary" href="<?=BASE_PATH?>category/<?=url($row["nombre_".$_SESSION["idioma"].""])?>"><?=$texto[5]?></a></div>
              </div>
            </div>
          </div>
          <!-- Category-->
				
				<?php } 

		?>
        
        
        </div>
       
      </div>