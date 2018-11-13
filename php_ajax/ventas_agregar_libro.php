
<?php 
	error_reporting(1);
	session_start();
	include '../coneccion.php' 
?>

<?php
	$ID_Usuario = $_SESSION['id_usuario'];

	if ($_FILES["archivo_01"]["error"]>0 || $_FILES["archivo_02"]["error"]>0 || $_FILES["archivo_03"]["error"]>0) {
		echo "0";
	} else {
		$extensiones = array("image/gif", "image/jpeg", "image/jpg", "image/png","image/svg");
		$tamanio = 5000;
		//comprobacion de extenciones
		
		$c_extencion=in_array($_FILES["archivo_01"]["type"],$extensiones) && in_array($_FILES["archivo_02"]["type"],$extensiones) && in_array($_FILES["archivo_03"]["type"],$extensiones);
		//comprobador de tamaño
		$c_tamanio = $_FILES["archivo_01"]["size"] <= $tamanio*1024 && $_FILES["archivo_02"]["size"] <= $tamanio*1024 && $_FILES["archivo_03"]["size"] <= $tamanio*1024;
		//entra solo si todas las imagenes tienen la extencion correcta y el tamaño correcto
		if ($c_extencion) {
			if ($c_tamanio) {
				$sql='INSERT IGNORE INTO Libro(id_usuario, nombre, edicion, volumen, precio, autor, se_intercambia, id_estado) 
					VALUES('.$ID_Usuario.',"'.$_POST["nombre_libro"].'","'.$_POST["no_edicion"].'", "'.$_POST["no_volumen"].'",'.$_POST["precio"].',"'.$_POST["nombre_autor"].'",'.$_POST["intercambio"].', 1)';	
				$consulta= mysqli_query($coneccion,$sql);
				//imprime 1 si se ejecuto sin problemas y 0 si no
				echo $consulta;

				$ruta = '../files/'.mysqli_insert_id($coneccion).'/';

				$archivo_01 = $ruta."imagen_01.".pathinfo($_FILES['archivo_01']['name'], PATHINFO_EXTENSION);
				$archivo_02 = $ruta."imagen_02.".pathinfo($_FILES['archivo_02']['name'], PATHINFO_EXTENSION);
				$archivo_03 = $ruta."imagen_03.".pathinfo($_FILES['archivo_03']['name'], PATHINFO_EXTENSION);
				
				$y = true;
				if (!is_dir($ruta)) {
					$y = mkdir($ruta, 0700, true);
				}

				

				$resultado01 = move_uploaded_file($_FILES['archivo_01']['tmp_name'],$archivo_01);
				$resultado02 = move_uploaded_file($_FILES['archivo_02']['tmp_name'],$archivo_02);
				$resultado03 = move_uploaded_file($_FILES['archivo_03']['tmp_name'],$archivo_03);
			} else {
				echo "0";
			}
		} else {
			echo "0";
		}		
	}	
	
	if ($consulta) {			
		mysqli_free_result ($consulta);	 			
	}
	mysqli_close($coneccion);
 ?>