<?php
    try {
        $dbServer = new PDO('mysql:host=localhost;dbname=ProyectVideoClub;charset=UTF8', 'root', '');
    } catch (PDOException $e) {
        var_dump("!Error!: " . $e->getMessage());
    }

    //Create line in a bill
    function addLineSale($idLineSale, $idBill, $idProduct, $price, $quantity) {
        global $dbServer;
        $sql = "INSERT INTO LineSale (idLineSale, idBill, idProduct, quantity, linePrice) VALUES (?, ?, ?, ?, ?)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idLineSale, $idBill, $idProduct, $quantity, $price));
    }

    //Create new bill
    function createBill($idUser, $arrayLines) {
        global $dbServer;

        //Get the actual idBill
        $sql = "SELECT MAX(idBill) AS idBill FROM Bill";
        $idBill = $dbServer->query($sql);
        $idBill = $idBill->fetchAll()[0]['idBill'];
        if ($idBill == 'NULL') {
            $idBill = 1;
        } else {
            $idBill += 1;
        }
        $sql = "INSERT INTO Bill (idBill, idUser, total) VALUES (?, ?, ?)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idBill, $idUser, $arrayLines->totalPrice));

        $maxIdLineSale = count($arrayLines->lines);
        $idLineSale = 1;

        foreach ($arrayLines->lines as &$i) {
            $newStock = getProductData($i->idProduct);
            $newStock = intval($newStock['stock']) - $i->quantity;
    
            updateStockProduct($i->idProduct, $newStock);
            addLineSale($idLineSale, $idBill, $i->idProduct, $i->linePrice, $i->quantity);
            $idLineSale += 1;
        }
    }

    //Add a view to a video from an user
    function addViewUser($idUser, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO ViewUserProduct (idViewUserProduct, idUser, idProduct, numViews) VALUES (NULL, ?, ?, 0)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idUser, $idProduct));
    }

    //Add new video to an user inventory
    function addBuyUser($idUser, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO BuyUserProduct (idBuyUserProduct, idUser, idProduct) VALUES (NULL, ?, ?)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idUser, $idProduct));
    }

    //Add new product to the product list
    function addNewProduct($name, $idAuthor, $price, $routProduct) {
        global $dbServer;
        $sql = "INSERT INTO Product (idProduct, name, idAuthor, price, routProduct) VALUES (NULL, ?, ?, ?, ?)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($name, $idAuthor, $price, $routProduct));
    }

    //Delete a product from the product list
    function deleteProduct($idProduct) {
        global $dbServer;
        $sql = "DELETE FROM Product WHERE idProduct = ?";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idProduct));
    }

    //Add new category to a video
    function addCategoryToo($idCategory, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO ProductCategories (idCategory, idProduct) VALUES (NULL, ?, ?";
        $sql = $dbServer->prepare($sql);        
        $sql->execute(array($idCategory, $idProduct));
    }

    //Delete a category from a product
    function deleteCategoryToo($idCategory, $idProduct) {
        global $dbServer;
        $sql = "DELETE FROM ProductCategories WHERE idCategory = ? AND idProduct = ?";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idCategory, $idProduct));
    }

    //Delete a product from the user inventory
    function deleteProductToo($idUser, $idProduct) {
        global $dbServer;
        $sql = "DELETE FROM BuyUserProduct WHERE idUser = ? AND idProduct = ?";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idUser, $idProduct));
    }

    //Add product to user inventory
    function addProductToo($idUser, $idProduct) {
        global $dbServer;
        $sql = "INSERT INTO BuyUserProduct (idBuyUserProduct, idUser, idProduct) VALUES (NULL, ?, ?)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($idUser, $idProduct));
    }

    function checkUserExist($username) {
        global $dbServer;
        $sql = "SELECT username FROM User WHERE username = ?";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute(array($username));

        if ($prepare->fetchAll() == []) {
            return False;
        } else {
            return True;
        }
    }

    //Add new user to the DataBase
    function addNewUser($username, $pass, $name, $surnames, $email) {
        global $dbServer;
        $sql = "INSERT INTO User (idUser, username, pass, name, surnames, email) VALUES (NULL, ?, ?, ?, ?, ?)";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($username, $pass, $name, $surnames, $email));
    } 

    function updateStockProduct($idProduct, $newStock) {
        global $dbServer;
        $sql = "UPDATE Product SET stock = ? WHERE Product.idProduct = ?";
        $sql = $dbServer->prepare($sql);
        $sql->execute(array($newStock, $idProduct));
    }

    //Get an array of all categories from de DataBase
    function getAllCategories() {
        global $dbServer;
        $sql = "SELECT * FROM Category";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute();

        return $prepare->fetchAll();
    }

    //Get the user data from the DataBase
    function getUserData($idUser='', $username='') {
        global $dbServer;
        $sql = "SELECT * FROM User WHERE idUser = ? OR username = ?";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute(array($idUser, $username));

        $info = $prepare->fetchAll();
        
        if (empty($info)) {
            return 'No exist';
        } else {
            return $info[0];
        }     
    }



    //Get an array of all the product from the DataBase
    function getAllProducts() {
        global $dbServer;
        $sql = "SELECT * FROM Product";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute();

        return $prepare->fetchAll();
    }

    //Gen an array of all the product by her category from the DataBase
    function getProductByCategory($idCategory) {
        global $dbServer;
        $sql = "SELECT Product.idProduct, Product.name, Product.idAuthor, Product.price, Product.stock, Product.routProduct FROM Product INNER JOIN ProductCategories on Product.idProduct = ProductCategories.idProduct INNER JOIN Category ON Category.idCategory = ProductCategories.idCategory WHERE Category.idCategory = ?";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute(array($idCategory));

        return $prepare->fetchAll();
    }

    //Get the product data from the DataBase
    function getProductData($idProduct) {
        global $dbServer;
        $sql = "SELECT * FROM Product WHERE idProduct = ?";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute(array($idProduct));

        return $prepare->fetchAll()[0];
    }

    function getBuyUserProducts($idUser) {
        global $dbServer;
        $sql = "SELECT Product.idProduct, Product.name, Product.idAuthor, Product.price, Product.routProduct FROM Product 
                INNER JOIN BuyUserProduct ON Product.idProduct = BuyUserProduct.idProduct 
                INNER JOIN User ON User.idUser = BuyUserProduct.idUser 
                WHERE User.idUser = ?;";
        $prepare = $dbServer->prepare($sql);
        $result = $prepare->execute(array($idUser));

        return $prepare->fetchAll();
    }
?>