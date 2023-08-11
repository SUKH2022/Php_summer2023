<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="User Authentication: Login page">
    <meta name="robots" content="noindex,nofollow">

    <!-- css link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-img text-white">
    <section>
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="text-center mt-3">
                                <h1 class="mt-3">Welcome back</h1>
                            </div>
                            <div class="text-center mt-3">
                                <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </div>
                            <form action="login_check.php" method="post" class="mt-3">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control my-4 py-2" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" required>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary white">Continue</button>
                                    <p class="mt-3">Don't have an account?<a href="signup.php" class="nav-link"> Sign up</a></p>
                                </div>
                            </form>
                        </div>
                        <?php
                        // Display error message if available in session
                        if (isset($_SESSION['error_message'])) {
                            echo '<p class="alert alert-danger bg">' . htmlspecialchars($_SESSION['error_message']) . '</p>';
                            unset($_SESSION['error_message']); // Clear the message after displaying
                        }

                        // Display success message if available in session
                        if (isset($_SESSION['success_message'])) {
                            echo '<p class="alert alert-success bg">' . htmlspecialchars($_SESSION['success_message']) . '</p>';
                            unset($_SESSION['success_message']); // Clear the message after displaying
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>