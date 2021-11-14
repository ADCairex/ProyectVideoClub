

function createDivProduct(product, divContainer) {
    if (product.routProduct.includes('.mp3')) {
        var div = '<form class="containerBox" onsubmit="return showProduct();" method="GET">';
        div += '<div class="productBoxMusic">';
        div += '<div class="musicBox">';
        div += '<audio controls id="' + product.idProduct + '">';
        div += '<source src="../base/' + product.routProduct + '" type="audio/mpeg">'
        div += '</audio>';
        div += '</div>';
        div += '<div class="musicBoxDescription">';
        div += '<div class="avatar">';
        div += '<a href="#.php"><img src="../../IMAGES/tittleImage.png" onerror="" width="50px" height="50px"></a>'; //Profile of the user who uploaded the video
        div += '</div>';
        div += '<div class="metaMusicBoxDescription">';
        div += '<div>';
        div += '<h3>' + product.name + '</h3>'; //Title of the video
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
        var div = '<form class="containerBox" onsubmit="return showProduct();" method="GET">';
        div += '<div class="productBoxVideo">';
        div += '<div class="videoBox">';
        div += '<video controls id="' + product.idProduct + '">';
        div += '<source src="../base/' + product.routProduct + '" type="video/mp4">'
        div += '</video>';
        div += '</div>';
        div += '<div class="videoBoxDescription">';
        div += '<div class="avatar">';
        div += '<a href="#.php"><img src="../../IMAGES/tittleImage.png" onerror="" width="50px" height="50px"></a>'; //Profile of the user who uploaded the video
        div += '</div>';
        div += '<div class="metaVideoBoxDescription">';
        div += '<div>';
        div += '<h3>' + product.name + '</h3>'; //Title of the video
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



function showProduct() {
    let divContainer = document.getElementById('shopContainerProduct');
    divContainer.innerHTML = '';
    // alert("Entra");
    debugger;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                // loadProductsInDiv(response.data, divContainer);
                window.location.href = "../shopping/product.php";
            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }

    let idProduct = document.getElementById("idProduct").value;
    var params = "idProduct=" + idProduct;

    xhttp.open('GET', 'php/getProduct.php', true);
    xhttp.send(params);
}

document.addEventListener("DOMContentLoaded", function (event) {

    showProduct();
});



