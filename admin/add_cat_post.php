<?php

require ('../config.php');

        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $u1 = $baseurl . "admin/cat.php?succ=";
        $u2 = $baseurl . "admin/cat.php?err=";
        
        $title = $_POST['title'];
        
        $insertQuery = "INSERT INTO category (name)
                        VALUES (:name)";
        
        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':name', $title);
       
        if(!$stmt->execute()) {
            header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
            exit();
        } else{
                header("Location: " . $u1 . urlencode('Category Successfully Created'));
            }
       }
?>