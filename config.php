<?php
require_once 'messages.php';

define( 'BASE_PATH', 'https://'.$_SERVER['HTTP_HOST'].'/');//Ruta base donde se encuentra
define( 'DB_HOST', 'localhost' );//Servidor de la base de datos
define( 'DB_USERNAME', 'u478910710_eshleepy');//Usuario de la base de datos
define( 'DB_PASSWORD', 'Marielys01');//Contraseña de la base de datos
define( 'DB_NAME', 'u478910710_eshleepy');//Nombre de la base de datos

spl_autoload_register( function ($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	include_once  $path . '.php';
}
);
