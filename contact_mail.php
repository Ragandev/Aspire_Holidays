<?php
require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if(isset($_POST)){
    
    $u1 = $baseurl . "contact.php?succ=";
    $u2 = $baseurl . "contact.php?err=";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    
    try {
    $mail->isSMTP();
    $mail->Host       = 'mail.skybizfs.in';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'aspire-demo@skybizfs.in';
    $mail->Password   = 'Aspire@123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    
    $mail->setFrom('aspire-demo@skybizfs.in', 'Aspire');
    $mail->addAddress('aspire-demo@skybizfs.in', 'Aspire');

    
    $mail->isHTML(true);
    $mail->Subject = "Contact Mail";
    $mail->Body    = "Name: {$name}<br>Email: {$email}<br>Message: {$msg}";

    $mail->send();
    
    header("Location: " . $u1 . urlencode('Thanks for Contacting'));
    exit();
    
    } catch (Exception $e) {
        header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
        exit();
    }
}
?>
