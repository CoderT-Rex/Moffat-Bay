<?php
/*
    CSD460 - Red Team
    Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
    Professor Sue Sampson 
    This code allows a user to logout
*/

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

//Destroy the cooikies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', 1,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
}

// Redirect the user to the login page
header("Location: index.php");
exit();
?>
