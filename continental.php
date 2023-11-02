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
    .cnt-card{
        height: 450px;
        background-image: url("asset/images/others/himachal.webp");
        border-radius: 10px;
        position: relative;
        overflow: hidden;
    }
    .cnt-card-cont{
        position: absolute;
        height: 100%;
        display: flex;
        align-items: center;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
        border-radius: 10px;
        top: 450px;
        transition: all 500ms;
    }
    .cnt-card:hover .cnt-card-cont{
        top: 0;
    }
</style>

<!-- Banner  -->
<div class="banner-cont">
    <img src="asset/images/continent-banner.png" alt="continent banner">
</div>

<!-- Continent Head  -->
<div class="cnt-head text-center py-5">
    <p class="main-heading">CONTINENTS</p>
    <p class="text-muted">Choose a Continent</p>
</div>

<!-- Cards  -->
<div class="cnt-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-5">
                <div class="cnt-card">
                    <div class="cnt-card-cont text-center">
                        <div>
                        <p class="sub-heading text-light">ASIA</p>
                        <p class="text-light">Asia's beauty is as diverse as its landscapes, from the serene elegance of
                            cherry blossoms in Japan to the vibrant colors of India's festivals.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div class="cnt-card">
                    <div class="cnt-card-cont text-center">
                    <div>
                        <p class="sub-heading text-light">ASIA</p>
                        <p class="text-light">Asia's beauty is as diverse as its landscapes, from the serene elegance of
                            cherry blossoms in Japan to the vibrant colors of India's festivals.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div class="cnt-card">
                    <div class="cnt-card-cont text-center">
                    <div>
                        <p class="sub-heading text-light">ASIA</p>
                        <p class="text-light">Asia's beauty is as diverse as its landscapes, from the serene elegance of
                            cherry blossoms in Japan to the vibrant colors of India's festivals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("common/footer.php");
?>