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
                        <a class="nav-link active" href="notificaciones.php">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas.php">Ventas/Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intercambio.php">Intercambiar Libro</a>
                    </li>
                    <li class="nav-item ">
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
                  <a class="nav-link text-secondary" href="perfil.php">configuracion de cuenta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="notificaciones.php">notificaciones</a>
                </li>
              </ul>
            </div>
        </div>        
    </div>
    
    <!-- cuerpo de pagina -->
    <div class="container cuerpo_pagina bg-light mt-3 border">
        
        <div class="row mt-3">                   
            <!-- 01 compras -->
            <div class="col-lg-4">
                <h5 class="text-center">Solicitudes de Compras</h5>
                <div class="form-group row">
                    <select class="col-lg-11 mx-auto form-control " multiple size="12"  id="lista_solicitudes_compras">                       
                    </select>
                </div>
                <div class="row form-group mx-auto">
                    <span id="btn_cancelar_compra" class="btn btn-warning btn-md col-12" >
                        <span class="fas fa-times text-left iconos">&nbsp; &nbsp; Eliminar Solicitud </span>
                    </span>
                    <span id="btn_confirmar_compra" class="btn btn-success btn-md col-12 mt-2">
                        <span class="fas fa-check text-left iconos">&nbsp; &nbsp; Confirmar Solicitud</span>
                    </span>                    
                </div>
            </div>
            <!-- 02 Intercambios-->
            <div class="col-lg-4">
                <h5 class="text-center">Solicitudes de Intercambio</h5>
                <div class="form-group row">
                    <select class="col-lg-11 mx-auto form-control " multiple size="12"  id="lista_solicitudes_intercambio">                        
                    </select>
                </div>
                <div class="row form-group mx-auto">
                    <span id="btn_cancelar_intercambio" class="btn btn-warning btn-md col-12" >
                        <span class="fas fa-times text-left iconos">&nbsp; &nbsp; Cancelar Solicitud </span>
                    </span>
                    <span id="btn_confirmar_intercambio" class="btn btn-success btn-md col-12 mt-2" data-toggle="modal" data-target="#frmAgregarCompra">
                        <span class="fas fa-check text-left iconos">&nbsp; &nbsp; Confirmar Solicitud</span>
                    </span>                    
                </div>
            </div>             
            <!-- 03 DETALLES DE LIBRO -->
            <div class="col-lg-4 mt-4">
                
                <div class="row my-2 mx-auto border" id="caja_usuario">
                    <h5 class="col-lg-12 text-center mt-3"><strong>Informacion del Solicitande</strong></h5>
                   
                    <!-- Informacion de Libro -->
                    <div class="col-lg-12">
                        <h5 class="col-12">Nombre:</h5>
                        <h6 class="col-12">Alejandro Magno</h6>
                        <hr>
                        <h5 class="col-12">Telefono:</h5>
                        <h6 class="text-success col-12">8890-4569</h6>
                        <hr>
                        <h5 class="col-12">Correo</h5>
                        <h6 class="text-danger col-12 pb-4">bacostacarcamo@yahoo.es</h6>                  
                    </div>
                </div>
            </div>
            
        </div>                		 
    </div>


     <!-- MODAL AGREGAR INTERCAMBIO -->
    <div class="modal fade" id="frmAgregarCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content ventana_registro" enctype="multipart/form-data" id="formulario_compra" method="post">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Solicitud</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <div class="modal-body was-validated">
                    
                    <!-- Disponible para intercambio -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto ">Libros del Comprador</h6>
                    </div>
                     <div class="row input-group mx-auto">                       
                        <select  class="col-10 form-control mx-auto" id="libros_comprador" name="lugar">
                            <option value="Biblioteca UNAH">Biblioteca UNAH</option>
                        </select>                                         
                    </div>                     
                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn btn-success" id="btn_guardar_intercambio">CONFIRMAR INTERCAMBIO</button>
                </div>
            </form>
        </div>
    </div>

    <!-- LIBRERIAS JS -->
    <?php include 'php_moldes_html/librerias_js.php'; ?>
    <!-- MIS JS -->
    <script src="js/notificaciones.js" type="text/javascript"></script>
</body>
</html>