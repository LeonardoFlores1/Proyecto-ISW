<?php
	session_start();
	if (!isset($_SESSION['id_usuario'])||($_SESSION['id_usuario'] <= 0)) {
		header('location: login.php');
	}	  
?>