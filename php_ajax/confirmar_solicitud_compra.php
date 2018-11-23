<?php include '../coneccion.php' ?>

<?php
	$sql= 'CALL confirmar_venta('.$_POST["id_venta"].','.$_POST["id_libro"].')';
	$consulta= mysqli_query($coneccion,$sql);
	
	echo $consulta;		
	mysqli_free_result ($consulta);	
	mysqli_close($coneccion); 
?>
