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


    <link rel="icon" type="image/gif" href="img/IconosPagina_Base/Icono2.gif">

    <link rel = "icon" type = "image/png" href = "img/IconosPagina_Base/Icono2.png">


</head>

<body>
    <!-- Barra de navegacion -->
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

            <a class="navbar-brand" href="pagina_base.php">

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
                    <li class="nav-item active">
                        <a class="nav-link" href="compras.php">Comprar Articulo<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas.php">Vender Articulo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intercambio.php">Cambiar Articulo</a>
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

    <div class="container bg-light mt-3 border">
        <div class = "row">
            <div class = "col-md-4">
                
            </div>
            <div class = "col-md-4">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block" width="360" src="img/ventas/prueba 01.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block" width="360" src="img/ventas/prueba 02.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block " width="360" src="img/ventas/prueba 03.jpg" alt="Third slide">
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
                
                
        </div>
        <br>
        <br>
    </div>
    
    <?php include 'php_moldes_html/librerias_js.php'; ?> 

    <script type="text/javascript">
        $('.carousel').carousel()

    </script>   
</body>

</html>

