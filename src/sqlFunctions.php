<?php
    $dbServer = new mysqli('localhost', 'root', '', 'ProyectVideoClub');

    if ($dbServer->connect_errno) {
        echo 'Error: No se puedo conectar a MySQL';
    }

    function createBill() {

    }

    function addViewUser() {

    }

    function addBuyUser() {

    }

    //Add new product to the product list
    function addNewProduct($name, $idAuthor, $price, $routProduct) {
        global $dbServer;
        $sql = "INSERT INTO `Product` (`idProduct`, `name`, `idAuthor`, `price`, `routProduct`) VALUES (10, '".$name."', '".$idAuthor."', '".$price."', '".$routProduct."');";
        $dbServer->query($sql);
    }

    //Delete a product from the product list
    function deleteProduct($idProduct) {
        global $dbServer;
        $sql = "DELETE FROM `Product` WHERE `Product`.`idProduct` = ".$idProduct.";";
        $dbServer->query($sql);
    }

    function addCategoryToo() {

    }

    function deleteCategoryToo() {

    }
    
    function deleteProductToo() {

    }

    function addProductToo() {

    }
?>