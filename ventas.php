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
    <link rel="stylesheet" type="text/css" href="css/pagina_base.css">    
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
                        <a class="nav-link" href="compras.php">Comprar Articulo</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Vender Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intercambio.php">Cambiar Articulo</a>
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
        <h4 class="text-center my-2">Libros para ventas o intercambios</h4>
        <div class="row mt-3 w-100">            
            <!-- LISTADO DE MIS LIBROS -->
            <div class="col-lg-4 col-sm-12 border mx-auto cuadro_lista">
                <h5 class="text-center mt-2">Mi lista de libros</h5>
                <div class="form-group col-sm-12">
                    <select multiple class="form-control" id="Lista_libros" size="7" onchange="mostrar_libro()">
                    </select>
                </div>
                <!--Botones agregar o quitar libros -->
                <div class="row form-group mx-auto">
                    <span class="btn btn-success btn-md col-4" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-book text-left iconos">&nbsp; &nbsp; + </span>
                    </span>
                    <div class="col-4"></div>
                    <span class="btn btn-warning btn-md col-4 align-self-end" data-toggle="modal" data-target="#frmEliminarLibro">
                        <span class="fas fa-book text-left iconos">&nbsp; &nbsp; - </span>
                    </span>
                </div>  
            </div>
            
            <!-- CUADRO DETALLES DEL LIBRO (IMAGENES Y DATOS) -->
            <div class="col-lg-7 col-sm-12 border mx-auto cuadro_detalles">                
                <div class="row my-2 mx-auto" id="ContenedorImagenes">
                    <!-- Visor imagenes -->
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
                    <div class="col-lg-8">
                        <div class="row">
                            <h5 class="col-lg-6">Nombre:</h5>
                            <h6 class="col-lg-6">Fisica Universitaria</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">No Edicion:</h5>
                            <h6 class="col-lg-6">11</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Volumen:</h5>
                            <h6 class="col-lg-6">1</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Precio:</h5>
                            <h6 class="col-lg-6 text-warning">LPS.- 10000</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Se intercambia:</h5>
                            <h6 class="col-lg-6 text-danger">NO</h6>
                        </div>
                        <hr class="mx-0 my-1">
                        <div class="row">
                            <h5 class="col-lg-6">Autor:</h5>
                            <h6 class="col-lg-6 text-success ">Brayan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VENTANAS MODALES -->
    <!-- MODAL AGREGAR LIBRO -->
    <div class="modal fade" id="frmAgregarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content ventana_registro" enctype="multipart/form-data" id="formulario_venta" method="post">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">INGRESAR NUEVO LIBRO</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <div class="modal-body was-validated">
                     <!-- Nombre de Libro -->
                    <div class="row input-group mx-auto">                        
                        <input class="col-10 form-control mx-auto" type="text" name="nombre_libro" placeholder="TITULO DE LIBRO" id="nombre_libro" maxlength="40" minlength="3" required>   
                    </div>
                    <!-- input de no_edicion -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto" min="1">NO_EDICION:</h6>
                    </div>    
                    <div class="row input-group mx-auto">                        
                        <input class="col-10 form-control  mx-auto" type="number" value="1" id="no_edicion" name="no_edicion" required>
                    </div>
                    <!-- input de no_edicion -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto" min="1">NO_VOLUMEN:</h6>
                    </div>    
                    <div class="row input-group mx-auto">                        
                        <input class="col-10 form-control  mx-auto" type="number" value="1" id="no_volumen" name="no_volumen" required>
                    </div>
                    <!-- autor -->
                    <div class="row input-group mx-auto mt-3">                        
                        <input class="col-10 form-control mx-auto" type="text" placeholder="NOMBRE DEL AUTOR" id="nombre_autor" name="nombre_autor" maxlength="40" minlength="2">  
                    </div>
                    <!-- Precio del libro -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto " min="1">PRECIO:</h6>
                    </div>                    
                    <div class="row input-group mx-auto">                        
                        <input class="col-10 form-control mx-auto" min="1" type="number" id="precio" name="precio" value="1.0" required step="0.01">                    
                    </div>
                    <!-- Disponible para intercambio -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto ">SE INTERCAMBIA:</h6>
                    </div>
                     <div class="row input-group mx-auto">                       
                        <select  class="col-10 form-control mx-auto" id="intercambio" name="intercambio">
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select>                    
                    </div>
                    <!-- Fotos Libro -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto ">FOTOS DEL LIBRO:</h6>
                    </div>
                    <div class="row input-group mx-auto mt-2 custom-file">            
                        <input class="col-10 mx-auto custom-file-input" type="file" id="archivo_01" name="archivo_01" accept="image/*" required> 
                        <label class="custom-file-label col-10 mx-auto" for="archivo_01">Seleccione una imagen...</label>
                        <div class="col-10 mx-auto invalid-feedback">Agregue una imagen</div>
                    </div>
                    <!-- verificacion de insercion -->
                    <!-- Fotos Libro -->
                    <div class="row mx-auto mt-2" id="mensaje">

                    </div>
                    <div class="row input-group mx-auto mt-2 custom-file">           
                        <input class="col-10 mx-auto custom-file-input" type="file" id="archivo_02" name="archivo_02" accept="image/*" required> 
                        <label class="custom-file-label col-10 mx-auto" for="archivo_02">Seleccione una imagen...</label>
                        <div class="col-10 mx-auto invalid-feedback">Agregue una imagen</div> 
                    </div>
                     <div class="row input-group mx-auto mt-2 custom-file">           
                        <input class="col-10 mx-auto custom-file-input" type="file" id="archivo_03" name="archivo_03" accept="image/*" required> 
                        <label class="custom-file-label col-10 mx-auto" for="archivo_03">Seleccione una imagen...</label>
                        <div class="col-10 mx-auto invalid-feedback">Agregue una imagen</div>
                    </div>
                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn btn-success" id="btn_guardar">GUARDAR DATOS</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL ELIMINAR LIBRO -->
    <div class="modal fade" id="frmEliminarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ventana_registro">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title  " id="exampleModalLabel">ELIMINAR LIBRO</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <div class="modal-body was-validated">
                     
                    <!-- input de edicion -->
                    <div class="row mx-auto mt-2">
                        <h6 class="col-10 mx-auto text-danger" min="1">DESEA ELIMINAR EL LIBRO SELECCIONADO...?</h6>
                    </div>  

                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn  btn-danger" data-dismiss="modal" onclick="eliminar_libro()">ELIMINAR</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- LIBRERIAS JS -->
    <?php include 'php_moldes_html/librerias_js.php'; ?>    
    
    <script type="text/javascript"> 
        //para que se muestre el nombre del archivo subido:
        $('#archivo_01').change(function (e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });

        $('#archivo_02').change(function (e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });

        $('#archivo_03').change(function (e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });       
    </script>
    <script src="js/ventas.js" type="text/javascript"></script>    
</body>

</html>