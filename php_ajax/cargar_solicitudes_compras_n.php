<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php
	$ID_Usuario = $_SESSION['id_usuario'];
	$lineas=Array();
	$i=0;
	
	$sql='SELECT v.id_venta, v.id_libro, l.nombre, l.edicion, l.volumen, v.id_usuario AS id_comprador , v.precio_comprador
		FROM Venta AS v INNER JOIN Libro AS l ON v.id_libro = l.id_libro 
		WHERE v.estado = "espera" AND  l.id_usuario ='.$ID_Usuario;

	$consulta= mysqli_query($coneccion,$sql);
	if ($consulta) {
		while ($linea=mysqli_fetch_object($consulta)) {
			$lineas[$i]=$linea;
			$i++;
		}		 			
	}else{
		echo "<option >No se ejecuto Nada :(</option >";
	}

	for ($i=0; $i <count($lineas) ; $i++) {		
		echo '<option value="'.$lineas[$i]->id_venta.'" id_comprador="'.$lineas[$i]->id_comprador.'" id_libro="'.$lineas[$i]->id_libro.'"> Edición: '.$lineas[$i]->edicion." ".$lineas[$i]->nombre. ' $ '.$lineas[$i]->precio_comprador.'  </option>';
	}

	mysqli_free_result ($consulta);	
	mysqli_close($coneccion); 
 ?>