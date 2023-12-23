<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Ranjith, Keerthana">
  <title>Aspire Holidays</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/common.css" />
  <link rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" href="css/slider.css" />
  <link rel="stylesheet" href="css/section3.css" />
  <link rel="stylesheet" href="css/section4.css" />
  <link rel="stylesheet" href="css/section6.css" />
  <link rel="stylesheet" href="css/section7.css" />
  <link rel="stylesheet" href="css/section9.css" />
  <link rel="stylesheet" href="css/section10.css" />
  <link rel="stylesheet" href="css/section11.css" />
  <link rel="stylesheet" href="css/about.css" />
  <link rel="stylesheet" href="css/contact.css" />
  <link rel="stylesheet" href="css/package.css" />
  <link rel="stylesheet" href="css/service.css" />
  <link rel="stylesheet" href="css/package-details.css">

</head>

<style>
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

<!--  section 1-->
<section class="main-menu" id="top">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="asset/images/others/logo.svg" alt="aspire_logo" title="aspire_logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll nav-scr">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Packages
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="continental.php">International</a></li>
              <li><a class="dropdown-item" href="india.php">Domestic</a></li>
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
        <div>


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
    </div>
  </nav>
</section>
<!--  section 1 end -->

<script>
  $(document).ready(function () {
    $("ul >li.navbar-nav").click(function (e) {
      $("ul >li.navbar-nav").removeClass("active");
      $(this).addClass("active");
    });
  });
</script>

<body>