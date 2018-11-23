<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php
	$lineas=Array();
	$i=0;

	$sql='SELECT * FROM Libro AS L WHERE L.id_usuario = '.$_POST["id_comprador"].' AND L.id_estado = 1 ';	

	$consulta= mysqli_query($coneccion,$sql);
	if ($consulta) {
		while ($linea=mysqli_fetch_object($consulta)) {
			$lineas[$i]=$linea;
			$i++;
		}		
		mysqli_free_result ($consulta);	 			
	}else{
		echo "<option value='-1'>No se ejecuto Nada :(</option>";
	}

	for ($i=0; $i <count($lineas) ; $i++) {		
		echo '<option value="'.$lineas[$i]->id_libro.'"> Edición: '.$lineas[$i]->edicion." ".$lineas[$i]->nombre. '  </option>';
	}

	mysqli_close($coneccion); 
 ?>