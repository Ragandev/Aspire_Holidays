<?php

require ('../config.php');

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $u1 = $baseurl . "admin/add_user.php?succ=";
        $u2 = $baseurl . "admin/add_user.php?err=";
        
        $name = $_POST['username'];
        $pass = $_POST['pass'];
        $hashpass = password_hash($pass, PASSWORD_DEFAULT);
        $status = $_POST['status'];
       
        
        $insertQuery = "INSERT INTO users (name, password, status)
                        VALUES (:name, :pass, :status)";
        
        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':pass', $hashpass);
        $stmt->bindParam(':status', $status);
       
        if(!$stmt->execute()) {
            header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
            exit();
        }else{
            header("Location: " . $u1 . urlencode('Package Successfully Created'));
            exit();
        }
        
}
?>