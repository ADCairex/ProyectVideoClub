$(document).ready(function() {
    $("#click").click(function() {
        $("#content").load('templates/listProducts.php');
    });
});