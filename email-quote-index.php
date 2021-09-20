<?php
$data = $_POST['res'];
$data = json_decode($data);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/PHPMailer/src/Exception.php';
require 'admin/PHPMailer/src/PHPMailer.php';
require 'admin/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

require "cotizacionhtmlindex.php";

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.fullvitec.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cotizacion@fullvitec.com';                     //SMTP username
    $mail->Password   = '9B4DB8kwOhyG';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cotizacion@fullvitec.com', 'Web - FullVitec');
    $mail->addAddress('cotizacion@fullvitec.com', 'FullVitec');     //Add a recipient
    //$mail->addAddress('hbrth@gmx.es');               //Name is optional
    //$mail->addReplyTo('ht.heberth@gmail.com', 'Heberth Tapia');
    $mail->addCC($data->email);
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';    
    $mail->Encoding = 'quoted-printable';
    $mail->Subject = 'Solicitud de Cotización';
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 1;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}