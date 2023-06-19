<?php include "conex.php";$informativos=mysqli_fetch_array(mysqli_query($link,"select * from _informativos where id=1")); 
 $texto=array();$ix=1;
if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }



        $query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}      
$data=mysqli_fetch_assoc(mysqli_query($link,"select * from orden where id=".$_POST["id_orden"].""));

?>


<div class="modal-header">
            <h4 class="modal-title">Reportar Pago -> Order No  - <?=$data["codigo"]?></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
  


<div class="accordion" id="accordion1" role="tablist">
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion1">Transferencia/Depósito</a></h6>
                </div>
                <div class="collapse " id="collapseOne" role="tabpanel">
                  <div class="card-body">
				  <form method="post" action="<?=BASE_PATH?>ordenes-compra.php">
							<input type="hidden" value="<?=$_POST["id_orden"]?>" name="id_orden">
							<input type="hidden" value="transferencia" name="tipo_pago_pago">
								   <div class="row">
									   <div class="col-md-12">Seleccione el banco donde realizó la transferencia/depósito:<br><br>
											   <select class="form-control" name="banco" required>
													<?php  $sele=mysqli_query($link,"select * from datosbancarios where estatus='si' order by orden ASC");
														   while($rt=mysqli_fetch_assoc($sele)){?>
														   
														<option value="<?=$rt["banco"]?>"><?=strtoupper($rt["banco"])?>   <?=strtoupper($rt["cuenta"])?>  <?=strtoupper($rt["contacto"])?></option>   
														   <?php }  
													?>
													 
											   </select>
									   </div>
								   </div>
								   <br><br>
									<div class="row">
									   <div class="col-md-6">Introduzca el número de transferencia/depósito:<br><br>
											   <input type="number" name="numero_transferencia" class="form-control" required>
									   </div>
									   
										<div class="col-md-6">Monto de transferencia/depósito:<br><br>
											   <input type="text" name="monto_pago" class="form-control" required value="<?=fprecios($total_final=consultar("SELECT sum(cantidad*precio) as total FROM orden_carrito WHERE id_orden=".$_POST["id_orden"]."",$link))?>">
									   </div>
								   </div>
							<br><br>
							
							<input type="submit" class="btn btn-danger"  value="Reportar pago" name="btn_reportarpago" />
							
							</form>
				  
				  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a class="collapsed" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion1">Tarjeta de Crédito</a></h6>
                </div>
                <div class="collapse" id="collapseTwo" role="tabpanel">
                  <div class="card-body">Próximamente ...</div>
                </div>
              </div>
             
</div>

			<br><br>
			
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
             
<div class="text-lg px-2 py-1">Total a pagar: <span class='text-medium'>
<?=$informativos["moneda"]?> <?=fprecios($total_final=consultar("SELECT sum(cantidad*precio) as total FROM orden_carrito WHERE id_orden=".$_POST["id_orden"]."",$link))?></span></div>
            </div>
          </div>