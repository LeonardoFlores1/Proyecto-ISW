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
                    <li class="nav-item active">
                        <a class="nav-link" href="compras.php">Comprar Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas.php">Vender Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intercambio.php">Cambiar Articulo</a>
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

    <div class="container bg-light mt-3 border">
        <!-- Area de filtrado -->
        <div class="row mt-3 border bg-secondary text-light">
            <div class="col-lg-3 form-group">
                <label for="">Titulo de libro:</label>
                <input type="text" class="form-control" placeholder="Titulo de libro">
            </div>
            <div class="col-lg-3 form-group">
                <label for="">Autor:</label>
                <input type="text" class="form-control" placeholder="Autor">
            </div> 
            <div class="col-lg-3 form-group">
                <label for="">Precio estimado:</label>
                <input type="number" class="form-control" value="0">
            </div>
            <div class="col-lg-3 form-group">
                <label for="" class="d-sm-0">Buscar libros</label>
                <span class="btn btn-dark btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                    <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Buscar </span>
                </span>  
            </div>
        </div>
        <!-- Area de selects -->
        <div class="row mt-3">                   
            <!-- select LIBROS PARA COMPRAS -->
            <div class="col-lg-4">
                <h5 class="text-center">LIBROS DISPONIBLES</h5>
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
                    <span class="btn btn-success btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Realizar Compra </span>
                    </span>                    
                </div>
            </div>            
            <!-- DETALLES DE LIBRO -->
            <div class="col-lg-4 mt-4">
                <!-- Imagenes del visor -->
                <div class="row my-2 mx-auto">
                    <div class="col-lg-5">
                        <ul id="out-of-the-box-demo">
                          <li>
                            <a href="#slide1">
                              <img src="img/ventas/prueba 01.jpg" alt="">
                            </a>
                          </li>
                          <li>
                            <a href="#slide2">
                              <img src="img/ventas/prueba 02.jpg"  alt="">
                            </a>
                          </li>
                          <li>
                            <a href="#slide3">
                              <img src="img/ventas/prueba 03.jpg" alt="">
                            </a>
                          </li>                          
                        </ul>
                    </div>
                    <!-- Informacion de Libro -->
                    <div class="col-lg-7">
                        <h5 class="">Nombre:</h5>
                        <h6>Fisica Universitaria Se 11 edicion</h6>
                        <h5 class="">Precio:</h5>
                        <h6 class="text-success">LPS.- 10000</h6>
                        <h5 class="">Disponible para intercambio:</h5>
                        <h6 class="text-danger">NO</h6>
                        <h5 class="">Observaciones:</h5>
                        <h6>La tapa frontal esta dañada</h6>
                    </div>
                </div>
            </div>
            <!-- COMPRAS ya realizadas-->
            <div class="col-lg-4">
                <h5 class="text-center">MIS COMPRAS</h5>
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
                    <span class="btn btn-danger btn-md col-12" data-toggle="modal" data-target="#frmAgregarLibro">
                        <span class="fas fa-share-square text-left iconos">&nbsp; &nbsp; Cancelar Compra </span>
                    </span>                    
                </div>
            </div> 
        </div>        
    </div>
    
    <?php include 'php_moldes_html/librerias_js.php'; ?> 

    <script type="text/javascript">
          //para el visor de imagenes
        jQuery('#out-of-the-box-demo').slippry();

    </script>   
</body>

</html>

