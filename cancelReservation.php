<?php
/*
    CSD460 - Red Team
    Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
    Professor Sue Sampson
    This file handles deleting a reservation from the database
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

// Initialize an array to store potential errors
$_SESSION['errors'] = [];

if (isset($_POST['reservationID'])) {
    $email = $_SESSION['uniqueID'];
    $reservationID = $_POST['reservationID'];

    // Delete row from reservation table
    $stmt1 = $conn->prepare("DELETE FROM Reservation WHERE reservationID = ?");
    if ($stmt1) {
        $stmt1->bind_param("i", $reservationID);
        if (!$stmt1->execute()) {
            $_SESSION['errors'][] = "Error deleting reservation: " . $stmt1->error;
        }
        $stmt1->close();
    } else {
        $_SESSION['errors'][] = "Error preparing statement: " . $conn->error;
    }

} else {
    $_SESSION['errors'][] = "Reservation not found.";
}

if (!empty($_SESSION['errors'])) {
    header("Location: error.php"); // Redirect if there are errors
} else {
    header("Location: book.php"); // If no errors, send user to back to reservation page
}
exit;
?>
