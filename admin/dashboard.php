<?php
    require ('../config.php');
    include('common/header.php');
    
    // User Data
    $usersql = "SELECT id, name FROM users ORDER BY id";
    $stmtuser = $pdo->query($usersql);
    $datauser = $stmtuser->fetchAll(PDO::FETCH_ASSOC);
    
    // Package Data 
    $usersql1 = "SELECT id, name FROM package ORDER BY id";
    $stmtuser1 = $pdo->query($usersql1);
    $datauser1 = $stmtuser1->fetchAll(PDO::FETCH_ASSOC);
    
    // Blog Data
    $usersql11 = "SELECT id, name FROM blog ORDER BY id";
    $stmtuser11 = $pdo->query($usersql11);
    $datauser11 = $stmtuser11->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
    .box{
        height:250px;
        box-shadow: 0px 0px 10px lightgrey;
        display: flex;
        align-items:center;
        justify-content: center;
        border-radius: 20px;
    }
    h1{
        font-size: 80px;
        color: #f0870d;
    }
    h6{
        font-weight: Bold;
    }
    .admin{
        color: #fff;
    }
</style>
    
    <div class="container">
        <div class="admin-box">
            <div>
                <h1 class="admin">WELCOME ADMIN</h1>
                <p class="text-center">Aspire Holidays</p>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                <h1><?php echo count($datauser) ?></h1>&nbsp;&nbsp;&nbsp;
                <h6>Users</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                <h1><?php echo count($datauser1) ?></h1>&nbsp;&nbsp;&nbsp;
                <h6>Packages</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h1><?php echo count($datauser11) ?></h1>&nbsp;&nbsp;&nbsp;
                <h6>Blogs</h6>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include('common/footer.php');
?>