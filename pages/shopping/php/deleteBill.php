<?php
    include '../../base/utils/utils.php';

    setcookie('shopCar', '', true);
    echo getResponse('OK', 'Factura eliminada con exito');
?>