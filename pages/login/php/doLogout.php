<?php
    session_start();
    session_destroy();
    $host = $_SERVER['HTTP_HOST'];
	$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
	$login = 'login.php';
    $url = "http://$host$ruta/../".$login;
    header('Location: '.$url);
?>