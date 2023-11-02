<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/blog.php?succ=";
    $u2 = $baseurl . "admin/blog.php?err=";

    $postID = $_POST['post_id'];
    $title = $_POST['title'];
    $metaDescription = $_POST['mdes'];
    $metaKeywords = $_POST['mkey'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    // File Upload Handling
    $uploadPath = "../uploads/blog/";

    $img = $_FILES["img"];
    $imgFileName = $img["name"];
    $imgTmpName = $img["tmp_name"];

    // Upload images if new images are provided
    if (!empty($imgFileName)) {
        $imgNewPath = $uploadPath . $imgFileName;
        move_uploaded_file($imgTmpName, $imgNewPath);
    }
        $updatePostQuery = "UPDATE blog SET name = :name, mdes = :mdes, mkey = :mkey, content = :content, status = :status, date_created = NOW()";

        if (!empty($imgFileName)) {
            $updatePostQuery .= ", img = :img";
        }

        $updatePostQuery .= " WHERE id = :postID";

        $stmt = $pdo->prepare($updatePostQuery);
        $stmt->bindParam(':name', $title);
        $stmt->bindParam(':mdes', $metaDescription);
        $stmt->bindParam(':mkey', $metaKeywords);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':postID', $postID);

        if (!empty($imgFileName)) {
            $stmt->bindParam(':img', $imgFileName);
        }

        if (!$stmt->execute()) {
             header("Location: " . $u2 . urlencode('Something went wrong. Please try again later.'));
        exit();     
        }else{
        header("Location: " . $u1 . urlencode('Package successfully updated.'));
        exit();     
        }


       
    }
?>
