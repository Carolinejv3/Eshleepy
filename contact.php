<?php session_start(); include "conex.php";require 'AttachMailer.php';
require_once 'Mobile_Detect.php'; 
$detect = new Mobile_Detect(); 
$texto=array();$ix=1;
if(!isset($_SESSION["idioma"])){$_SESSION["idioma"]="es";  }



        $query=mysqli_query($link,"select * from _textos order by id ASC");
		while($reg=mysqli_fetch_array($query)){
			 $texto[$ix]=$reg["texto_".strtoupper($_SESSION["idioma"]).""];$ix++;
		}
$informativos=mysqli_fetch_array(mysqli_query($link,"select * from _informativos where id=1"));



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	  <title>Contact :: <?=$informativos["nombre_pagina"]?>  </title>
      <meta name="description" content="<?=$informativos["nombre_pagina"]?>">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?=BASE_PATH?>css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="<?=BASE_PATH?>css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="<?=BASE_PATH?>customizer/customizer.min.css">
   
    <!-- Modernizr-->
    <script src="<?=BASE_PATH?>js/modernizr.min.js"></script>
    <!-- Google Map API-->
    <script src="https://maps.googleapis.com/maps/api/js2?key=AIzaSyAACWdZfvsxk4RffdTsNZ5vXdi4Y8onJ1I" type="text/javascript"></script>
  </head>
  <!-- Body-->
  <body>
   
   
    <!-- Off-Canvas Category Menu-->
  <?php  require "menu_pc.php"; ?>
	<?php  require "menu_movil.php"; ?>
    <?php  require "tolbar.php"; ?>
    <?php  require "header.php"; ?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
     
	  
	  
	  
	  <center>
<?php  if(isset($_POST["btn_enviar"])){
								 
								 
			
	$email = stripslashes($_POST["email"]);
	 
 
        $target_path = "/archivos/".date("Y_H_i_s");
			$target_path = $target_path . basename($_FILES['uploadedfile']['name']);

			$adjuntar=basename($target_path);	 
								 
								  // SE PROCEDE A ENVIAR EL CORREO
								   $titulo = "Presupuesto.".$_POST["nombre"];


									
									$mensaje=' Tipo Persona: '.$_POST["tp"].' <br><br>
												Nombre: '.$_POST["nombre"].' <br><br>
												Apellido: '.$_POST["apellido"].' <br><br>
												Cédula/Pasaporte/RIF/RUC: '.$_POST["ci"].' <br><br>
												Razón Social : '.$_POST["razon_social"].' <br><br>
												País : '.$_POST["pais"].' <br><br>
												Ciudad: '.$_POST["ciudad"].' <br><br>
												Teléfono: '.$_POST["telefono"].' <br><br>
												Email: '.$email.'  <br><br>
												
												 Mensaje: '.$_POST["mensaje"].'  <br><br>
												';
												
            $mailer= new AttachMailer($informativos["correo1"],$informativos["correo2"],$titulo,$mensaje);
		    $mailer->attachFile($_FILES['uploadedfile']['tmp_name'],$adjuntar);
            $mailer->send();
							
							?>
							 <div class="alert alert-success alert-msg" style="display:block; position:relative">
								Enviado con éxito
								</div><br>
							
						    
                             <?php   } // FIN GUARDAR ?>
                            
                            </center>  
	  
	  
	   
	  
	  
	  
	  
      <!-- Page Content-->
      <div class="container padding-bottom-2x mb-2">
        <div class="row">
          <div class="col-md-9"><br>
            <div class="display-3 text-muted opacity-75 mb-30" style="font-size:24px;color:#333">Formulario Contacto</div>
			
			<form action="" method="post"  enctype="multipart/form-data">   
			
			<div class="row">
                    
                    <div class=" col-sm-12 col-md-12">
					
						<div class="row">
						             <div class="col-md-6">
									   
									      <label style="color:#333;font-weight:700" >Nombre(s)</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="nombre" />

									 </div>
									 
									  <div class="col-md-6">
									   
									   <label style="color:#333;font-weight:700" >Apellido(s)</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="apellido" />

									 </div>
						</div>
						
						
						<br>
						<div class="row">
						             <div class="col-md-6">
									   
									       <label style="color:#333;font-weight:700" >Cédula/Pasaporte</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="ci" />

									 </div>
									 
									  <div class="col-md-6">
									   
									   <label style="color:#333;font-weight:700" >Nacionalidad</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="razon_social" />

									 </div>
						</div>
						
						
						<br>
						
						<div class="row">
						             <div class="col-md-6">
									   
									       <label style="color:#333;font-weight:700" >País</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="pais" />

									 </div>
									 
									  <div class="col-md-6">
									   
									     <label style="color:#333;font-weight:700" >Ciudad</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="ciudad" />

									 </div>
						</div>
						
						<br>
					
                         <div class="row">
						             <div class="col-md-6">
									   
									 
									  
									  
									   <label style="color:#333;font-weight:700" >Teléfono</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="text" class="" name="telefono" />
									 
									 
									 </div>
									 
									 
									 
									 
									 
									 
									 <div class="col-md-6">
									  
									 
									   <label style="color:#333;font-weight:700" >Email</label style="color:#333;font-weight:700">
									   <br>
									   <input required style="width:80%" type="email" class="" name="email" />
									   
									   
									 </div>
						 </div>
						 
						<br>
						 


					
						
						

 <div class="row">
						             <div class="col-md-12">
									   
									   <label style="color:#333;font-weight:700" >Mensaje</label style="color:#333;font-weight:700">
									   <br>
									   <textarea  rows="3"  class="col-md-10" name="mensaje" ></textarea>

									 </div>
									 
								
					
						 
<div class="col-md-12">
<br>

  <label style="color:#333;font-weight:700" >Adjuntar Imagen </label style="color:#333;font-weight:700">
									   <br>
<input class="" id="contactName" type="file" name="uploadedfile" >

</div>
                  
                 	 
									
									 
									 <div class="col-md-12" align="center"><br><br>
<input required type="submit" class="btn btn-default" style="color:#FFF;background-color:#979797;font-weight:800;font-size:15px" value="Enviar" name="btn_enviar" /></div>
									 
						</div>
					
						 
                    </div>
               </div>
			
			</form>
			
			
			
          </div>
          <div class="col-md-3"><br> <div class="display-3 text-muted opacity-75 mb-30" style="font-size:24px;color:#333">Contáctenos</div>
            <ul class="list-icon">
			 
			<li> <i class="icon-map"></i><a class="navi-link"  >Dirección: <?=$informativos["direccion"]?></a></li>
              <li> <i class="icon-mail"></i><a class="navi-link" href="mailto:<?=$informativos["correo1"]?>"><?=$informativos["correo1"]?></a></li>
			 
              <li> <i class="icon-bell"></i><?=$informativos["telefono1"]?></li>
			  <li> <i class="icon-bell"></i><?=$informativos["telefono2"]?></li>
             
            </ul>
          </div>
        </div>
       
      
        
        
      </div>
      <!-- Site Footer-->
     <?php  require "footer.php"; ?>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?=BASE_PATH?>js/vendor.min.js"></script>
    <script src="<?=BASE_PATH?>js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="<?=BASE_PATH?>customizer/customizer.min.js"></script>
  </body>
</html>