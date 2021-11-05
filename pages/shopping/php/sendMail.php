<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '/home/username/vendor/autoload.php';

    $userEmail = ''; //Email to send the mail

    $mail = new PHPMailer(true);                                // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                   // Enable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'projectVideoClub2DAW@protonmail.com';    // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'projectVideoClub2DAW@protonmail.com';// SMTP username
        $mail->Password = 'contra12345';                             // SMTP password
        $mail->SMTPSecure = 'ssl';                              // Enable SSL encryption, TLS also accepted with port 587
        $mail->Port = 465;                                      // TCP port to connect to

        //Recipients
        $mail->setFrom('projectVideoClub2DAW@protonmail.com', 'Factura');
        $mail->addAddress($userEmail, $userName);               // Add a recipient
        //$mail->addAddress('contact@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Subject line goes here';
        $mail->Body    = 'Body text goes here';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>