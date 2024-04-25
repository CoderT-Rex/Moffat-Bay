<!-- Benjamin Andrew -->
<!-- Created 4 April 2024 -->
<!-- This file is designed to take inputs from the login.html page and output to the database -->
<!-- This php will log the user into the database and then feedback to the HTML page -->

<?php
session_start(); // Start a new session or resume the existing one

$host = "localhost"; // Database host
$dbname = "MoffatBay"; // Database name
$user = "LodgeAdmin"; // Database username
$pass = "password"; // Database password

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve email and password from HTML form
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION['uniqueID'] = $_POST['email'];

// Query the database to retrieve user record
try {
    $sql = "SELECT * FROM Customer WHERE email = '$email'";
    $result = $conn->query($sql);
} catch (Exception $e) {
    header("Location: error.php");
}

// Sanitize inputs
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

if ($result->num_rows > 0) {
    // User found, compare passwords
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Passwords match, authentication successful
        $_SESSION['user_id'] = $user["first_name"]; // Store Customer's First name in the session as 'user_id'
        $_SESSION['custID'] = $user["customerID"]; //Store Customer's ID in the Session.
        header("Location: index.php");
    } else {
        // Passwords do not match
        header("Location: error.php?message=Invalid_credentials");
    }
} else {
    // User not found
    header("Location: error.php?message=Email_not_found");
}

// Close database connection
$conn->close();
exit();
?>