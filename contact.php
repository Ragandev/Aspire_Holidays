<?php 
 include("common/header.php");
?>

<style>
    .cont-btn{
        width:60%;
        margin:0 auto;
    }
    .con-map{
       padding:100px 10px; 
    }
    @media(max-width:576px){
       .con-map{
       padding:10px 20px; 
    } 
    }
</style>

    <!-- Banner Section  -->
    <section class="cont-banner">
      <div class="banner-box">
        <h2 class="main-heading">CONTACT US</h2>
        <p class="mini-heading">Get in Touch</p>
      </div>
    </section>
    <!-- Banner Section End  -->
<?php if (!empty($_GET['succ'])): ?>
					  
	<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['succ']?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>
    <?php if (!empty($_GET['err'])): ?>
	    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['err']?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <!-- Contact Section -->
    <section class="cont-sec">
      <div class="cont-sec-inn container">
        <div class="row">
          <div class="col-md-4">
            <div class="add-box">
              <div class="cont-head">
                <div class="circle">
                  <span class="fa-solid fa-xl fa-location-arrow"></span>
                </div>
                <p class="mini-heading">REACH US</p>
              </div>
              <div class="add-1">
                <p class="mini-heading">COIMBATORE</p>
                <address>
                  Second Floor, 
                    Nagammai Building,<br/> Dr Nanjappa Road, Near Park Gate Roundana,<br/> Park Gate, Ram Nagar, Coimbatore,<br/> Tamil Nadu 641018
                </address>
              </div>
              <div class="add-2">
                <p class="mini-heading">CHENNAI</p>
                <address>
                  Prince Centre, Ground Floor, New No: 248, <br />
                  Pathari Road, Anna Salai, <br />
                  Chennai, TamilNadu 600006 <br />
                </address>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="cont-head">
              <div class="circle">
                <span class="fa-solid fa-xl fa-phone"></span>
              </div>
              <p class="mini-heading">CALL US</p>
            </div> 
            <div class="call-1">
              <p class="mini-heading">Mobile Number</p>
              <a href="tel:9362266666">9362266666</a><br />
              <a href="tel:9514433334">9514433334</a>
            </div>
            <div class="call-2">
              <p class="mini-heading">Office Number</p>
              <a href="tel:9362266666">9362266666</a><br />
              <a href="tel:9514433334">9514433334</a><br>
              <a href="tel:9751166660">9751166660</a>
            </div>
          </div>
          <div class="col-md-4 call-box">
            <div class="cont-head">
              <div class="circle">
                <span class="fa-solid fa-xl fa-envelope"></span>
              </div>
              <p class="mini-heading">MAIL US</p>
            </div>
            <div class="mail">
              <p class="mini-heading">MAIL</p>

              <p>
                Write to this email for a detailed quotation
                <a href="mailto:info@aspireholidays.in">info@aspireholidays.in</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact section end -->

    <!-- Form  -->
    <section class="form-section">
      <div class="container">
        <div class="form-head">
          <p class="cursive-heading">Plan Your Next Trip</p>
          <p class="sub-heading">Get in Touch</p>
          <p class="para">
            Write to us for personalized travel advice or for information on
            group travel and last minute travel, all travel is insured and safe.
          </p>
        </div>
        <div class="form-box" id="cont">
          <form action="contact_mail.php" method="post">
            <input name="name" type="text" placeholder="Type your Name" />
            <input name="email" type="email" placeholder="Insert your Email" />
            <textarea name="message" rows="5" placeholder="Your Message"></textarea>
            <div class="d-grid gap-2">
                <button class="btns cont-btn">Send</button>
                <br>
                
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Form end  -->
    
    <div class="map">
        <div class="row">
            <div class="col-md-6 con-map">
                <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15665.848209423842!2d76.9701606!3d11.003918!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859a90f7ec813%3A0xd3f7dc884b9f440!2sAspire%20Holidays!5e0!3m2!1sen!2sin!4v1688041940087!5m2!1sen!2sin"
          width="100%"
          height="600px"
          style="border: 0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
            </div>
            <div class="col-md-6 con-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.6422978386267!2d80.2521120813967!3d13.058425880152704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52663fd39490e9%3A0x92efb528704eb483!2sPrince%20Centre%2C%20Anna%20Salai%2C%20Thousand%20Lights%20East%2C%20Thousand%20Lights%2C%20Chennai%2C%20Tamil%20Nadu%20600006!5e0!3m2!1sen!2sin!4v1693574506818!5m2!1sen!2sin" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        
    </div>

    <?php 
 include("common/footer.php");
 ?>