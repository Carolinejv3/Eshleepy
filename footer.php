 <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <!-- Contact Info-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title"><?=$texto[7]?></h3>
                <p class="text-white"><?=$texto[8]?>: <?=$informativos["telefono1"]?></p>
				
                <ul class="list-unstyled text-sm text-white">
                  <li><span class=""><?=$texto[9]?>:</span> <?=$informativos["direccion"]?></li>
                 
                </ul>
                <p><a class="navi-link-light" href="#"><?=$informativos["correo1"]?></a></p>
				<p><a class="navi-link-light" href="#"><?=$informativos["correo2"]?></a></p>
				<a class="social-button shape-circle sb-facebook sb-light-skin" href="<?=$informativos["facebook"]?>"><i class="socicon-facebook"></i></a>
				<!--<a class="social-button shape-circle sb-twitter sb-light-skin" href="<?=$informativos["twitter"]?>"><i class="socicon-twitter"></i></a>-->
				<a class="social-button shape-circle sb-instagram sb-light-skin" href="<?=$informativos["instagram"]?>"><i class="socicon-instagram"></i></a>
				
              </section>
            </div>
           
            
            <div class="col-lg-3 col-md-6">
              <!-- Account / Shipping Info-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title"><?=$texto[1]?></h3>
                <ul>
				<?php $query=mysqli_query($link,"select * from categorias where estatus='si' order by orden ASC");
               while($row=mysqli_fetch_assoc($query)){?>
                  <li><a href="<?=BASE_PATH?>category/<?=url($row["nombre_".$_SESSION["idioma"].""])?>"><?=$row["nombre_".$_SESSION["idioma"].""]?></a></li>
				  
				  <?php } ?>
                 <li><a href="<?=BASE_PATH?>contact.php">Contacto</a></li>
				 <li><a href="<?=BASE_PATH?>terminos-condiciones.php">Términos y condiciones</a></li>
                </ul>
              </section>
            </div>
          </div>
          <hr class="hr-light mt-2 margin-bottom-2x">
          <div class="row">
            <div class="col-md-7 padding-bottom-1x">
              <!-- Payment Methods-->
              <div class="margin-bottom-1x" style="max-width: 615px;"><img src="<?=BASE_PATH?>img/payment_methods.png" alt="Payment Methods">
              </div>
            </div>
            <div class="col-md-5 padding-bottom-1x">
              <div class="margin-top-1x hidden-md-up"></div>
              <!--Subscription-->
              <form class="subscribe-form" action="" method="post" target="_blank" novalidate>
                <div class="clearfix">
                  <div class="input-group input-light">
                    <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                  </div>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="" tabindex="-1">
                  </div>
                  <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                </div><span class="form-text text-sm text-white opacity-50"></span>
              </form>
            </div>
          </div>
          <!-- Copyright-->
          <p class="footer-copyright">© Todos los derechos reservados <?=$informativos["nombre_pagina"]?>. </p>
        </div>
      </footer>