<?php include '../coneccion.php' ?>

<?php
	
	//funcion para elinar carpeta y su contenido , recibe como parametro el url de la carpeta
	function eliminar_carpeta($carpeta)
    {
      foreach(glob($carpeta . "/*") as $archivos_carpeta){             
        if (is_dir($archivos_carpeta)){
          rmDir_rf($archivos_carpeta);
        } else {
        unlink($archivos_carpeta);
        }
      }
      rmdir($carpeta);
    }

	//$sql='CALL eliminar_carrera('.$_POST["id_carrera"].')';
	$sql= 'DELETE FROM Libro WHERE id_libro='.$_POST["id_libro"];
	$consulta= mysqli_query($coneccion,$sql);
	if ($consulta) {
		eliminar_carpeta('../files/'.$_POST["id_libro"]);		
		mysqli_free_result ($consulta);	
	}
	mysqli_close($coneccion); 
?>
