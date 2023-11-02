<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/blog.php?succ=";
    $u2 = $baseurl . "admin/blog.php?err=";

    $title = $_POST['title'];
    $metaDescription = $_POST['mdes'];
    $metaKeywords = $_POST['mkey'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    $img = $_FILES["img"];
    $imgFileName = $img["name"];
    $imgTmpName = $img["tmp_name"];

    $uploadPath = "../uploads/blog/";

    move_uploaded_file($imgTmpName, $uploadPath . $imgFileName);

        $insertQuery = "INSERT INTO blog ( name,mdes, mkey, content, img, status, date_created)
                        VALUES (:name,:mdes, :mkey, :content, :img, :status, NOW())";

        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':name', $title);
        $stmt->bindParam(':mdes', $metaDescription);
        $stmt->bindParam(':mkey', $metaKeywords);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':img', $imgFileName);
        $stmt->bindParam(':status', $status);

        if (!$stmt->execute()) {
            header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
        exit();
        }else {
        header("Location: " . $u1 . urlencode('Blog Successfully Created'));
        exit();
    }
        
    }
?>
