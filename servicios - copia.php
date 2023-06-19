 <!-- Services-->
      <section class="container padding-top-3x padding-bottom-2x">
        <div class="row">
		
		
		<?php  $query=mysqli_query($link,"select * from servicios where estatus='si' order by orden ASC");
               while($row=mysqli_fetch_assoc($query)){?>
			    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="<?=BASE_PATH?>images/<?=$row["foto"]?>" alt="Shipping">
            <h6><?=$row["nombre_".$_SESSION["idioma"].""]?></h6>
           
          </div>
			   
 <?php }  ?>
		
       
        </div>
      </section>
      