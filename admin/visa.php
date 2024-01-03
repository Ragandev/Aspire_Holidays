<?php
require('../config.php');
include('common/header.php');

$visasql = "SELECT id, country, starting_price, visa_type FROM visa ORDER BY id";
$stmt = $pdo->query($visasql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="btn-box">
        <a href='visa_package.php'><button class="btn btn-success">Visa Packages</button></a>&nbsp;&nbsp;
        <a href='add_visa.php'><button class="btn btn-primary">Create Visa</button></a>
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
                    <th>Country</th>
                    <th>Type</th>
                    <th>Starting Price</th>
                    <th>EDIT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['country']; ?>
                        </td>
                        <td>
                            <?php echo $row['visa_type']; ?>
                        </td>
                        <td>
                            <?php echo $row['starting_price']; ?>
                        </td>
                        <td><a href="edit_visa.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('common/footer.php');
?>