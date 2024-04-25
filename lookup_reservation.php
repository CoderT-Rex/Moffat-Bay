<?php
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

// If both are empty throw error
if(!isset($_POST['email']) && !isset($_POST['resNum'])) {
    $_SESSION['error_message'] = "Please input either a Reservation ID or an Email.";
    header('Location: lookup.php');
}

// Get data from registration form
$email = $conn->real_escape_string($_POST['email']); // Sanitize Input
$resNum = $conn->real_escape_string($_POST['resNum']); // Sanitize Input

// Prepare SQL query to check if the email exists in the database and get customerID
$stmt = $conn->prepare("SELECT * FROM Customer WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result_customer = $stmt->get_result();

if ($result_customer->num_rows == 0) {
    // Email not found in the database
    $_SESSION['error_message'] = "Error: Email not found.";
    header('Location: lookup.php');
} else {
    // Email found, get the customerID
    $customer = $result_customer->fetch_assoc();
    $customerID = $customer['customerID'];
}
    
    // Check if the reservation ID is associated with that customerID
    $stmt = $conn->prepare("SELECT * FROM Reservation WHERE customerID = ?");
    $stmt->bind_param("i", $customerID);
    $stmt->execute();
    $result_reservation = $stmt->get_result();
    
    $reservations = array(); // Initialize an array to store all reservations
    
    if ($result_reservation->num_rows == 0) {
        // No reservations found for the provided customerID
        $_SESSION['error_message'] = "Error: No reservations found for the provided customerID.";
        header('Location: lookup.php');
        exit(); // Make sure to exit after redirection
    } else {
        // Fetch all reservations and store them in the array
        while ($row = $result_reservation->fetch_assoc()) {
            $reservations[] = $row;
        }
        // Store reservations array in session
        $_SESSION['reservations'] = $reservations;
        // Redirect to the page to display reservation details
        header('Location: lookup.php');
        exit(); // Make sure to exit after redirection
    }

// Close the database connection
$stmt->close();
$conn->close();
?>