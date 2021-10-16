<?php
    $dbServer = new mysqli('localhost', 'root', '', 'ProyectVideoClub');

    if ($dbServer->connect_errno) {
        echo 'Error: No se puedo conectar a MySQL';
    }

    function createBill() {

    }

    //Add a view to a video from an user
    function addViewUser($idUser, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO `BuyUserProduct` (`idBuyUserProduct`, `idUser`, `idProduct`) VALUES (NULL, '".$idUser."', '".$idProduct."', 0";
        $dbServer->query($sql);
    }

    //Add new video to an user inventory
    function addBuyUser($idUser, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO `BuyUserProduct` (`idBuyUserProduct`, `idUser`, `idProduct`) VALUES (NULL, '".$idUser."', '".$idProduct."'";
        $dbServer->query($sql);
    }

    //Add new product to the product list
    function addNewProduct($name, $idAuthor, $price, $routProduct) {
        global $dbServer;
        $sql = "INSERT INTO `Product` (`idProduct`, `name`, `idAuthor`, `price`, `routProduct`) VALUES (NULL, '".$name."', '".$idAuthor."', '".$price."', '".$routProduct."');";
        $dbServer->query($sql);
    }

    //Delete a product from the product list
    function deleteProduct($idProduct) {
        global $dbServer;
        $sql = "DELETE FROM `Product` WHERE `Product`.`idProduct` = ".$idProduct.";";
        $dbServer->query($sql);
    }

    //Add new category to a video
    function addCategoryToo($idCategory, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO `ProductCategory` (`idProductCategory`, `idCategory`, `idProduct`) VALUES (NULL, '".$idCategory."', '".$idProduct."'";
        $dbServer->query($sql);        
    }

    function deleteCategoryToo() {

    }
    
    function deleteProductToo() {

    }

    function addProductToo() {

    }

    //Add new user to the DataBase
    function addNewUser($username, $pass, $name, $surnames, $addr) {
        global $dbServer;
        $sql = "INSERT INTO `User` (`idUser`, `username`, `pass`, `name`, `surnames`, `addr`) VALUES (NULL, '".$username."', '".$pass."', '".$name."', '".$surnames."', '".$addr."');";
        $dbServer->query($sql);
    }

    //Get the user data from the DataBase
    function getUserData() {
        global $dbServer;
        $sql = "SELECT * FROM `User`";
        $dbServer->query($sql);
    }
?>