<?php
require('config.php');
include('common/header.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$packageID = $_GET['id'];

// Retrieve the package based on the ID
$packagesql = "SELECT * FROM visa_package WHERE id = :id";
$stmt = $pdo->prepare($packagesql);
$stmt->bindParam(':id', $packageID, PDO::PARAM_INT);
$stmt->execute();
$package = $stmt->fetch(PDO::FETCH_ASSOC);

// Get Country Details 
$apackageID = $package['country'];
$apackagesql = "SELECT country FROM visa WHERE id = :id";
$astmt = $pdo->prepare($apackagesql);
$astmt->bindParam(':id', $apackageID, PDO::PARAM_INT);
$astmt->execute();
$apackage = $astmt->fetch(PDO::FETCH_ASSOC);

if (!$package) {
    // Handle package not found
    echo "VISA not found.";
    exit();
}
?>

  <!-- Package Detail Banner  -->
  <div class="pd-banner-sec">
    <div class="pd-header container">
      <div class="row">
        <div class="col-md-3">
          <div class="pd-title-box">
            <h2 class="sub-heading">
              <?php echo $package['name']; ?>
            </h2>
            <p class="para">
              <span class="fa fa-location-dot"></span> &nbsp;
              <?php echo $apackage['country']; ?>
            </p>
          </div>
        </div>
        <div class="col-md-9 ico-in">
          <div class="pd-head-cont">

            <div class="row top-1">
              <div class="col-4">
                <img class="icons-img" alt="Duration" title="Duration" src="../asset/icons/time.png" height="50px"
                  width="50px">
              </div>
              <div class="col-8 in-tit">
                <p class="para">Duration</p>
                <p class="in-title">
                  <?php echo $package['tdays']; ?> Days
                </p>
              </div>
            </div>

            <?php if ($package['visa'] === 1) { ?>
              <div class="row top-1">
                <div class="col-4">
                  <img class="icons-img" alt="Visa" title="Visa" src="../asset/icons/visa.png" height="50px" width="50px">
                </div>
                <div class="col-8 in-tit">
                  <p class="para">Visa</p>
                  <p class="in-title">
                    <?php echo $package['visa_title']; ?>
                  </p>
                </div>
              </div>
            <?php } ?>

            <?php if ($package['passport'] === 1) { ?>
              <div class="row top-1">
                <div class="col-4">
                  <img class="icons-img" alt="Passport" title="Passport" src="../asset/icons/pass.png" height="50px"
                    width="50px">
                </div>
                <div class="col-8 in-tit">
                  <p class="para">Passport</p>
                  <p class="in-title">
                    <?php echo $package['passport_title']; ?>
                  </p>
                </div>
              </div>
            <?php } ?>

            <?php if ($package['ticket'] === 1) { ?>
              <div class="row top-1">
                <div class="col-4">
                  <img class="icons-img" alt="Ticket" title="Ticket" src="../asset/icons/ticket.png" height="50px"
                    width="50px">
                </div>
                <div class="col-8 in-tit">
                  <p class="para">Ticket</p>
                  <p class="in-title">
                    <?php echo $package['ticket_title']; ?>
                  </p>
                </div>
              </div>
            <?php } ?>

            <?php if ($package['transport'] === 1) { ?>
              <div class="row top-1">
                <div class="col-4">
                  <img class="icons-img" alt="Transport" title="Transport" src="../asset/icons/trans.png" height="50px"
                    width="50px">
                </div>
                <div class="col-8 in-tit">
                  <p class="para">Transport</p>
                  <p class="in-title">
                    <?php echo $package['transport_title']; ?>
                  </p>
                </div>
              </div>
            <?php } ?>

            <?php if ($package['hotel'] === 1) { ?>
              <div class="row top-1">
                <div class="col-4">
                  <img class="icons-img" alt="Hotel" title="Hotel" src="../asset/icons/hotel.png" height="50px"
                    width="50px">
                </div>
                <div class="col-8 in-tit">
                  <p class="para">Hotel</p>
                  <p class="in-title">
                    <?php echo $package['hotel_title']; ?>
                  </p>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
      <br>
      <h5 class="text-center"><b>
          <?php echo $package['quote'] ?>
        </b></h5>
    </div>
  </div>
  <!-- Package Detail Banner End -->


<?php
include("common/footer.php");
?>