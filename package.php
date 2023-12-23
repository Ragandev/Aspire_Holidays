<?php
require('config.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

function generateSlug($text)
{
  $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
  return $slug;
}

// Pagination Route
$perPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

//Category Data
$catsql = "SELECT * FROM category";
$stmt1 = $pdo->prepare($catsql);
$stmt1->execute();
$catdata = $stmt1->fetchAll(PDO::FETCH_ASSOC);

//Sub Data
$subsql = "SELECT * FROM sub";
$stmt2 = $pdo->prepare($subsql);
$stmt2->execute();
$subdata = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Fetch packages
$packagesql = "SELECT * FROM package WHERE 1=1 AND status=1";

// From home page
if (isset($_GET['world']) && $_GET['world'] !== "") {
  $world = $_GET['world'];
  $packagesql .= " AND country = :world";
}

if (isset($_GET['namee']) && $_GET['namee'] !== "") {
  $namee = '%' . $_GET['namee'] . '%';
  $packagesql .= " AND name LIKE :namee";
}

if (isset($_GET['days']) && $_GET['days'] !== "") {
  $days = $_GET['days'];
  $packagesql .= " AND tdays <= :days";
}

if (isset($_GET['country']) && $_GET['country'] !== "") {
  $country = $_GET['country'];
  $packagesql .= " AND country = :country";
}

if (isset($_GET['state']) && $_GET['state'] !== "") {
  $state = $_GET['state'];
  $packagesql .= " AND state = :state";
}

if (isset($_GET['cat']) && $_GET['cat'] !== "") {
  $category = $_GET['cat'];
  $packagesql .= " AND categoryid = :category";
}

if (isset($_GET['sub']) && $_GET['sub'] !== "") {
  $subcategory = $_GET['sub'];
  $packagesql .= " AND subid = :subcategory";
}

if (isset($_GET['amount']) && $_GET['amount'] !== "0") {
  $amount = $_GET['amount'];
  $packagesql .= " AND amount <= :amount";
}

if (isset($_GET['duration']) && $_GET['duration'] !== "0") {
  $tdays = $_GET['duration'];
  $packagesql .= " AND tdays <= :duration";
}

if (isset($_GET['search']) && $_GET['search'] !== "") {
  $search = '%' . $_GET['search'] . '%';
  $packagesql .= " AND name LIKE :search";
}

$packagesql .= " ORDER BY id LIMIT :offset, :perPage";

$stmt = $pdo->prepare($packagesql);

if (isset($country)) {
  $stmt->bindParam(':country', $country, PDO::PARAM_STR);
}
if (isset($state)) {
  $stmt->bindParam(':state', $state, PDO::PARAM_STR);
}
if (isset($category)) {
  $stmt->bindParam(':category', $category, PDO::PARAM_STR);
}
if (isset($subcategory)) {
  $stmt->bindParam(':subcategory', $subcategory, PDO::PARAM_STR);
}
if (isset($amount)) {
  $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
}
if (isset($tdays)) {
  $stmt->bindParam(':duration', $tdays, PDO::PARAM_STR);
}
if (isset($search)) {
  $stmt->bindParam(':search', $search, PDO::PARAM_STR);
}

// Home Render 
if (isset($world)) {
  $stmt->bindParam(':world', $world, PDO::PARAM_STR);
}

if (isset($namee)) {
  $stmt->bindParam(':namee', $namee, PDO::PARAM_STR);
}

if (isset($days)) {
  $stmt->bindParam(':days', $days, PDO::PARAM_STR);
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

if (isset($_GET['world']) && $_GET['world'] !== "") {
  $conditions[] = "country = :world";
  $params[':world'] = $_GET['world'];
}

if (isset($_GET['namee']) && $_GET['namee'] !== "") {
  $conditions[] = "name LIKE :namee";
  $params[':namee'] = '%' . $_GET['namee'] . '%';
}

if (isset($_GET['days']) && $_GET['days'] !== "") {
  $conditions[] = "tdays <= :days";
  $params[':days'] = $_GET['days'];
}

if (isset($_GET['country']) && $_GET['country'] !== "") {
  $conditions[] = "country = :country";
  $params[':country'] = $_GET['country'];
}

if (isset($_GET['cat']) && $_GET['cat'] !== "") {
  $conditions[] = "categoryid = :category";
  $params[':category'] = $_GET['cat'];
}

if (isset($_GET['sub']) && $_GET['sub'] !== "") {
  $conditions[] = "subid = :subcategory";
  $params[':subcategory'] = $_GET['sub'];
}

if (isset($_GET['amount']) && $_GET['amount'] !== "0") {
  $conditions[] = "amount <= :amount";
  $params[':amount'] = $_GET['amount'];
}

if (isset($_GET['duration']) && $_GET['duration'] !== "0") {
  $conditions[] = "tdays <= :duration";
  $params[':duration'] = $_GET['duration'];
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
</style>

<!-- Banner Section  -->
<section class="cont-banner">
  <div class="banner-box">
    <h2 class="main-heading">OUR PACKAGES</h2>
    <p class="mini-heading">Explore Now</p>
  </div>
</section>
<!-- Banner Section End  -->

<!-- package Section  -->
<section class="package-sec">
  <div class="container-xxl">
    <div class="row pack-row">
      <div class="filter-con col-md-3 d-none d-md-block">
        <div class="filter-box">
          <p class="mini-heading">Search :</p>
          <form method="get" action="">
            <input class="form-control search-input" name="search" placeholder="Type Here" onchange="this.form.submit()"
              value="<?php if (isset($_GET['search'])) {
                echo $_GET['search'];
              } ?>">
          </form>
          <br>
          <div class="filter-1">
            <p class="mini-heading">Destination :</p>
            <form method="get" action="">
              <select name="country" id="" onchange="this.form.submit()">
                <option value="">All Destination</option>
                <?php
                $selectedCountry = $_GET['country'];
                $countries = [
                  'Thailand',
                  'Malaysia',
                  'Singapore',
                  'Malaysia',
                  'Singapore',
                  'Bali',
                  'Philippines',
                  'China',
                  'Hong Kong',
                  'Japan',
                  'Taiwan',
                  'Kazakhstan',
                  'South Korea',
                  'Uzbekistan',
                  'Vietnam',
                  'Cambodia',
                  'Vietnam',
                  'Cambodia',
                  'Sri Lanka',
                  'Azerbaijan',
                  'Maldives',
                  'Myanmar',
                  'Bhutan',
                  'Nepal',
                  'Georgia',
                  'Armenia',
                  'Mongolia',
                  'Australia',
                  'New Zealand',
                  'Fiji',
                  'Turkey',
                  'Israel',
                  'Jordan',
                  'Oman',
                  'Egypt',
                  'Qatar',
                  'Saudi',
                  'Indonesia',
                  'United Arab Emirates',
                  'Kenya',
                  'Morocco',
                  'Mauritius',
                  'Seychelles',
                  'Zimbabwe',
                  'Madagascar',
                  'Tanzania',
                  'South Africa',
                  'Alaska',
                  'Canada',
                  'USA',
                  'South America',
                  'Austria',
                  'Belgium',
                  'Bulgaria',
                  'Croatia',
                  'Czech',
                  'Denmark',
                  'Finland',
                  'France',
                  'Germany',
                  'Greece',
                  'Greenland',
                  'Hungary',
                  'Iceland',
                  'Ireland',
                  'Italy',
                  'Netherlands',
                  'Norway',
                  'Portugal',
                  'Romania',
                  'Sweden',
                  'UK',
                  'Spain',
                  'Switzerland'
                ];
                foreach ($countries as $country) {
                  $selected = ($selectedCountry === $country) ? 'selected' : '';
                  echo '<option ' . $selected . ' value="' . $country . '">' . $country . '</option>';
                }
                ?>
              </select>
            </form>
          </div>

          <div class="filter-3">
            <p class="mini-heading">Category :</p>
            <div class="row">
              <form method="get" action="">
                <select name="cat" id="" onchange="this.form.submit()">
                  <option value="">All Category</option>
                  <?php foreach ($catdata as $category) { ?>
                    <option <?php if ($_GET['cat'] == $category['id']) {
                      echo "selected";
                    } ?>
                      value="<?php echo $category['id'] ?>">
                      <?php echo $category['name'] ?>
                    </option>
                  <?php } ?>
                </select>
              </form>
            </div>
          </div>
          <div class="filter-3">
            <p class="mini-heading">Sub Category :</p>
            <div class="row">
              <form method="get" action="">
                <select name="sub" id="" onchange="this.form.submit()">
                  <option value="">All Sub Category</option>
                  <?php foreach ($subdata as $sub) { ?>
                    <option <?php if ($_GET['sub'] == $sub['id']) {
                      echo "selected";
                    } ?> value="<?php echo $sub['id'] ?>">
                      <?php echo $sub['name'] ?>
                    </option>
                  <?php } ?>
                </select>
              </form>
            </div>
          </div>

          <div class="filter-5">
            <p class="mini-heading">Durations :</p>
            <div class="row">
              <form method="get" action="">
                <select name="duration" id="" onchange="this.form.submit()">
                  <option value="">All Durations</option>
                  <option value="5">Upto 5 days</option>
                  <option value="10">Upto 10 days</option>
                  <option value="15">Upto 15 days</option>
                  <option value="20">Upto 20 days</option>
                  <option value="25">Upto 25 days</option>
                  <option value="30">Upto 30 days</option>
                </select>
              </form>
            </div>
          </div>

          <div class="filter-4">
            <p class="mini-heading">Max Price :</p>
            <form method="get" action="">

              <div class="amt-box">
                <span id="amount-val"></span>
                <input type="range" name="amount" id="amount" min="0" max="100000" data-bs-toggle="popover"
                  title="Slider Value" data-bs-placement="top" steps="1" <?php
                  if (isset($_GET['amount'])) {
                    echo 'value="' . $_GET["amount"] . '"';
                  } else {
                    echo 'value="0"';
                  }
                  ?> onchange="this.form.submit()" />
                <p id="amountDisplay">Price:
                  <?php
                  if (isset($_GET['amount']) && $_GET['amount'] != 0) {
                    echo $_GET["amount"];
                  } else {
                    echo 'Any Price';
                  }
                  ?>
                </p>
              </div>

            </form>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <?php
        if (count($data) > 0) {
          foreach ($data as $p) {
            $packageSlug = generateSlug($p['name']);
            $packageUrl = "package-details.php/$packageSlug";
            ?>
            <div class="package-box mb-4">
              <div class="item-box">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="item-img">
                      <a class='text-dark' href="package-details/<?php echo $p['id']; ?>">
                        <img class="img-fluid" src="uploads/<?php echo $p['img1'] ?>" alt="package" title="package" srcset="" />
                      </a>



                      <?php

                      $currentURL = "http://$_SERVER[HTTP_HOST]" . "/aspire-web";

                      $link = "🌟 Welcome to Aspire Holidays! 🌟 \n\n Thank you for choosing us to fulfill your travel dreams. Our team is excited to assist you on your journey to unforgettable destinations. Whether you're planning a relaxing beach getaway or an adventure-filled expedition, we're here to make it a reality. Feel free to ask any questions, request travel tips, or share your plans with us. Your dream vacation begins here!Stay tuned for exclusive travel offers, insider insights, and more exciting updates.Happy travels, The Aspire Holidays Team " . $currentURL . "/package-details/" . $p['id']; ?>

                      <div class="img-cont">
                        <div class="row">
                          <div class="col-6">
                            <p class="para">
                              <span class="fa fa-clock"></span>&nbsp;
                              <?php echo $p['tdays'] . " Days" ?>
                            </p>
                          </div>
                          <div class="col-6 text-end">
                            <a href="mailto:?subject=Welcome to Aspire Holidays!&body=<?php echo $link ?>">
                              <span class="fa fa-envelope"></span> &nbsp;
                            </a>
                            <a href="whatsapp://send?text=<?php echo $link ?>" data-action="share/whatsapp/share"
                              target="_blank">
                              <span class="fa-brands fa-whatsapp"></span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item-cont">
                      <a class='text-dark' href="package-details/<?php echo $p['id']; ?>">
                        <h2 class="mini-heading">
                          <?php echo $p['name'] ?>
                        </h2>
                      </a>
                      <p class="para">
                        <span class="fa fa-location-dot"></span> &nbsp;
                        <?php echo $p['country'] ?>
                      </p>
                      <hr />
                      <p class="para">
                      <div class="in-box">
                        <h6><b>Inclusions</b></h6>

                        <div class="in-inner d-flex align-items-center">

                          <?php if ($p['visa'] === 1) { ?>
                            <img class="icons-img" src="asset/icons/visa.png" alt="visa" title="visa" height="50px" width="50px">
                          <?php } ?>

                          <?php if ($p['passport'] === 1) { ?>
                            <img class="icons-img" src="asset/icons/pass.png" alt="passport" title="passport" height="50px" width="50px">
                          <?php } ?>

                          <?php if ($p['ticket'] === 1) { ?>
                            <img class="icons-img" src="asset/icons/ticket.png"  alt="ticket" title="ticket" height="50px" width="50px">
                          <?php } ?>

                          <?php if ($p['transport'] === 1) { ?> 
                            <img class="icons-img" src="asset/icons/trans.png"  alt="transport" title="transport" height="50px" width="50px">
                          <?php } ?>

                          <?php if ($p['hotel'] === 1) { ?>
                            <img class="icons-img" src="asset/icons/hotel.png" alt="hotel" title="hotel" height="50px" width="50px">
                          <?php } ?>
                        </div>


                      </div>
                      </p>

                      <div class="price-cont">
                        <a href="package-details/<?php echo $p['id']; ?>" class="btns">Details</a>
                        <div>
                          <p class="para">From</p>
                          <p class="sub-heading">₹
                            <?php echo $p['amount'] ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo '<h3 class="text-center text-warning">No packages found</h3>';
        } ?>
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