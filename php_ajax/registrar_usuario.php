<?php 
	include '../coneccion.php';
	error_reporting(0); 
?>

<?php
	$sql='INSERT INTO Usuario (nombre, pass, correo, telefono, no_cuenta) VALUES ("'.$_POST['txt_nombre_registro'].'","'.password_hash($_POST['txt_pass_registro'], PASSWORD_DEFAULT).'","'.$_POST['txt_correo_registro'].'","'.$_POST['txt_telefono_registro'].'","'.$_POST['txt_numero_cuenta'].'");';

	$consulta= mysqli_query($coneccion,$sql);
	echo $consulta;
	if ($consulta) {		
		mysqli_free_result ($consulta);	 			
	}	
	mysqli_close($coneccion);
?>