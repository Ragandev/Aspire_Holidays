<?php 
require('config.php');
 include("common/header.php");
 
 //blog data
    $selectBlogsQuery = "SELECT id, name, content, img
                     FROM blog
                     ORDER BY id DESC
                     LIMIT 4 OFFSET 1";

    $stmt = $pdo->prepare($selectBlogsQuery);
    $stmt->execute();
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
  <meta name="robots" content="index,follow">

  <!-- Banner Section  -->
  <section class="cont-banner">
    <div class="banner-box">
      <h2 class="main-heading">ABOUT US</h2>
      <p class="mini-heading">Get in Touch</p>
    </div>
  </section>
  <!-- Banner Section End  -->
  
  <!-- main section  -->
  <section class="main-sec">
    <div class="container">
      <div class="main-box">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="main-cont-box">
              <p class="cursive-heading">Explore the world with us, one adventure at a time.</p>
              <h5 class="main-heading">
                Planning your  <span class="animate-text anima">Vacation</span> Trip but not sure where to start?
              </h5>
              <p class="para">
                Aspire Holidays India Pvt Ltd, offers a wide range of services to its clients, including flight & hotel bookings, car rentals, cruise packages & tour packages, visa & passport assistance, corporate travel, MICE (Meetings Incentives Conferences and Exhibition) services, insurance, and much more.</p>
                <p class="para">Since 2011, Aspire Holidays has provided 3000+ satisfied customers with distinctive holiday tour packages. Experience some of the best travel destinations in the world with us – we have a range of Domestic and International packages to suit every budget.</p>
                <p class="para">Whether you’re looking for a romantic getaway or an adventure to a new destination, Aspire holidays can help you plan the perfect trip. Our agents are passionate about travel and have an extensive knowledge of the industry, so you can be assured that you will be taken care of. </p>
                <b>"Unlock the World with Aspire Holidays!"</b>

              </p>
              <div class="abt-data mb-4">
                <p class="para">International Travel Guides</p>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <p class="para">Domestic Travel Guides</p>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="90"></div>
                </div>
              </div>
              <a href="package.php"><button class="btns">Explore More</button></a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="main-img-box">
              <img class="img-1 img-fluid" src="asset/images/others/Image Grp3.webp" alt="About us" title="About us">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- main section End -->


  <section>
    <div class="about-service">
    <div class="container">
      <div class="about-top-sec">
        <h6 class="cursive-heading">Let us help you plan your next adventure</h6>
      <div class="row">
        <div class="col-md-6">
          <h5 class="main-heading">Perfect <span class="animate-text">Vacation</span> <br>come true</h5>
        </div>
        <div class="col-md-6">
          <p class="para">With a passion for providing exceptional services, we offer a comprehensive range of travel solutions to make your journey memorable and stress-free.</p>
        </div>
      </div>
      <div class="row text-center">
          <div class="col-md-4">
            <div class="service-sec">
            <div class="ser-box">
            <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/passport-icon.webp" alt="Passport" title="Passport"/>
            </a>
            </div>
              <h6 class="mini-heading">Passport</h6>
              <p class="para">
                Empowering Your Dreams to Soar Beyond Borders! Your Passport to Possibilities - Seamlessly delivered with expertise and care. From application to adventure, we've got you covered.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-sec">
            <div class="ser-box">
            <a href="main-service.php">
                <img class="img-fluid" src="asset/images/others/Hotel.webp" alt="Hotel" title="Hotel"/>
            </a></div>
              <h6 class="mini-heading">Hotel</h6>
              <p class="para">
                Your Home Away from Home Awaits! Creating Memories One Stay at a Time - Relax, we'll take care of the rest. Unwind in style and luxury, because you deserve the finest.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-sec">
                <div class="ser-box">
                <a href="main-service.php">
                    <img class="img-fluid" src="asset/images/others/visa-1.webp" alt="Visa" title="Visa"/>
                </a></div>
            <h6 class="mini-heading">Visa</h6>
              <p class="para">
                Unlocking World Wonders, One Visa at a Time - Your Gateway to Global Adventures! Seamlessly navigating visas so you can explore with ease, because borders shouldn't hold you back.
              </p>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <div class="service-sec">
                <div class="ser-box">
                <a href="main-service.php">
              <img class="img-fluid" src="asset/images/others/insurance-icon.webp" alt="Travel Insurance" title="Travel Insurance"/>
              </a></div>
              <h6 class="mini-heading">Travel Insurance</h6>
              <p class="para">
                Embark on worry-free adventures, protected by our Travel Insurance Guardians! Your Safety Net Across the Globe - Explore with confidence.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-sec">
                <div class="ser-box">
            <a href="main-service.php">
              <img class="img-fluid" src="asset/images/others/Ticket .webp" alt="Ticket" title="Ticket"/>
            </a></div>
              <h6 class="mini-heading">Ticket</h6>
              <p class="para">
                Your Passport to Seamless Journeys - Where Every Destination Begins! Elevating Travel, One Ticket at a Time - We pave the way, you enjoy the ride. 
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-sec">
                <div class="ser-box">
                    <a href="main-service.php">
                    <img class="img-fluid" src="asset/images/others/currency-exchange-removebg-preview.webp" alt="Currency Exchange" title="Currency Exchange" />
                    </a>
                </div>
              <h6 class="mini-heading">Currency Exchange</h6>
              <p class="para">
                Travel the world with ease knowing that your currency exchange is taken care of. We're the currency exchange experts.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="about-book">
        <div class="row align-items-center ">
          <div class="col-md-3 col-sm-12 mb-md-0 mb-sm-4 test">
            <div class="ran">
              <img class="" height="300px" src="asset/images/others/bali1.webp" alt="dream vacation" title="dream vacation">
            </div>
          </div>
         <div class=" col-md-9 col-sm-12 book-sec">
          <div class="row p-sm-3 align-items-center">
            <div class="col-md-12 col-lg-8 book-sec">
              <p>Exclusive travel deals</p>
              <p class="sub-heading">Book your dream <span>vacation</span> <br>today!</p>
            </div>
            <div class="col-md-12 col-lg-4">
              <a href="contact.php"><button class="btns">Contact Us</button></a>
            </div>
          </div>
         </div>
        </div>
      </div>

        <div class="about-testimonial">
          <p class="cursive-heading">Happy Customers Shared Their Experience</p>
          <h6 class="main-heading">Stories from <span>Satisfied</span> Customers</h6>
        </div>
        <div class="row">
  
          <div class="col-md-6">
            <div class="abouttesti">
                <img class="img-fluid" src="asset/images/others/customer.webp" alt="Customers" title="Customers">
            </div>
          </div>
          <div class="col-md-6">
            <div class="testimonial-con">
              <div class="owl-carousel about-test-owl owl-theme">
                <div class="item test-owl">
                  <p>Our All India Tour with aspire holidays was an awesome. We enjoyed to the core. Special thanks to Kandipan the Tour Monitor for arranging the facilities  for us and took care of our safety very much.The journey is safe and secure too..Thanks Aspire holidays 
                  </p>
                  <div class="row align-items-center">
                    <div class="col-3">
                      <div class="imgbox">
                        <img class="" src="asset/images/others/girl1.webp" alt="Feedback" title="Feedback">
                      </div>
                    </div>
                    <div class="col-9">
                      <div class="testi-author">
                        <p class="mini-heading">Gladish Sneka E</p>
                        <p class="para">Kerala</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item test-owl">
                  <p>Our trip towards Wayanad was very awesome and we are very happy about Ms.Vinodha from Aspire Holidays , who had taken care of us till our Wayanad journey ends . Car Driver arranged by Aspire Holidays for our trip is very gentle and polite.</p>
                  <div class="row align-items-center">
                    <div class="col-3">
                      <div class="imgbox">
                        <img class="" src="asset/images/others/girl1.webp" alt="Feedback" title="Feedback">
                      </div>
                    </div>
                    <div class="col-9">
                      <div class="testi-author">
                        <p class="mini-heading">Hari Baabu V</p>
                        <p class="para">Banglore</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="testimonial-imgallery">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="abouttesti">
                    <img class="img-fluid" src="asset/images/others/bali2.webp" alt="Satisfied Customers" title="Satisfied Customers">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="testbox">
                    <div class="row">
                      <div class="col-md-6">
                        <img class="img-fluid" src="asset/images/others/bali3.webp" alt="Satisfied Customers" title="Satisfied Customers">
                      </div>
                      <div class="col-md-6">
                        <img class="img-fluid" src="asset/images/others/bali4.webp" alt="Satisfied Customers" title="Satisfied Customers">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <img class="img-fluid" src="asset/images/others/kerala.webp" alt="Satisfied Customers" title="Satisfied Customers">
                      </div>
                      <div class="col-md-6">
                        <img class="img-fluid" src="asset/images/others/customer1.webp" alt="Satisfied Customers" title="Satisfied Customers">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>  

    </div>


    </div>
    <!-- about blogs  -->
  <section class="abt-blog-sec">
    <div class="container">
      <div class="abt-blog-head text-center">
        <p class="cursive-heading">True Roaming Tales</p>
        <p class="main-heading mb-5">
          Latest Useful News
        </p>
      </div>
      <div class="blog-row-1">
        <div class="row">
            <?php foreach($blogs as $b) { 
                $dateCreated1 = new DateTime($blog['date_created']);
                $formattedDate1 = $dateCreated1->format('F j, Y');
                $shortContent = substr($b['content'], 0, 50) . '...';
                ?>
          <div class="col-md-6 mb-3">
            <div class="abt-blog-box">
              <img class="img-fluid" src="uploads/blog/<?php echo $b['img'] ?>" alt="True Roaming Tales" title="True Roaming Tales">
              <div class="cont">
                <a href="blog_details/<?php echo $b['id']; ?>" class="date-btn"><?php echo $formattedDate1 ?></a>
                <p class="mini-heading"><?php echo $b['name'] ?></p>
                <p class="para">
                      <?php echo $shortContent?>
                </p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- About Blogs End  -->

  </section>

    <?php 
 include("common/footer.php");
 ?>