<?php
    error_reporting(0);
    include 'BackEnd/comprobador_usuario.php';    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Intercambios UNAH</title>
    <?php include 'php_moldes_html/librerias_head.php'; ?>
    <!-- Mis CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/pagina_base.css">     -->
    <link rel="stylesheet" type="text/css" href="css/ventas.css">
</head>
<body>
    <!-- Barra de navegacion -->
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
            <a class="navbar-brand" href="">
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
                        <a class="nav-link" href="notificaciones.php">Notificaciones</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="ventas.php">Ventas/Compras</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="intercambio.php">Intercambiar_Libro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Mi Perfil</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="BackEnd/logout.php">SALIR</a>
                    </li>
                </ul>
            </div>            
        </nav>
    </div>
    <div class="container cuerpo_pagina bg-light mt-3 border">
        
        <!-- Area Compras -->
        <div class="container pb-4 my-3 w-100 mx-auto border">
             <div class="row">
                 <h4 class="text-center mt-2 mb-0 col-lg-12 text-uppercase">Solicitudes de Intercambio</h4>
                 <hr>
             </div>
            <!-- Area de filtrado -->
            <form class="row mt-3 border bg-secondary text-light" id="frm_filtrado">
                <div class="col-lg-3 form-group">
                    <label for="">Titulo de libro:</label>
                    <input type="text" name="titulo_filtrado" class="form-control" placeholder="Titulo de libro">
                </div>
                <div class="col-lg-3 form-group">
                    <label for="">Autor:</label>
                    <input type="text" name="autor_filtrado" class="form-control" placeholder="Autor">
                </div> 
                <div class="col-lg-3 form-group">
                    <label for="">Precio estimado:</label>
                    <input type="text" name="precio_filtrado" class="form-control">
                </div>
                <div class="col-lg-3 form-group">
                    <label for="" class="d-sm-0">Buscar libros</label>
                    <span class="btn btn-dark btn-md col-12" type="button" id="btn_filtrado">
                        <span class="fas fa-search-plus text-left iconos" >&nbsp; &nbsp; Buscar </span>
                    </span>  
                </div>
            </form>
            <!-- Area de selects -->
            <div class="row mt-3">
                <!-- select LIBROS PARA COMPRAS -->
                <div class="col-lg-4">
                    <h5 class="text-center">Libros Disponibles Para Solicitud</h5>
                    <div class="form-group row">
                        <select class="col-lg-11 mx-auto form-control " multiple size="12" id="lista_libros_disponibles" >
                            
                        </select>
                    </div>
                    <div class="row form-group mx-auto">
                        <span class="btn btn-success btn-md col-12" data-toggle="modal" data-target="#frmAgregarCompra">
                            <span class="fas fa-cart-plus text-left iconos" >&nbsp; &nbsp;Enviar Solicitud Compra </span>
                        </span>                    
                    </div>
                </div>            
                <!-- DETALLES DE LIBRO -->
                <div class="col-lg-4 mt-4 border rounded" style="background-color: #E7FCE0" >
                    <!-- Imagenes del visor -->
                    <div class="row my-2 mx-auto" id="ContenedorImagenesCompras">
                       
                    </div>
                </div>
                <!-- COMPRAS ya realizadas-->
                <div class="col-lg-4">
                    <h5 class="text-center">Mis Solicitudes Enviadas</h5>
                    <div class="form-group row">
                        <select class="col-lg-11 mx-auto form-control " multiple size="12" id="lista_solicitudes">
                           
                        </select>
                    </div>
                    <div class="row form-group mx-auto">
                        <span class="btn btn-danger btn-md col-12" data-toggle="modal" data-target="#frmEliminarSolicitud" >
                            <span class="fas fa-shopping-cart text-left iconos">&nbsp; &nbsp; Cancelar Solicitud </span>
                        </span>                    
                    </div>
                </div> 
            </div>  
        </div>

    </div>    

    <!-- *********************** COMPRAS ****************************** -->
    <!-- MODAL AGREGAR COMPRA -->
    <div class="modal fade" id="frmAgregarCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content ventana_registro" enctype="multipart/form-data" id="formulario_compra" method="post">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">COMPRAR LIBRO</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <div class="modal-body was-validated">
                    
                    <!-- Disponible para intercambio -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto ">Lugar de Reunion Sugerido:</h6>
                    </div>
                     <div class="row input-group mx-auto">                       
                        <select  class="col-10 form-control mx-auto" id="lugar" name="lugar">
                            <option value="Biblioteca UNAH">Biblioteca UNAH</option>
                            <option value="Edificio F1 Primera Planta">Edificio F1 Primera Planta </option>
                            <option value="Edificio B2 Primera Planta">Edificio B2 Primera Planta </option>
                            <option value="Edificio B1 Primera Planta">Edificio B1 Primera Planta </option>
                        </select>                                         
                    </div>                     
                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn btn-success" id="btn_guardar_solicitud">ENVIAR SOLICITUD</button>
                </div>
            </form>
        </div>
    </div>
    <!-- MODAL ELIMINAR solicitud Compra -->
    <div class="modal fade" id="frmEliminarSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ventana_registro">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title  " id="exampleModalLabel">ELIMINAR SOLICITUD</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <div class="modal-body was-validated">
                     
                    <!-- input de edicion -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto text-danger" min="1">DESEA ELIMINAR LA SOLICITUD SELECCIONADA...?</h6>
                    </div>  

                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn  btn-danger" data-dismiss="modal" id="btn_eliminar_solicitud">ELIMINAR</button>
                </div>
            </div>
        </div>
    </div>
    <!-- LIBRERIAS JS -->
    <?php include 'php_moldes_html/librerias_js.php'; ?>    
    <script src="js/intercambios.js" type="text/javascript"></script> 
</body>

</html>