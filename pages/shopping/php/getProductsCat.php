<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';

    //Change the param of the function by the idUser who is logged right now

    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idCategory = $_POST['id'];
            $products = getProductByCategory($idCategory);
            
            if (is_null($products)) {
                echo getResponse('KO', 'Error interno de base de datos');
            } else {
                echo getResponse('OK', 'Contendio obtenido correctamente', $products);
            }
        } else {
            echo getResponse('KO', 'Error interno');
        }
    } catch (Exception $e) {
        echo getResponse('Ko', 'Error interno');
    } 
?>