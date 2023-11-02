<?php
    require ('../config.php');
    include('common/header.php');
    
    $catssql = "SELECT id, name FROM sub ORDER BY id";
    $stmt = $pdo->query($catssql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>
<div class="container">
<div class="btn-box">
        <a href='cat.php'><button class="btn btn-success">Category</button></a>&nbsp;&nbsp;
        <a href='add_sub.php'><button class="btn btn-primary">Create Sub Category</button></a>&nbsp;
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
                <th>Name</th>
                <th>EDIT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) { ?>
                
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="edit_sub.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include('common/footer.php');
?>