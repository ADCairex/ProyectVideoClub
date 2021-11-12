<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Products</title>
        <?php 
            include 'loadLibreries.html';
            include '../base/utils/join_session.php';
        ?>
    </head>
    <body>
        <?php include '../base/header.php' ?>

        <div class="mainPrincipal">
        <div class="filterCategory">
            <ul id="categoryContainer">

            </ul>
        </div>

        <div class="mainBox">
            <div id="shopContainer">
            </div>
            <div id="divCookieCar">
                <h2>Mis compras</h2>
                <ul id="ulCookieCar">

                </ul>
            </div>
        </div>
        </div>





    <?php include '../base/footer.html' ?>
</body>

</html>