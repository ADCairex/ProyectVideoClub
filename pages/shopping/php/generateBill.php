<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';
    
    session_start();

    try {
        if (isset($_COOKIE['shopCar'])) {
            $shopCar = json_decode($_COOKIE['shopCar']);

            createBill($_SESSION['username'], $shopCar); //The first param is the idUser
            echo getResponse('OK', 'Factura generada correctamente');
        }
    } catch (Exception $e) {
        echo getResponse('KO', 'Error no se ha generado la factura');
    }
?>