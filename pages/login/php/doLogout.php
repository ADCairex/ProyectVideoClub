<?php
    session_start();
    session_destroy();
    setcookie('shopCar', '');
    $host = $_SERVER['HTTP_HOST'];
	$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
	$login = 'login.php';
    $url = "http://$host$ruta/../".$login;
    header('Location: '.$url);
?>