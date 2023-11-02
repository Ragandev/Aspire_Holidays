<?php
    require ('../config.php');
    include('common/header.php');
    
    $pkgsql = "SELECT id, categoryid, name, amount, country, status FROM package ORDER BY id";
    $stmt = $pdo->query($pkgsql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>
<div class="container">
<div class="btn-box">
        <a href='cat.php'><button class="btn btn-success">Category</button></a>&nbsp;&nbsp;
        <a href='add_package.php'><button class="btn btn-primary">Create Package</button></a>&nbsp;
    </div>
    
    <?php if (!empty($_GET['succ'])): ?>
					  
	<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['succ']?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>
    <?php if (!empty($_GET['err'])): ?>
	    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['err']?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Country</th>
                <th>Status</th>
                <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                <?php
                    $catsql = "SELECT name FROM category WHERE id='".$row['categoryid']."'";
                    $stmt = $pdo->query($catsql);
                    $catData = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $catData['name'] ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td>
                    <?php if($row['status'] === 1){echo 'Active';} else{echo 'Inactive';} ?>
                </td>
                <td><a href="edit_package.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include('common/footer.php');
?>