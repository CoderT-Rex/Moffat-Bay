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

//DEBUG STUFF!!!!
var_dump($email);
?><br />
<?php 
var_dump($password);
?><br /><?php

// Sanitize inputs (you may use other sanitization methods as well)
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Query the database to retrieve user record
$sql = "SELECT * FROM Customer WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, compare passwords
    $user = $result->fetch_assoc();
    
    //DEBUG STUFF!!!!
    var_dump($user);?><br /><?php
    echo "Raw Password: " . $password . "<br>";
    echo "Passwrod from BD: " . $user["password"] . "<br>";
    
    if ($password == $user['password']) {
        // Passwords match, authentication successful
        echo "Authentication successful!";
        $_SESSION['user_id'] = $user["first_name"]; //Store Customer's First name in the session as 'user_id'
        //DEBUG!!!!!
        var_dump($_SESSION['user_id']);
        //NEED REDIRECT HERE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    } else {
        // Passwords do not match
        echo "Incorrect password!";
    }
} else {
    // User not found
    echo "User not found!";
}

// Close database connection
$conn->close();

exit();
?>