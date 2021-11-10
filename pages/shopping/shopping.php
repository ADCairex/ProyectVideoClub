<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>
    
    <?php include 'loadLibreries.html' ?>
    <?php include '../../css/styles.php' ?>
    <?php include '../base/utils/join_session.php' ?>
    <style>
        /* #cookieCar {
            position: absolute;
            top: 100px;
            left: 1500px;
        } */
    </style>
    <script
  type="text/javascript"
  src="https://use.fontawesome.com/releases/v5.15.4/js/conflict-detection.js">
</script>

</head>

<body>
    <?php include '../header.php' ?>

    <?php require_once "../header.php"; session_start(); ?>

    <div class="container-main">
        <div id="cookieCar">
        </div>

        <div class="content-main">


        <!-- HACER UN ARRAY DE LISTADO DE LAS CATEGORÍAS, LAS CATEGORÍAS IRÁN ASIGNADAS A UNA URL DEL PROYECTO, Y SE ACCEDERÁN POR LA BD -->

        <!-- <div id="filterCategory">
            <ul>
                <li><div>
                    <img>
                    <a>hola</a>
                </div></li>
                <li><div>
                    <img>
                    <a>hola</a>
                </div></li>
            </ul>
        </div> -->
        <?php include '../filterCategory.html' ?>

<div id="shopContainer">
</div>
        </div>



    </div>



    <?php include '../footer.html' ?>
</body>

</html>