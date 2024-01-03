<?php
require('../config.php');
include('common/header.php');

    $csql = "SELECT id, country FROM visa";
    $stmt = $pdo->query($csql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $oldsql = "SELECT * FROM visa_package WHERE id = ".$_GET['id'];
    $oldstmt = $pdo->query($oldsql);
    $olddata = $oldstmt->fetch(PDO::FETCH_ASSOC);
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

        <form action="edit_visa_package_post.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Name <span class='text-danger'>*</span></label>
                    <input type="text" name="name" value="<?php echo $olddata['name'] ?>" class="form-control" placeholder="Name" required>
                </div>
                <div class="col">
                    <label for="">Country <span class='text-danger'>*</span></label>
                    <select required name="country" id="country" class="form-control">
                        <option value="" selected >Country</option>
                        <?php
                       
                        foreach ($data as $country) {
                            $selectedCountry = $olddata['country'];
                            $selected = ($selectedCountry === $country['id']) ? 'selected' : ''; 
                            echo '<option '.$selected.' value="'.$country['id'].'">'.$country['country'].'</option>';
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
                        <option <?php if($olddata['type'] == "tourist"){echo "selected";} ?> value="tourist">Tourist Visa</option>
                        <option <?php if($olddata['type'] == "business"){echo "selected";} ?> value="business">Business Visa</option>
                        <option <?php if($olddata['type'] == "student"){echo "selected";} ?> value="student">Student Visa</option>
                        <option <?php if($olddata['type'] == "work"){echo "selected";} ?> value="work">Work Visa</option>
                        <option <?php if($olddata['type'] == "residence"){echo "selected";} ?> value="residence">Residence Visa</option>
                        <option <?php if($olddata['type'] == "family"){echo "selected";} ?> value="family">Family Reunification Visa</option>
                        <option <?php if($olddata['type'] == "transit"){echo "selected";} ?> value="transit">Transit Visa</option>
                        <option <?php if($olddata['type'] == "diplomatic"){echo "selected";} ?> value="diplomatic">Diplomatic and Official Visas</option>
                        <option <?php if($olddata['type'] == "refugee"){echo "selected";} ?> value="refugee">Refugee Visa/Asylum Seeker Visa</option>
                        <option <?php if($olddata['type'] == "medical"){echo "selected";} ?> value="medical">Medical Visa</option>
                        <option <?php if($olddata['type'] == "cultural"){echo "selected";} ?> value="cultural">Cultural Exchange Visa</option>
                        <option <?php if($olddata['type'] == "retirement"){echo "selected";} ?> value="retirement">Retirement Visa</option>
                    </select>
                </div>
                <div class="col">
                    <label for="">Process Time <span class='text-danger'>*</span></label>
                    <input type="text" value="<?php echo $olddata['process_time'] ?>" name="processtime" class="form-control" placeholder="Processing Time" required>
                </div>
                
            </div>

            <div class="row mb-4">
            <div class="col">
                    <label for="">Stay Period <span class='text-danger'>*</span></label>
                    <input type="text" name="stayperiod" value="<?php echo $olddata['stay_period'] ?>" class="form-control" placeholder="Stay Period" required>
                </div>
                <div class="col">
                    <label for="">Validity <span class='text-danger'>*</span></label>
                    <input type="text" name="validity" value="<?php echo $olddata['validity'] ?>" class="form-control" placeholder="Validity" required>
                </div>
            </div>

            <div class="row mb-4">
            <div class="col">
                    <label for="">Entry <span class='text-danger'>*</span></label>
                    <select required name="entry" id="type" class="form-control">
                        <option <?php if($olddata['entry'] == "single"){echo "selected";} ?> value="single">Single</option>
                        <option <?php if($olddata['entry'] == "multiple"){echo "selected";} ?> value="multiple">Multiple</option>
                    </select>
                </div>
                <div class="col">
                    <label for="">Fees <span class='text-danger'>*</span></label>
                    <input type="text" value="<?php echo $olddata['fees'] ?>" name="fees" class="form-control" placeholder="Validity" required>
                </div>
                <div class="col">
                        <label for="">Status <span class='text-danger'>*</span></label>
                        <select required name="status" id="status" class="form-control">
                            <option <?php if ($olddata['status'] == "1") {
                                echo "selected";
                            } ?> value="1">Active</option>
                            <option <?php if ($olddata['status'] == "0") {
                                echo "selected";
                            } ?> value="0">Inactive
                            </option>
                        </select>
                    </div>
            </div>
            

            <input type='submit' value='Update' class="btn btn-primary">
        </form>
    </div>
</div>


<?php
include('common/footer.php');
?>
