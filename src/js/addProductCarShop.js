function addProductToCarShop(idProduct) {

    $.post('shopping.php', {'idProduct':idProduct});    
}