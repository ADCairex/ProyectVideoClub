$(document).ready(function() {
    $("#clickIndividual").click(function() {
        $("#content").load('templates/listBuyUserProducts.php');
    });
    $("#clickAll").click(function() {
        $("#content").load('templates/listAllProducts.php');
    });
});