<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';

    try {
        if (isset($_COOKIE['shopCar'])) {
            $shopCar = json_decode($_COOKIE['shopCar']);

            createBill(3, $shopCar->lines); //The first param is the idUser
            echo getResponse('OK', 'Factura generada correctamente');
            setcookie('shopCar', '', true);
        }
    } catch (Exception $e) {
        echo getResponse('KO', 'Error no se ha generado la factura');
    }
?>