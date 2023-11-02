<?php

require ('../config.php');

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $u1 = $baseurl . "admin/cat.php?succ=";
        $u2 = $baseurl . "admin/cat.php?err=";
        
        $title = $_POST['title'];
        $catid = $_POST['catid'];
        
        $updateQuery = "UPDATE category SET name = :name WHERE id = :id";
        
        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':name', $title);
        $stmt->bindParam(':id', $catid);
       
        if(!$stmt->execute()) {
            header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
            exit();
        } else{
                header("Location: " . $u1 . urlencode('Category Successfully Created'));
            }
       }
?>