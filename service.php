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
<meta name="robots" content="index,follow">

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/about.css" />
  <link rel="stylesheet" href="css/common.css" />
  <link rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" href="css/section3.css" />
  <link rel="stylesheet" href="css/section11.css" />
  <link rel="stylesheet" href="css/service.css" />

  <style>
    .form-section {
      height: 100%;
      width: 100%;
      padding: 40px;
    }

    .form-section .row {
      background-color: antiquewhite;
    }

    .form-section .form-img-box {
      height: 100%;
    }

    .form-section .form-img-box img {
      height: 100%;
    }

    .form-section .mini-form {
      margin: 0px 0px;
      background-color: antiquewhite;
      padding: 20px 30px;
    }

    .form-section .bg1 {
      padding: 0;
    }

    .form-section .quick-form {
      margin: 10px auto;
      text-align: center;
    }

    .form-section .quick-form-box input,
    textarea {
      margin: 10px auto;
      display: block;
      padding: 10px;
      width: 100%;
    }

    @property --num {
      syntax: "<integer>";
      initial-value: 0;
      inherits: false;
    }

    .count {
      animation: counter 5s linear forwards;
      counter-reset: num var(--num);
      font: 800 40px system-ui;
      padding: 2rem;
    }

    .count::after {
      content: counter(num);
    }

    @keyframes counter {
      from {
        --num: 0;
      }

      to {
        --num: 1000;
      }
    }

    .count {
      animation: counter 5s linear forwards;
      counter-reset: num var(--num);
      font: 800 40px system-ui;
      padding: 2rem;
    }

    .count::after {
      content: counter(num);
    }

    @keyframes counter {
      from {
        --num: 0;
      }

      to {
        --num: 1000;
      }
    }

    .sm {
      height: 30px;
      width: 30px;
      padding: 0px 1px;
    }

    .icons-img:hover {
      animation: flip 1s;
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
  </style>

</head>

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
  <!--  section 1 -->
  <section class="main-menu" id="top">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="asset/images/others/logo.webp" alt="aspire_logo" srcset="" title="aspire_logo">
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
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Packages
              </a>
              <ul class="dropdown-menu">
                <li class="cbox1"><a class="dropdown-item" href="continental.php">International</a>
                  <div class="sub-menu-box continetal-bx">
                    <div class="row sub-menu-row">
                      <div class="col-3">
                        <?php if (!empty($europe)) { ?>
                          <h6>Europe</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($europe as $row) {
                            echo '<a href="package.php?country=' . $row['country'] . '"><li class="cm-li">' . $row['country'] . '</li></a>';
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
                            echo '<a href="package.php?country=' . $row['country'] . '"><li class="cm-li">' . $row['country'] . '</li></a>';
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
                            if ($row['country'] == 'United Arab Emirates') {
                              $uae = 'UAE';
                            }
                            echo '<a href="package.php?country=' . $row['country'] . '"><li class="cm-li">' . $uae . '</li></a>';
                          }
                          ?>
                        </ul>
                        <?php if (!empty($pacific)) { ?>
                          <h6>Pacific</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($pacific as $row) {
                            echo '<a href="package.php?country=' . $row['country'] . '"><li class="cm-li">' . $row['country'] . '</li></a>';
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
                            echo '<a href="package.php?country=' . $row['country'] . '"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                        <?php if (!empty($america)) { ?>
                          <h6>America</h6>
                        <?php } ?>
                        <ul class="cm-ul">
                          <?php
                          foreach ($america as $row) {
                            echo '<a href="package.php?country=' . $row['country'] . '"><li class="cm-li">' . $row['country'] . '</li></a>';
                          }
                          ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="cbox2"><a class="dropdown-item" href="india.php">Domestic</a>
                  <div class="sub-menu-box india-bx">
                    <div class="row sub-menu-row">
                      <div class="col-12">
                        <ul class="cm-ul">
                          <?php
                          foreach ($india as $row) {
                            echo '<a href="package.php?state=' . $row['state'] . '"><li class="cm-li">' . $row['state'] . '</li></a>';
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
              <a href="service.php" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
              <a href="blog.php" class="nav-link">Blogs</a>
            </li>
            <li class="nav-item">
              <a href="contact.php" class="nav-link">Contact</a>
            </li>
          </ul>
          <div class="social1">
            <a class="sm1" href="https://facebook.com/aspireholidays">
              <div class="s-media1"><i class="fa-brands fa-facebook-f"></i></div>
            </a>
            <a class="sm1" href="https://www.instagram.com/aspireholidays.in/">
              <div class="s-media2"><i class="fa-brands fa-instagram"></i></div>
            </a>
            <a class="sm1" href="https://www.youtube.com/@AspireHolidays">
              <div class="s-media3"><i class="fa-brands fa-youtube"></i></div>
            </a>
            <a class=" sm1" href="https://wa.me/+919362266666">
              <div class="s-media4"><i class="fa-brands fa-whatsapp"></i></div>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </section>
  <!--  section 1 end -->

  <!-- Banner Section  -->
  <section class="cont-banner">
    <div class="banner-box">
      <h2 class="main-heading">SERVICES</h2>
      <p class="mini-heading">Our Services</p>
    </div>
  </section>
  <!-- Banner Section End  -->

  <!-- service section 1 -->
  <section class="main-sec">
    <div class="container">
      <div class="main-box">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-12 col-lg-6">
            <div class="main-cont-box">
              <p class="cursive-heading">Tickets Booked. Bags Packed. Adventure Awaits!</p>
              <p class="main-heading">
                Your Complete Travel Solutions
              </p>
              <p class="para">
                Your gateway to unforgettable travel experiences! We are dedicated to turning your travel dreams into
                reality, providing a comprehensive range of services that cover every aspect of your journey. Our
                mission is to ensure that your travels are smooth, enjoyable, and stress-free from start to finish.
              </p>
              <div class="abt-data mb-4">
                <div class="service-list">
                  <li>
                    <i class="fa-solid fa-check"></i>We offer a wide range of
                    travel tours to destinations all over the world
                  </li>
                  <li>
                    <i class="fa-solid fa-check"></i>Our travel agents are
                    available to assist you every step of the way
                  </li>
                </div>
              </div>
              <a href="main-service.php"><button class="btns">More Info</button></a>
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div class="service-im-box">
              <img class="im-1" src="asset/images/others/Image Grp3.webp" alt="Adventure" title="Adventure" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end section 1 -->

  <!-- section 2 -->
  <section class="container">
    <div class="about-top-sec services-main">
      <h5 class="cursive-heading ser">
        Let us help you plan your next adventure
      </h5>
      <h6 class="main-heading ser headtitle">Perfect vacation come true</h6>
      <div class="row">
        <div class="col-md-4">
          <div class="service-sec">
            <div class="ser-box">
              <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/passport-icon.webp" alt="Passport" title="Passport" />
              </a>
            </div>
            <h6 class="mini-heading">Passport</h6>
            <p class="para">
              Empowering Your Dreams to Soar Beyond Borders! Your Passport to Possibilities - Seamlessly delivered with
              expertise and care. From application to adventure, we've got you covered.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-sec">
            <div class="ser-box">
              <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/Hotel.webp" alt="Hotel" title="Hotel" />
              </a>
            </div>
            <h6 class="mini-heading">Hotel</h6>
            <p class="para">
              Your Home Away from Home Awaits! Creating Memories One Stay at a Time - Relax, we'll take care of the
              rest. Unwind in style and luxury, because you deserve the finest.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-sec">
            <div class="ser-box">
              <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/visa-1.webp" alt="Visa" title="Visa" />
              </a>
            </div>
            <h6 class="mini-heading">Visa</h6>
            <p class="para">
              Unlocking World Wonders, One Visa at a Time - Your Gateway to Global Adventures! Seamlessly navigating
              visas so you can explore with ease, because borders shouldn't hold you back.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-sec">
            <div class="ser-box">
              <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/insurance-icon.webp" alt="Travel Insurance"
                  title="Travel Insurance" />
              </a>
            </div>
            <h6 class="mini-heading">Travel Insurance</h6>
            <p class="para">
              Embark on worry-free adventures, protected by our Travel Insurance Guardians! Your Safety Net Across the
              Globe - Explore with confidence.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-sec">
            <div class="ser-box">
              <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/Ticket .webp" alt="Ticket" title="Ticket" />
              </a>
            </div>
            <h6 class="mini-heading">Ticket</h6>
            <p class="para">
              Your Passport to Seamless Journeys - Where Every Destination Begins! Elevating Travel, One Ticket at a
              Time - We pave the way, you enjoy the ride
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-sec">
            <div class="ser-box">
              <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/currency-exchange.png" alt="Currency"
                  title="Currency" />
              </a>
            </div>
            <h6 class="mini-heading">Currency Exchange</h6>
            <p class="para">
              Travel the world with ease knowing that your currency exchange is taken care of. We're the currency
              exchange experts.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end section 2 -->

  <!--section 3-->
  <section class="service-bg">
    <div class="container">
      <div>
        <p class="main-heading">
          Let us Help you Plan your<br />
          Next Getaway Now
        </p>
        <!--<p>-->
        <!--  Contact our agency and we will get you a quote in a very short time.-->
        <!--  Discover the world with us! Book your next unforgettable adventure-->
        <!--  today.-->
        <!--</p>-->
        <a href="contact.php" /><button class="btns">CONTACT US</button></a>


      </div>
    </div>
  </section>
  <!--end section 3-->

  <!-- section 4 -->
  <section class="service-counter">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-12 col-lg-6">
          <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
              <div class="counter-box">
                <p class="sub-heading count"></p>
                <p class="para">
                  Affiliated hotels with all-inclusive service
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="counter-box">
                <p class="sub-heading count"></p>
                <p class="para">
                  Affiliated hotels with all-inclusive service
                </p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
              <div class="counter-box">
                <p class="sub-heading count"></p>
                <p class="para">
                  Affiliated hotels with all-inclusive service
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="counter-box">
                <p class="sub-heading count"></p>
                <p class="para">
                  Affiliated hotels with all-inclusive service
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 justify-content-center align-items-center">
          <div class="counter-para">
            <p class="cursive-heading">Always by your side</p>
            <h6 class="main-heading">The Numbers Say Our Success</h6>
            <p class="para">
              At Aspire Holidays, we understand that success isn't just a vague concept; it's something that can be
              quantified, tracked, and celebrated. We believe that by focusing on the numbers, we can truly measure the
              impact of our efforts and ensure that our clients enjoy unparalleled holiday experiences.
            </p>
            <a href="about.php"> <button class="btns">Read More</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end section 4 -->

  <!-- section 5 -->
  <section class="form-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 bg1">
          <div class="form-img-box">
            <img class="img-fluid" src="asset/images/others/banner1.webp" alt="contact" title="contact" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="mini-form">
            <div class="container">
              <div class="quick-form">
                <p class="cursive-heading">Plan Your Next Trip</p>
                <p class="sub-heading">Get in Touch</p>
                <p class="para">
                  Write to us for personalized travel advice or for
                  information on group travel and last minute travel, all
                  travel is insured and safe.
                </p>
              </div>
              <div class="quick-form-box" id="cont">
                <form action="contact_mail.php" method="post">
                  <input type="text" name="name" placeholder="Type your Name" />
                  <input type="email" name="email" placeholder="Insert your Email" />
                  <textarea rows="5" name="message" placeholder="Your Message"></textarea>
                  <button class="btns cont-btn">Submit Message</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-slides container align-items-center justify-content-center">
      <div class="owl-carousel owl-theme port">
        <div class="item">
          <img src="asset/images/partner_logo_wt/air-asia.webp" alt="air-asia" title="air-asia" />
        </div>
        <div class="item">
          <img src="asset/images/partner_logo_wt/air-india.webp" alt="air-india" title="air-india" />
        </div>
        <div class="item">
          <img src="asset/images/partner_logo_wt/american.webp" alt="american" title="american" />
        </div>
        <div class="item">
          <img src="asset/images/partner_logo_wt/emirates.webp" alt="emirates" title="emirates" />
        </div>
        <div class="item"><img src="asset/images/partner_logo_wt/etihad.webp" alt="etihad" title="etihad" /></div>
        <div class="item">
          <img src="asset/images/partner_logo_wt/malaysia.webp" alt="malaysia" title="malaysia" />
        </div>
        <div class="item"><img src="asset/images/partner_logo_wt/qatar.webp" alt="qatar" title="qatar" /></div>
        <div class="item">
          <img src="asset/images/partner_logo_wt/singapore.webp" alt="singapore" title="singapore" />
        </div>
        <div class="item">
          <img src="asset/images/partner_logo_wt/spicejet.webp" alt="spicejet" title="spicejet" />
        </div>
        <div class="item"><img src="asset/images/partner_logo_wt/thai.webp" alt="thai" title="thai" /></div>
      </div>
    </div>
  </section>
  <!-- end section 5 -->

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

  <?php
  include("common/footer.php");
  ?>