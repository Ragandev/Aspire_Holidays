<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/visa.php?succ=";
    $u2 = $baseurl . "admin/add_visa.php?err=";

    $id = $_POST['id'];

    $name = $_POST['name'];
    $country = $_POST['country'];
    $type = $_POST['type'];
    $starting_price = $_POST['startingPrice'];
    $document = $_POST['document'];
    $embassy = $_POST['embassy'];

    try {
        $pdo->beginTransaction(); // Start a transaction

        $updateQuery = "UPDATE visa 
                        SET country = :country, 
                            starting_price = :starting_price, 
                            documents = :documents, 
                            visa_type = :visa_type, 
                            embassy = :embassy 
                        WHERE id = :id";

        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':starting_price', $starting_price);
        $stmt->bindParam(':documents', $document);
        $stmt->bindParam(':visa_type', $type);
        $stmt->bindParam(':embassy', $embassy);
        $stmt->bindParam(':id', $id);

        if (!$stmt->execute()) {
            throw new Exception("Visa insertion failed");
        }

        $pdo->commit(); // Commit the transaction

        header("Location: " . $u1 . urlencode('Visa Successfully Updated'));
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        header("Location: " . $u2 . urlencode('Something Wrong please try again later'));
        exit();
    }
}
?>