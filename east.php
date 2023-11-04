<?php
require('config.php');
include('common/header.php');

// <!-- Get Packages  -->
$countrySql = "SELECT DISTINCT country FROM `package` WHERE country IN('Turkey',
'Israel',
'jordan',
'Oman',
'Egypt',
'Qatar',
'Saudi',
'United Arab Emirates'

)";
$cStmt = $pdo->prepare($countrySql);
$cStmt->execute();
$country = $cStmt->fetchAll(PDO::FETCH_ASSOC);
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
        transition: all 300ms;
    }

    .cnt-card:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
    }

    .cnt-card:hover .card-name p {
        color: var(--main);
    }

    .card-name p {
        transition: all 300ms;
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

    .cnt-sec {
        background: url("asset/images/bg/world1.webp");
        background-size: cover;
    }

    .country-img {
        height: 100%;
        position: absolute;
        object-fit: cover;
        object-position: -200px 0;
    }
</style>
<!-- Banner Section  -->
<section class="cont-banner mb-5">
    <div class="banner-box">
        <h2 class="main-heading">MIDDLE EAST</h2>
        <p class="mini-heading">Explore Now</p>
    </div>
</section>
<!-- Banner Section End  -->

<!-- Cards  -->
<div class="cnt-sec">
    <div class="container">
        <div class="row">

            <?php
            if (count($country) == 0) {
                echo '<h3 class="text-center text-warning">No packages found</h3>';
            }
            foreach ($country as $row): ?>
                <div class="col-md-6 col-lg-3 p-3">
                    <a href="package.php?country=<?php echo $row['country'] ?>">
                        <div class="cnt-card as">
                            <img class="country-img" src="asset/images/country/<?php echo $row['country'] ?>.webp">
                            <div class="card-name">
                                <p class="mini-heading">
                                    <?php echo $row['country'] ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
include("common/footer.php");
?>