<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body{
            height: 100svh;
            box-sizing: border-box;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .log-body{
            width: 400px;
            background-color: #fff;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
            padding:30px;
        }
        @media (width < 450px) {
            .log-body{
            width: 95%;
        } 
        }
    </style>
</head>
<body>
    
    
    <div class="log-body">
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
        <form action="login_post.php" method="post">
            <div class="row mb-3">
                <h3>LOGIN</h3>
            </div>
            <div class="row mb-3">
                <input class="form-control" type="text" name="username" placeholder="username">
            </div>
            <div class="row mb-3">
                <input class="form-control" type="password" name="password" placeholder="password">
            </div>
            <div class="row">
                <input type="submit" class="btn btn-success btn-block">
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
</body>
</html>