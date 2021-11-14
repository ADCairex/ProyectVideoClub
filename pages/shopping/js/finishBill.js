function finishBill() {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);

            if (response.status == 'OK') {
                document.getElementById('billBt').remove();
                document.getElementById('detailBill').remove();
                document.getElementById('deleteBill').remove();
                alert('Factura generada con exito');
                

                xhttp.open('POST', 'php/sendMail.php', true);
                xhttp.send();
                window.location.href = "../shopping/shopping.php";

            } else {
                alert('Ha habido un error al generar la factura');
            }
        }
    }

    xhttp.open('POST', 'php/generateBill.php', true);
    xhttp.send();
}