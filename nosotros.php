<?php  if($_SESSION["idioma"]=="es"){ ?>

<section class="container padding-top-3x padding-bottom-3x">
       
        <div class=" cols-6">
         <h3 class=" ">Nosotros</h3>
          <p style="font-size:17px;text-align:justyfied"><?=$informativos["nosotros"]?></p>
          
        </div>
		<br><br>
		<div class=" cols-3 ">
         
         <h3 class=" ">Misión</h3> 
		 <p style="font-size:17px;text-align:justyfied"><?=$informativos["mision"]?> </p>
          
        </div>
		
		<div class=" cols-3 ">
         <h3 class=" ">Visión</h3>
                <p style="font-size:17px;text-align:justyfied"><?=$informativos["vision"]?></p>
          
        </div>
        
      </section>
	  
<?php  }else{?>

<section class="container padding-top-3x padding-bottom-3x">
       
        <div class=" cols-6 ">
         <h3 class=" ">About Us</h3>
           <p style="font-size:17px;text-align:justyfied"><?=$informativos["nosotros"]?></p>
          
        </div>
		<br><br>
		<div class=" cols-3 ">
         
         <h3 class=" ">Mision</h3> 
		 <p style="font-size:17px;text-align:justyfied"><?=$informativos["mision"]?> </p>
          
        </div>
		
		<div class=" cols-3 ">
         <h3 class="">View</h3>
                <p style="font-size:17px;text-align:justyfied"><?=$informativos["vision"]?></p>
          
        </div>
        
      </section>

<?php } ?>