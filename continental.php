<?php
require('config.php');
include('common/header.php');
?>

<!-- Styles  -->
<style>
    .banner-cont {
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.3);
    }

    .banner-cont img {
        width: 100%;
    }

    .cnt-para {
        font-weight: 300 !important;
    }

    .cnt-card {
        height: 450px;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        background-size: auto 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    .as {
        background-image: url("asset/images/country/asia.webp");
    }

    .pr {
        background-image: url("asset/images/country/pacific.webp");
    }

    .me {
        background-image: url("asset/images/country/east.webp");
    }

    .af {
        background-image: url("asset/images/country/africa.webp");
    }

    .am {
        background-image: url("asset/images/country/america.webp");
    }

    .eu {
        background-image: url("asset/images/country/europe.webp");
    }

    .card-name {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: end;
        color: #fff;
        filter: drop-shadow(5px 5px 5px black);
    }

    .card-name p {
        transition: all 100ms;
    }

    .cnt-card-cont {
        position: absolute;
        height: 100%;
        display: flex;
        align-items: center;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
        border-radius: 10px;
        top: 450px;
        transition: all 500ms;
    }

    .cnt-card:hover .cnt-card-cont {
        top: 0;
    }

    .cnt-card:hover .card-name p {
        visibility: hidden;
    }

    .cnt-sec {
        background: url("asset/images/bg/world1.webp");
        background-size: cover;
    }

    .cnt-sec .row .col-md-4{
        padding: 50px;
    }

    @media (width <=1400px) {
        .cnt-sec .row .col-md-4{
            padding: 20px;
        }
    }
</style>

<!-- Banner  -->
<!-- Banner Section  -->
<section class="cont-banner mb-5">
    <div class="banner-box">
        <h2 class="main-heading">INTERNATIONAL</h2>
        <p class="mini-heading">Explore Now</p>
    </div>
</section>
<!-- Banner Section End  -->



<!-- Cards  -->
<div class="cnt-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-3">
                <a href="asia.php">
                    <div class="cnt-card as">
                        <div class="card-name">
                            <p class="mini-heading">ASIA</p>
                        </div>
                        <div class="cnt-card-cont text-center">
                            <div>
                                <p class="sub-heading text-light">ASIA</p>
                                <p class="text-light cnt-para">Asia's beauty is as diverse as its landscapes, from the
                                    serene
                                    elegance of
                                    cherry blossoms in Japan to the vibrant colors of India's festivals.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <a href="pacific.php">
                    <div class="cnt-card pr">
                        <div class="card-name">
                            <p class="mini-heading">PACIFIC REGION</p>
                        </div>
                        <div class="cnt-card-cont text-center">
                            <div>
                                <p class="sub-heading text-light">PACIFIC REGION</p>
                                <p class="text-light cnt-para">The Pacific region's beauty is as diverse as its
                                    landscapes, from
                                    idyllic South Pacific beaches to New Zealand's rugged grandeur.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <a href="east.php">
                    <div class="cnt-card me">
                        <div class="card-name">
                            <p class="mini-heading">MIDDLE EAST</p>
                        </div>
                        <div class="cnt-card-cont text-center">
                            <div>
                                <p class="sub-heading text-light">MIDDLE EAST</p>
                                <p class="text-light cnt-para">The Middle East showcases a rich tapestry of beauty, from
                                    the
                                    ancient
                                    wonders of Petra to the modern skyline of Dubai.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <a href="africa.php">
                    <div class="cnt-card af">
                        <div class="card-name">
                            <p class="mini-heading">AFRICA</p>
                        </div>
                        <div class="cnt-card-cont text-center">
                            <div>
                                <p class="sub-heading text-light">AFRICA</p>
                                <p class="text-light cnt-para">Africa's beauty is a mosaic of stunning diversity, from
                                    the iconic
                                    savannahs of the Serengeti to the vibrant cultures of Marrakech.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <a href="america.php">
                    <div class="cnt-card am">
                        <div class="card-name">
                            <p class="mini-heading">AMERICA</p>
                        </div>
                        <div class="cnt-card-cont text-center">
                            <div>
                                <p class="sub-heading text-light">AMERICA</p>
                                <p class="text-light cnt-para">America's beauty is a vast tapestry, from the towering
                                    majesty of
                                    the
                                    Rockies to the bustling streets of New York City.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <a href="europe.php">
                    <div class="cnt-card eu">
                        <div class="card-name">
                            <p class="mini-heading">EUROPE</p>
                        </div>
                        <div class="cnt-card-cont text-center">
                            <div>
                                <p class="sub-heading text-light">EUROPE</p>
                                <p class="text-light cnt-para">Europe's beauty unfolds across its historic cities like
                                    Paris and
                                    the
                                    breathtaking landscapes of the Swiss Alps.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
include("common/footer.php");
?>