<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    include '../../base/utils/sqlFunctions.php';

    require '/opt/lampp/htdocs/ProyectVideoClub/vendor/autoload.php';

    $userEmail = getUserData($_SESSION['username']); //Email to send the mail
    $lines = $shopCar = json_decode($_COOKIE['shopCar']);
    

    $bodyContent = '<table>
            <tr>
                <th>Id</th>
                <th>Nombre del producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>';

    foreach ($lines->lines as $i) {
        $bodyContent .= '
        <tr>
            <td>'.$i->idProduct.'</td>
            <td>'.$i->name.'</td>
            <td>'.$i->price.'</td>
            <td>'.$i->quantity.'</td>
        </tr>
        ';
    }
    $bodyContent .= '<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Precio total:</td>
    <td>'.$lines->totalPrice.'</td>
    </tr>';

    setcookie('shopCar', '', true);
    
    



    $mail = new PHPMailer(true);                                // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                   // Enable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'projectVideoClub2DAW@gmail.com';     // SMTP username
        $mail->Password = 'contra12345';                        // SMTP password
        $mail->SMTPSecure = 'ssl';                              // Enable SSL encryption, TLS also accepted with port 587
        $mail->Port = 465;                                      // TCP port to connect to

        //Recipients
        $mail->setFrom('projectVideoClub2DAW@gmail.com', 'Factura');
        $mail->addAddress($userEmail['email']);               // Add a recipient
        //$mail->addAddress('contact@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Factura';
        $mail->Body    = $bodyContent;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>