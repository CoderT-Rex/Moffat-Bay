<!--
    CSD460 - Red Team
    Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
    This file handles saving a new reservation to the database
-->
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

// Initialize an array to store potential errors
$_SESSION['errors'] = [];

// Get reservation details from submitted form
if (isset($_POST['room_size'], $_POST['guests'], $_POST['checkin'], $_POST['checkout'], $_SESSION['uniqueID'])) {
        
    $guests = $conn->real_escape_string($_POST['guests']);
    $room_size = $conn->real_escape_string($_POST['room_size']);
    $checkin = $conn->real_escape_string($_POST['checkin']);
    $checkout = $conn->real_escape_string($_POST['checkout']);
    $email = $conn->real_escape_string($_SESSION['uniqueID']);
    
    $stmt1 = $conn->prepare("INSERT INTO Reservation (number_of_guests, room_type, check_in_date, check_out_date, cost_per_night, total_cost) VALUES (?, ?, ?, ?, NULL, NULL)");
    if ($stmt1) {
        $stmt1->bind_param("isss", $guests, $room_size, $checkin, $checkout);
        if (!$stmt1->execute()) {
            $_SESSION['errors'][] = "Error inserting reservation: " . $stmt1->error;
        }
        $stmt1->close();

        // Set reservationID to the most recently incremented ID
        $reservationID = $conn->insert_id;
        
        $stmt2 = $conn->prepare("UPDATE Customer SET reservationID = ? WHERE email = ?");
        if ($stmt2) {
            $stmt2->bind_param("is", $reservationID, $email);
            if (!$stmt2->execute()) {
                $_SESSION['errors'][] = "Error updating customer: " . $stmt2->error;
            }
            $stmt2->close();
        } else {
            $_SESSION['errors'][] = "Error preparing statement: " . $conn->error;
        }
    } else {
        $_SESSION['errors'][] = "Error preparing statement: " . $conn->error;
    }
    $_SESSION["reservationID"] = $reservationID; // Add reservation ID to session for use on confirmation page.
} else {
    $_SESSION['errors'][] = "Required fields are missing.";
}

// Redirect if there are errors
if (!empty($_SESSION['errors'])) {
    header("Location: error.php");
}
else {
    header("Location: bookingconfirmation.php"); // If no errors, send user to confirmation page
}
exit;
?>