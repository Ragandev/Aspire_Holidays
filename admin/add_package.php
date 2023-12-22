<?php
    require ('../config.php');
    include('common/header.php');
    
    $catsql = "SELECT id, name FROM category ORDER BY id";
    $stmt = $pdo->query($catsql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $scatsql = "SELECT * FROM sub";
    $stmt1 = $pdo->query($scatsql);
    $dataa = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    
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
        <form action="add_package_post.php" method="post" enctype="multipart/form-data">

            <div class="row mb-4">
                <div class="col">
                    <label for="">Title <span class='text-danger'>*</span></label>
                    <input required type="text" name="title" class="form-control" placeholder="title">
                </div>
                <div class="col">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                
            </div>
            
            <div class="row mb-4">
               <div class="col">
                    <label for="">Category <span class='text-danger'>*</span></label>
                    <select required name="category" id="category" class="form-control">
                        <option value="0">Select Category</option>
                        <?php
                            foreach ($data as $row) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                         ?>
                    </select>
                </div>
                <div class="col">
                    <label for="">Sub Category <span class='text-danger'>*</span></label>
                    <select required name="sub" class="form-control">
                        <option value="0">Select Category</option>
                        <?php
                            foreach ($dataa as $roww) {
                                echo '<option value="'.$roww['id'].'">'.$roww['name'].'</option>';
                            }
                         ?>
                    </select>
                </div>
                </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Amount <span class='text-danger'>*</span></label>
                    <input required type="text" name="amount" class="form-control" placeholder="amount">
                </div>
                <div class="col">
                    <label for="">Country <span class='text-danger'>*</span></label>
                    <select required name="country" id="country" class="form-control">
                        <option value="">country</option>
                <?php
                $selectedCountry = $_GET['country']; // Get the selected country from the URL
                
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

                // Loop through the countries and create an option for each
                foreach ($countries as $country) {
                  $selected = ($selectedCountry === $country) ? 'selected' : ''; // Check if this is the selected country
                  echo '<option ' . $selected . ' value="' . $country . '">' . $country . '</option>';
                }
                ?>
                    </select>
                </div>
                <div class="col d-none">
                    <label for="">State <span class='text-danger'>*</span></label>
                    <select required name="state" id="state" class="form-control">
                        <option value="State">State</option>
                <?php
                $selectedState = $_GET['state']; // Get the selected state from the URL
                
                // Define an array of states
                $states = array(
                    'Tamil Nadu',
                    'Chhattishgarh',
                    'Maharashtra',
                    'Andra Pradesh',
                    'Arunachal Pradesh',
                    'Assam',
                    'Bihar',
                    'Delhi',
                    'Goa',
                    'Gujarat',
                    'Haryana',
                    'Himachal Pradesh',
                    'Jammu & Kashmir',
                    'Jharkhand',
                    'Karnataka',
                    'Kerala',
                    'Madhya Pradesh',
                    'Maharashtra',
                    'Manipur',
                    'Meghalaya',
                    'Mizoram',
                    'Nagaland',
                    'Orissa',
                    'Pondichery',
                    'Punjab',
                    'Rajasthan',
                    'Sikkim',
                    'Uttar Pradesh',
                    'Tripura',
                    'Uttarakhand',
                    'West Bengal'
                    );

                // Loop through the states and create an option for each
                foreach ($states as $state) {
                  $selected = ($selectedState === $state) ? 'selected' : ''; // Check if this is the selected country
                  echo '<option ' . $selected . ' value="' . $state . '">' . $state . '</option>';
                }
                ?>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="">Meta Description</label>
                    <textarea name="mdes" id="" class="form-control" rows="3"></textarea>
                </div>
                <div class="col">
                    <label for="">Meta Keywords</label>
                    <textarea name="mkey" id="" class="form-control" rows="3"></textarea>
                </div>
              </div>
             
            <div class="row mb-4">
                <div class="col">
                    <label  for="">Image 1 <span class='text-danger'>*</span></label>
                    <input required type="file" name="img1" class="form-control">
                </div>
                <div class="col">
                    <label for="">Image 2 <span class='text-danger'>*</span></label>
                    <input required type="file" name="img2" class="form-control">
                </div>
                <div class="col">
                    <label for="">Image 3 <span class='text-danger'>*</span></label>
                    <input required type="file" name="img3" class="form-control">
                </div>
              </div>
              
              <div class="row mb-4">
                    <label for="">Inclusion</label><br>
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="visa"> &nbsp;
                        <label for="">Visa</label> <br>
                        <input class="form-control" type="text" name="visa_title" placeholder="Visa Title">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="passport"> &nbsp;
                        <label for="">Passport</label> <br>
                        <input class="form-control" type="text" name="passport_title" placeholder="Passport Title">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="ticket"> &nbsp;
                        <label for="">Ticket</label> <br>
                        <input class="form-control" type="text" name="ticket_title" placeholder="Ticket Title">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="hotel"> &nbsp;
                        <label for="">Hotel</label> <br>
                        <input class="form-control" type="text" name="hotel_title" placeholder="Hotel Title">
                    </div> 
                    
                    <div class="col-4 mb-3">
                        <input type="checkbox" value="1" name="transport"> &nbsp;
                        <label for="">Transport</label> <br>
                        <input class="form-control" type="text" name="transport_title" placeholder="Transport Title">
                    </div>
                    
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="priority">Priority</label>
                        <select name="priority" id="priority" class="form-control">
                            <option value="0">None</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="">Quote</label>
                        <input type="text" class="form-control" name="quote">
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="">Highlights <span class='text-danger'>*</span></label>
                        <textarea required class="form-control" name="highlights" id="" rows="5"></textarea>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col">
                        <label for="">Content <span class='text-danger'>*</span></label>
                        <textarea required class="form-control" name="content" id="" rows="10"></textarea>
                    </div>
                </div>
              
              
              <div class="row">
                  <label for="">Day 1 <span class='text-danger'>*</span></label>
                <div class="col">
                    <input type="text" required class="form-control mb-2" name="day_title[]" placeholder="Title">
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                    <textarea class="form-control mb-2" name="days[]" id="" rows="10" placeholder="Content"></textarea>
                </div>
              </div>
              
            <div class="day-box"></div>
            
            <div>
                <a class="btn plusBtn add-btn btn-success">+</a>
            </div>
                
            <br><br><br>
              
            <input type='submit' value='Create' class="btn btn-primary">
              
        </form>
    </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addInputButton = document.querySelector('.add-btn');
            const inputContainer = document.querySelector('.day-box');
        
            let inputCount = 1;
        
            CKEDITOR.replace('content');
            CKEDITOR.replace('highlights');
            CKEDITOR.replace('days[]');
    
            addInputButton.addEventListener('click', function() {
                let inputEle = `
                    <label for="">Day ${inputCount + 1}</label>
                    <input required class="form-control mb-2" name="day_title[]" placeholder="Title">
                    <textarea class="form-control mb-2" name="days[]" rows="10" placeholder="Content"></textarea></br></br>
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
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category');
        const stateSelect = document.getElementById('state').closest('.col');
        const countrySelect = document.getElementById('country').closest('.col');
        function showHide(){
            if(categorySelect.value == '2'){
            stateSelect.classList.remove('d-none');
            countrySelect.classList.add('d-none');
            document.getElementById('country').value = 'India';
            document.getElementById('country').removeAttribute('required');
        }else{
            countrySelect.classList.remove('d-none');
            stateSelect.classList.add('d-none');
            document.getElementById('state').value = 'State';
            document.getElementById('state').removeAttribute('required');
        }
        }
        
        
        categorySelect.addEventListener('change', function() {
            showHide();
        });
        showHide();
    });
</script>


<?php
    include('common/footer.php');
?>