<div class="topbar">
      <div class="topbar-column">
	  <a class="hidden-md-down" href="mailto:<?=$informativos["correo1"]?>"><i class="icon-mail"></i>&nbsp; <?=$informativos["correo1"]?> / <?=$informativos["correo2"]?></a>
	 
	  <a class="hidden-md-down" href="tel:<?=$informativos["telefono1"]?>"><i class="icon-bell"></i>&nbsp; <?=$informativos["telefono1"]?></a>
	   
	  
	  
	  <a class="social-button sb-facebook shape-none sb-dark" href="<?=$informativos["facebook"]?>" target="_blank"><i class="socicon-facebook"></i></a>
	  <a class="social-button sb-twitter shape-none sb-dark" href="<?=$informativos["twitter"]?>" target="_blank"><i class="socicon-twitter"></i></a>
	  <a class="social-button sb-instagram shape-none sb-dark" href="<?=$informativos["instagram"]?>" target="_blank"><i class="socicon-instagram"></i></a>
	  
	  
	  
      </div>
      <div class="topbar-column"><!--<a class="hidden-md-down" href="#"><i class="icon-download"></i>&nbsp; Get mobile app</a>-->
        <div class="lang-currency-switcher-wrap">
		
		
		
          <div class="lang-currency-switcher dropdown-toggle"><span class="language">
		  
		  
		  
		  <?php if($_SESSION["idioma"]=="es"){?>
		  <img alt="Español" src="<?=BASE_PATH?>img/flags/español.png"></span><span class="currency"><?=$texto[2]?></span>
		  <?php }else{?>
		  <img alt="English" src="<?=BASE_PATH?>img/flags/GB.png"></span><span class="currency"><?=$texto[2]?></span>
		  <?php }  ?>
		  </div>
		  
		  
		  
          <div class="dropdown-menu">
            <div class="currency-select">
			
			<form action="<?=BASE_PATH?>" method="get">
              <select name="idioma" class="form-control form-control-rounded form-control-sm" onchange="submit();">
                <option <?php  if($_SESSION["idioma"]=="es"){echo "selected";} ?> value="es">Español</option>
                <option <?php  if($_SESSION["idioma"]=="en"){echo "selected";} ?> value="en">Inglés</option>

              </select>
			  
			  </form>
            </div>
          </div>
        </div>
      </div>
    </div>