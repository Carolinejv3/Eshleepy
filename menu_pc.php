  <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title"><?=$texto[1]?></h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
		
			
<?php $query=mysqli_query($link,"select * from categorias where estatus='si' order by orden ASC");
               while($row=mysqli_fetch_assoc($query)){?>	
		
		
		
        <li ><span><a href="<?=BASE_PATH?>category/<?=url($row["nombre_".$_SESSION["idioma"].""])?>"><?=$row["nombre_".$_SESSION["idioma"].""]?></a><span class="sub-menu-toggle"></span></span> </li>
		  
		

           
  <?php   }  ?>           
       </li>      
		  
		  
		 
		 </ul> 
		  
		 
        </ul>
      </nav>
    </div>
    