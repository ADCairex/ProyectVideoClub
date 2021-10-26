<?php
    if (isset($_POST['idProduct'])) {
        $_COOKIE['shopCar'] = $_POST['idProduct'];
    }

    //array_push($arrayShopCar, ''); //Add new row to the Shop Car

    //$_COOKIE['shopCar'] = json_encode($arrayShopCar); //Encode and add to the cookies
?>