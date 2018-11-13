<?php
    error_reporting(0);
    include 'BackEnd\comprobador_usuario.php';    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Intercambios UNAH</title>
    <?php include 'php_moldes_html/librerias_head.php'; ?>
    <!-- Mis CSS -->
</head>
<body>
    <!-- barra de navegacion -->
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
                    <li class="nav-item active">
                        <a class="nav-link" href="perfil.php">Mi Perfil</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="BackEnd\logout.php">SALIR</a>
                    </li>
                </ul>
            </div>            
        </nav>
    </div>

     <!-- sub menu de perfil y notificaciones superior -->
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
    
    <!-- cuerpo de pagina -->
    <div class="container cuerpo_pagina bg-light mt-3 border">
        
        <div class="row mt-3">                   
            <!-- select LIBROS PARA COMPRAS -->
            <div class="col-lg-4">
                <h5 class="text-center">Solicitudes de Comras</h5>
                <div class="form-group row">
                    <select class="col-lg-11 mx-auto form-control " multiple size="12" >
                        <option>
                            0.
                        </option>
                        <option>
                            1
                        </option>
                        <option>
                            2
                        </option>
                        <option>
                            5
                        </option>
                    </select>
                </div>
                <div class="row form-group mx-auto">
                    <span class="btn btn-warning btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Eliminar Venta </span>
                    </span>
                    <span class="btn btn-success btn-md col-12 mt-2" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Venta Realizada</span>
                    </span>                    
                </div>
            </div>
            <!-- 02 COMPRAS ya realizadas-->
            <div class="col-lg-4">
                <h5 class="text-center">Solicitudes de Intercambio</h5>
                <div class="form-group row">
                    <select class="col-lg-11 mx-auto form-control " multiple size="12" >
                        <option>
                            0.
                        </option>
                        <option>
                            1
                        </option>
                        <option>
                            2
                        </option>
                        <option>
                            5
                        </option>
                    </select>
                </div>
                <div class="row form-group mx-auto">
                    <span class="btn btn-warning btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Cancelar Intercambio </span>
                    </span>
                    <span class="btn btn-success btn-md col-12 mt-2" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Intercambio Realizado</span>
                    </span>                    
                </div>
            </div>             
            <!-- 03 DETALLES DE LIBRO -->
            <div class="col-lg-4 mt-4">
                
                <div class="row my-2 mx-auto border">
                    <h5 class="col-lg-12 text-center">Informacion del Solicitande</h5>
                    <!-- Imagenes del visor -->
                    <div id="carouselExampleControls" class="carousel slide col-lg-4" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/ventas/prueba 01.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/ventas/prueba 02.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/ventas/prueba 03.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Informacion de Libro -->
                    <div class="col-lg-7">
                        <h5 class="">Nombre:</h5>
                        <h6>Alejandro Magno</h6>
                        <h5 class="">Telefono:</h5>
                        <h6 class="text-success">8890-4569</h6>
                        <h5 class="">Correo</h5>
                        <h6 class="text-danger">bacostacarcamo@yahoo.es</h6>                  
                    </div>
                </div>
            </div>
            
        </div>                		 
    </div>
    <!-- LIBRERIAS JS -->
    <?php include 'php_moldes_html/librerias_js.php'; ?>
    <!-- MIS JS -->
</body>
</html>