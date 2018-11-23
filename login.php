
<?php
    error_reporting(0);
    include 'coneccion.php';
    session_start();
    $_SESSION['id_usuario']=-1;   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    
    <title>login</title>

    <!-- LIBRERIAS -->
    <?php include 'php_moldes_html/librerias_head.php'; ?> 

    <!-- ***** Mis Estilos de login ***** -->
    <link rel="stylesheet" href="css/login.css">

</head>

<body class="d-flex">    
    <div class="container align-self-center">
        <div class="row">            
            <div class="col-lg-3 col-md-1  col-sm-1"></div>         
            <form class="col-lg-6 col-md-10 col-sm-10 cuadro_login p-4 m-1 was-validated" id="form_login" >
                <!-- Icono superior -->
                <div class="row fila_absoluta">
                    <img class="icono_superior mx-auto col-12" src="img/login/Icono_User_superior.svg" alt="">
                </div>
                <!-- Nombre o logo de Empresa -->
                <div class="row form-group mx-auto">
                    <h3 class="col-12 text-center tittulo_login">UNAH INTERCAMBIOS</h3>
                </div>
                <!-- input de nombre -->
                <div class="row input-group mx-auto">                                        
                    <input class="col-11 form-control campo_texto mx-auto icono_user" type="text" placeholder="NOMBRE USUARIO" id="txt_user" name="txt_user" maxlength="40" minlength="3" autocomplete="off">                    
                </div>

                <!-- input de password -->
                <div class="row input-group mx-auto mt-2">                   
                    <input class="col-11 form-control campo_texto mx-auto icono_pass" type="password" placeholder="CONTRASEÑA" id="txt_pass" name="txt_pass" maxlength="25" minlength="3"> 
                </div>

                <!-- alertas -->                
                <div class="row input-group mx-auto mt-2" id="alerta_login">
                     
                </div>

                <!-- Boton enviar -->
                <div class="row form-group mx-auto mt-3">                    
                    <button type="button" name="btn_login" id="btn_login" class="col-11 btn btn_login mx-auto" >LOG IN</button>
                </div>                

                <!-- label de olvidar contraseña -->
                <div class="row form-groups mx-auto">
                    <label class="col-md-3 col-sm-12 text-left etiqueta" data-toggle="modal" data-target="#ventanaRegistro">¡Registrarse!</label>
                    <div class="col-md-4"></div>
                    <label class="col-md-5 col-sm-12 text-right etiqueta">¿Olvidaste tu contraseña?</label>                    
                </div>
            </form>
            <div class="col-lg-3 col-md-1 col-sm-1"></div>
        </div>               
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ventanaRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ventana_registro">
                <!-- Cabecera donde esta el titulo -->
                <div class="modal-header">
                    <h5 class="modal-title titulo_ventana_registro margen-auto" id="exampleModalLabel">CREAR USUARIO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Contenedor de contenido (formularios y demas) -->
                <form class="modal-body ventana_registro_contenido was-validated" enctype="multipart/form-data" id="formulario_registro" method="post">
                     <!-- input de nombre y apellido -->
                    <div class="row input-group mx-auto">                        
                        <input class="col-10 form-control campo_texto mx-auto icono_user" type="text" placeholder="NOMBRE" id="txt_nombre_registro" name="txt_nombre_registro" maxlength="40" minlength="3" required>                    
                    </div>
                    <!-- Contraseña -->
                    <div class="row input-group mx-auto mt-2">                        
                        <input class="col-10 form-control campo_texto mx-auto icono_pass" type="password" placeholder="CONTRASEÑA" id="txt_pass_registro" name="txt_pass_registro" maxlength="40" minlength="3" required>                    
                    </div>
                    <!-- Confirmacion Contraseña -->
                    <div class="row input-group mx-auto mt-2">
                        <input class="col-10 form-control campo_texto mx-auto icono_pass" type="password" placeholder="REPITA SU CONTRASEÑA" id="txt_pass_registro_2" name="txt_pass_registro_2" maxlength="25" minlength="3" required> 
                    </div>
                    
                    <!-- no-cuenta -->
                    <div class="row input-group mx-auto mt-2">                        
                        <input class="col-10 form-control campo_texto mx-auto icono_cuenta" type="text" placeholder="NO-CUENTA" id="txt_numero_cuenta" name="txt_numero_cuenta" maxlength="30" minlength="3" require>                   
                    </div>
                    
                    <!-- Correo -->
                    <div class="row input-group mx-auto mt-2">                        
                        <input class="col-10 form-control campo_texto mx-auto icono_correo" type="email" placeholder="CORREO" id="txt_correo_registro" name="txt_correo_registro" maxlength="40" minlength="3" required>                    
                    </div>
                    
                    <!-- telefono -->
                    <div class="row input-group mx-auto mt-2">                        
                        <input class="col-10 form-control campo_texto mx-auto icono_telefono" type="tel" placeholder="TELEFONO" id="txt_telefono_registro" name="txt_telefono_registro" maxlength="40" minlength="3">                   
                    </div>

                    <div class="row input-group mx-auto mt-2" id="alerta_registro">
                        
                    </div>                    
                </form>
                <!-- Botones de guradado y cierre -->
                <div class="modal-footer">
                    <button type="button" class="btn btn_close_registro" data-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn btn_save_registro" id="btn_guardar">GUARDAR DATOS</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Librerias js -->
    <?php include 'php_moldes_html/librerias_js.php'; ?>  
    <!-- Mis js -->
    <script src="js/login.js" type="text/javascript"></script>

</html>