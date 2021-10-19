<?php
    $dbServer = new mysqli('localhost', 'root', '', 'ProyectVideoClub');

    if ($dbServer->connect_errno) {
        echo 'Error: No se puedo conectar a MySQL';
    }

    //Create line in a bill
    function addLineSale($idLineSale, $idBill, $idProduct, $quantity, $idPrice) {
        global $dbServer;
        $sql = "INSERT INTO `LineSale`(`idLineSale`, `idBill`, `idProduct`, `quantity`, `price`) VALUES ('".$idLineSale."','".$idBill."','".$idProduct."','".$quantity."','".$idPrice."')";
        $dbServer->query($sql);
    }

    //Create new bill
    function createBill($idUser, $arrayLines) {
        global $dbServer;

        //Asign the idBill
        $sql = "SELECT MAX(idBill) AS idBill FROM Bill";
        $idBill = $dbServer->query($sql)->fetch_assoc();
        $idBill = $idBill["idBill"];
        if ($idBill == 'NULL') {
            $idBill = 1;
        } else {
            $idBill += 1;
        }
        $sql = "INSERT INTO `Bill` (`idBill`, `idUser`, `total`) VALUES ($idBill, '2', '1');";
        $dbServer->query($sql);

        $maxIdLineSale = count($arrayLines);
        $idLineSale = 1;

        //arrayLines (format) 0=>idProduct, 1=>price, 2=>quantity
        foreach ($arrayLines as &$i) {
            addLineSale($idLineSale, $idBill, $i[0], $i[2], $i[1]);
            $idLineSale += 1;
        }
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
        $sql = "INSERT INTO ProductCategories (idCategory, idProduct) VALUES (NULL, ".$idCategory.", ".$idProduct."";
        $dbServer->query($sql);        
    }

    //Delete a category from a product
    function deleteCategoryToo($idCategory, $idProduct) {
        global $dbServer;
        $sql = "DELETE FROM ProductCategories WHERE idCategory = ".$idCategory." AND idProduct = ".$idProduct."";
        $dbServer->query($sql);
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
    function getUserData($idUser) {
        global $dbServer;
        $sql = "SELECT * FROM `User` WHERE `idUser` = ".$idUser;
        $x = $dbServer->query($sql);
        return $x->fetch_row();
    }

    //Get the product data from the DataBase
    function getProductData($idProduct) {
        global $dbServer;
        $sql = "SELECT * FROM `Product` WHERE `idProduct` = ".$idProduct;
        $x = $dbServer->query($sql);
        return $x->fetch_row();
    }
?>
