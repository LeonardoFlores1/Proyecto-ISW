<?php 
    session_start(); 
    include '../coneccion.php';
    error_reporting(0); 
?>
<?php
    $lineas=Array();
	$i=0;

	$sql='SELECT U.id_usuario, U.pass FROM Usuario AS U WHERE U.nombre = "'.$_POST['txt_user'].'";';	
	$consulta= mysqli_query($coneccion,$sql);
	if ($consulta) {
		while ($linea=mysqli_fetch_object($consulta)) {
			$lineas[$i]=$linea;
			$i++;
        }			 			
	}else{
		echo '  <div class="col-11  alert alert-danger mx-auto mb-0" role="alert">
                    <strong>Ojo!</strong> No se pudo ejecutar la peticion.
                </div> ';
	}

	for ($i=0; $i < count($lineas); $i++) {
        if ( password_verify($_POST['txt_pass'], $lineas[$i]->pass) ) {
            $_SESSION['id_usuario'] = $lineas[$i]->id_usuario;
            $i = count($lineas);
        }       
    }
    if ($_SESSION['id_usuario'] > 0) {
        //header('location: ../perfil.php');
        echo "1";
    } else {
        if ($consulta) {
            echo '  <div class="col-11  alert alert-danger mx-auto mb-0" role="alert">
                        <strong>Ojo!</strong> Usuario o Contraseña Incorrectas.
                    </div> ';
        }       
    }
    
    mysqli_free_result ($consulta);
	mysqli_close($coneccion); 
?>
