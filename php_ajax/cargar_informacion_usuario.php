<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php
	$lineas=Array();
	$i=0;

	$sql='SELECT * FROM Usuario WHERE id_usuario = '.$_POST["id_user"];	

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
		echo '  <h5 class="col-lg-12 text-center mt-3"><strong>Informacion del Solicitande</strong></h5>
                   
                    <!-- Informacion de Libro -->
                    <div class="col-lg-12">
                        <h5 class="col-12">Nombre:</h5>
                        <h6 class="col-12">'.$lineas[$i]->nombre.'</h6>
                        <hr>
                        <h5 class="col-12">Telefono:</h5>
                        <h6 class="text-success col-12">'.$lineas[$i]->telefono.'</h6>
                        <hr>
                        <h5 class="col-12">Correo</h5>
                        <h6 class="text-danger col-12 pb-4">'.$lineas[$i]->correo.'</h6>                  
                    </div>';
	}

	mysqli_close($coneccion); 
 ?>