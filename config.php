<?php
    $currentURL = "http";
    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $currentURL .= "s";
    }
    $currentURL .= "://";
    if($_SERVER["SERVER_PORT"] != "80") {
        $currentURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $currentURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    
    // echo $currentURL;
    
    $baseurl = "https://aspireholidays.in/";
    
    
    // DB Main
    // $host = 'localhost';
    // $dbname = 'aspire_website';
    // $username = 'aspire_website_user';
    // $password = 'Aspire@123';

    // DB XAMPP
    $host = 'localhost';
    $dbname = 'aspire';
    $username = 'root';
    $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // echo "DB Connection Success";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
?>