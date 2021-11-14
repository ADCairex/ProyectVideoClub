<?php
	include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';

    //Change the param of the function by the idUser who is logged right now

    try {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $idProduct = $_GET['idProduct'];
            $product = getProductData($idProduct);  //Esta esta cambiada pero necesitamos pasarle el parámetro
            $x = getResponse('OK', 'Contendio obtenido correctamente', $product);
            if (is_null($product)) {
                echo getResponse('KO', 'Error interno de base de datos');
            } else {
                echo getResponse('OK', 'Contendio obtenido correctamente', $product);
            }
        } else {
            echo getResponse('KO', 'Error interno');
        }
    } catch (Exception $e) {
        echo getResponse('Ko', 'Error interno');
    } 
?>