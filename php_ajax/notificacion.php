<?php 
	error_reporting(1);
	session_start();
	include '../coneccion.php' 
?>

<?php

$ID_Usuario = $_SESSION['id_usuario'];
$id_libro = 
$id_usuario2 = 'SELECT id_usuario FROM Usuario WHERE id_libro = ';
$sql = 'INSERT INTO Notificaciones (usuario1, usuario2, id_libro, precio_regateo)
     VALUES('.$ID_Usuario','$id_usuario2',"'.$_POST[precio_regateo]'"); 


?>


				