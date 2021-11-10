<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Login</title>
    <!-- <link  href="../css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css"> -->
    <?php include 'loadLibreries.html' ?>
    
</head>
<body>
    <?php require_once "../header.php"; session_start(); ?>
    <section class="features">
    <?php require_once  '../filterCategory.html'?>
<div id="formsDiv">

                            <!-- <img src="../images/perfil.png" style=" width: 60px;"> -->
                                <!-- <h1>VIDEOS LOVE.  TUS VÍDEOS</h1> -->
                                <input type="submit" value="Registro Nuevo" id="botton" onclick ="showUserRegister()"><br>
                                <div id="newClient" style="display: none;">
                                    <form onsubmit="return addUser();" method="POST" id="formulario">
                                        <h2>Sign up</h2>
                                        Username: <input type="text" name="addUsername" id="addUsername" required> <br>  
                                        Name: <input type="text" name="addName" id="addName" required> <br>  
                                        Surnames: <input type="text" name="addSurnames" id="addSurnames" required> <br>  
                                        Email: <input type="text" name="addEmail" id="addEmail" required><br> 
                                        Password: <input type="password" name="addPass" id="addPass" required><br> 
                                        <input type="submit" value="Enviar" id="Entrar" name="Enviar">
                                        <div id="addko" style="display: none; color:red; ">
                                            <p>Something has gone wrong!</p>
                                        </div>
                                        <div id="addok" style="display: none; color:green; ">
                                            <p>¡Correct Login!</p>
                                        </div>
                                    </form>
                                    <p>Do you already have an account?<span onclick="atrasRegisUser()">Login</span></p>
                                    <img onclick="atrasRegisUser()" src="https://cdn-icons-png.flaticon.com/512/860/860825.png" width="26px">
                                </div>
                                <input type="submit" value="Inicio sesion" id="botton2" onclick ="showUserStart()"><br>
                                <div id="startClient"style="display: none;">
                                    <form onsubmit="return comprobarDatos();" method="POST" id="formulario">
                                        <h2>Sign In</h2>
                                        Username: <input type="text" name="username" id="username" required><br> 
                                        Password: <input type="password" name="pass" id="pass" required><br> 
                                        
                                        <input type="submit" value="Entrar" id="Entrar">

                                        <div id="ko" style="display: none; color:red; ">
                                            <p>¡Incorrect Login! Check email and password</p>
                                        </div>
                                        <div id="ok" style="display: none; color:green; ">
                                            <p>¡Logged!</p>
                                        </div>
                                    </form>
                                    <p>You do not have an account?<span onclick="atrasRegisUser()">Sign up</span></p>
                                </div>
                    
</div>
</section>
<?php require_once "../footer.html"; ?>
<script src="js/script.js" ></script>

</body>
</html>