<?php
require('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u1 = $baseurl . "admin/visa_package.php?succ=";
    $u2 = $baseurl . "admin/add_visa_package.php?err=";

    $id = $_POST['id']; // Assuming there is a field named 'id' in your form to identify the record to update
    $name = $_POST['name'];
    $country = $_POST['country'];
    $type = $_POST['type'];
    $processtime = $_POST['processtime'];
    $stayperiod = $_POST['stayperiod'];
    $validity = $_POST['validity'];
    $entry = $_POST['entry'];
    $fees = $_POST['fees'];

    try {
        $pdo->beginTransaction(); // Start a transaction

        $updateQuery = "UPDATE visa_package SET 
                        name = :name, 
                        country = :country, 
                        process_time = :process_time, 
                        stay_period = :stay_period, 
                        validity = :validity, 
                        entry = :entry, 
                        fees = :fees, 
                        type = :type
                        WHERE id = :id";

        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':process_time', $processtime);
        $stmt->bindParam(':stay_period', $stayperiod);
        $stmt->bindParam(':validity', $validity);
        $stmt->bindParam(':entry', $entry);
        $stmt->bindParam(':fees', $fees);
        $stmt->bindParam(':type', $type);

        if (!$stmt->execute()) {
            throw new Exception("Visa package update failed");
        }

        $pdo->commit(); // Commit the transaction

        header("Location: " . $u1 . urlencode('Visa package Successfully Updated'));
        exit();
    } catch (Exception $e) {
        $pdo->rollBack(); // Roll back the transaction in case of error
        header("Location: " . $u2 . urlencode('Something Wrong, please try again later'));
        exit();
    }
}
?>