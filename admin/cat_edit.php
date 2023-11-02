<?php
    require ('../config.php');
    include('common/header.php');
    $id = $_GET['id'];
    
    $catQuery = "SELECT * FROM category WHERE id = :id";
    $stmt = $pdo->prepare($catQuery);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $old = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<style>
    .blod-add{
        margin-top:50px;
    }
    label{
        font-weight: bold;
        margin-bottom:10px;
    }
</style>
<div class="container">
    <div class="blod-add">
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
    
        <form action="edit_cat_post.php" method="post">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Title</label>
                    <input type="text" name="title" value="<?php echo $old['name'] ?>" class="form-control" placeholder="title">
                    <input type="hidden" name="catid" value="<?php echo $id ?>">
                </div>
            </div>
            
              
              <input type='submit' value='Update' class="btn btn-primary">
              
              <!--Days -->

        </form>
    </div>
    </div>
    
    <?php
    include('common/footer.php');
?>