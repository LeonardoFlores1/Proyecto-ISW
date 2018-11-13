<?php
    error_reporting(0);
    include 'BackEnd\comprobador_usuario.php';	  
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios UNAH</title>
    <?php include 'php_moldes_html/librerias_head.php'; ?>
    <link rel="stylesheet" href="css/pagina_base.css"> 
    <link rel="stylesheet" href="librerias/bootstrap-4/css/bootstrap.min.css">     
    <link rel = "icon" type = "image/png" href = "img/IconosPagina_Base/Icono2.png">
</head>

<body>
    <!-- Barra de navegacion -->
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
                        <a class="nav-link active" href="intercambio.php">Cambiar Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Mi Perfil</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="BackEnd\logout.php">SALIR</a>
                    </li>
                </ul>
            </div>            
        </nav>
    </div>

     <div class="container  bg-light mt-3 border">
        
         <div class="row mt-3 w-100">            
            <!-- LISTADO DE MIS LIBROS -->
            <div class="col-lg-4 col-sm-12 border mx-auto cuadro_lista">
                <h5 class="text-center mt-2">Libros Disponibles Intercambio</h5>
                <div class="form-group col-sm-12">
                    <select multiple class="form-control" id="exampleSelect2" size="7">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <!--Botones agregar o quitar libros -->
                <div class="row form-group mx-auto">
                    <span class="btn btn-success btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Enviar Solicitud </span>
                    </span>                    
                </div>
                
                <!-- solicitudes antiguas -->
                <h5 class="text-center mt-2">Solicitudes Realizadas</h5>
                <div class="form-group col-sm-12">
                    <select multiple class="form-control" id="exampleSelect2" size="7">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <!--Botones agregar o quitar libros -->
                <div class="row form-group mx-auto">
                    <span class="btn btn-danger btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Eliminar Solicitud </span>
                    </span>                    
                </div>
                

            </div>
            
<!--carrusel de libros-->
            <div class="col-lg-7 col-sm-12 border mx-auto cuadro_detalles">
                <div class = "row">
                    
                    <div class = "col-md-7">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block" width="350" src="img/ventas/prueba 01.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block" width="350" src="img/ventas/prueba 02.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block " width="350" src="img/ventas/prueba 03.jpg" alt="Third slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                    </div>
                    <div class = "col-md-3">
                        <hr>
                        <label>libro:</label> <h3></h3>
                        <hr>
                        <label>edicion:</label>
                        <hr>
                        <label>Precio:</label>
                        <hr>
                        <label>propietario:</label>
                        <hr>

                         
                    </div>
                </div>               
               
                     
            </div>
        </div>
        <br>
        <br>
        <br>  
      </div> 
      <!-- VENTANAS MODALES -->
    <!-- MODAL AGREGAR LIBRO -->
    <div class="modal fade" id="frmAgregarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ventana_registro">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">INGRESAR NUEVO LIBRO</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <div class="modal-body was-validated">
                    

                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn btn-success">GUARDAR DATOS</button>
                </div>
            </div>
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
                     
                    
                </div>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer bg-dark text-light">
                    <button type="button" class="btn " data-dismiss="modal">CANCELAR</button>
                    <button type="button" class="btn  btn-danger" data-dismiss="modal">ELIMINAR</button>
                </div>
            </div>
        </div>
    </div>     
    
    <?php include 'php_moldes_html/librerias_js.php'; ?> 

    <script type="text/javascript">
        $('.carousel').carousel()

    </script>

    <script type="text/javascript">
        //para el visor de imagenes
        jQuery('#out-of-the-box-demo').slippry();
     </script>    
</body>

</html>

