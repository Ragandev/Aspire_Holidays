<?php
require('../config.php');
include('common/header.php');

// Check if ID is present in the URL
if (isset($_GET['id'])) {
    $visaId = $_GET['id'];

    // Fetch visa details based on ID
    $selectQuery = "SELECT * FROM visa WHERE id = :id";
    $stmt = $pdo->prepare($selectQuery);
    $stmt->bindParam(':id', $visaId);
    $stmt->execute();
    $visaDetails = $stmt->fetch(PDO::FETCH_ASSOC);
}

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

        <form action="edit_visa_post.php" method="post">
            <?php if (isset($_GET['id'])): ?>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <?php endif; ?>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Country <span class='text-danger'>*</span></label>
                    <select required name="country" id="country" class="form-control">
                        <option value="" selected disabled>Select Country</option>
                        <?php
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
                            $selected = ($visaDetails['country'] === $country) ? 'selected' : '';
                            echo '<option value="' . $country . '" ' . $selected . '>' . $country . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="">Type <span class='text-danger'>*</span></label>
                    <select required name="type" id="type" class="form-control">
                        <option value="arrival" <?php echo ($visaDetails['visa_type'] === 'arrival') ? 'selected' : ''; ?>>On
                            Arrival</option>
                        <option value="e-visa" <?php echo ($visaDetails['visa_type'] === 'e-visa') ? 'selected' : ''; ?>>
                            E-Visa
                        </option>
                    </select>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col">
                    <label for="">Starting Price <span class='text-danger'>*</span></label>
                    <input type="text" name="startingPrice" class="form-control" placeholder="Starting Price" required
                        value="<?php echo $visaDetails['starting_price']; ?>">
                </div>
                <div class="col">
                    <label for="">Status <span class='text-danger'>*</span></label>
                    <select required name="status" id="status" class="form-control">
                        <option <?php if ($visaDetails['status'] == "1") {
                            echo "selected";
                        } ?> value="1">Active</option>
                        <option <?php if ($visaDetails['status'] == "0") {
                            echo "selected";
                        } ?> value="0">Inactive
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Documents <span class='text-danger'>*</span></label>
                    <textarea required class="form-control" name="document" id="document"
                        rows="10"><?php echo $visaDetails['documents']; ?></textarea>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Embassy <span class='text-danger'>*</span></label>
                    <textarea required class="form-control" name="embassy" id="embassy"
                        rows="10"><?php echo $visaDetails['embassy']; ?></textarea>
                </div>
            </div>

            <input type='submit' value='<?php echo isset($_GET['id']) ? 'Update' : 'Create'; ?>'
                class="btn btn-primary">
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