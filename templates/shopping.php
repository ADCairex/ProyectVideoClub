<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Products</title>
        <script src="src/js/jquery-3.6.0.js"></script>
        <script src="../src/js/listAllProducts.js"></script>
        <script src="../src/js/addProductCarShop.js"></script>
        <?php
            setcookie('shopCar', 'x');
            if (isset($_POST['idProduct'])) {
                $_COOKIE['shopCar'] = $_POST['idProduct'];
            }
        ?>
    </head>
    <body>
        <div id="shopContainer">

        </div>
    </body>
        <script>
            loadProductsShopCar();
        </script>
</html>