function createDivProduct(product , divContainer) {
    console.log(product.routProduct.includes('.mp4'));
    if (product.routProduct.includes('.mp3')) {
        let div = '<div class="containerBox">';
                div += '<div class="productBoxMusic">';
                    div += '<div class="musicBox">';
                        div += '<audio controls id="'+product.idProduct+'">';
                            div += '<source src="'+product.idProduct+'" type="audio/mpeg">'
                        div += '</audio>';
                    div += '</div>';
                div += '<div class="musicBoxDescription">';
                    div += '<div class="avatar">';
                        div += '<a href="#.php"><img src="IMAGES/tittleImage.png" onerror="" width="50px" height="50px"></a>'; //Profile of the user who uploaded the video
                    div += '</div>';
                div += '<div class="metaMusicBoxDescription">';
                    div += '<div>';
                        div += '<h3>Titulo</h3'; //Title of the video
                    div += '</div>';
                    div += '<div>';
                        div += '<h4> 19 visualizaciones</h4>'; //Number of video views
                    div += '</div>';
                    div += '<div>';
                        div += '<h4>hace 5 horas</h4>'; //Time ago the video was upload
                    div += '</div>';
                div += '<div>';
            div += '</div>';
    } else if (product.routProduct.includes('.mp4')) {
        var div = '<div class="containerBox">';
                div += '<div class="productBoxVideo">';
                    div += '<div class="videoBox">';
                        div += '<video controls id="'+product.idProduct+'">';
                            div += '<source src="'+product.routProduct+'" type="video/mp4">'
                        div += '</video>';
                    div += '</div>';
                div += '<div class="videoBoxDescription">';
                    div += '<div class="avatar">';
                        div += '<a href="#.php"><img src="IMAGES/tittleImage.png" onerror="" width="50px" height="50px"></a>'; //Profile of the user who uploaded the video
                    div += '</div>';
                div += '<div class="metaVideoBoxDescription">';
                    div += '<div>';
                        div += '<h3>Titulo</h3'; //Title of the video
                    div += '</div>';
                    div += '<div>';
                        div += '<h4> 19 visualizaciones</h4>'; //Number of video views
                    div += '</div>';
                    div += '<div>';
                        div += '<h4>hace 5 horas</h4>'; //Time ago the video was upload
                    div += '</div>';
                div += '<div>';
            div += '</div>';
    } else {
        let div = 'Error en la ruta de la base de datos';
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

function loadProducts() {
    
    let divContainer = document.getElementById('content');
    divContainer.innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                loadProductsInDiv(response.data, divContainer);
            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }
    xhttp.open('GET', 'src/php/listBuyUserProducts.php', true);
    xhttp.send();
}