function createDivProductCar(product , divContainer) {
    if (product.routProduct.includes('.mp3')) {
        var div = '<div class="containerBox">';
                div += '<div class="metaMusicBoxDescription">';
                    div += '<div>';
                        div += '<h3>Titulo de la cancion: '+product.name+'</h3>'; //Title of the video
                    div += '</div>';
                    div += '<div>';
                        div += '<h3>Precio unitario: '+product.price+'</h3>'
                    div += '</div>';
                    div += '<div>';
                        div += '<h4>Precio total: '+product.linePrice+'</h4>'; //Number visualizacions bought
                    div += '</div>';
                    div += '<div>';
                        div += '<h4>Cantidad: '+product.quantity+'</h4>'; //Number visualizacions bought
                    div += '</div>';
                div += '<div>';
            div += '</div>';
    } else if (product.routProduct.includes('.mp4')) {
        var div = '<div class="containerBox">';
                div += '<div class="metaVideoBoxDescription">';
                    div += '<div>';
                        div += '<h3>Titulo del video: '+product.name+'</h3>'; //Title of the video
                    div += '</div>';
                    div += '<div>';
                        div += '<h3>Precio unitario: '+product.price+'</h3>'
                    div += '</div>';
                    div += '<div>';
                        div += '<h4>Precio total: '+product.linePrice+'</h4>'; //Number visualizacions bought
                    div += '</div>';
                    div += '<div>';
                        div += '<h4>Cantidad: '+product.quantity+'</h4>'; //Number visualizacions bought
                    div += '</div>';
                div += '<div>';
            div += '</div>';
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
        divContainer.innerHTML += '<button>Finalizar factura</button>';
    }
}

function loadProductsShopCarCookies() {
    
    let divContainer = document.getElementById('cookieCar');
    divContainer.innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                loadProductsInDivCar(response.data, divContainer);
            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }
    xhttp.open('GET', '../src/php/listShopCar.php', true);
    xhttp.send();
}

document.addEventListener("DOMContentLoaded", function(event) { 
    
    loadProductsShopCarCookies();
});