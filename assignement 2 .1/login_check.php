<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Implement database connection using PDO
    $host = "172.31.22.43";
    $username_db = "Sukhpreet200520246";
    $password_db = "SZSDJ517MV";
    $database = "Sukhpreet200520246";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch the hashed password from the database based on the given username
        $stmt = $conn->prepare("SELECT password FROM login_user WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result["password"])) {
            // Password is correct
            $_SESSION["username"] = $username;
            $_SESSION["success_message"] = "Login successful! Welcome back, $username.";
            header("Location: login_success.php");
            exit();
        } else {
            // Password is incorrect, show error message
            $_SESSION["error_message"] = "Error: Invalid username or password.";
            header("Location: login.php?error=true");
            exit();
        }
    } catch (PDOException $e) {
        // Error occurred while fetching data from the database
        die("Error: " . $e->getMessage());
    }
}
?>
