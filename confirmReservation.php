<!--
    CSD460 - Red Team
    Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
    Professor Sue Sampson
    This file displays confirmation that a reservation has been saved
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Reservation Confirmation - Moffat Bay Lodge</title>
</head>

<body class="sticky-footer">
    <div class="main-content">
        <div class="navbar d-flex justify-content-between bg-light sticky-top py-3">
            <div class="container">
                <a href="index.php">
                    <div class="d-flex">
                        <img class="main-logo" src="images/logo.png" alt="Moffat Bay Lodge">
                        <!-- 
                        Maynard J. (2012). salish salmon
                    -->
                    </div>
                </a>

                <div class="main-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li><a href="attractions.php">Attractions</a></li>
                        <li><a href="book.php">Reservations</a></li>
    					<?php
    					session_start(); // Start the session
    					// Check if the user is logged in
    					if (isset($_SESSION['user_id'])) {
    					    echo '<li class="nav-item dropdown">';
    					    echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $_SESSION['user_id'] . '</a>';
    					    echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
    					    echo '<li><a class="dropdown-item" href="profile.php">Profile</a></li>';
    					    echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
    					    echo '</ul>';
    					    echo '</li>';
    					} else {
    					    // If not logged in, display the login link
    					    echo '<li><a href="login.php">Login</a></li>';
    					}
    					?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="restricted-container bg-light">
            <div class="row spacer">
                <div class="col-12 px-5 text-center">
                    <h1 class="color-primary">Thank you for reserving a room at Moffat Bay Lodge! We hope you enjoy your
                        stay!</h1>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-light pt-4 pb-2">
        <div class="row width-80">
            <!-- Footer logo and description -->
            <div class="col-md-4 mb-3 ps-5">
                <img src="images/logo.png" alt="moffat Bay Lodge" class="footer-logo mb-2">
                <small class="d-block mb-3">&copy; 2024 Moffat Bay Lodge. All rights reserved.</small>
            </div>

            <!-- Footer navigation -->
            <div class="col-md-4 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="attractions.php">Attractions</a></li>
                    <li><a href="book.php">Reservations</a></li>
                </ul>
            </div>

            <!-- Additional footer content -->
            <div class="col-md-4 mb-3">
                <h5>Contact Information</h5>
                <ul class="list-unstyled text-small">
                    <li>Phone: (555) 123-4567</li>
                    <li>Email: info@moffatbaylodge.com</li>
                </ul>
                <h5>Follow Us</h5>
                <!-- Social media links -->
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Facebook</a></li>
                    <li class="list-inline-item"><a href="#">Instagram</a></li>
                    <li class="list-inline-item"><a href="#">Twitter</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>