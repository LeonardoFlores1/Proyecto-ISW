<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php
	$ID_Usuario = $_SESSION['id_usuario'];
	$lineas=Array();
	$i=0;

	$sql='SELECT l.id_libro, l.nombre, l.edicion FROM Libro as l WHERE l.id_usuario='.$ID_Usuario;	
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

		/*echo '<div id="'.$lineas[$i]->ID_Carrera.'"  nombre="'.$lineas[$i]->Nombre.'" class="row" estado_item="deseleccionado" id_item="'.$i.'" onclick="seleccionar_item(\'lista_01\', this); cargar_secciones(this);">				
						<img class="col-2" src="librerias/lista_personalizada/img/flor_seleccionada.svg" alt="icono de lista">
						<div class="col-10">'.$lineas[$i]->Nombre.'</div>
					</div>'; */
		echo '<option value="'.$lineas[$i]->id_libro.'"> Edición: '.$lineas[$i]->edicion." ".$lineas[$i]->nombre. '  </option>';	

	}

	mysqli_close($coneccion); 
 ?>