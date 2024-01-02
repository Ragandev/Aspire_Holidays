<style>
  html {
    width: 100vw;
    overflow-x: hidden;
  }

  .in-inner img {
    scale: 0.8;
    max-height: 50px;
    max-width: 50px;
    min-height: 50px;
    min-width: 50px;
    aspect-ratio: 1/1;
  }

  .img-cover {
    object-fit: cover;
    object-position: 0 0;
  }

  .clr a:hover {
    color: #fff !important;
  }

  .blog-body a:hover {
    color: #fff !important;
  }
</style>
<meta name="robots" content="index,follow">

<?php
require('config.php');
$trendsql = "SELECT * FROM package WHERE subid=4 AND status=1 ORDER BY priority DESC";
$trend = $pdo->query($trendsql);
$tdata = $trend->fetchAll(PDO::FETCH_ASSOC);

//Category Data
$paksql = "SELECT * FROM package";
$stmt11 = $pdo->prepare($paksql);
$stmt11->execute();
$packdata = $stmt11->fetchAll(PDO::FETCH_ASSOC);

//blog Single data
$selectBlogsQuery1 = "SELECT id, name, content, img, date_created
                     FROM blog WHERE status=1
                     ORDER BY id DESC";

$stmt1 = $pdo->prepare($selectBlogsQuery1);
$stmt1->execute();
$blogs1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$dateCreated = new DateTime($blogs1['date_created']);
$formattedDate = $dateCreated->format('F j, Y');

//blog data
$selectBlogsQuery = "SELECT id, name, content, img, date_created
                     FROM blog  WHERE status=1
                     ORDER BY id DESC
                     LIMIT 4 OFFSET 1";

$stmt = $pdo->prepare($selectBlogsQuery);
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve the package affordable
$subcategory = 7; // Define the subcategory value
$affsql = "SELECT * FROM package WHERE subid = :catt AND status=1 ORDER BY priority DESC";
$stmts = $pdo->prepare($affsql);
$stmts->bindParam(':catt', $subcategory, PDO::PARAM_INT);
$stmts->execute();
$aff = $stmts->fetchAll(PDO::FETCH_ASSOC);

include("common/header.php");
?>

<link rel="stylesheet" href="css/search.css" />

<!--  Section 2 -->
<section class="banner-sec">
  <div id="banner" class="main-banner">
    <video width="100%" autoplay loop muted>
      <source src="asset/videos/main_banner.webm" type="video/mp4" />
    </video>
    <div class="slider-cont">
      <h5 class="large-heading">Explore the <span>world</span> now at <span>Aspire Holidays</span></h5>
      <!--<p>-->
      <!--  Pack your bags and grab your sense of adventure, because you've just stumbled upon the ultimate travel shindig!-->
      <!--  At Aspire Holidays, we're the masters of turning 'I need a vacation' into 'I'm on a plane!'-->
      <!--</p>-->
      <!--<a href="package-details.php"><button class="btns">Details</button></a>-->
    </div>
  </div>
</section>
<!--  Section 2 end -->

<!-- Section 3 -->
<section class="tour-explore">

  <div class="container">
    <div class="row">
      <div class="col-md-7 explore">
        <h5 class="cursive-heading">Dream Vacation Destination</h5>
        <p class="main-heading">Plan the Trip of a Lifetime<br> with Ease</p>
        <p>Aspire holidays has everything you need to make the most of your next dream holiday. We are one of the best
          travel agencies in Coimbatore dedicated to make your next vacation the best it can be.</p>
        <a href="package.php"><button class="btns">More Info</button></a>
      </div>
      <div class="col-md-5">
        <img class="img-fluid j img-trend d-none d-md-block" src="asset/images/others/worldmap.webp" alt="worldmap" title="worldmap">
      </div>
    </div>

    <div class="tour-box">

      <div class="row main-tour-box">

        <div class="col-md-12 col-lg-6" data-aos="fade-up" data-aos-duration="600">
          <a class="dropdown-item" href="package.php?cat=1">
            <div class="box-inn">
              <div class="row tour tour-box-1">
                <div class="col-3 icon-box">
                  <img src="asset/gif/airplane-min.webp" alt="International" title="International">
                </div>
                <div class="col-9 txt-box sub-heading">
                  International
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-12 col-lg-6" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
          <a class="dropdown-item" href="package.php?cat=2">
            <div class="box-inn">
              <div class="row tour tour-box-2">
                <div class="col-3 icon-box">
                  <img src="asset/gif/train-min.webp" alt="Domestic" title="Domestic">
                </div>
                <div class="col-9 txt-box sub-heading">Domestic</div>
              </div>
            </div>
          </a>


        </div>

      </div>

      <div class="row main-tour-box">

        <!--<div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">-->
        <!--  <a class="dropdown-item" href="package.php?sub=2">-->
        <!--    <div class="box-inn">-->
        <!--      <div class="row tour tour-box-3">-->
        <!--        <div class="col-3 icon-box">-->
        <!--          <img src="asset/gif/education-min.webp" alt="Educational" title="Educational">-->
        <!--        </div>-->
        <!--        <div class="col-9 txt-box sub-heading">-->
        <!--          Educational-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </a>-->
        <!--</div>-->

        <div class="col-md-12 col-lg-6" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
          <a class="dropdown-item" href="package.php?sub=2">
            <div class="box-inn">
              <div class="row  tour tour-box-4">
                <div class="col-3 icon-box">
                  <img src="asset/gif/honeymoon-min.webp" alt="Honeymoon" title="Honeymoon">
                </div>
                <div class="col-9 txt-box sub-heading">Honeymoon</div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-12 col-lg-6" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
          <a class="dropdown-item" href="visa.php">
            <div class="box-inn">
              <div class="row  tour tour-box-5">
                <div class="col-3 icon-box">
                  <img src="asset/gif/cruises-min.webp" alt="Visa" title="Visa Services">
                </div>
                <div class="col-9 txt-box sub-heading">Visa</div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

</section>
<section class="trend">
  <div class="container">
    <h5 class="cursive-heading trend-title">Trending Tour Packages</h5>
    <div class="row">
      <div class="owl-carousel trend-package owl-theme">
        <?php foreach ($tdata as $row) { ?>
          <div class="card border-0">
            <a href="package-details/<?php echo $row['id']; ?>"><img alt="Tour Packages" title="Tour Packages" src="uploads/<?php echo $row['img2']; ?>"
                class="card-img-top"></a>
            <div class="card-body">
              <div class="tit-box">
                <h5 class="mini-heading">
                  <?php echo $row['name']; ?>
                </h5>
              </div>
              <hr>
              <h6>Inclusions</h6>
              <div class="in-inner d-flex align-items-center">
                <?php if ($row['visa'] === 1) { ?>
                  <a href="package-details/<?php echo $row['id']; ?>"><img class="img-cover icons-img"
                      src="asset/icons/visa.png" alt="visa" title="visa">
                  <?php } ?>
                </a>

                <?php if ($row['passport'] === 1) { ?>
                  <a href="package-details/<?php echo $row['id']; ?>"><img class="img-cover icons-img"
                      src="asset/icons/pass.png" alt="passport" title="passport">
                  <?php } ?>
                </a>

                <?php if ($row['ticket'] === 1) { ?>
                  <a href="package-details/<?php echo $row['id']; ?>"><img class="img-cover icons-img"
                      src="asset/icons/ticket.png"  alt="ticket" title="ticket">
                  <?php } ?>
                </a>

                <?php if ($row['transport'] === 1) { ?>
                  <a href="package-details/<?php echo $row['id']; ?>"><img class="img-cover icons-img"
                      src="asset/icons/trans.png"  alt="transport" title="transport">
                  <?php } ?>
                </a>

                <?php if ($row['hotel'] === 1) { ?>
                  <a href="package-details/<?php echo $row['id']; ?>"><img class="img-cover icons-img"
                      src="asset/icons/hotel.png"  alt="hotel" title="hotel">
                  <?php } ?>
                </a>
              </div>
              <hr>
              <div class="row">
                <div class="col-6">
                  <a href="package-details/<?php echo $row['id']; ?>"><button class="btns">Details</button></a>
                </div>
                <div class="col-6 trend-price">From<br><span class="mini-heading"> ₹
                    <?php echo $row['amount']; ?>
                  </span></div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</section>
<!-- End section 3 -->

<!-- search Section  -->
<section class="search-sec">
  <div class="search-inn container">
    <div class="search-cont text-center">
      <p class="cursive-heading">Choose your Trip</p>
      <h2 class="sub-heading">Start your Vacation Now</h2>
      <p class="para">Looking for your dream vacation destination but don't know where to start? With the help of
        experienced and knowledgeable travel agents, you can plan the trip of a lifetime with ease.
      </p>
    </div>
    <div class="search-box" data-aos="fade-up" data-aos-duration="800">
      <div class="row">
        <div class="mb-5 m-lg-0 col-12 col-md-6 col-lg-3">
          <div class="row input-box">
            <div class="col-4 ico-box">
              <span class="fa fa-solid fa-magnifying-glass fa-2xl"></span>
            </div>
            <div class="col-8 field-box">
              <form method="get" action="package.php">
                <div>
                  <label for="search" class="form-label">Search</label><br>
                  <input type="text" name="namee" class="form-control" id="search" placeholder="Insert Keyword">
                </div>
            </div>
          </div>
        </div>
        <div class="mb-5 m-lg-0 col-12 col-md-6 col-lg-3">
          <div class="row input-box">
            <div class="col-4 ico-box">
              <span class="fa fa-solid fa-location-dot fa-2xl"></span>
            </div>
            <div class="col-8 field-box">
              <div>
                <label for="Destinations" class="form-label">Destinations</label><br>
                <select name="world" class="form-select" aria-label="Default select example">

                  <option value="">All Destination</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Canada">Canada</option>
                  <option value="China">China</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Egypt">Egypt</option>
                  <option value="France">France</option>
                  <option value="Germany">Germany</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Italy">Italy</option>
                  <option value="Japan">Japan</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Nepal">Nepal</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Panama">Panama</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Russia">Russia</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Singapore">Singapore</option>
                  <option value="South Africa">South Africa</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="Venezuela">Venezuela</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-5 m-lg-0 col-12 col-md-6 col-lg-3">
          <div class="row input-box">
            <div class="col-4 ico-box">
              <span class="fa fa-solid fa-clock fa-2xl"></span>
            </div>
            <div class="col-8 field-box">
              <div>
                <label for="Destinations" class="form-label">Duration</label> <br>
                <select name="days" class="form-select" aria-label="Default select example">
                  <option value="">All Duration</option>
                  <option value="5">Upto 5 days</option>
                  <option value="10">Upto 10 days</option>
                  <option value="15">Upto 15 days</option>
                  <option value="20">Upto 20 days</option>
                  <option value="25">Upto 25 days</option>
                  <option value="30">Upto 30 days</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-5 m-lg-0 col-12 col-md-6 col-lg-3">

          <div class="d-grid">
            <button class="btns">Search</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- search Section End  -->

<!-- Section 4 -->
<section class="all-package">
  <div class="all-package-inn container">
    <div class="package-cont-box">
      <div class="package-cont">
        <p class="cursive-heading">Adventure Start With Aspire Holidays</p>
        <h1 class="main-heading">
          Travel Destinations Available Worldwide
        </h1>
        <p class="para">
          We're the masters of turning 'I need a vacation' into 'I'm on a plane!' Get ready to trade your cubicle for a
          hammock, and your daily grind for stunning sunsets. We've got more wanderlust-inducing destinations than you
          can shake a selfie stick at, and we're here to sprinkle your trips with that extra dose of awesome. So buckle
          up, fellow explorer, and get ready for a wild ride through our virtual vacation wonderland!"
        </p>
      </div>
    </div>

    <div class="owl-carousel pop-package owl-theme">
      <div class="item">
        <div>
          <img src="asset/images/others/3bali.webp" alt="Indonesia" title="Indonesia"/>
          <div class="item-cont">
            <p class="mini-heading">Indonesia</p>
            <p>Here is filled with diverse culture and cities</p>
            <a href="package.php?country=Indonesia" class="btns">All Packages</a>
          </div>
        </div>
      </div>
      <div class="item">
        <div>
          <img src="asset/images/others/Japan.webp" alt="Japan" title="Japan"/>
          <div class="item-cont">
            <p class="mini-heading">Japan</p>
            <p>Here is filled with diverse culture and cities</p>
            <a href="package.php?country=Japan" class="btns">All Packages</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section 4 End -->

<!--  Section 5 -->
<section class="about-sec">
  <div class="container">
    <div class="row about-row">
      <div class="col-md-12 col-lg-6">
        <div class="owl-carousel about-owl owl-theme" data-aos="fade-right" data-aos-duration="1500">
          <div class="item"><img height="100%" width="auto" src="asset/images/others/girl6.webp" alt="Vacation" title="Vacation"></div>
          <div class="item"><img height="100%" width="auto" src="asset/images/others/cap-boy.webp"  alt="Vacation" title="Vacation"></div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6">
        <h5 class="cursive-heading">Discover Aspire Holidays</h5>
        <h5 class="main-heading">Planning your Vacation</h5>
        <p>Aspire holidays has everything you need to make the most of your next dream holiday. We are one of the
          best travel agencies in Coimbatore dedicated to make your next vacation the best it can be.
        </p>

        <a href="about.php"><button class="btns">Know More</button></a>
      </div>
    </div>
  </div>
</section>
<!--  Section 5 end  -->

<!-- Section 6  -->
<section class="travel-video">
  <div class="travel-video-box">
    <h4 data-aos="zoom-in" data-aos-duration="1000" class="large-heading zoom-txt">Boundless Journeys</h4>
    <div class="video-box">
      <video data-aos="zoom-out" data-aos-duration="1000" class="zoom-vid" width="85%" playsinline autoplay loop muted
        autobuffer preload="auto" poster="asset/images/2.webp">
        <source src="asset/videos/travel_girls.webm" type="video/mp4">
      </video>
    </div>
    <div class="partner-box container">
      <div class="owl-carousel partner-slide owl-theme">
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/airasia-blue.webp" alt="airasia" title="airasia">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/airindia-blue.webp"  alt="airindia" title="airindia">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/american-blue.webp"  alt="american" title="american">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/emirates-blue.webp"  alt="emirates" title="emirates">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/etihad.webp"  alt="etihad" title="etihad">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/malaysia-blue.webp"  alt="malaysia" title="malaysia">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/qatar-blue.webp"  alt="qatar" title="qatar">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/singapore-blue.webp"  alt="singapore" title="singapore">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/spicejet-blue.webp"  alt="spicejet" title="spicejet">
        </div>
        <div class="item p-3">
          <img class="img-fluid" src="asset/images/partner_logo/thai-blue.webp" alt="thai" title="thai">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section 6 End  -->

<!-- Section 7  -->
<section class="review-sec">
  <div class="review-title container">
    <div class="row align-content-center">
      <div class="col-md-8 text-center text-md-start">
        <h2 class="main-heading">Customer Reviews</h2>
        <p>
          Our customer's feedback is essential in building a great reputation
          and maintaining excellent service. By listening to our customer's
          needs, we can improve our offerings and provide an exceptional travel
          experience.
        </p>
      </div>
      <div class="col-md-4 d-none d-md-block re-img" data-aos="fade-left" data-aos-duration="1500">
        <img src="asset/images/others/girl1.webp" alt="Customer Reviews" title="Customer Reviews">
      </div>
    </div>
  </div>
  <div class="review-box container">
    <div class="owl-carousel review-slide owl-theme">
      <div class="item">
        <p class="review-txt">
          We've planned our all India educational tour program to visit many north indian cities including Hyderabad
          mumbai delhi and so on. so we seeked the guidance of aspire holidays. Our tour experience with Ashok brother
          as tourist guide was really good and memorable.
        </p>
        <div class="review-person">
          <div class="img-box">
            <img src="asset/images/others/girl1.webp" alt="Customer Reviews" title="Customer Reviews" />
          </div>
          <div class="name-box">
            <p class="mini-heading">JINS JANEL</p>
            <p>Chennai</p>
          </div>
        </div>
      </div>
      <div class="item">
        <p class="review-txt">
          It was a great trip for all of us who had visited vagomon for the first time and we had great time in both
          kochi and vagamon. Mr. Sanjay had been a great guide and did a lot of things for the trip he made this trip
          memorable for all of us. Thanks you sanjay sir for planning so much for us
        </p>
        <div class="review-person">
          <div class="img-box">
            <img src="asset/images/others/girl1.webp" alt="Customer Reviews" title="Customer Reviews" />
          </div>
          <div class="name-box">
            <p class="mini-heading">Janani Angurajan</p>
            <p>Banglore</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section 7 -->

<!--   section 8 end -->
<section class=" price-content-box">
  <div class="container">
    <div class="price-first-box">
      <h5 class="cursive-heading">Latest Tour Package Price</h5>
      <h5 class="main-heading">Affordable Travel Packages</h5>
      <p class="para">We believe that everyone deserves to experience their dream vacation without breaking the bank.
        That's why we offer a price section on our website that features a range of affordable travel</p>
    </div>
    <div class="row justify-content-center">
      <div class="mb-5 owl-carousel trend-package owl-theme" data-aos="fade" data-aos-duration="1500">
        <?php foreach ($aff as $da) { ?>

          <div class="box1-con">
            <div class="tit-box">
              <h5 class="mini-heading">
                <?php echo $da['name']; ?>
              </h5>
            </div><br>
            <h6 class="main-heading">₹
              <?php echo $da['amount']; ?><span class="price">/ Day</span>
            </h6>
            <ul>

              <li><i class="fa-solid fa-check"></i>VISA :
                <?php echo $da['visa_title']; ?>
              </li>
              <li><i class="fa-solid fa-check"></i>Passport:
                <?php echo $da['passport_title']; ?>
              </li>
              <li><i class="fa-solid fa-check"></i>Ticket:
                <?php echo $da['ticket_title']; ?>
              </li>
              <li><i class="fa-solid fa-check"></i>Transport:
                <?php echo $da['transport_title']; ?>
              </li>
              <li><i class="fa-solid fa-check"></i>Duration :
                <?php echo $da['tdays']; ?> Days
              </li>

            </ul>
            <a href="package-details/<?php echo $da['id']; ?>"><button class="btns">View Details</button></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<!--  section 8 end -->

<!-- Section 9  -->
<section class="data-sec">
  <div class="data-sec-inn container">
    <div class="row">
      <div class="mb-5 col-md-12 col-lg-6">
        <div class="data-cont">
          <p class="cursive-heading">Wandering Souls</p>
          <h2 class="main-heading">Discover Your Next Adventure</h2>
          <p class="para">
            Whether you're planning a romantic honeymoon or a family
            vacation, our price section has got you covered. So, start
            browsing today and find the perfect vacation package at a price
            that won't leave you feeling guilty.
          </p>
          <div class="data-links">
            <p class="para">International Tour</p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <p class="para">Domestic Tour</p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <p class="para">Honeymoon Tour</p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>

          </div><br><br>
          <div class="clr">
            <a href="package.php" class="btns">More Info</a>
          </div>
        </div>
      </div>
      <div class="mb-5 col-md-12 col-lg-6">
        <div class="data-img" data-aos="fade-left" data-aos-duration="1000">
          <a href="#">
            <img class="img-fluid" src="asset/images/others/girl3.webp" alt="Adventure" title="Adventure"/>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section 9 end  -->

<!-- section 10  -->
<section class="blog-sec">
  <div class="blog-sec-inn container">
    <div class="blog-head">
      <p class="cursive-heading">Roaming Tales</p>
      <h1 class="main-heading">Travel Blog</h1>
      <p class="para">
        We share our experiences, tips and travel stories to inspire and
        guide our readers in their own wanderlust adventures. From hidden
        gems to popular destinations, we showcase the beauty and diversity
        of the world, and promote responsible and sustainable travel.
      </p><br>
      <div class="clr">
        <a href="blog.php" class="btns">View All</a>
      </div>
    </div>

    <div class="blog-main">
      <div class="row">
        <div class="col-md-12 col-lg-6  mb-md-5">
          <div class="main-blog-item">
            <div class="blog-img">
              <a href="blog_details/<?php echo $blogs1['id']; ?>"><img alt="blog" title="blog" class="img-fluid"
                  src="uploads/blog/<?php echo $blogs1['img'] ?>"  /></a>
            </div>
            <div class="blog-body">
              <a href="blog_details/<?php echo $blogs1['id']; ?>">
                <?php echo $formattedDate ?>
              </a>
              <h2 class="sub-heading">
                <?php echo $blogs1['name'] ?>
              </h2>
              <p class="para">
                <?php echo $blogs1['content'] ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 ">
          <div class="sub-blog-item">
            <?php foreach ($blogs as $b) {
              $dateCreated1 = new DateTime($b['date_created']);
              $formattedDate1 = $dateCreated1->format('F j, Y');
              $shortContent = substr($b['content'], 0, 70) . '...';
              ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="blog-img">
                    <a href="blog_details/<?php echo $b['id']; ?>"><img alt="blog" title="blog" class="img-fluid"
                        src="uploads/blog/<?php echo $b['img'] ?>" alt="" /></a>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="blog-body">
                    <a href="blog_details/<?php echo $b['id']; ?>">
                      <?php echo $formattedDate1 ?>
                    </a>
                    <h2 class="mini-heading">
                      <?php echo $b['name'] ?>
                    </h2>
                    <p class="para">
                      <?php echo $shortContent ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section 10 End -->
<?php

include("common/footer.php");

?>