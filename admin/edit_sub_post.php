<?php

require ('../config.php');

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $u1 = $baseurl . "admin/sub.php?succ=";
        $u2 = $baseurl . "admin/sub.php?err=";
        
        $title = $_POST['title'];
        $subid = $_POST['subid'];
        
        $updateQuery = "UPDATE sub SET name = :name WHERE id = :id";
        
        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':name', $title);
        $stmt->bindParam(':id', $subid);
       
        if(!$stmt->execute()) {
            header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
            exit();
        } else{
                header("Location: " . $u1 . urlencode('Sub Category Successfully Updated'));
            }
       }
?>