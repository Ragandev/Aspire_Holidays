<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/package.php?succ=";
    $u2 = $baseurl . "admin/package.php?err=";

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

    $img1 = $_FILES["img1"];
    $img1FileName = $img1["name"];
    $img1TmpName = $img1["tmp_name"];

    $img2 = $_FILES["img2"];
    $img2FileName = $img2["name"];
    $img2TmpName = $img2["tmp_name"];

    $img3 = $_FILES["img3"];
    $img3FileName = $img3["name"];
    $img3TmpName = $img3["tmp_name"];

    $uploadPath = "../uploads/";

    move_uploaded_file($img1TmpName, $uploadPath . $img1FileName);
    move_uploaded_file($img2TmpName, $uploadPath . $img2FileName);
    move_uploaded_file($img3TmpName, $uploadPath . $img3FileName);

    $day = 1;

    try {
        $pdo->beginTransaction(); // Start a transaction

        $insertQuery = "INSERT INTO package (categoryid, name, amount, country, state, mdes, mkey, content, img1, img2, img3, status, tdays, subid, quote, highlights, priority)
                        VALUES (:categoryid, :name, :amount, :country, :state, :mdes, :mkey, :content, :img1, :img2, :img3, :status, :tdays, :subid, :quote, :highlights, :priority)";

        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':name', $title);
        $stmt->bindParam(':categoryid', $category);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':mdes', $metaDescription);
        $stmt->bindParam(':mkey', $metaKeywords);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':img1', $img1FileName);
        $stmt->bindParam(':img2', $img2FileName);
        $stmt->bindParam(':img3', $img3FileName);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':tdays', $tdays);
        $stmt->bindParam(':subid', $subid);
        $stmt->bindParam(':quote', $quote);
        $stmt->bindParam(':highlights', $highlights);
        $stmt->bindParam(':priority', $priority);

        if (!$stmt->execute()) {
            throw new Exception("Package insertion failed");
            exit();
        }

        $lid = $pdo->lastInsertId();
        
        function updatePackageData($pdo, $column, $columnTitle, $postData, $lid) {
            if (isset($postData)) {
                $sql = "UPDATE package SET $column = :data, $columnTitle = :title WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':data', $postData);
                $stmt->bindParam(':title', $_POST[$columnTitle]);
                $stmt->bindParam(':id', $lid);
                
                // Execute the statement and handle potential errors
                if (!$stmt->execute()) {
                    $errorInfo = $stmt->errorInfo();
                    echo "Error executing query: " . $errorInfo[2];
                    // Or log the error using error_log() if preferred
                    // error_log("Error executing query: " . $errorInfo[2]);
                }
            }
        }
        
        try {
            updatePackageData($pdo, 'visa', 'visa_title', $_POST['visa'], $lid);
            updatePackageData($pdo, 'passport', 'passport_title', $_POST['passport'], $lid);
            updatePackageData($pdo, 'ticket', 'ticket_title', $_POST['ticket'], $lid);
            updatePackageData($pdo, 'hotel', 'hotel_title', $_POST['hotel'], $lid);
            updatePackageData($pdo, 'transport', 'transport_title', $_POST['transport'], $lid);
        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage();
        }



        foreach ($days as $index => $data) {
            $dayval = "Day " . $day;
            $sql = "INSERT INTO days (name, title, pkgid, content) VALUES (:name, :title, :pkgid, :cont)";
            $stmts = $pdo->prepare($sql);
            $stmts->bindParam(':name', $dayval);
            $stmts->bindParam(':pkgid', $lid);
            $stmts->bindParam(':cont', $data);
            
            $stmts->bindParam(':title', $day_title[$index]);
            
            if (!$stmts->execute()) {
                throw new Exception("Day insertion failed");
            }

            $day++;
        }

        $pdo->commit(); // Commit the transaction

        header("Location: " . $u1 . urlencode('Package Successfully Created'));
        exit();
    } catch (Exception $e) {
        $pdo->rollBack(); // Roll back the transaction in case of error
        header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
        exit();
    }
}
?>
