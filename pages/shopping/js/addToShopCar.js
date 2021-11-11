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

    let quantity = document.getElementById('quantity'+idProduct).value
    let product="idProduct="+idProduct+"&quantity="+quantity;

	xhttp.open("POST", "php/shoppingCar.php", true);	
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(product);
    	
}