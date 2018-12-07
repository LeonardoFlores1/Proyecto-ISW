<?php session_start(); ?>
<?php
    error_reporting(0);
    include 'BackEnd\comprobador_usuario.php';    
?>

 <?php
    $conexion = mysqli_connect('localhost', 'root','','isw')
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

    <!-- LIBRERIAS -->
    <!-- etiquetas generadas por el editor -->
    <!--1--><meta name="viewport" content="width=device-width, initial-scale=1">
    <!--2--><meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--3--><link rel="stylesheet" href="librerias/bootstrap-4/css/bootstrap.min.css">  
    <!--4--><link rel = "icon" type = "image/png" href = "img/IconosPagina_Base/Icono2.png">
            <link rel="stylesheet" href="css/perfil.css">    
            <link rel="stylesheet" href="librerias/bootstrap3/bootstrap-3.3.7/dist/css/bootstrap.min.css">  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Mi perfil</title>
</head>
<body>
	<div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark navBarra">
            <a class="navbar-brand" href="pagina_base.php" style="padding:0px 0px 0px 0px;">
                <img  src="img/IconosPagina_Base/Icono1.svg" alt="Logo" style="width:40px; display:initial; padding:0px 0px 0px 0px; ">
                INTERCAMBIOS UNAH
            </a>

            <!-- boton togler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                        
            <!-- menu que se comprimira notar que el contenedor tiene el mismo id que el boton (togler) anterior -->
            <div class=" navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="notificaciones.php">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas.php">Ventas/Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="intercambio.php">Intercambiar Libro</a>
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
               <?php
                $ID_Usuario = $_SESSION['id_usuario'];
                $sql = "SELECT * FROM usuario WHERE id_usuario = ".$ID_Usuario;
                $result = mysqli_query($conexion, $sql);
                while($mostrar = mysqli_fetch_array($result)){
               ?>
                <div class = "row">
                    <h5>Nombre:<?php echo' ' . $mostrar['nombre']?></h5>
                </div>
                <hr>
                <div class = "row">
                    <h5>Correo:<?php echo ' ' .  $mostrar['correo']?></h5>
                </div>
                <hr>
                <div class = "row">
                    <h5>Telefono:<?php echo ' ' .  $mostrar['telefono']?></h5>
                </div>
                <hr>
                <div class = "row">
                    <h5>Cuenta:<?php echo ' ' .  $mostrar['no_cuenta']?></h5>
                </div>
                <hr>
                <?php
                }
                mysqli_close($coneccion); 
                ?>
       		 </div>
             <div class = "col-md-3">
               
             </div>
       			 
       		 <div class = "md-col-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id = "myBtn">Editar</button>
                                                    
            </div>
      		</div>  
    </div>
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4><span class="glyphicon glyphicon-pencil"></span> Editar perfil</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nombre</label>
              <input type="text" class="form-control" id="usrname" placeholder="Nombre">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-envelope"></span> Correo</label>
              <input type="text" class="form-control" id="psw" placeholder="Correo">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-earphone"></span> Telefono</label>
              <input type="text" class="form-control" id="psw" placeholder="Telefono">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-check"></span> Cuenta</label>
              <input type="text" class="form-control" id="psw" placeholder="Cuenta">
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
  <script>
        $(document).ready(function(){
            $("#myBtn").click(function(){
                $("#myModal").modal();
            });
        });
</script>

</body>
</html>