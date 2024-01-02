<?php
require('../config.php');
include('common/header.php');

    $csql = "SELECT id, country FROM visa";
    $stmt = $pdo->query($csql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($data);
    // exit();

?>

<style>
    .blod-add {
        margin-top: 50px;
    }

    label {
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>
<div class="container">
    <div class="blod-add">
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

        <form action="add_visa_package_post.php" method="post">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Name <span class='text-danger'>*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col">
                    <label for="">Country <span class='text-danger'>*</span></label>
                    <select required name="country" id="country" class="form-control">
                        <option value="" selected >Country</option>
                        <?php
                        // $selectedCountry = $_GET['country']; // Get the selected country from the URL
                        
                        // Define an array of countries
                       
                        foreach ($data as $country) {
                            // $selected = ($selectedCountry === $country) ? 'selected' : ''; // Check if this is the selected country
                            echo '<option value="'.$country['id'].'">'.$country['country'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
            <div class="col">
                    <label for="">Type <span class='text-danger'>*</span></label>
                    <select required name="type" id="type" class="form-control">
                        <option value="select">Please Select</option>
                        <option value="tourist">Tourist Visa</option>
                        <option value="business">Business Visa</option>
                        <option value="student">Student Visa</option>
                        <option value="work">Work Visa</option>
                        <option value="residence">Residence Visa</option>
                        <option value="family">Family Reunification Visa</option>
                        <option value="transit">Transit Visa</option>
                        <option value="diplomatic">Diplomatic and Official Visas</option>
                        <option value="refugee">Refugee Visa/Asylum Seeker Visa</option>
                        <option value="medical">Medical Visa</option>
                        <option value="cultural">Cultural Exchange Visa</option>
                        <option value="retirement">Retirement Visa</option>
                    </select>
                </div>
                <div class="col">
                    <label for="">Process Time <span class='text-danger'>*</span></label>
                    <input type="text" name="processtime" class="form-control" placeholder="Processing Time" required>
                </div>
                
            </div>

            <div class="row mb-4">
            <div class="col">
                    <label for="">Stay Period <span class='text-danger'>*</span></label>
                    <input type="text" name="stayperiod" class="form-control" placeholder="Stay Period" required>
                </div>
                <div class="col">
                    <label for="">Validity <span class='text-danger'>*</span></label>
                    <input type="text" name="validity" class="form-control" placeholder="Validity" required>
                </div>
            </div>

            <div class="row mb-4">
            <div class="col">
                    <label for="">Entry <span class='text-danger'>*</span></label>
                    <select required name="entry" id="type" class="form-control">
                        <option value="single">Single</option>
                        <option value="multiple">Multiple</option>
                    </select>
                </div>
                <div class="col">
                    <label for="">Fees <span class='text-danger'>*</span></label>
                    <input type="text" name="fees" class="form-control" placeholder="Validity" required>
                </div>
                
            </div>
            

            <input type='submit' value='Create' class="btn btn-primary">
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        CKEDITOR.replace('document');
        CKEDITOR.replace('embassy');
    });
</script>

<?php
include('common/footer.php');
?>