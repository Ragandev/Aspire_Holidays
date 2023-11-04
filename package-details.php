<?php
require('config.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$packageID = $_GET['id'];

// Retrieve the package based on the ID
$packagesql = "SELECT * FROM package WHERE id = :id";
$stmt = $pdo->prepare($packagesql);
$stmt->bindParam(':id', $packageID, PDO::PARAM_INT);
$stmt->execute();
$package = $stmt->fetch(PDO::FETCH_ASSOC);

// Retrieve the package based on the ID
$dayssql = "SELECT * FROM days WHERE pkgid = :id";
$stmt1 = $pdo->prepare($dayssql);
$stmt1->bindParam(':id', $packageID, PDO::PARAM_INT);
$stmt1->execute();
$days = $stmt1->fetchAll(PDO::FETCH_ASSOC);

if (!$package) {
  // Handle package not found
  echo "Package not found.";
  exit();
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

    .topbar a {
      color: #fff;
    }

    .topbar a:hover {
      color: #fff !important;
    }
  </style>

</head>

<!--  section 1-->
<section class="main-menu" id="top">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../asset/images/others/logo.webp" alt="aspire_logo" srcset="">
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
              <li><a class="dropdown-item" href="../continental.php">International</a></li>
              <li><a class="dropdown-item" href="../package.php?cat=2">Domestic</a></li>
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
        <!--<div>-->
        <!--<a href="https://www.instagram.com/aspireholidays.in/"><img class="sm" src="../asset/images/others/Instagram.png"></a>-->
        <!--     <a href="https://www.linkedin.com/in/aspire-holidays-52b626144/?originalSubdomain=in"><img class="sm" src="../asset/images/others/Linkdin.png"></a>-->
        <!--     <a href="https://wa.me/+919362266666"><img class="sm" src="../asset/images/others/Whatsapp.png"></a>-->
        <!--     <a href="https://twitter.com/aspireholidays"><img class="sm" src="../asset/images/others/Twitter.png"></a>-->
        <!--     <a href="https://www.youtube.com/@AspireHolidays"><img class="sm" src="../asset/images/others/Youtube.png"></a>-->
        <!--     </div>-->
        <!--<div class="social1">-->
        <!--       <a class="sm1" href="https://facebook.com/aspireholidays"><div class="s-media1"><i class="fa-brands fa-facebook-f"></i></div></a>-->
        <!--       <a class="sm1" href="https://www.instagram.com/aspireholidays.in/"><div class="s-media2"><i class="fa-brands fa-instagram"></i></div></a>-->
        <!--       <a class="sm1" href="https://www.youtube.com/@AspireHolidays"><div class="s-media3"><i class="fa-brands fa-youtube"></i></div></a>-->
        <!--       <a class=" sm1" href="https://wa.me/+919362266666"><div class="s-media4"><i class="fa-brands fa-whatsapp"></i></div></a>-->
        <!--   </div>-->
      </div>
    </div>
  </nav>
</section>
<!--  section 1 end -->

<body>

  <!-- Package Detail Banner  -->
  <div class="pd-banner-sec">
    <div class="owl-carousel pd-banner owl-theme">
      <div class="item">
        <img src="../uploads/<?php echo $package['img1'] ?>" alt="" class="img-fluid" />
      </div>
      <div class="item">
        <img src="../uploads/<?php echo $package['img2'] ?>" alt="" class="img-fluid" />
      </div>
      <div class="item">
        <img src="../uploads/<?php echo $package['img3'] ?>" alt="" class="img-fluid" />
      </div>
    </div>
    <div class="pd-header container">
      <div class="row">
        <div class="col-md-3">
          <div class="pd-title-box">
            <h2 class="sub-heading">
              <?php echo $package['name']; ?>
            </h2>
            <p class="para">
              <span class="fa fa-location-dot"></span> &nbsp;
              <?php echo $package['country']; ?>
            </p>
          </div>
        </div>
        <div class="col-md-9 ico-in">
          <div class="pd-head-cont">

            <div class="row top-1">
              <div class="col-4">
                <img class="icons-img" src="../asset/icons/time.png" height="50px" width="50px">
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
                  <img class="icons-img" src="../asset/icons/visa.png" height="50px" width="50px">
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
                  <img class="icons-img" src="../asset/icons/pass.png" height="50px" width="50px">
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
                  <img class="icons-img" src="../asset/icons/ticket.png" height="50px" width="50px">
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
                  <img class="icons-img" src="../asset/icons/trans.png" height="50px" width="50px">
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
                  <img class="icons-img" src="../asset/icons/hotel.png" height="50px" width="50px">
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

  <!-- Package Detail Section  -->
  <div class="pd-main-sec position-relative mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="detail-box">

            <div class="highlights">
              <div class="d-flex align-items-center">
                <img src="../asset/icons/high.gif" height="50px">
                <h5><b>Highlights</b></h5>
              </div><br>
              <p>
                <?php echo $package['highlights']; ?>
              </p>
            </div>
            <p class="para">
              <?php echo $package['content']; ?>
            </p>
            <hr />
            <h2 class="mini-heading">Itinerary</h2><br>
            <p class="para">
              Aspire Holidays Team specializes in creating exceptional itineraries and organizing tours for the ultimate
              travel experience. With this plan, you will be sure to make the most of your time here and create lasting
              memories.
            </p><br>

            <div class="accordion" id="accordionExample">
              <?php foreach ($days as $d) { ?>
                <!--Days Render -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#<?php echo 'id' . $d['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                      <h5>
                        <?php echo $d['name']; ?> :
                        <?php echo $d['title']; ?>
                      </h5><br>
                    </button>
                  </h2>
                  <div id="id<?php echo $d['id']; ?>" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>
                        <?php echo $d['content']; ?>
                      </p><br>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>

          </div>
          <br>
          <p class="para">
            From start to finish, we Aspire Holidays, have been your travel partner, and we'll continue to be there till
            the last step. Until we meet again!
          </p>
          <hr />
        </div>
        <div class="col-lg-4 price-col">
          <div class="price-box position-sticky">
            <!--<div class="price-head">-->
            <!--  <div class="txt">-->
            <!--    <p class="para">Price</p>-->
            <!--  <p class="mini-heading">From</p>-->
            <!--  </div>-->
            <!--  <div class="price">-->
            <!--    <p class="sub-heading">₹ <?php echo $package['amount']; ?></p>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<hr>-->
            <div class="form-box">
              <p class="mini-heading text-center">Explore the World with Us</p>
              <form action="../enq_mail.php" method="post" id="myform">
                <input name="name" type="text" placeholder="Type your Name" required>
                <input name="ph" type="tel" id="phone" placeholder="Phone" required>
                <input name="email" type="email" placeholder="Insert your Email" required>
                <input name="dest" type="text" placeholder="Your Destination" required>
                <input name="bp" type="text" placeholder="Type your Boarding point">
                <input name="sd" placeholder="Date Start" class="textbox-n" type="text" onfocus="(this.type='date')"
                  id="date" />
                <input name="ed" placeholder="Date End" class="textbox-n" type="text" onfocus="(this.type='date')"
                  id="date" />
                <input name="no-ad" type="number" placeholder="Adult">
                <input name="no-ch" type="number" placeholder="Child">
                <input name="no-sc" type="number" placeholder="Senior">
                <select name="occ">
                  <option value="Choose Occasion">Choose Occasion</option>
                  <option value="Corporate">Corporate</option>
                  <option value="Family">Family</option>
                  <option value="College">College</option>
                  <option value="Honeymoon">Honeymoon</option>
                  <option value="Adventure">Adventure</option>
                </select>
                <select name="hot">
                  <option value="Choose Hotel Type">Choose Hotel Type</option>
                  <option value="5 Star">5 Star</option>
                  <option value="4 Star">4 Star</option>
                  <option value="3 Star">3 Star</option>
                  <option value="2 Star">2 Star</option>
                  <option value="1 Star">1 Star</option>
                </select>
                <select name="tra">
                  <option value="Choose Travel Mode">Choose Travel Mode</option>
                  <option value="Train">Train</option>
                  <option value="Flight">Flight</option>
                  <option value="Bus">Bus</option>
                  <option value="Cab">Cab</option>
                </select>

                <textarea name="message" rows="3" placeholder="Your Message"></textarea>
                <div class="d-grid gap-2">
                  <button class="btns cont-btn">Send</button>
                  <br>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Package Detail Section End  -->

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
                    Nagammai Building,<br/> Dr Nanjappa Road, Near Park Gate Roundana, Park Gate, Ram Nagar, Coimbatore, Tamil Nadu 641018
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
      initialCountry: "auto",
      geoIpLookup: callback => {
        fetch("https://ipapi.co/json")
          .then(res => res.json())
          .then(data => callback(data.country_code))
          .catch(() => callback("us"));
      },
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
  </script>

</body>

</html>