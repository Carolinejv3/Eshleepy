<?php session_start(); include "conex.php";$texto=array();$ix=1;

if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }

$query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}

//echo "select * from productos_tallas where id_producto=".$_POST["valor"]." and id_talla=".$_POST["size"]." and stock_actual>stock_inicial";
$con=mysqli_query($link,"select * from productos_tallas where id_producto=".$_POST["valor"]." and id_talla=".$_POST["size"]." and stock_actual>stock_inicial");
$filas=mysqli_num_rows($con);

if($filas>0){
	
	while($row=mysqli_fetch_assoc($con)){?>
<script language="javascript" type="text/javascript">

function agregar(size){
						
var cantidad=$('#quantity').val();
var id=$('#id').val();
var precio=$('#precio').val();	
				
var data = {'cantidad':cantidad,'id': id,'precio': precio,'talla': size};


$.ajax({ type: 'POST',  dataType: 'text',  url: '/addcart.php', data: data, success: function(text){ $('#cart').html(text);  }
 
});
							
							
}

</script>
	<div class="col-sm-12" >
	  <div class="row">
          <div class="col-md-4">
				  <div class="form-group">
						  <label for="quantity"><?=$texto[19]?></label>
						   
						  <select class="form-control" id="quantity" name="cantidad">
						  
						  <?php   for($i=1;$i<=$row["stock_actual"];$i++){?>
						  
						  <option value="<?=$i?>"><?=$i?></option>
						  <?php } ?>
							
							
						  </select>
						  
						</div>
		  
		  </div>

<div class="col-md-8">
 <div style="padding:1%;font-size:12px">Disponibilidad: <span style="color:#72c02c"><b>Hay Disponibilidad</b></span></div>
				<button   class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Producto" data-toast-message="agregado satisfactoriamente al carrito!" onclick="return agregar(<?=$_POST["size"]?>)"><i class="icon-bag"></i><?=$texto[17]?> </button>
</div>		  
	
				
				
              </div>
			  
		</div>	 
	
	<?php  } ?>


<?php }else{?>


<div class="col-sm-12" >
<div class="row">
          <div class="col-md-4">
					<div class="form-group">
									  <label for="quantity"><?=$texto[19]?></label>
									   
									  <select class="form-control" id="quantity" name="cantidad">
									  <option value="0">0</option>
									</select>
									  
									</div>
              </div>
			  
			
			  
			  <div class="col-md-8" >
			  <div style="padding:1%;font-size:11px">Disponibilidad: <span style="color:#C00"><b>No hay Disponibilidad</b></span></div>
				<button disabled  class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Producto" data-toast-message="agregado satisfactoriamente al carrito!" onclick=""><i class="icon-bag"></i><?=$texto[17]?> </button>
              
			  </div> </div> </div>

<?php } ?>