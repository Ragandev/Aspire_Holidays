<?php
// Including the database connection configuration
require('config.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

function generateSlug($text) {
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    return $slug;
}

// Pagination Sript
$perPage = 5; // Number of packages per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

// SQL query to select data from the "package" table and order by "id"
$packagesql = "SELECT id, categoryid, name, amount, content, img2 FROM package ORDER BY id";

// Executing the SQL query and fetching data into $package
$package = $pdo->query($packagesql);

// Fetching all the rows as an associative array
$data = $package->fetchAll(PDO::FETCH_ASSOC);

//blog Single data
    $selectBlogsQuery1 = "SELECT id, name, content, img
                     FROM blog
                     ORDER BY id DESC";

    $stmt1 = $pdo->prepare($selectBlogsQuery1);
    $stmt1->execute();
    $blogs1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $dateCreated = new DateTime($blogs1['date_created']);
    $formattedDate = $dateCreated->format('F j, Y');
    
    //blog data
    $selectBlogsQuery = "SELECT id, name, content, img
                     FROM blog
                     ORDER BY id DESC
                     LIMIT 4 OFFSET 1";

    $stmt = $pdo->prepare($selectBlogsQuery);
    $stmt->execute();
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php 
 include("common/header.php");
 ?>
 
 <!--Main blog section page-->
<section class="blog-sec">
    <div class="blog-sec-inn container">
    <div class="row">
        <div class="blog-content-box">
            <div class="blog-head">
                <p class="cursive-heading">Live with wanderlust</p>
                <h1 class="main-heading">Travel Blog</h1>
                <p class="para">
                  We share our experiences, tips and travel stories to inspire and
                  guide our readers in their own wanderlust adventures. From hidden
                  gems to popular destinations, we showcase the beauty and diversity
                  of the world, and promote responsible and sustainable travel.
                </p>
            </div>
        </div>
        <div class="sub-blog-item">
                <?php foreach($blogs as $b) { 
                $dateCreated1 = new DateTime($blog['date_created']);
                $formattedDate1 = $dateCreated1->format('F j, Y');
                $shortContent = substr($b['content'], 0, 400) . '...';
                ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="blog-img">
                    <a href="blog_details/<?php echo $b['id']; ?>"><img class="img-fluid" src="uploads/blog/<?php echo $b['img'] ?>" alt="blogs" title="blogs" /></a>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="blog-body">
                    <h2 class="mini-heading"><?php echo $b['name'] ?></h2>
                    <p class="para">
                      <?php echo $shortContent ?>
                    </p>
                    <div class="price-cont">
                        <a href="blog_details/<?php echo $b['id']; ?>" class="btns">Details</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
        </div>
    </div>
</section>

<!--End Main Blog Section-->


<?php 
 include("common/footer.php");
 ?>
