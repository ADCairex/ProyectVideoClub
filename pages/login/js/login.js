function comprobarDatos() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let response = JSON.parse(this.responseText);


            if (response.status === "OK") {
                document.getElementById("ok").style.display = "block";

                //redirigir a home		
                window.location.href = "../shopping/shopping.php";
            } else if (response.status === "KO_LOGIN") {
                console.log(" " + response.status + " ");
                document.getElementById("ko").style.display = "block";

            } else {
                alert("Se ha producido un error, si el problema persiste contacta con el administrador")
            }
        }
    }

    //Oculto los mensajes de error del login
    document.getElementById("ko").style.display = "none";

    //Monto los parámetros de la llamada
    let username = document.getElementById("username").value;
    let pass = document.getElementById("pass").value;
    var params = "username=" + username + "&pass=" + pass;

    xhttp.open("POST", "php/doLogin.php", true);

    // envío con POST requiere cabecera y cadena de parámetros
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    return false;
}