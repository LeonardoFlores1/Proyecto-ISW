<?php session_start(); ?>
<?php include '../coneccion.php' ?>

<?php	
	$lineas=Array();
	$i=0;

	$sql='SELECT * FROM Libro as l WHERE id_libro='.$_POST['id_libro'];	
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
		$Intercambia= "";
		if ($lineas[$i]->se_intercambia) {
			$Intercambia= "Si";
			
		} else {
			$Intercambia= "No";
		}
		$directorio = '../files/'.$lineas[$i]->id_libro;
		//  ../files/20
		$directorio_i = 'files/'.$lineas[$i]->id_libro;
		$ficheros  = scandir($directorio);
		$l=0;
		echo '<!-- Visor imagenes -->
                    <div id="carouselExampleControls" class="carousel slide col-lg-4" data-ride="carousel">
                        <div class="carousel-inner">';
		foreach ($ficheros as $key => $value) {
			$url = $directorio_i.'/'.$value;
			if ($l>1) {
				if ($l==2) {
					echo '		<div class="carousel-item active">
	                                <img class="d-block w-100" src="'.$url.'" alt="First slide">
	                            </div>';
				} else {
					echo '			<div class="carousel-item">
	                                <img class="d-block w-100" src="'.$url.'" alt="Second slide">
	                            </div>';
				}
			}			
			$l++;		
		}

		echo '			</div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>';


        echo '		<!-- Informacion de Libro -->
        			<div class="col-lg-8">
                        <div class="row">
                            <h5 class="col-lg-6">Nombre:</h5>
                            <h6 class="col-lg-6">'.$lineas[$i]->nombre.'</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">No Edicion:</h5>
                            <h6 class="col-lg-6">'.$lineas[$i]->edicion.'</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Volumen:</h5>
                            <h6 class="col-lg-6">'.$lineas[$i]->volumen.'</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Precio:</h5>
                            <h6 class="col-lg-6 text-warning">LPS.- '.$lineas[$i]->precio.'</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Se intercambia:</h5>
                            <h6 class="col-lg-6 text-danger">'.$lineas[$i]->se_intercambia.'</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Autor:</h5>
                            <h6 class="col-lg-6 text-success ">'.$lineas[$i]->autor.'</h6>
                        </div>
                    </div>';           
				
	}

	mysqli_close($coneccion); 
 ?>