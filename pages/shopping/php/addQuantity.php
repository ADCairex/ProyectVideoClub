<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';

    try {
        //Request a idProduct parameter in POST
        $idProduct = $_POST['idProduct'];

        //Call Array with the parameters with idProduct
        $productData = getProductData($idProduct);

        $shopCarArray = json_decode($_COOKIE['shopCar']);

        foreach ($shopCarArray->lines as $i) {
            if ($i->idProduct == $idProduct) {
                $i->quantity += 1;
                $i->linePrice += $i->price;
                setcookie('shopCar', json_encode($shopCarArray, true), time() + 3600);
                echo getResponse('OK', 'Sumado correctamente');
                break;
            }
        }
        
        
    } catch (Exception $e) {
        echo getResponse('KO', 'Error no se ha añadido la cookie');
    }
?>