function createDivCategory(category, divContainer) {
    var div = '<li>';
    div += '<div onclick="loadProductsCat(' + category.idCategory + ')">';
    div += '<i class="' + category.description + '" style="font-size:24px;"></i>'
    div += '<p>';
    div += category.name;
    div += '</p>';
    div += '</div>';
    div += '</li>';

    divContainer.innerHTML += div;
}

function loadCategoriesInDiv(categoriesJSON, divContainer) {
    if (categoriesJSON.length > 0) {
        for (let i in categoriesJSON) {
            let category = categoriesJSON[i];
            createDivCategory(category, divContainer);
        }
    }
}

function loadCategories() {

    let divContainer = document.getElementById('categoryContainer');
    divContainer.innerHTML = '';

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                loadCategoriesInDiv(response.data, divContainer);
            } else {
                alert('Se ha producido un error prueba mas tarde');
            }
        }
    }
    xhttp.open('GET', 'php/getCategories.php', true);
    xhttp.send();
}

document.addEventListener('DOMContentLoaded', function (event) {
    loadCategories();
});