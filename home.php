<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inicio PHP Caso 1</title>
        <?php
            include 'css/styles.php';
        ?>
        <script src="src/js/jquery-3.6.0.js"></script>
        <script src="src/js/listBuyUserProducts.js"></script>
    </head>
    <body>
        <?php
            include 'templates/header.php';
            include 'templates/algorithm.php';
            include 'templates/footer.php';
            include 'scripts.php';
        ?>
        <a href="http://localhost/ProyectVideoClub/templates/shopping.php">Shop</a>
        <div class="content" id="content">
            
        </div>
        <button onclick="loadBuyUserProducts()">Videos de un usuario</button>
        <button>Todos los videos</button>
    </body>
</html>