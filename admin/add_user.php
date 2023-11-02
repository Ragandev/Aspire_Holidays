<?php
    require ('../config.php');
    include('common/header.php');
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
        <form action="add_user_post.php" method="post" enctype="multipart/form-data">

            <div class="row mb-4">
                <div class="col-6">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="title">
                </div>
                <div class="col-6">
                    <label for="">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
            </div>
              
            <input type='submit' value='Create' class="btn btn-primary">

        </form>
    </div>
    <?php
    include('common/footer.php');
?>