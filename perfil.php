<?php
    error_reporting(0);
    include 'BackEnd\comprobador_usuario.php';    
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

    <!-- LIBRERIAS -->
    <!-- etiquetas generadas por el editor -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="librerias/bootstrap-4/css/bootstrap.min.css">  
    <link rel = "icon" type = "image/png" href = "img/IconosPagina_Base/Icono2.png">  

	<title>Mi perfil</title>
</head>
<body>
	<div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="pagina_base.php">
                <img src="img/IconosPagina_Base/Icono1.svg" alt="Logo" style="width:40px;">
                INTERCAMBIOS UNAH
            </a>

            <!-- boton togler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                        
            <!-- menu que se comprimira notar que el contenedor tiene el mismo id que el boton (togler) anterior -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="compras.php">Comprar Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas.php">Vender Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intercambio.php">Cambiar Articulo</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="perfil.php">Mi Perfil</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="BackEnd\logout.php">SALIR</a>
                    </li>
                </ul>
            </div>            
        </nav>
    </div>

    <div class = "container">
      <div class = "row">
        <div class = "col-md">
          <ul class="nav nav-tabs" >
            <li class="nav-item">
              <a class="nav-link active" href="perfil.php">configuracion de cuenta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="notificaciones.php">notificaciones</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container cuerpo_pagina bg-light mt-3 border">
      
		 <br>
      		<div class="row">
       			 <div class = "col-md-3">
       			 	<img src="img/user.png" width = "250">
       			 </div>
       			 <div class = "col-md-3">
       			 	<label>nombre:</label>
              <hr>
              <label>apellido:</label>
              <hr>
              <label>correo:</label>
              <hr>
              <label>telefono:</label>
              <hr>
              <label>direccion:</label>
              <hr>

       			 </div>
             <div class = "col-md-3">
               
             </div>
       			 
       			 <div class = "md-col-3">
                  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Editar</button>
                                                    
       			  </div>
      		</div>  
    </div>
    
</body>
</html>