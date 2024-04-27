<?php
/*
    CSD460 - Red Team
    Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
    Professor Sue Sampson
    This file handles the backend for registering a user
*/

session_start();

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
$email = $conn->real_escape_string($_POST['email']); // Sanitize input
$firstName = $conn->real_escape_string($_POST['firstname']); // Sanitize input
$lastName = $conn->real_escape_string($_POST['lastname']); // Sanitize input
$telephone = $conn->real_escape_string($_POST['telephone']); // Sanitize input
$password = $conn->real_escape_string($_POST['password']); // Sanitize input

// Encrypt the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if the email already exists
$stmt = $conn->prepare("SELECT * FROM Customer WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email already exists, return an error response
    echo json_encode(['status' => 'email_exists']);
    exit();
} else {
    // Email is unique, insert the new user
    $stmt = $conn->prepare("INSERT INTO Customer (email, password, first_name, last_name, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $email, $hashed_password, $firstName, $lastName, $telephone);

    if ($stmt->execute()) {
        // User registered successfully
        // Code that logs the user in after they register
        try {
            $sql = "SELECT * FROM Customer WHERE email = '$email'";
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error']);
            exit();
        }

        if ($result->num_rows > 0) {
            // User found, compare passwords
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                // Passwords match, authentication successful
                $_SESSION['user_id'] = $user["first_name"]; // Store Customer's First name in the session as 'user_id'
                $_SESSION['uniqueID'] = $_POST['email']; // Store User's Email Address
                $_SESSION['custID'] = $user["customerID"]; //Store Customer's ID in the Session.
                echo json_encode(['status' => 'success']);
                exit();
            } else {
                // Passwords do not match
                echo json_encode(['status' => 'error']);
                exit();
            }
        }
    } else {
        // Error in registration process
        echo json_encode(['status' => 'error']);
        exit();
    }
}
?>