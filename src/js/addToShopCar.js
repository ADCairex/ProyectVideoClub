function addToShopCar(idProduct) {
    
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                alert("Añadido al carrito!");
            } else {
                alert("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}

    let product="idProduct="+idProduct+"&quantity=1";

	xhttp.open("POST", "../src/php/shoppingCar.php", true);	
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(product);
    
    loadProductsShopCarCookies();	
}