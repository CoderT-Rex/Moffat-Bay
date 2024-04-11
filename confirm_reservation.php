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

if (isset($_SESSION['room_size'], $_SESSION['guests'], $_SESSION['checkin'], $_SESSION['checkout'], $_SESSION['uniqueID'])) {
    $stmt0 = $conn->query("SELECT COUNT(*) FROM Reservation");
    if (!$stmt0) {
        $_SESSION['errors'][] = "Error fetching reservation count: " . $conn->error;
    } else {
        $numReservations = $stmt0->fetch_row()[0];
        $reservationID = $numReservations + 1;
        
        $guests = $conn->real_escape_string($_SESSION['guests']);
        $room_size = $conn->real_escape_string($_SESSION['room_size']);
        $checkin = $conn->real_escape_string($_SESSION['checkin']);
        $checkout = $conn->real_escape_string($_SESSION['checkout']);
        $email = $conn->real_escape_string($_SESSION['uniqueID']);
        
        $stmt1 = $conn->prepare("INSERT INTO Reservation (reservationID, number_of_guests, room_type, check_in_date, check_out_date) VALUES (?, ?, ?, ?, ?)");
        if ($stmt1) {
            $stmt1->bind_param("iisss", $reservationID, $guests, $room_size, $checkin, $checkout);
            if (!$stmt1->execute()) {
                $_SESSION['errors'][] = "Error inserting reservation: " . $stmt1->error;
            }
            $stmt1->close();
            
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
    }
} else {
    $_SESSION['errors'][] = "Required fields are missing.";
}

// Redirect if there are errors
if (!empty($_SESSION['errors'])) {
    header("Location: error.php"); // Redirect to an error page or back to form page to display errors
}
exit;
?>