<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <meta name="description" content="User Authentication: Login_success page">
    <meta name="robots" content="noindex,nofollow">

    <!-- css link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-img text-white">
    <div class="container pt-5">
        <div class="col-12 col-sm-8 col-md-15 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="container">
                        <h1 class="text-center mt-5 py-3 txt-size">Login Success</h1>
                        <p class="mt-5 txt-size-2">Welcome, <span class="username_style"> <?php echo $_SESSION["username"]; ?> </span>!</p>
                        <p class="mt-5 txt-size-2">Php is fun. Isn't it?</p>
                        <a href="logout.php" class="btn btn-danger white text-center">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
</body>

</html>