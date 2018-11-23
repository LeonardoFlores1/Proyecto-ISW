<?php include '../coneccion.php' ?>

<?php
//id_libro_comprador
	$sql= 'CALL confirmar_intercambio('.$_POST["id_venta"].','.$_POST["id_libro"].','.$_POST["id_libro_comprador"].')';
	$consulta= mysqli_query($coneccion,$sql);
	
	echo $consulta;		
	mysqli_free_result ($consulta);	
	mysqli_close($coneccion); 
?>
