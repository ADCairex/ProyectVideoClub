
function createDivProductCar(product, divContainer) {
    if (product.routProduct.includes('.mp3')) {
        var div = '<li class="metaMusicBoxDescription">';
            div += '<div>';
                div += '<h3>Canción: ' + product.name + '</h3>'; //Title of the video
            div += '</div>';
            div += '<div>';
                div += '<h3>Precio: ' + product.price + '</h3>'
            div += '</div>';
            div += '<div class="quantity">';
                div += '<i class="fas fa-minus-circle" style="color: red" onclick="removeQuantity('+product.idProduct+')"></i><h4>Cantidad: ' + product.quantity + '</h4><i class="fas fa-plus-circle" style="color: green" onclick="addQuantity('+product.idProduct+')"></i>'; //Number visualizacions bought
            div += '</div>';
            div += '<div>';
                div += '<h4>Total: ' + product.linePrice + '</h4>'; //Number visualizacions bought
            div += '</div>';
        div += '</li>';
    } else if (product.routProduct.includes('.mp4')) {
        var div = '<li class="metaVideoBoxDescription">';
            div += '<div>';
                div += '<h3>Vídeo: ' + product.name + '</h3>'; //Title of the video
            div += '</div>';
            div += '<div>';
                div += '<h3>Precio: ' + product.price + '</h3>'
            div += '</div>';
            div += '<div class="quantity">';
                div += '<i class="fas fa-minus-circle" style="color: red" onclick="removeQuantity('+product.idProduct+')"></i><h4>Cantidad: ' + product.quantity + '</h4><i class="fas fa-plus-circle" style="color: green" onclick="addQuantity('+product.idProduct+')"></i>'; //Number visualizacions bought
            div += '</div>';
            div += '<div>';
                div += '<h4>Total: ' + product.linePrice + '</h4>'; //Number visualizacions bought
            div += '</div>';
        div += '</li>';
    } else {
        var div = 'Error en la ruta de la base de datos';
    }


    divContainer.innerHTML += div;

}


function loadProductsInDivCar(productsJSON, divContainer) {
    if (productsJSON.lines.length <= 0) {
        alert('No hay productos que mostrar');
    } else {
        for (let i in productsJSON.lines) {
            let product = productsJSON.lines[i];
            createDivProductCar(product, divContainer);
        }
        if (!document.getElementById('divCookieCar').contains(document.getElementById('detailBill'))) {
            document.getElementById('divCookieCar').innerHTML += '<a href="bill.php"><button id="detailBill">Factura detallada</button></a>';
        }

        if (!document.getElementById('divCookieCar').contains(document.getElementById('billBt'))) {
            document.getElementById('divCookieCar').innerHTML += '<button id="billBt" onclick="finishBill()">Finalizar factura</button>';
        }
    }
}

function loadProductsShopCar() {

    let divContainer = document.getElementById('ulCookieCar');
    divContainer.innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {

                loadProductsInDivCar(response.data, divContainer);

            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }
    xhttp.open('GET', 'php/getShopCar.php', true);
    xhttp.send();
}

document.addEventListener("DOMContentLoaded", function (event) {

    loadProductsShopCar();
});