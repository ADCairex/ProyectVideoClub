function finishBill() {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                alert('Factura generada con exito');
                loadProductsShopCarCookies();
            } else {
                alert('Ha habido un error al generar la factura');
            }
        }
    }

    xhttp.open('POST', 'php/generateBill.php', true);
    xhttp.send();
}