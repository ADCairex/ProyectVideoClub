function doLogin() {

    //preparo la petición AJAX
    var xhttp = new XMLHttpRequest();

    //Cómo es una petición asíncrona, me espero a que conteste el servidor
    xhttp.onreadystatechange = function () {
        // console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            //Cuando se haya terminado la petición

            //recibo la respuesta en formato de texto, como será un JSON lo parseo para poder utilizarlo
            let response = JSON.parse(this.responseText);

            if (response.status === "OK") {

                document.getElementById("login-ok").style.display = "block";

                //redirigir a home		
                window.location.href = "index.php";

            } else if (response.status === "KO_LOGIN") {

                document.getElementById("login-ko").style.display = "block";

            } else {
                alert("Se ha producido un error, si el problema persiste contacta con el administrador")
            }
        }

    }

    //Oculto los mensajes de error del login
    document.getElementById("login-ko").style.display = "none";

    //Monto los parámetros de la llamada
    let username = document.getElementById("usernameLog").value;
    let password = document.getElementById("password_log").value;
    var params = "username=" + username + "&password=" + password;
    //realizo la petición
    xhttp.open("POST", "../src/php/do_login.php", true);
    // Tengo que indicar en la cabecera cómo voy a enviar los parámetros
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    alert(params);
    return false;
}