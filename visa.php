<?php
require('config.php');
ini_set('display_errors', 0);

function generateSlug($text)
{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    return $slug;
}

// Pagination Route
$perPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

// Fetch packages
$packagesql = "SELECT * FROM visa WHERE status=1";

if (isset($_GET['country']) && $_GET['country'] !== "") {
    $country = $_GET['country'];
    $packagesql .= " AND country = :country";
}

if (isset($_GET['cat']) && $_GET['cat'] !== "") {
    $category = $_GET['cat'];
    $packagesql .= " AND visa_type = :visa_type";
}

if (isset($_GET['search']) && $_GET['search'] !== "") {
    $search = '%' . $_GET['search'] . '%';
    $packagesql .= " AND country LIKE :search";
}

$packagesql .= " ORDER BY id LIMIT :offset, :perPage";

$stmt = $pdo->prepare($packagesql);

if (isset($country)) {
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
}
if (isset($search)) {
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
}

$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dataCount = count($data);
for ($i = 0; $i < $dataCount - 1; $i++) {
    $randIndex = mt_rand($i, $dataCount - 1);
    if ($i !== $randIndex) {
        // Swap elements at $i and $randIndex
        $temp = $data[$i];
        $data[$i] = $data[$randIndex];
        $data[$randIndex] = $temp;
    }
}

// Filters 
$countSql = "SELECT COUNT(*) FROM package WHERE 1=1 AND status=1";
$conditions = array();
$params = array();


if (isset($_GET['namee']) && $_GET['namee'] !== "") {
    $conditions[] = "country LIKE :namee";
    $params[':namee'] = '%' . $_GET['namee'] . '%';
}


if (isset($_GET['country']) && $_GET['country'] !== "") {
    $conditions[] = "country = :country";
    $params[':country'] = $_GET['country'];
}




// Combine conditions if available
if (!empty($conditions)) {
    $countSql .= " AND " . implode(" AND ", $conditions);
}

$stmtCount = $pdo->prepare($countSql);

$stmtCount->execute($params);

$totalCount = $stmtCount->fetchColumn();

?>

<?php
include("common/header.php");
?>
<meta name="robots" content="index,follow">

<style>
    .filter-con {
        position: sticky !important;
        top: 0px !important;
        height: fit-content;
    }

    .icons-img:hover {
        animation: flip 1s;
    }

    .amt-box {
        position: relative;
    }

    #amount-val {
        position: absolute;
        bottom: 60px;
        color: #fff;
        background-color: #000;
        padding: 5px;
        font-size: 14px;
        display: none;
    }

    .show-amt {
        display: block !important;
    }

    .in-icon {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .in-icon span {
        font-size: 25px;
        color: #fff;
    }

    .in-inner {
        gap: 5px;
    }

    .search-input {
        border: 1px solid grey !important;
    }

    /* visa page  */

    .visabx {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .visabx:hover {
        scale: 0.9;
        transition: 1s;
    }

    .visa-con-bx {
        /* background-color: var(--main); */
        border-bottom: 5px solid var(--main);
        padding: 10px;
    }

    .visa-con-bx h5 {
        color: var(--main);
        text-align: center;
    }

    .visa-item-box {
        border-radius: 10px;
    }
    .visa-item-img{
        height: 180px;
        overflow: hidden;
    }
    .visa-item-img img{
        width: 100%;
    }
</style>

<!-- Banner Section  -->
<section class="cont-banner">
    <div class="banner-box">
        <h2 class="main-heading">VISA</h2>
        <p class="mini-heading">Explore Now</p>
    </div>
</section>
<!-- Banner Section End  -->

<!-- package Section  -->
<section class="package-sec">
    <div class="container-xxl">
        <div class="row pack-row">
            
            <div class="col-md-12">
                <div class="visa-box mb-4">
                    <div class="visa-item-box">
                        <div class="row">
                            <?php
                            if (count($data) > 0) {
                                foreach ($data as $p) {
                                    $packageSlug = generateSlug($p['country']);
                                    $packageUrl = "visa-detail.php/$packageSlug";
                                    ?>

                                    <div class="col-lg-4">
                                        <div class="visabx">
                                            <div class="visa-item-img">
                                                <a class='text-dark' href="visa_package.php?id=<?php echo $p['id']?>">
                                                    <img class="img-fluid" src="asset/images/country/<?php echo $p['country']?>.webp" alt="package"
                                                        title="package" srcset="" />
                                                </a>
                                            </div>
                                            <div class="visa-con-bx">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>
                                                           <?php echo $p['country'] ?>
                                                        </h5>
                                                        <p class="text-center">Starting From <strong><span>₹&nbsp;&nbsp;<span><?php echo $p['starting_price']?></strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            } else {
                                echo '<h3 class="text-center text-warning">No VISA found</h3>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="pagesBox"></div>
<!-- package Section End -->



<script>
    // Pagination Script 
    let package = <?php echo $totalCount ?>;
    let pages = Math.ceil(package / 10);
    let currentPage = <?php echo $page; ?>;

    let pagesBox = document.querySelector('.pagesBox');

    function createPaginationButton(text, pageNumber) {
        const button = document.createElement('button');
        button.textContent = text;
        button.classList.remove('btns');
        button.classList.add('btns-navy');

        if (pageNumber === currentPage) {
            button.classList.remove('btns-navy');
            button.classList.add('btns');
        }

        const link = document.createElement('a');
        link.classList.add('pagination');


        link.addEventListener('click', () => {
            const queryParams = new URLSearchParams(window.location.search);
            queryParams.set('page', pageNumber);
            window.location.href = `${window.location.pathname}?${queryParams.toString()}`;
        });

        link.appendChild(button);
        return link;
    }

    let startPage = currentPage - 1;
    let endPage = currentPage + 1;

    if (startPage < 1) {
        startPage = 1;
        endPage = Math.min(startPage + 1, pages);
    }

    if (endPage > pages) {
        endPage = pages;
        startPage = Math.max(endPage - 1, 1);
    }

    if (currentPage != 1) {
        pagesBox.appendChild(createPaginationButton('<<', 1));
    }

    // Previous Button
    if (currentPage > 1) {
        pagesBox.appendChild(createPaginationButton('<', currentPage - 1));
    }

    // Page Buttons
    pagesBox.appendChild(createPaginationButton(currentPage, currentPage));


    // Next Button
    if (currentPage < pages) {
        pagesBox.appendChild(createPaginationButton('>', currentPage + 1));
    }

    if (currentPage != pages) {
        pagesBox.appendChild(createPaginationButton('>>', pages));
    }

    // Price Range Input 
    const rangeInput = document.getElementById('amount');
    const currentValueDisplay = document.getElementById('amount-val');

    rangeInput.addEventListener('input', function () {
        currentValueDisplay.classList.add('show-amt');
        const currentValue = rangeInput.value;
        currentValueDisplay.textContent = `${currentValue}`;
    });
</script>

<?php
include("common/footer.php");
?>