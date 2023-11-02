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
                        <option value="Australia" <?php if ($blog['country'] === 'Australia') { echo 'selected'; } ?>>Australia</option>
                        <option value="Austria" <?php if ($blog['country'] === 'Austria') { echo 'selected'; } ?>>Austria</option>
                        <option value="Bangladesh" <?php if ($blog['country'] === 'Bangladesh') { echo 'selected'; } ?>>Bangladesh</option>
                        <option value="Belgium" <?php if ($blog['country'] === 'Belgium') { echo 'selected'; } ?>>Belgium</option>
                        <option value="Brazil" <?php if ($blog['country'] === 'Brazil') { echo 'selected'; } ?>>Brazil</option>
                        <option value="Canada" <?php if ($blog['country'] === 'Canada') { echo 'selected'; } ?>>Canada</option>
                        <option value="China" <?php if ($blog['country'] === 'China') { echo 'selected'; } ?>>China</option>
                        <option value="Denmark" <?php if ($blog['country'] === 'Denmark') { echo 'selected'; } ?>>Denmark</option>
                        <option value="Egypt" <?php if ($blog['country'] === 'Egypt') { echo 'selected'; } ?>>Egypt</option>
                        <option value="France" <?php if ($blog['country'] === 'France') { echo 'selected'; } ?>>France</option>
                        <option value="Germany" <?php if ($blog['country'] === 'Germany') { echo 'selected'; } ?>>Germany</option>
                        <option value="India" <?php if ($blog['country'] === 'India') { echo 'selected'; } ?>>India</option>
                        <option value="Indonesia" <?php if ($blog['country'] === 'Indonesia') { echo 'selected'; } ?>>Indonesia</option>
                        <option value="Italy" <?php if ($blog['country'] === 'Italy') { echo 'selected'; } ?>>Italy</option>
                        <option value="Japan" <?php if ($blog['country'] === 'Japan') { echo 'selected'; } ?>>Japan</option>
                        <option value="Malaysia" <?php if ($blog['country'] === 'Malaysia') { echo 'selected'; } ?>>Malaysia</option>
                        <option value="Maldives" <?php if ($blog['country'] === 'Maldives') { echo 'selected'; } ?>>Maldives</option>
                        <option value="Mexico" <?php if ($blog['country'] === 'Mexico') { echo 'selected'; } ?>>Mexico</option>
                        <option value="Nepal" <?php if ($blog['country'] === 'Nepal') { echo 'selected'; } ?>>Nepal</option>
                        <option value="New Zealand" <?php if ($blog['country'] === 'New Zealand') { echo 'selected'; } ?>>New Zealand</option>
                        <option value="Nicaragua" <?php if ($blog['country'] === 'Nicaragua') { echo 'selected'; } ?>>Nicaragua</option>
                        <option value="Pakistan" <?php if ($blog['country'] === 'Pakistan') { echo 'selected'; } ?>>Pakistan</option>
                        <option value="Panama" <?php if ($blog['country'] === 'Panama') { echo 'selected'; } ?>>Panama</option>
                        <option value="Philippines" <?php if ($blog['country'] === 'Philippines') { echo 'selected'; } ?>>Philippines</option>
                        <option value="Poland" <?php if ($blog['country'] === 'Poland') { echo 'selected'; } ?>>Poland</option>
                        <option value="Portugal" <?php if ($blog['country'] === 'Portugal') { echo 'selected'; } ?>>Portugal</option>
                        <option value="Qatar" <?php if ($blog['country'] === 'Qatar') { echo 'selected'; } ?>>Qatar</option>
                        <option value="Russian Federation" <?php if ($blog['country'] === 'Russian Federation') { echo 'selected'; } ?>>Russia</option>
                        <option value="Saudi Arabia" <?php if ($blog['country'] === 'Saudi Arabia') { echo 'selected'; } ?>>Saudi Arabia</option>
                        <option value="Singapore" <?php if ($blog['country'] === 'Singapore') { echo 'selected'; } ?>>Singapore</option>
                        <option value="South Africa" <?php if ($blog['country'] === 'South Africa') { echo 'selected'; } ?>>South Africa</option>
                        <option value="Spain" <?php if ($blog['country'] === 'Spain') { echo 'selected'; } ?>>Spain</option>
                        <option value="Sri Lanka" <?php if ($blog['country'] === 'Sri Lanka') { echo 'selected'; } ?>>Sri Lanka</option>
                        <option value="Sweden" <?php if ($blog['country'] === 'Sweden') { echo 'selected'; } ?>>Sweden</option>
                        <option value="Switzerland" <?php if ($blog['country'] === 'Switzerland') { echo 'selected'; } ?>>Switzerland</option>
                        <option value="Thailand" <?php if ($blog['country'] === 'Thailand') { echo 'selected'; } ?>>Thailand</option>
                        <option value="Ukraine" <?php if ($blog['country'] === 'Ukraine') { echo 'selected'; } ?>>Ukraine</option>
                        <option value="United Arab Emirates" <?php if ($blog['country'] === 'United Arab Emirates') { echo 'selected'; } ?>>United Arab Emirates</option>
                        <option value="United Kingdom" <?php if ($blog['country'] === 'United Kingdom') { echo 'selected'; } ?>>United Kingdom</option>
                        <option value="United States" <?php if ($blog['country'] === 'United States') { echo 'selected'; } ?>>United States</option>
                        <option value="Venezuela" <?php if ($blog['country'] === 'Venezuela') { echo 'selected'; } ?>>Venezuela</option>
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

