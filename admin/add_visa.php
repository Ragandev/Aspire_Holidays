<?php
require('../config.php');
include('common/header.php');
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

        <form action="add_visa_post.php" method="post">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Country <span class='text-danger'>*</span></label>
                    <select required name="country" id="country" class="form-control">
                        <option value="" selected>Country</option>
                        <?php
                        // $selectedCountry = $_GET['country']; // Get the selected country from the URL
                        
                        // Define an array of countries
                        $countries = array(
                            'Thailand',
                            'Malaysia',
                            'Singapore',
                            'Philippines',
                            'China',
                            'Hong Kong',
                            'Japan',
                            'Taiwan',
                            'Kazakhstan',
                            'South Korea',
                            'Uzbekistan',
                            'Vietnam',
                            'Cambodia',
                            'Sri Lanka',
                            'Azerbaijan',
                            'Indonesia',
                            'India',
                            'Maldives',
                            'Myanmar',
                            'Bhutan',
                            'Nepal',
                            'Georgia',
                            'Armenia',
                            'Mongolia',
                            'Australia',
                            'New Zealand',
                            'Fiji',
                            'Turkey',
                            'Israel',
                            'Jordan',
                            'Oman',
                            'Egypt',
                            'Qatar',
                            'Saudi',
                            'United Arab Emirates',
                            'Kenya',
                            'Morocco',
                            'Mauritius',
                            'Seychelles',
                            'Zimbabwe',
                            'Madagascar',
                            'Tanzania',
                            'South Africa',
                            'Alaska',
                            'Canada',
                            'USA',
                            'South America',
                            'Austria',
                            'Belgium',
                            'Bulgaria',
                            'Croatia',
                            'Czech',
                            'Denmark',
                            'Finland',
                            'France',
                            'Germany',
                            'Greece',
                            'Greenland',
                            'Hungary',
                            'Iceland',
                            'Ireland',
                            'Italy',
                            'Netherlands',
                            'Norway',
                            'Portugal',
                            'Romania',
                            'Sweden',
                            'UK',
                            'Spain',
                            'Switzerland'
                        );
                        sort($countries);

                        foreach ($countries as $country) {
                            // $selected = ($selectedCountry === $country) ? 'selected' : ''; // Check if this is the selected country
                            echo '<option value="' . $country . '">' . $country . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="">Type <span class='text-danger'>*</span></label>
                    <select required name="type" id="type" class="form-control">
                        <option value="arrival">On Arrival</option>
                        <option value="e-visa">E-Visa</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Starting Price <span class='text-danger'>*</span></label>
                    <input type="text" name="startingPrice" class="form-control" placeholder="Starting Price" required>
                </div>
                <div class="col">
                    <label for="">Status <span class='text-danger'>*</span></label>
                    <select required name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Documents <span class='text-danger'>*</span></label>
                    <textarea required class="form-control" name="document" id="" rows="10"></textarea>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Embassy <span class='text-danger'>*</span></label>
                    <textarea required class="form-control" name="embassy" id="" rows="10"></textarea>
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