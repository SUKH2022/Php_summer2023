<?php
// display error if any in running the page
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Function to display error messages
function displayError($message)
{
    echo '<p class="text-center alert-danger bg">' . htmlspecialchars($message) . '</p>';
}

// Function to display success messages
function displaySuccess($message)
{
    echo '<p class="alert alert-success bg">' . htmlspecialchars($message) . '</p>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $dob = $_POST["dob"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate form inputs
    $errors = array();

    // Check if required fields are not empty
    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }
    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    }
    if (empty($age)) {
        $errors[] = "Age is required.";
    }
    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if (empty($confirm_password)) {
        $errors[] = "Confirm password is required.";
    }

    // Additional Validation: Check for minimum and maximum length for username and password
    $min_username_length = 5;
    $max_username_length = 50;
    $min_password_length = 8;

    if (strlen($username) < $min_username_length || strlen($username) > $max_username_length) {
        $errors[] = "Username must be between $min_username_length and $max_username_length characters.";
    }

    if (strlen($password) < $min_password_length) {
        $errors[] = "Password must be at least $min_password_length characters long.";
    }

    // Check if passwords match with the confirm password
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // If there are validation errors, display them the error and do not proceed with database insertion
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo "<button onclick='goToSignUpPage()'>Go Back to Sign Up</button>";
        echo "<script>
            function goToSignUpPage() {
                window.location.href = 'signup.php';
            }
        </script>";
        exit();
    }

    // If validation passed successfully then, proceed with database insertion

    // Hash the password for protection
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Implement of the database connection
    $host = "172.31.22.43";
    $username_db = "Sukhpreet200520246";
    $password_db = "SZSDJ517MV";
    $database = "Sukhpreet200520246";

    try {
        // Create a new PDO object
        $conn = new PDO("mysql:host=$host;dbname=$database", $username_db, $password_db);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the username already exists in the database
        $stmt = $conn->prepare("SELECT COUNT(*) FROM login_user WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        if ($result > 0) {
            // Username already exists, show error message
            $errors[] = "Error: Username already exists. Please choose a different username.";
            foreach ($errors as $error) {
                displayError($error);
            }
            echo "<button onclick='goToSignUpPage()'>Go Back to Sign Up</button>";
            echo "<script>
                function goToSignUpPage() {
                    window.location.href = 'signup.php';
                }
            </script>";
            exit();
        }

        // Prepare the INSERT query
        $sql = "INSERT INTO login_user (first_name, last_name, age, dob, username, password) VALUES (:first_name, :last_name, :age, :dob, :username, :password)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the statement
        $stmt->bindParam(":first_name", $first_name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":dob", $dob);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            // User successfully created, user can redirect to a success page and show a success message
            $_SESSION['success_message'] = "User created successfully!";
            header("Location: signup.php?success=true"); // Add a success parameter to indicate successful signup
            exit();
        } else {
            // Error occurred while inserting data into the database
            $_SESSION['error_message'] = "Error: There was a problem creating the user.";
            header("Location: signup.php?error=true");
            exit();
        }
    } catch (PDOException $e) {
        $error_message = "Connection failed: " . $e->getMessage();
        header("Location: signup.php?error=true&message=" . urlencode($error_message));
        exit();
        // echo "Connection failed: " . $e->getMessage();
    }
}
