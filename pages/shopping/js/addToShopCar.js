

function addToShopCar(idProduct) {

    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = async function() {
		if (this.readyState == 4 && this.status == 200) {            
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                loadProductsShopCar();
                alert("Añadido al carrito!");
            } else {
                alert("Se ha producido un error, " + response.message);
            }
        }
    }

    let quantity = document.getElementById('quantity' + idProduct).value;
    let product = "idProduct=" + idProduct + "&quantity=" + quantity;

    xhttp.open("POST", "php/shoppingCar.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(product);

}

function addQuantity(idProduct) {

    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = async function() {
		if (this.readyState == 4 && this.status == 200) {            
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                loadProductsShopCar();
            } else {
                alert("Se ha producido un error, " + response.message);
            }
        }
    }

    let product = "idProduct=" + idProduct;

    xhttp.open("POST", "php/addQuantity.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(product);

}

function removeQuantity(idProduct) {

    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = async function() {
		if (this.readyState == 4 && this.status == 200) {            
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                loadProductsShopCar();
            } else {
                alert("Se ha producido un error, " + response.message);
            }
        }
    }

    let product = "idProduct=" + idProduct;

    xhttp.open("POST", "php/removeQuantity.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(product);

}

function deleteBill() {

    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = async function() {
		if (this.readyState == 4 && this.status == 200) {            
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                loadProductsShopCar();
            } else {
                alert("Se ha producido un error, " + response.message);
            }
        }
    }

    xhttp.open("POST", "php/deleteBill.php", true);
    xhttp.send();

}