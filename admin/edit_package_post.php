<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/package.php?succ=";
    $u2 = $baseurl . "admin/package.php?err=";

    $postID = $_POST['post_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $metaDescription = $_POST['mdes'];
    $metaKeywords = $_POST['mkey'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $days = $_POST['days'];
    $day_title = $_POST['day_title'];
    $tdays = count($days);
    $subid = $_POST['sub'];
    $quote = $_POST['quote'];
    $highlights = $_POST['highlights'];
    $priority = $_POST['priority'];
    
    

    // File Upload Handling
    $uploadPath = "../uploads/";

    $img1 = $_FILES["img1"];
    $img1FileName = $img1["name"];
    $img1TmpName = $img1["tmp_name"];

    $img2 = $_FILES["img2"];
    $img2FileName = $img2["name"];
    $img2TmpName = $img2["tmp_name"];

    $img3 = $_FILES["img3"];
    $img3FileName = $img3["name"];
    $img3TmpName = $img3["tmp_name"];
    
    // if(empty($title) || empty($category) || empty($amount) || empty($country) || empty($content) || empty($subid) || empty($highlights) || empty($img1) || empty($img2) || empty($img3) ){
        
    //     header("Location: " . $u2 . urlencode('All the required fields are must be filled. '));
    // exit();
        
    // }

    // Upload images if new images are provided
    if (!empty($img1FileName)) {
        $img1NewPath = $uploadPath . $img1FileName;
        move_uploaded_file($img1TmpName, $img1NewPath);
    }

    if (!empty($img2FileName)) {
        $img2NewPath = $uploadPath . $img2FileName;
        move_uploaded_file($img2TmpName, $img2NewPath);
    }

    if (!empty($img3FileName)) {
        $img3NewPath = $uploadPath . $img3FileName;
        move_uploaded_file($img3TmpName, $img3NewPath);
    }

    try {
        $pdo->beginTransaction(); // Start a transaction

        $updatePostQuery = "UPDATE package SET name = :name, categoryid = :catid, amount = :amount, country = :country, state = :state, mdes = :mdes, mkey = :mkey, content = :content, status = :status, tdays = :tdays, subid = :subid, priority = :priority, quote = :quote, highlights = :highlights ";

        if (!empty($img1FileName)) {
            $updatePostQuery .= ", img1 = :img1";
        }

        if (!empty($img2FileName)) {
            $updatePostQuery .= ", img2 = :img2";
        }

        if (!empty($img3FileName)) {
            $updatePostQuery .= ", img3 = :img3";
        }

        $updatePostQuery .= " WHERE id = :postID";

        $stmt = $pdo->prepare($updatePostQuery);
        $stmt->bindParam(':name', $title);
        $stmt->bindParam(':catid', $category);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':mdes', $metaDescription);
        $stmt->bindParam(':mkey', $metaKeywords);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':tdays', $tdays);
        $stmt->bindParam(':postID', $postID);
        $stmt->bindParam(':subid', $subid);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':quote', $quote);
        $stmt->bindParam(':highlights', $highlights);

        if (!empty($img1FileName)) {
            $stmt->bindParam(':img1', $img1FileName);
        }

        if (!empty($img2FileName)) {
            $stmt->bindParam(':img2', $img2FileName);
        }

        if (!empty($img3FileName)) {
            $stmt->bindParam(':img3', $img3FileName);
        }

        if (!$stmt->execute()) {
            throw new Exception("Package update failed");
        }
        
        function updatePackageData($pdo, $column, $columnTitle, $postData, $postID) {
            if (isset($postData)) {
                $sql = "UPDATE package SET $column = :data, $columnTitle = :title WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':data', $postData);
                $stmt->bindParam(':title', $_POST[$columnTitle]);
                $stmt->bindParam(':id', $postID);
                
                if (!$stmt->execute()) {
                    $errorInfo = $stmt->errorInfo();
                    echo "Error executing query: " . $errorInfo[2];
                }
            }
        }
        
        try {
            updatePackageData($pdo, 'visa', 'visa_title', $_POST['visa'], $postID);
            updatePackageData($pdo, 'passport', 'passport_title', $_POST['passport'], $postID);
            updatePackageData($pdo, 'ticket', 'ticket_title', $_POST['ticket'], $postID);
            updatePackageData($pdo, 'hotel', 'hotel_title', $_POST['hotel'], $postID);
            updatePackageData($pdo, 'transport', 'transport_title', $_POST['transport'], $postID);
        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage();
        }
        
        // Delete existing days associated with the package
        $deleteDaysQuery = "DELETE FROM days WHERE pkgid = :postID";
        $stmtDelete = $pdo->prepare($deleteDaysQuery);
        $stmtDelete->bindParam(':postID', $postID);
        $stmtDelete->execute();

        // Insert updated days data
        $day = 1;
        foreach ($days as $index => $data) {
            $dayval = "Day " . $day;
            $insertDaysQuery = "INSERT INTO days (name, title, pkgid, content) VALUES (:name, :title, :pkgid, :cont)";
            $stmtInsert = $pdo->prepare($insertDaysQuery);
            $stmtInsert->bindParam(':name', $dayval);
            $stmtInsert->bindParam(':pkgid', $postID);
            $stmtInsert->bindParam(':cont', $data);
            
            $stmtInsert->bindParam(':title', $day_title[$index]);

            if (!$stmtInsert->execute()) {
                throw new Exception("Day insertion failed");
            }
            $day++;
        }

        $pdo->commit(); // Commit the transaction

        header("Location: " . $u1 . urlencode('Package successfully updated.'));
        exit();
    } catch (Exception $e) {
        $pdo->rollBack(); // Roll back the transaction in case of error
        echo "Error: " . $e->getMessage(); // Display detailed error message
    header("Location: " . $u2 . urlencode('Something went wrong. Please try again later.'));
    exit();
    }
}
?>
