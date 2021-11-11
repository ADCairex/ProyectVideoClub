<?php
	session_start(); //unirse a la sesión
	$host = $_SERVER['HTTP_HOST'];
	$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	if (strpos($ruta, 'pages/shopping')) {
		$ruta = str_replace('/pages/shopping', '', $ruta);
	}
	$login = 'pages/login/login.php';
	$url = "http://$host$ruta/".$login;

    //Si no tengo la clave de usuario, significa que no hay iniciado sesión, por lo tanto redirigo al login
	if(!isset($_SESSION['username'])){
		header('Location: '.$url);
	}