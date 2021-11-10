function addUser() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            if (response.status == "OK") {

                document.getElementById("addok").style.display = "block";

                alert("Usuario añadido correctamente");
                window.location.href = "../shopping/shopping.php";
            } else if (response.status == "KO_LOGIN") {
                alert("Se ha producido un error al añadir el usuario");
                document.getElementById("addko").style.display = "block";
            }
            else {
                alert("Se ha producido un error, inténtalo de nuevo más tarde");
            }

        }
    }



    //Monto los parámetros de la llamada
    let username = document.getElementById("addUsername").value;
    let name = document.getElementById("addName").value;
    let surnames = document.getElementById("addSurnames").value;
    let email = document.getElementById("addEmail").value;
    let pass = document.getElementById("addPass").value;
    var params = "username=" + username + "&name=" + name + "&surnames=" + surnames + "&email=" + email + "&pass=" + pass;

    xhttp.open("POST", "php/addUser.php", true);


    // envío con POST requiere cabecera y cadena de parámetros
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    return false;
}