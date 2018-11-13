<?php
	$usuario="root";
	$pass	="";
	$servidor="localhost";
	$nombre_base = "isw";
	$coneccion=mysqli_connect($servidor,$usuario,$pass)or die('No se puede conectar al servidor');
	mysqli_select_db($coneccion,$nombre_base);
	mysqli_set_charset($coneccion, "utf8"); 
?>