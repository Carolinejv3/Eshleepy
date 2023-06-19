
<style>
<?php  if ( $detect->isMobile()) {?>
.site-logo {
    width: 165px;
    padding: 0px 0 0px 10px;
    text-decoration: none;
    background-color: #fff;
}
<?php  }else{?>
.site-logo {
    width: 200px;
    padding: 0px 10px 00px 10px;
    text-decoration: none;
    background-color: #fff;
}

<?php } ?> 



.whatsapp-btn{  
  position: fixed;
  left: 0;
  left: 15px;
    bottom: 30px;
	z-index:999
}
.whatsapp-btn  img {
  width: 80px  
}
</style>

<header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Buscar...">
        <div class="search-tools"><span class="clear-search">Limpiar</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
        
          <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href="<?=BASE_PATH?>"><img src="<?=BASE_PATH?>images/<?=$informativos["logo"]?>" alt=""></a>
        </div>
      </div>
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
		
		
<li <?php  if($_SERVER["REQUEST_URI"]=="/"){echo "class='active'";}else{}  ?>><a  href="<?=BASE_PATH?>" ><span><b><?=$texto[3]?></b></span></a> </li>
<li <?php  if($_SERVER["REQUEST_URI"]=="/shop.php"){echo "class='active'";}else{}  ?>><a  href="<?=BASE_PATH?>shop.php" ><span><b><?=$texto[34]?></b></span></a> </li>
	
	
	<li class="has-submenu"><a ><span><b><?=strtoupper($texto[1])?></b></span></a>
              <ul class="sub-menu">
			  <?php $query=mysqli_query($link,"select * from categorias where estatus='si' order by orden ASC");
               while($row=mysqli_fetch_assoc($query)){?>	
                  <li><a href="<?=BASE_PATH?>category/<?=url($row["nombre_".$_SESSION["idioma"].""])?>"><span><?=$row["nombre_".$_SESSION["idioma"].""]?></span></a></li>
              
               <?php  }?>
              </ul>
            </li>
	
	
 </li>
 

 
	
<li <?php  if($_SERVER["REQUEST_URI"]=="/contact.php"){echo "class='active'";}else{}  ?>><a  href="<?=BASE_PATH?>contact.php" ><span><b><?=$texto[32]?></b></span></a> </li>
		
 <li <?php  if($_SERVER["REQUEST_URI"]=="/ordenes-compra.php"){echo "class='active'";}  ?>><a href="<?=BASE_PATH?>ordenes-compra.php"><span><b><?=$texto[33]?></b></span></a> </li>
 
 <?php  if(isset($_SESSION["logged_in"])){?> 
<?php }else{?>
<li>  <a href="<?=BASE_PATH?>login.php" ><span><b>Iniciar Sesión</b></span></a></li>
<?php }  ?>
	
		
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
          <?php  if( isset($_SESSION["logged_in"])){?> 
				
				
			<div class="account">
				
			<a href=""></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-user">
                  <div class="user-ava"><img src="<?=BASE_PATH?>users/<?=$_SESSION["picture"]?>" alt="<?=$_SESSION["name"]?>">
                  </div>
                  <div class="user-info">
                    <h6 class="user-name"><?=$_SESSION["name"]?></h6> 
                  </div>
                </li>
				
				<li> <a class="" href="<?=BASE_PATH?>perfil.php" > Perfil </a></li>
               
                  <li><a href="<?=BASE_PATH?>ordenes-compra.php">Ordenes de Compra  <span class="badge badge-primary badge-pill">
			<?=$ordenes=consultar("SELECT count(id) as total FROM orden WHERE id_cliente=".$_SESSION["user_id"]." and estatus != 'eliminada'",$link)?></span></a></li>
                  
                <li class="sub-menu-separator"></li>
                <li><a href="<?=BASE_PATH?>logout.php"> <i class="icon-unlock"></i>Salir</a></li>
              </ul>
			
			  
            </div>
			 <?php } ?>  
            
            <div class="cart" id="cart">
			
			<?php
			         $carrito2=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");
                     if(!$carrito2){$t=0;}else{$t=mysqli_num_rows($carrito2);}
			?>
			
			<a href="<?=BASE_PATH?>cart.php"></a>
			<i class="icon-bag"></i><span class="count"><?=$t?></span>
			
			
              <div class="toolbar-dropdown">
			  
			  <?php  $total=0;
			         $carrito=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");
					  if(!$carrito){$total=0.00;}else{$filas=mysqli_num_rows($carrito);
					 
						while($rr=mysqli_fetch_assoc($carrito)){
                         $product=mysqli_fetch_assoc(mysqli_query($link,"select * from productos where id=".$rr["id_producto"].""));
						 $foto=consultar("select foto from productos_imagenes where id_producto=".$product["id"]." order by orden ASC limit 0,1",$link); 
						 $ptotal=$rr["cantidad"]*$rr["precio"];
						
					 $talla=consultar("select nombre_".$_SESSION["idioma"]." from tallas where id=".$rr["id_talla"]."",$link);
                     
				?>
					 
                <div class="dropdown-product-item">
				       <a class="dropdown-product-thumb" href=""><img src="<?=BASE_PATH?>images/<?=$foto?>" alt="<?=$product["nombre_".$_SESSION["idioma"].""]?>"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="" style="font-size:12px;text-transform:none"><?=$product["nombre_".$_SESSION["idioma"].""]?></a>
				  <span class="dropdown-product-details"><?=$rr["cantidad"]?> <small style="font-size:10px"><b><?=$talla?></b></small> x <?=$informativos["moneda"]?> <?=fprecios($rr["precio"])?></span></div>
                </div>
				
				
				
					  <?php }}  ?>
			  
               
			   
                <div class="toolbar-dropdown-group">
                  <div class="column"><span class="text-lg">Total:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium"><?=$informativos["moneda"]?> <?=fprecios($total_final=consultar("SELECT sum(cantidad*precio) as total FROM `_carrito` WHERE aux=".$_SESSION["aux"]."",$link))?>&nbsp;</span></div>
                </div>
				
				
				
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="<?=BASE_PATH?>cart.php" style="font-size:12px;text-transform:none"><?=$texto[4]?></a></div>
				  
				  
				  
                  <div class="column">
				   <?php  if(isset($_SESSION["logged_in"])){?> 
					  <a class="btn btn-sm btn-block btn-success" href="<?=BASE_PATH?>checkout-address.php">Checkout</a>
					  <?php }else{?>
					  <a class="btn btn-sm btn-block btn-warning" href="<?=BASE_PATH?>login.php" style="font-size:12px;text-transform:none">Iniciar Sesión</a>
					  <?php }  ?>
				  
				  </div>
				  
				  
				  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
	<a href="https://api.whatsapp.com/send?phone=+<?=$informativos["telefono1"]?>&amp;text=Hola%2C%20deseo%20realizar%20una%20consulta" target="_blank" class="whatsapp-btn"><img src="/whatsapp-btn.svg" alt=""></a>