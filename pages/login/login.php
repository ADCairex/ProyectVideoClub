<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php 
        include 'loadLibreries.html';
    ?>
</head>

<body>
    <section class="features">
        <div id="formsDiv">
            
            <div id="newClient" style="display: none;">
                <form onsubmit="return addUser();" method="POST" id="formulario">
                    <h2>Sign up</h2>
                    <label for="addUsername"></label>
                    <input type="text" name="addUsername" id="addUsername" placeholder="Username" required>
                    <label for="addName"></label>
                    <input type="text" name="addName" id="addName" placeholder="Name:  Angel" required>
                    <label for="addUsername"></label>
                    <input type="text" name="addSurnames" id="addSurnames" placeholder="Surnames: Martínez Guradiola" required>
                    <label for="addEmail"></label>
                    <input type="text" name="addEmail" id="addEmail" placeholder="Email: angel@guardiola.com" required>
                    <label for="addPass"></label>
                    <input type="password" name="addPass" id="addPass" placeholder="Password" required>
                    <input type="submit" value="Enviar" id="Entrar" name="Enviar">
                    <div id="addko" style="display: none; color:red; ">
                        <p>Something has gone wrong!</p>
                    </div>
                    <div id="addok" style="display: none; color:green; ">
                        <p>¡Correct Login!</p>
                    </div>
                    <p>Do you already have an account?<span onclick="backRegisterUser()">Login</span></p>
                </form>
            </div>
            
            <div id="startClient" style="display: none;">
                <form onsubmit="return comprobarDatos();" method="POST" id="formulario">
                    <h2>Sign In</h2>
                    <label for="username"></label>
                    <input type="text" name="username" id="username" placeholder="Username:  antonio@" required>
                    <label for="pass"></label>
                    <input type="password" name="pass" id="pass" required>
                    <input type="submit" value="Entrar" id="Entrar">
                    <div id="ko" style="display: none; color:red; ">
                        <p>¡Incorrect Login! Check email and password</p>
                    </div>
                    <div id="ok" style="display: none; color:green; ">
                        <p>¡Logged!</p>
                    </div>
                    <p>You do not have an account?<span onclick="backRegisterUser()">Sign up</span></p>
                </form>
            </div>

        </div>
    </section>
    <?php include "../base/footer.html" ?>
    

</body>

</html>