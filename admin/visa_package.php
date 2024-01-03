<?php
require('../config.php');
include('common/header.php');

$visapaksql = "SELECT id, name, fees, type, country FROM visa_package ORDER BY id";
$stmt = $pdo->query($visapaksql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="btn-box">
        <a href='add_visa_package.php'><button class="btn btn-primary">Create Visa Packages</button></a>
    </div>

    <?php if (!empty($_GET['succ'])): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
                <?php echo $_GET['succ'] ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <?php if (!empty($_GET['err'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>
                <?php echo $_GET['err'] ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Type</th>
                    <th>Fees</th>
                    <th>EDIT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                    <?php
                    $visasql = "SELECT country FROM visa WHERE id =" . $row['country'];
                    $stmt_visa = $pdo->query($visasql);
                    $data_visa = $stmt_visa->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $data_visa['country']; ?>
                        </td>
                        <td>
                            <?php echo $row['type']; ?>
                        </td>
                        <td>
                            <?php echo $row['fees']; ?>
                        </td>
                        <td><a href="edit_visa_package.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('common/footer.php');
?>