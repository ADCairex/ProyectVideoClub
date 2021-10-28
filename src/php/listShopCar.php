<?php
    include 'sqlFunctions.php';
    include 'utils.php';

    //Change the param of the function by the idUser who is logged right now


    try {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $products = $_COOKIE['shopCar'];
            $x = getResponse('OK', 'Contendio obtenido correctamente', json_decode($products));
            if (is_null($products)) {
                echo getResponse('KO', 'Error interno de base de datos');
            } else {
                echo getResponse('OK', 'Contendio obtenido correctamente', json_decode($products));
            }
        } else {
            echo getResponse('KO', 'Error interno');
        }
    } catch (Exception $e) {
        echo getResponse('Ko', 'Error interno');
    } 
?>