<?php include '../coneccion.php' ?>

<?php
	$sql= 'DELETE FROM Venta WHERE id_venta='.$_POST["id_venta"];
	$consulta= mysqli_query($coneccion,$sql);
	
	echo $consulta;		
	mysqli_free_result ($consulta);	
	mysqli_close($coneccion); 
?>
