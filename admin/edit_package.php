<?php
require('../config.php');
include('common/header.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $selectQuery = "SELECT * FROM package WHERE id = :id";
    $stmt = $pdo->prepare($selectQuery);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $catQuery = "SELECT * FROM category";
    $stmts = $pdo->prepare($catQuery);
    $stmts->execute();
    $cat = $stmts->fetchAll(PDO::FETCH_ASSOC);
    
    $scatsql = "SELECT * FROM sub";
    $stmt = $pdo->query($scatsql);
    $dataa = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $dayQuery = "SELECT * FROM days WHERE pkgid='" . $blog['id'] . "'";
    $stmtss = $pdo->prepare($dayQuery);
    $stmtss->execute();
    $day = $stmtss->fetchAll(PDO::FETCH_ASSOC);

    
    
    if (!$blog) {
        header("Location: package.php?err=" . urlencode('Package not found.'));
        exit();
    }
} else {
    
    header("Location: package.php?err=" . urlencode('Invalid request.'));
    exit();
}
?>
<style>
    .blod-add{
        margin-top:50px;
    }
    label{
        font-weight: bold;
        margin-bottom:10px;
    }
</style>
<div class="container">
    <div class="blod-add">
        
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
    
        <form action="edit_package_post.php" method="post" enctype="multipart/form-data">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Title <span class='text-danger'>*</span> </label>
                    <input type="text" name="title" class="form-control" placeholder="title" value="<?php echo $blog['name'] ?>" required>
                </div>
                <div class="col">
                    <label for="">Amount <span class='text-danger'>*</span></label>
                    <input type="text"  name="amount" class="form-control" placeholder="amount" value="<?php echo $blog['amount']; ?>" required>
                </div>
            </div>
            
            <div class="row mb-4">
               <div class="col">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option <?php if($blog['status'] === 1 ){ echo "selected";} ?> value="1">Active</option>
                        <option <?php if($blog['status'] === 2 ){ echo "selected";} ?> value="2">Inactive</option>
                    </select>
                </div>
                </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Category <span class='text-danger'>*</span></label>
                    <select name="category" id="" class="form-control" required>
                        <?php
                        foreach($cat as $d){
                            $selected = ($d['id'] === $blog['categoryid']) ? 'selected' : '';
                            echo '<option ' . $selected . ' value="' . $d['id'] . '">' . $d['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="">Sub Category <span class='text-danger'>*</span></label>
                    <select name="sub" id="" class="form-control" required>
                        <?php foreach ($dataa as $roww) { ?>
                                <option <?php if($roww['id'] === $blog['subid']){echo 'selected';} ?> value="<?php echo $roww['id'] ?>"><?php echo $roww['name'] ?></option>
                          <?php  } ?>
                         
                    </select>
                </div>
                
                <div class="col">
                    <label for="">Country <span class='text-danger'>*</span></label>
                    <select name="country" id="country" class="form-control" required>
                        <option value="">country</option>
                <?php
                $selectedCountry = $blog['country']; // Get the selected country from the URL
                
                // Define an array of countries
                $countries = array(
                  'Thailand',
                  'Malaysia',
                  'Singapore',
                  'Malaysia',
                  'Singapore',  
                  'Bali',
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
                  'Vietnam',
                  'Cambodia',
                  'Sri Lanka',
                  'Azerbaijan',
                  'Maldives',
                  'Myanmar',
                  'Bhutan',
                  'Indonesia',
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

                // Loop through the countries and create an option for each
                foreach ($countries as $country) {
                  $selected = ($selectedCountry === $country) ? 'selected' : ''; // Check if this is the selected country
                  echo '<option ' . $selected . ' value="' . $country . '">' . $country . '</option>';
                }
                ?>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Meta Description</label>
                    <textarea name="mdes" id="" class="form-control" rows="3" ><?php echo $blog['mdes']; ?></textarea>
                </div>
                <div class="col">
                    <label for="">Meta Keywords</label>
                    <textarea name="mkey" id="" class="form-control" rows="3"><?php echo $blog['mkey']; ?></textarea>
                </div>
              </div>
             
            <div class="row mb-4">
                <div class="col-4">
                    <img src="../uploads/<?php echo $blog['img1']; ?>" height='300px' width='98%'> </br><br>
                    <label for="">Image 1 <span class='text-danger'>*</span> </label>
                    <input type="file" name="img1" class="form-control" >
                </div>
                <div class="col-4">
                    <img src="../uploads/<?php echo $blog['img2']; ?>" height='300px' width='98%'> </br><br>
                    <label for="">Image 2 <span class='text-danger'>*</span></label>
                    <input type="file" name="img2" class="form-control" >
                </div>
                <div class="col-4">
                    <img src="../uploads/<?php echo $blog['img3']; ?>" height='300px' width='98%'> </br><br>
                    <label for="">Image 3 <span class='text-danger'>*</span></label>
                    <input type="file" name="img3" class="form-control" >
                </div>
              </div>
              
              <div class="row mb-4">
                    <label for="">Inclusion</label><br>
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="visa" <?php if ($blog['visa'] === 1) { echo 'checked'; } ?>> &nbsp;
                        <label for="">Visa</label> <br>
                        <input class="form-control" type="text" name="visa_title" placeholder="Visa Title" value="<?php echo $blog['visa_title']; ?>">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="passport" <?php if ($blog['visa'] === 1) { echo 'checked'; } ?>> &nbsp;
                        <label for="">Passport</label> <br>
                        <input class="form-control" type="text" name="passport_title" placeholder="Passport Title" value="<?php echo $blog['passport_title']; ?>">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="ticket" <?php if ($blog['visa'] === 1) { echo 'checked'; } ?>> &nbsp;
                        <label for="">Ticket</label> <br>
                        <input class="form-control" type="text" name="ticket_title" placeholder="Ticket Title" value="<?php echo $blog['ticket_title']; ?>">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="hotel" <?php if ($blog['visa'] === 1) { echo 'checked'; } ?>> &nbsp;
                        <label for="">Hotel</label> <br>
                        <input class="form-control" type="text" name="hotel_title" placeholder="Hotel Title" value="<?php echo $blog['hotel_title']; ?>">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="transport" <?php if ($blog['visa'] === 1) { echo 'checked'; } ?>> &nbsp;
                        <label for="">Transport</label> <br>
                        <input class="form-control" type="text" name="transport_title" placeholder="Transport Title" value="<?php echo $blog['transport_title']; ?>" >
                    </div>
                    
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="priority">Priority</label>
                        <select name="priority" id="priority" class="form-control">
                            <option <?php if ($blog['priority'] === 0) { echo 'Selected'; } ?> value="0">None</option>
                            <option <?php if ($blog['priority'] === 1) { echo 'Selected'; } ?> value="1">1</option>
                            <option <?php if ($blog['priority'] === 2) { echo 'Selected'; } ?> value="2">2</option>
                            <option <?php if ($blog['priority'] === 3) { echo 'Selected'; } ?> value="3">3</option>
                            <option <?php if ($blog['priority'] === 4) { echo 'Selected'; } ?> value="4">4</option>
                            <option <?php if ($blog['priority'] === 5) { echo 'Selected'; } ?> value="5">5</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="">Quote </label>
                        <input type="text" class="form-control" name="quote" value="<?php echo $blog['quote']; ?>">
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="">Highlights <span class='text-danger'>*</span></label>
                        <textarea class="form-control" name="highlights" id="" rows="5" required><?php echo $blog['highlights']; ?></textarea>
                    </div>
                </div>
              
              
                <div class="row mb-4">
                <div class="col">
                    <label for="">Content <span class='text-danger'>*</span></label>
              <textarea class="form-control" name="content" id="" rows="10" required>
                  <?php echo $blog['content']; ?>
              </textarea>
                    
                </div>
              </div>
              
              
              
              <div class="day-box">
                  <?php
                        $dayCo = 1 ;
                        foreach($day as $row){
                            echo "<div><label>Day ".$dayCo."</label> <div class='col'>
                    <input type='text' class='form-control mb-2' name='day_title[]' value='".$row['title']."'placeholder='Title' required>
                </div> <textarea class='form-control mb-2' row='10' name='days[]'>".$row['content']."</textarea></div>";
                            $dayCo ++;
                        }
                        ?>
              </div>
             <div>
                 <a class="btn add-btn btn-success">+</a>
             </div><br><br><br>
              <input type="hidden" name="post_id" value="<?php echo $id ?>">
              
              <input type='submit' value='Update' class="btn btn-primary">

        </form>
    </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addInputButton = document.querySelector('.add-btn');
            const inputContainer = document.querySelector('.day-box');
        
            let inputCount = inputContainer.children.length;
        
            CKEDITOR.replace('content');
            CKEDITOR.replace('highlights');
           
            
            Array.from(document.querySelectorAll('textarea[name="days[]"]')).forEach(function(textarea) {
                CKEDITOR.replace(textarea);
            });
    
            addInputButton.addEventListener('click', function() {
                let inputEle = `
                    <label for="">Day ${inputCount + 1}</label>
                    <input required class="form-control mb-2" name="day_title[]" placeholder="Title">
                    <textarea class="form-control mb-2" name="days[]" rows="10" placeholder="Content"></textarea>
                `;
        
                const newInput = document.createElement('div');
                newInput.innerHTML = inputEle;
                inputContainer.appendChild(newInput);
                inputCount++;
        
                // Initialize CKEditor for the newly added textarea
                CKEDITOR.replace(newInput.querySelector("textarea"));
            });
        });

    </script>
    
    <?php
    include('common/footer.php');
?>

