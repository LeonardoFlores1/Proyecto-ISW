<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php
	$ID_Usuario = $_SESSION['id_usuario'];
	$lineas=Array();
	$i=0;

	$were = ''; 
	
	if ($_POST['titulo_filtrado'] != "") {
		$were .= 'AND L.nombre  LIKE "%'.$_POST['titulo_filtrado'].'%" ';
	}
	if ($_POST['autor_filtrado'] != "") {
		$were .= 'AND L.autor  LIKE "%'.$_POST['autor_filtrado'].'%" ';
	}
	if ($_POST['precio_filtrado'] != "") {
		$were .= 'AND L.precio <='.$_POST['precio_filtrado'];
	} 
	

	$sql='SELECT * FROM Libro AS L WHERE L.id_usuario <> '.$ID_Usuario.' AND L.id_estado = 1 '.$were;	

	$consulta= mysqli_query($coneccion,$sql);
	if ($consulta) {
		while ($linea=mysqli_fetch_object($consulta)) {
			$lineas[$i]=$linea;
			$i++;
		}		
		mysqli_free_result ($consulta);	 			
	}else{
		echo "<h1>No se ejecuto Nada :(</h1";
	}

	for ($i=0; $i <count($lineas) ; $i++) {		
		echo '<option value="'.$lineas[$i]->id_libro.'"> Edición: '.$lineas[$i]->edicion." ".$lineas[$i]->nombre. '  </option>';
	}

	mysqli_close($coneccion); 
 ?>