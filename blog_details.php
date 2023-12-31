<?php
require('config.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$blogID = $_GET['id'];

// Retrieve the package based on the ID
$blogsql = "SELECT * FROM blog WHERE id = :id";
$stmt = $pdo->prepare($blogsql);
$stmt->bindParam(':id', $blogID, PDO::PARAM_INT);
$stmt->execute();
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$blog) {
  // Handle package not found
  echo "Blog not found.";
  exit();
}

?>
  <meta name="robots" content="index,follow">

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css" />
  <link rel="stylesheet" href="../css/common.css" />
  <link rel="stylesheet" href="../css/menu.css" />
  <link rel="stylesheet" href="../css/slider.css" />
  <link rel="stylesheet" href="../css/section3.css" />
  <link rel="stylesheet" href="../css/section4.css" />
  <link rel="stylesheet" href="../css/section6.css" />
  <link rel="stylesheet" href="../css/section7.css" />
  <link rel="stylesheet" href="../css/section9.css" />
  <link rel="stylesheet" href="../css/section10.css" />
  <link rel="stylesheet" href="../css/section11.css" />
  <link rel="stylesheet" href="../css/about.css" />
  <link rel="stylesheet" href="../css/service.css">
  <link rel="stylesheet" href="../css/contact.css" />
  <link rel="stylesheet" href="../css/package.css" />
  <link rel="stylesheet" href="../css/package-details.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

  <style>
    /* Country Flag Position */
    .iti--allow-dropdown .iti__flag-container,
    .iti--separate-dial-code .iti__flag-container {
      margin-top: 38px !important;
    }

    .social1 {
      margin-right: 20px;
      display: flex;
      gap: 5px
    }

    .social1 div {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-bottom: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: azure;
      font-size: 15px;
    }

    .social1 div:hover i {
      animation-name: social;
      animation-duration: 1s;
      animation-iteration-count: infinite;
    }

    @keyframes social {
      100% {
        transform: rotate(360deg);
      }
    }

    .s-media1 {
      background-image: var(--blueG);
    }

    .s-media2 {
      background-image: var(--instaG);
    }

    .s-media3 {
      background-image: var(--youG);
    }

    .s-media4 {
      background-image: var(--whatG);
    }

    .icons-img:hover {
      animation: flip 1s;
    }

    .cont-btn {
      width: 60%;
      margin: 0 auto;
    }

    .iti {
      position: relative;
      display: inline !important;
      margin-left: 10% !important;
    }

    .iti input,
    .iti input[type=text],
    .iti input[type=tel] {
      z-index: 0;
      margin-top: 0 !important;
      margin-bottom: 18px !important;
      padding-right: 36px;
      margin-right: 0;
      margin-left: 10% !important;
    }

    .form-box {
      background-image: url("asset/images/others/enquiry-bg.jpg");
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

    .highlights div {
      gap: 20px;
    }

    .highlights img {
      filter: hue-rotate(-149deg);
    }

    .in-title {
      font-weight: bold;
    }

    input {
      height: 20px !important;
    }

    select {
      height: 30px;
      padding: 0;
    }

    .accordion-button:not(.collapsed) {
      color: var(--main) !important;
      background-color: #fff !important;
    }

    .pd-main-sec {
      background-image: url(../asset/images/bg/world1.webp);
      background-size: cover;
      background-repeat: no-repeat !important;
    }

    .pd-head-cont>div {
      /*    width:200px;*/
      margin-bottom: 20px;
    }

    .ico-in {
      justify-content: center;
    }

    @media (width <=1400px) {
      .pd-head-cont {
        flex-wrap: wrap;
        justify-content: start;
        align-items: start;
      }
    }

    @media (width <=992px) {
      .pd-head-cont {
        flex-wrap: nowrap;
      }

      .in-tit {
        display: none;
      }

      .navbar-collapse {
        z-index: 10;
        background: rgb(255, 255, 255);
      }
    }

    @media (width <=767px) {
      .pd-head-cont {
        flex-wrap: wrap;
        justify-content: start !important;
      }

    }

    .accordion-item h5 {
      font-size: 18px;
      line-height: 30px;
    }

    .sm {
      height: 30px;
      width: 30px;
      padding: 0px 1px;
    }

    .footer-sec a:hover {
      color: var(--main) !important;
    }

    .topbar {
      position: fixed;
      height: 50px;
      width: 50px;
      border-radius: 50%;
      background-color: var(--main);
      display: flex;
      justify-content: center;
      align-items: center;
      right: 10px;
      bottom: 10px;
      z-index: 20;
    }

    .blog-img {
      width: 100%;
      overflow: hidden !important;
    }

    .topbar a {
      color: #fff;
    }

    .topbar a:hover {
      color: #fff !important;
    }
  </style>

<style>
  /* Submenu Style  */
  .sub-menu-box {
    position: absolute;
    top: 0;
    left: 160px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    opacity: 0;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: opacity 0.3s ease-in-out;
  }

  .sub-menu-box ul {
    padding-left: 20px;
  }

  .sub-menu-box ul li {
    margin-bottom: 5px;
  }

  .sub-menu-box .col-3 {
    width: fit-content;
  }

  .sub-menu-box .row {
    width: fit-content;
  }

  .sub-menu-row {
    flex-wrap: nowrap;
  }

  .continetal-bx,
  .india-bx {
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease-in-out;
  }

  .cbox1:hover .continetal-bx,
  .cbox2:hover .india-bx {
    opacity: 1;
    pointer-events: auto;
  }

  .india-bx .col-12 {
    width: fit-content;
    white-space: nowrap;
  }

  .cm-ul a {
    color: black;
    font-weight: 400;
  }
  .cm-ul a:hover {
    color: #f0870d !important;
    font-weight: 400;
  }
</style>

</head>

<?php
  require('config.php');

  // <!-- Get Packages  -->
  $eastSql = "SELECT DISTINCT country FROM `package` WHERE country IN('Turkey',
'Israel',
'jordan',
'Oman',
'Egypt',
'Qatar',
'Saudi',
'United Arab Emirates'
)";
  $eastStmt = $pdo->prepare($eastSql);
  $eastStmt->execute();
  $east = $eastStmt->fetchAll(PDO::FETCH_ASSOC);

  $africaSql = "SELECT DISTINCT country FROM `package` WHERE country IN(
  'Kenya',
  'Morocco',
  'Mauritius',
  'Seyschells', 
  'zimbave',
  'Madagascar',
  'Tanzania',
  'Southafrica'
  )";
  $africaStmt = $pdo->prepare($africaSql);
  $africaStmt->execute();
  $africa = $africaStmt->fetchAll(PDO::FETCH_ASSOC);

  $americaSql = "SELECT DISTINCT country FROM `package` WHERE country IN(
    'alaska',
    'Canada',
    'USA',
    'Southamerica'
    )";
  $americaStmt = $pdo->prepare($americaSql);
  $americaStmt->execute();
  $america = $americaStmt->fetchAll(PDO::FETCH_ASSOC);

  $asiaSql = "SELECT DISTINCT country FROM `package` WHERE country IN('Thailand', 'malaysia','Singapore','Malaysia',
    'Singapore',
    'Bali',
    'Philipines',
    'China',
    'Hongkong',
    'Indonesia',
    'Japan',
    'Taiwan',
    'kazakhasthan',
    'southkorea',
    'uzbekisthan',
    'vietnam',
    'combodia',
    'vietnam',
    'combodia',
    'srilanka',
    'azerbijian',
    'Maldives',
    'Mynmar',
    'bhutan',
    'nepal',
    'Georgia',
    'Armenia',
    'Mongolia')";
  $asiaStmt = $pdo->prepare($asiaSql);
  $asiaStmt->execute();
  $asia = $asiaStmt->fetchAll(PDO::FETCH_ASSOC);

  $europeSql = "SELECT DISTINCT country FROM `package` WHERE country IN(
      'Austria',
      'Belgium',
      'Bulgaria',
      'Crotia',
      'Czech',
      'Denmark',
      'Finland',
      'France',
      'Germany',
      'Greece',
      'Geenland',
      'Hungary',
      'Iceland',
      'Ireland',
      'Italy',
      'Netherland',
      'Norway',
      'Portugal',
      'Romania',
      'Sweden',
      'UK',
      'Spain',
      'Switzerland'
      
      )";
  $europeStmt = $pdo->prepare($europeSql);
  $europeStmt->execute();
  $europe = $europeStmt->fetchAll(PDO::FETCH_ASSOC);

  $pacificSql = "SELECT DISTINCT country FROM `package` WHERE country IN('Australia',
'Newzealand',
'Fiji'
)";
  $pacificStmt = $pdo->prepare($pacificSql);
  $pacificStmt->execute();
  $pacific = $pacificStmt->fetchAll(PDO::FETCH_ASSOC);

  $indiaSql = "SELECT DISTINCT state FROM `package` WHERE state IN(
  'Tamil Nadu',
  'Chhattishgarh',
  'Maharashtra',
  'Andra Pradesh',
  'Arunachal Pradesh',
  'Assam',
  'Bihar',
  'Delhi',
  'Goa',
  'Gujarat',
  'Haryana',
  'Himachal Pradesh',
  'Jammu & Kashmir',
  'Jharkhand',
  'Karnataka',
  'Kerala',
  'Madhya Pradesh',
  'Maharashtra',
  'Manipur',
  'Meghalaya',
  'Mizoram',
  'Nagaland',
  'Orissa',
  'Pondichery',
  'Punjab',
  'Rajasthan',
  'Sikkim',
  'Uttar Pradesh',
  'Tripura',
  'Uttarakhand',
  'West Bengal')";
  $indiaStmt = $pdo->prepare($indiaSql);
  $indiaStmt->execute();
  $india = $indiaStmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

<body>
  <!--  section 1-->
  <section class="main-menu" id="top">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../asset/images/others/logo.webp" alt="aspire_logo" srcset="" title="aspire_logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
          aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll nav-scr">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about.php">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Packages
              </a>
              <ul class="dropdown-menu">
                <li class="cbox1"><a class="dropdown-item" href="../continental.php">International</a>
                  <div class="sub-menu-box continetal-bx">
                    <div class="row sub-menu-row">
                      <div class="col-3">
                      <?php if (!empty($europe)) { ?>
                        <h6>Europe</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($europe as $row) {
                            echo '<a href="../package.php?country='.$row['country'].'"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                      </div>
                      <div class="col-3">
                      <?php if (!empty($asia)) { ?>
                        <h6>Asia</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($asia as $row) {
                            echo '<a href="../package.php?country='.$row['country'].'"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                      </div>
                      <div class="col-3">
                      <?php if (!empty($east)) { ?>
                        <h6>East</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($east as $row) {
                            $uae = $row['country'];
                            if($row['country'] == 'United Arab Emirates'){
                              $uae = 'UAE';
                            }
                            echo '<a href="../package.php?country='.$row['country'].'"><li class="cm-li">' . $uae . '</li></a>';
                          }
                          ?>
                        </ul>
                        <?php if (!empty($pacific)) { ?>
                        <h6>Pacific</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($pacific as $row) {
                            echo '<a href="../package.php?country='.$row['country'].'"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                      </div>
                      <div class="col-3">
                      <?php if (!empty($africa)) { ?>
                        <h6>Africa</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($africa as $row) {
                            echo '<a href="../package.php?country='.$row['country'].'"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                        <?php if (!empty($america)) { ?>
                        <h6>America</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($america as $row) {
                            echo '<a href="../package.php?country='.$row['country'].'"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="cbox2"><a class="dropdown-item" href="../india.php">Domestic</a>
                <div class="sub-menu-box india-bx">
                    <div class="row sub-menu-row">
                      <div class="col-12">
                        <ul class="cm-ul">
                          <?php
                          foreach ($india as $row) {
                            echo '<a href="../package.php?state='.$row['state'].'"><li class="cm-li">' . $row['state'] . '</li></a>';
                          }
                          ?>
                        </ul>
                      </div>
                    </div>
                  </div>
              </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../blog.php" class="nav-link">Blogs</a>
            </li>
            <li class="nav-item">
              <a href="../service.php" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
              <a href="../contact.php" class="nav-link">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!--  section 1 end -->



  <!-- Package Detail Banner  -->

  <div class="pd-header container">
    <div class="row">
      <div class="col-md-12">
        <div class="pd-title-box">
          <h2 class="sub-heading">
            <?php echo $blog['name']; ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Package Detail Banner End -->

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

  <!-- Blog Detail Section  -->
  <div class="pd-main-sec position-relative">
    <div class="container">
      <div class="blog-img">
        <img class="img-fluid" src="../uploads/blog/<?php echo $blog['img'] ?>" alt="blogs" title="blogs" />
      </div>

      <div class="detail-box">
        <p class="para">
          <?php echo $blog['date_created']; ?></br>
          <?php echo $blog['content']; ?>
        </p>
        <br>


      </div>
    </div>
  </div>
  </div>
  <!-- Blog Detail Section End  -->

  <!-- Section 11 -->
  <section class="footer-bg"></section>
  <section class="footer-sec">
    <div class="footer-sec-inn container">
      <div class="row first-row">
        <div class="col-md-12 col-lg-6 mb-5">
          <div class="txt-box" data-aos="fade-right" data-aos-duration="1000">
            <p class="main-heading">
              Travel beyond your imagination, with our Travel Agency!
            </p>
          </div>
        </div>
        <div class="col-md-12 col-lg-6">
          <div class="footer-box">
            <div class="row">
              <div class="col-md-6">
                <div class="add-box">
                  <p class="mini-heading">Address</p>
                  <address>
                    Second Floor,
                    Nagammai Building,<br /> Dr Nanjappa Road, Near Park Gate Roundana, Park Gate, Ram Nagar,
                    Coimbatore, Tamil Nadu 641018
                  </address>
                  <div class="social-icons">
                    <a href="https://www.instagram.com/aspireholidays.in/"><span
                        class="fa-brands fa-xl fa-instagram"></span></a>
                    <!--<a href="#"><span class="fa-brands fa-xl fa-facebook"></span></a>-->
                    <a href="https://www.linkedin.com/in/aspire-holidays-52b626144/?originalSubdomain=in"><span
                        class="fa-brands fa-xl fa-linkedin"></span></a>
                    <a href="https://www.youtube.com/@AspireHolidays"><span
                        class="fa-brands fa-xl fa-youtube"></span></a>
                    <a href="https://twitter.com/aspireholidays"><span class="fa-brands fa-xl fa-twitter"></span></a>
                    <a href="https://wa.me/+919362266666"><span class="fa-brands fa-xl fa-whatsapp"></span></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="contact-box">
                  <p class="mini-heading">Contact</p>
                  <a href="" class="btns">info@aspireholidays.in</a>
                  <div class="phone-box">
                    <a href="tel:9362266666" class="mini-heading">+91 9362266666</a><br>
                    <a href="tel:9514433334" class="mini-heading">+91 9514433334</a>
                  </div>
                  <br> <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row second-row">
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="ql-list">
            <p class="mini-heading">Quick Links</p>
            <li><a href="../about.php">About</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a href="../service.php">Services</a></li>
            <li><a href="../package.php">Packages</a></li>
            <li><a href="../contact.php">Enquire</a></li>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="p-list">
            <p class="mini-heading">Package Category</p>
            <li><a href="../package.php?cat=1">International</a></li>
            <li><a href="../package.php?cat=2">Domestic</a></li>
            <li><a href="../package.php?sub=1">Educational</a></li>
            <li><a href="../package.php?sub=2">Honeymoon</a></li>
            <li><a href="../package.php?sub=3">Cruises</a></li>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="pp-list">
            <p class="mini-heading">Popular Packages</p>
            <li><a href="../package.php?country=Japan">Japan</a></li>
            <li><a href="../package.php?country=Indonesia">Bali</a></li>
            <li><a href="#">Munnar</a></li>
            <li><a href="#">Thailand</a></li>
            <li><a href="#">America</a></li>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="pp-list">
            <p class="mini-heading">Our Services</p>
            <li><a href="../main-service.php">Ticketing</a></li>
            <li><a href="../main-service.php">Passport</a></li>
            <li><a href="../main-service.php">VISA</a></li>
            <li><a href="../main-service.php">Travel Insurance</a></li>
            <li><a href="../main-service.php">Currency Exchange</a></li>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section 11 End -->

  <!--Gotop button-->
  <div class="topbar">
    <a href="#top"><i class="fa-solid fa-circle-arrow-up"></i></a>
  </div>
  <!--End-->

  <!-- infy Section  -->
  <div class="infy-sec">
    <div class="infy-box">
      <a href="#">
        <p>Developed & Maitained By</p>
        <img src="https://infygain.com/images/logo-alt.svg" alt="Infygain Logo" />
      </a>
    </div>
  </div>
  <!-- Infy Section End  -->


  <!-- jQuery cdn  -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
    integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- JS  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
    integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      easing: 'ease'
    });
  </script>

  <script>
    $(".pd-banner").owlCarousel({
      loop: true,
      autoplay: true,
      margin: 20,
      nav: false,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1200: {
          items: 2,
        },
        1300: {
          items: 3,
        }
      },
    });
  </script>

  <script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cbox1 = document.querySelector('.cbox1');
    const cbox2 = document.querySelector('.cbox2');
    const continetalBx = document.querySelector('.continetal-bx');
    const indiaBx = document.querySelector('.india-bx');

    cbox1.addEventListener('mouseenter', function () {
      continetalBx.style.opacity = '1';
    });

    cbox1.addEventListener('mouseleave', function () {
      continetalBx.style.opacity = '0';
    });

    cbox2.addEventListener('mouseenter', function () {
      indiaBx.style.opacity = '1';
    });

    cbox2.addEventListener('mouseleave', function () {
      indiaBx.style.opacity = '0';
    });
  });
</script>

</body>

</html>