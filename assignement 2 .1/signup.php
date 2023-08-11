<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


// Display success message if available in session
if (isset($_SESSION['success_message'])) {
    echo '<p class="alert alert-success bg">' . htmlspecialchars($_SESSION['success_message']) . '</p>';
    unset($_SESSION['success_message']);
}

// Display error message if available in URL parameters
if (isset($_GET['error']) && $_GET['error'] === 'true') {
    if (isset($_GET['message'])) {
        $error_message = urldecode($_GET['message']);
        echo '<p class="text-center alert-danger bg">' . htmlspecialchars($error_message) . '</p>';
    } else {
        echo '<p class="text-center alert-danger bg">An error occurred. Please try again.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <meta name="description" content="User Authentication: Sign_up page">
    <meta name="robots" content="noindex,nofollow">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-img text-white">
    <section>
        <div class="container pt-4">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-center mt-3">
                            <h1 class="mt-3">Create your account</h1>
                        </div>
                        <p class="text-center mt-3">Note that Your Date of Birth may be required for signup. Your DOB will only be used to verify your identity for security purposes.</p>
                        <form action="create_user.php" method="post" class="mt-3">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="fname">First Name</label>
                                    <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="lname">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="age">Age</label>
                                    <input class="form-control" type="number" name="age" placeholder="Age" min="1" max="130" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="dob">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group col-5">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group col-5">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary white">Continue</button>
                                <p class="mt-3">Already have an account? <a href="login.php" class="nav-link"> Log in</a></p>
                            </div>
                        </form>
                        <!-- JavaScript code to hide the success message after a few seconds -->
                        <script>
                            // Function to hide the success message after a specified duration
                            function hideSuccessMessage() {
                                var successMessage = document.querySelector('.alert-success');
                                if (successMessage) {
                                    setTimeout(function() {
                                        successMessage.style.display = 'none';
                                    }, 5000); // Hide after 5 seconds (adjust the duration as needed)
                                }
                            }
                            hideSuccessMessage();
                        </script>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<?php
// Set the success message
$_SESSION['success_message'] = 'User registration successful! You can now log in.';
?>