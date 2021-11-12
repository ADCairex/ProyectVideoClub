function createDivProduct(product, divContainer) {
    if (product.routProduct.includes('.mp3')) {
        var div = '<div class="containerBox">';
        div += '<div class="productBoxMusic">';
        div += '<div class="musicBox">';
        div += '<audio controls id="' + product.idProduct + '">';
        div += '<source src="../base/' + product.routProduct + '" type="audio/mpeg">'
        div += '</audio>';
        div += '</div>';
        div += '<div class="musicBoxDescription">';
        // div += '<div class="avatar">';
        //     div += '<a href="#.php"><img src="../../IMAGES/tittleImage.png" onerror="" width="50px" height="50px"></a>'; //Profile of the user who uploaded the video
        // div += '</div>';
        div += '<div class="metaMusicBoxDescription">';
        div += '<div>';
        div += '<h3>' + product.name + '</h3>'; //Title of the video
        div += '</div>';
        // div += '<div>';
        //     div += '<h4> 19 visualizaciones</h4>'; //Number of video views
        // div += '</div>';
        // div += '<div>';
        //     div += '<h4>hace 5 horas</h4>'; //Time ago the video was upload
        // div += '</div>';
        div += '<div>';
        div += '<h4>Quedan: ' + product.stock + '</h4>'; //Time ago the video was upload
        div += '</div>';
        div += '<div>';
        div += '<h4>Cantidad: <input type="text" id="quantity' + product.idProduct + '"></h4>'; //Quantity of products you buy
        div += '</div>';
        div += '<div>';
        div += '<button onclick="addToShopCar(' + product.idProduct + ')">Agregar al carrito</button>'; //Change for an icon of a buy cest
        div += '</div>';
        div += '<div>';
        div += '</div>';
    } else if (product.routProduct.includes('.mp4')) {
        var div = '<div class="containerBox">';
        div += '<div class="productBoxVideo">';
        div += '<div class="videoBox">';
        div += '<video controls id="' + product.idProduct + '">';
        div += '<source src="../base/' + product.routProduct + '" type="video/mp4">'
        div += '</video>';
        div += '</div>';
        div += '<div class="videoBoxDescription">';
        // div += '<div class="avatar">';
        //     div += '<a href="#.php"><img src="../../IMAGES/tittleImage.png" onerror="" width="50px" height="50px"></a>'; //Profile of the user who uploaded the video
        // div += '</div>';
        div += '<div class="metaVideoBoxDescription">';
        div += '<div>';
        div += '<h3>' + product.name + '</h3>'; //Title of the video
        div += '</div>';
        // div += '<div>';
        //     div += '<h4> 19 visualizaciones</h4>'; //Number of video views
        // div += '</div>';
        // div += '<div>';
        //     div += '<h4>hace 5 horas</h4>'; //Time ago the video was upload
        // div += '</div>';
        div += '<div>';
        div += '<h4>Quedan: ' + product.stock + '</h4>'; //Time ago the video was upload
        div += '</div>';
        div += '<div>';
        div += '<h4>Cantidad: <input type="text" id="quantity' + product.idProduct + '"></h4>'; //Quantity of products you buy
        div += '</div>';
        div += '<div>';
        div += '<button onclick="addToShopCar(' + product.idProduct + ')">Agregar al carrito</button>'; //Change for an icon of a buy cest
        div += '</div>';
        div += '<div>';
        div += '</div>';
    } else {
        var div = 'Error en la ruta de la base de datos';
    }

    divContainer.innerHTML += div;
}

function loadProductsInDiv(productsJSON, divContainer) {
    if (productsJSON.length <= 0) {
        alert('No hay productos que mostrar');
    } else {
        for (let i in productsJSON) {
            let product = productsJSON[i];
            createDivProduct(product, divContainer);
        }
    }
}

function loadProductsCat(idCategory) {
    let divContainer = document.getElementById('shopContainer');
    divContainer.innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);

            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                loadProductsInDiv(response.data, divContainer);
            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }

    let params = 'id=' + idCategory;

    xhttp.open('POST', 'php/getProductsCat.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

function loadProducts() {
    let divContainer = document.getElementById('shopContainer');
    divContainer.innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                loadProductsInDiv(response.data, divContainer);
            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }
    xhttp.open('GET', 'php/getProducts.php', true);
    xhttp.send();
}

document.addEventListener("DOMContentLoaded", function (event) {

    loadProducts();
});