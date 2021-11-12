function comprobarDatos() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);


            if (response.status === "OK") {
                alert('correcto');

                //redirigir a home		
                window.location.href = "../shopping/shopping.php";
            } else {
                alert('incorrecto');

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