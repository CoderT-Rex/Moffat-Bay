<?php

// Database insertion code here
$host = "localhost"; // Database host
$dbname = "MoffatBay"; // Database name
$user = "LodgeAdmin"; // Database username
$pass = "password"; // Database password

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from registration form
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];


/*
// After successful registration, send user back to home page
header('Location: index.php');
exit; // Ensure script execution ends here
*/
?>