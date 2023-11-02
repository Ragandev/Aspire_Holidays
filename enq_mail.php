<?php
require('config.php');
require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $u1 = $baseurl . "contact.php?succ=";
    $u2 = $baseurl . "contact.php?err=";
    
    $name = $_POST['name'];
    $phone = $_POST['ph'];
    $email = $_POST['email'];
    $dest = $_POST['dest'];
    $point = $_POST['bp'];
    $sdate = $_POST['sd'];
    $edate = $_POST['ed'];
    $adult = $_POST['no-ad'];
    $child = $_POST['no-ch'];
    $senior = $_POST['no-sc'];
    $msg = $_POST['message'];
    $occ = $_POST['occ'];
    $budget = $_POST['e-bu'];
    $hotel = $_POST['hot'];
    $travel = $_POST['tra'];
    
    if(strlen($phone) < 10 || strlen($phone) > 13){
        echo "<h1 class='text-danger'>Mobile Number Not Valid</h1>";
        exit();
    }
    
    try {
        $mail = new PHPMailer(true);
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
        
        $mail->Body = "
            Name: $name<br>
            Phone: $phone<br>
            Email: $email<br>
            Destination: $dest<br>
            Starting Point: $point<br>
            Start Date: $sdate<br>
            End Date: $edate<br>
            Adults: $adult<br>
            Children: $child<br>
            Seniors: $senior<br>
            Message: $msg<br>
            Occasion: $occ<br>
            Budget: $budget<br>
            Hotel Preference: $hotel<br>
            Travel Preference: $travel
        ";

        $mail->send();
        
        header("Location: " . $u1 . urlencode('Thanks for Contacting'));
        exit();
        
    } catch (Exception $e) {
        header("Location: " . $u2 . urlencode('Something Wrong, please try again later'));
        exit();
    }
}
?>
