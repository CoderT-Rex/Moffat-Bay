<?php
/*
    CSD460 - Red Team
    Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
    This file handles the backend for loging a user into their account
*/

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
// Sanitize inputs
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Query the database to retrieve user record
try {
    $sql = "SELECT * FROM Customer WHERE email = '$email'";
    $result = $conn->query($sql);
} catch (Exception $e) {
    echo json_encode(['status' => 'error']);
    exit();
}

if ($result->num_rows > 0) {
    // Email found, compare passwords
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Passwords match, authentication successful, login user
        $_SESSION['user_id'] = $user["first_name"]; // Store Customer's First name in the session as 'user_id'
        $_SESSION['custID'] = $user["customerID"]; //Store Customer's ID in the Session.
        $_SESSION['uniqueID'] = $email;
        $conn->close(); // Close database connection
        echo json_encode(['status' => 'success']);
        exit();
    } else {
        // Passwords do not match
        $conn->close(); // Close database connection
        echo json_encode(['status' => 'invalid']);
        exit();
    }
} else {
    // Invalid email
    $conn->close(); // Close database connection
    echo json_encode(['status' => 'invalid']);
    exit();
}
?>