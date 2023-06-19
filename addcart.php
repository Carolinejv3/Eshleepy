<?php session_start(); include "conex.php";$informativos=mysqli_fetch_array(mysqli_query($link,"select * from _informativos where id=1"));
if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }$texto=array();$ix=1;
 $query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}

if(!isset($_SESSION["aux"])){ $_SESSION["aux"]=rand(0,999999999);}

//buscar que no exista ese producto ya en el carrito y si existe actualizarle la cantidad

$buscar=mysqli_query($link,"select * from _carrito where id_producto=".$_POST["id"]." and aux=".$_SESSION["aux"]." and id_talla=".$_POST["talla"]."") or die("error");
$filas=mysqli_num_rows($buscar);
if($filas>0){
	//act.
	
mysqli_query($link,"update _carrito set cantidad=".$_POST["cantidad"]."  where id_producto=".$_POST["id"]." and aux=".$_SESSION["aux"]." and id_talla=".$_POST["talla"]."")or die("error2");;
}else{
	//add
	
	
	
mysqli_query($link,"insert into _carrito values (NULL,".$_POST["id"].",".$_POST["cantidad"].",".$_POST["precio"].",NOW(),".$_SESSION["aux"].",".$_POST["talla"].")")or die("error3");;
}



			         $carrito2=mysqli_query($link,"select * from _carrito where aux=".$_SESSION["aux"]."");
                     if(!$carrito2){$t=0;}else{$t=mysqli_num_rows($carrito2);}
?>
			
			<a href="/cart.php"></a>
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
				       <a class="dropdown-product-thumb" href=""><img src="/images/<?=$foto?>" alt="<?=$product["nombre_".$_SESSION["idioma"].""]?>"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="" style="font-size:12px;text-transform:none"><?=$product["nombre_".$_SESSION["idioma"].""]?></a>
				  <span class="dropdown-product-details"><?=$rr["cantidad"]?> <small style="font-size:10px"><b><?=$talla?></b></small> x <?=$informativos["moneda"]?> <?=fprecios($rr["precio"])?></span></div>
                </div>
				
				
				
					  <?php }}  ?>
			  
               
			   
                <div class="toolbar-dropdown-group">
                  <div class="column"><span class="text-lg">Total:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium"><?=$informativos["moneda"]?> <?=fprecios($total_final=consultar("SELECT sum(cantidad*precio) as total FROM `_carrito` WHERE aux=".$_SESSION["aux"]."",$link))?>&nbsp;</span></div>
                </div>
				
				
				
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="/cart.php" style="font-size:12px;text-transform:none"><?=$texto[4]?></a></div>
                  <div class="column">
				   <?php  if(isset($_SESSION["logged_in"])){?> 
					  <a class="btn btn-sm btn-block btn-success" href="/checkout-address.php">Checkout</a>
					  <?php }else{?>
					  <a class="btn btn-sm btn-block btn-warning" href="/login.php" style="font-size:12px;text-transform:none">Iniciar Sesión</a>
					  <?php }  ?>
				  
				  </div>
                </div>
              </div>