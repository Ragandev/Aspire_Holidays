<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/visa.php?succ=";
    $u2 = $baseurl . "admin/add_visa.php?err=";

    $name = $_POST['name'];
    $country = $_POST['country'];
    $type = $_POST['type'];
    $starting_price = $_POST['startingPrice'];
    $document = $_POST['document'];
    $embassy = $_POST['embassy'];
    $status = $_POST['status'];

    try {
        $pdo->beginTransaction(); // Start a transaction

        $insertQuery = "INSERT INTO visa (country, starting_price, documents, visa_type, embassy, status)
                        VALUES (:country, :starting_price, :documents, :visa_type, :embassy, :status)";

        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':starting_price', $starting_price);
        $stmt->bindParam(':documents', $document);
        $stmt->bindParam(':visa_type', $type);
        $stmt->bindParam(':embassy', $embassy);
        $stmt->bindParam(':status', $status);

        if (!$stmt->execute()) {
            throw new Exception("Visa insertion failed");
        }

        $pdo->commit(); // Commit the transaction

        header("Location: " . $u1 . urlencode('Visa Successfully Created'));
        exit();
    } catch (Exception $e) {
        $pdo->rollBack(); // Roll back the transaction in case of error
        header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
        exit();
    }
}
?>