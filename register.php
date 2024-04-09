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
    // Email already exists, handle accordingly (e.g., display an error message)
    echo "Email already exists. Please choose a different email.";
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
        } catch(Exception $e) {
            header("Location: error.php");
        }
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        if ($result->num_rows > 0) {
            // User found, compare passwords
            $user = $result->fetch_assoc();
            
            //DEBUG STUFF!!!!
            var_dump($user);?><br /><?php
    echo "Raw Password: " . $password . "<br>";
    echo "Password from BD: " . $user["password"] . "<br>";

    if (password_verify($password, $user['password'])) {
        // Passwords match, authentication successful
        echo "Authentication successful!";
        $_SESSION['user_id'] = $user["first_name"]; //Store Customer's First name in the session as 'user_id'
        //DEBUG!!!!!
        var_dump("user_id");
        var_dump($_SESSION['user_id']);
        header("Location: success.php");
    } else {
        // Passwords do not match
        header("Location: error.php");
    }

}
    } else {
        // Error in registration process
        echo "Error: " . $conn->error;
    }
}

/*
// After successful registration, send user back to home page
header('Location: index.php');
exit; // Ensure script execution ends here
*/
?>