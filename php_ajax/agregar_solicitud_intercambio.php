<?php 
	include '../coneccion.php';
	error_reporting(0);
	session_start(); 
?>

<?php
	$ID_Usuario = $_SESSION['id_usuario'];	

	//$sql='CALL eliminar_carrera('.$_POST["id_carrera"].')';
	$sql= 'INSERT INTO Intercambio (id_usuario, id_libro, lugar_reunion, fecha, estado) VALUES ('.$ID_Usuario.', '.$_POST["id_libro"].', "'.$_POST["lugar"].'", (SELECT CURDATE()), "espera")';
	$consulta= mysqli_query($coneccion,$sql);
	echo $consulta;
	mysqli_free_result ($consulta);	
	mysqli_close($coneccion); 
?>
