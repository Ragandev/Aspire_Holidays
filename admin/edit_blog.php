<?php
require('../config.php');
include('common/header.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $selectQuery = "SELECT * FROM blog WHERE id = :id";
    $stmt = $pdo->prepare($selectQuery);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
 
    if (!$blog) {
        header("Location: blog.php?err=" . urlencode('Blog not found.'));
        exit();
    }
} else {
    
    header("Location: blog.php?err=" . urlencode('Invalid request.'));
    exit();
}
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
    
        <form action="edit_blog_post.php" method="post" enctype="multipart/form-data">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="title" value="<?php echo $blog['name'] ?>">
                </div>
                <div class="col">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option <?php if($blog['status'] === 1 ){ echo "selected";} ?> value="1">Active</option>
                        <option <?php if($blog['status'] === 2 ){ echo "selected";} ?> value="2">Inactive</option>
                    </select>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col">
                    <label for="">Meta Description</label>
                    <textarea name="mdes" id="" class="form-control" rows="3" ><?php echo $blog['mdes']; ?></textarea>
                </div>
                <div class="col">
                    <label for="">Meta Keywords</label>
                    <textarea name="mkey" id="" class="form-control" rows="3"><?php echo $blog['mkey']; ?></textarea>
                </div>
              </div>
             
            <div class="row mb-4">
                <div class="col-4">
                    <img src="../uploads/blog/<?php echo $blog['img']; ?>" height='300px' width='98%'> </br><br>
                    <label for="">Image</label>
                    <input type="file" name="img" class="form-control">
                </div>
              </div>
              
                <div class="row mb-4">
                <div class="col">
                    <label for="">Content</label>
              <textarea class="form-control" name="content" id="" rows="10">
                  <?php echo $blog['content']; ?>
              </textarea>
                    
                </div>
              </div>
              <input type="hidden" name="post_id" value="<?php echo $id ?>">
              
              <input type='submit' value='Update' class="btn btn-primary">

        </form>
    </div>
    </div>

    <script>
    CKEDITOR. replace( 'content' ) ;
</script>
    
    <?php
    include('common/footer.php');
?>

