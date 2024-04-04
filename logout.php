<!-- Benjamin Andrew -->
<!-- This php file will be utilized in future iterations to ensure that a user can properly log out -->

<?php
// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: login.html");
exit();
?>