function addToShopCar(idProduct) {
    
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = async function() {
		if (this.readyState == 4 && this.status == 200) {            
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                alert("Añadido al carrito!");
                loadProductsShopCarCookies();
            } else {
                alert("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}

    let quantity = document.getElementById('quantity'+idProduct).value
    let product="idProduct="+idProduct+"&quantity="+quantity;

	xhttp.open("POST", "../src/php/shoppingCar.php", true);	
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(product);
    	
}