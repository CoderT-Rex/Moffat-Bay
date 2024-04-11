<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us - Maffet Bay Lodge</title>
</head>
<body>
    <div class="navbar d-flex justify-content-between bg-light sticky-top py-3">
        <div class="container">
            <div class="d-flex">
                <img class="main-logo" src="images/logo.png" alt="Maffet Bay Lodge">
                <h2 class="d-inline mt-auto mb-auto color-primary">Moffat Bay Lodge</h2>
            </div>
            
            <div class="main-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="attractions.php">Attractions</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <?php
                    session_start(); // Start the session
                    //Check if the user is logged in
                    if(isset($_SESSION['user_id'])) {
                    // If logged in, display profile and logout links
                    echo '<li><a href="profile.php">' . $_SESSION['user_id'] . '</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
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
                <h1 class="color-primary underline-secondary">Contact Us</h1>
            </div>
        </div>
        <div class="row pt-3 width-80">
            <div class="col-12">
                <p class="fs-24">Get in touch with Moffat Bay Lodge for inquiries, reservations, or any assistance you need.</p>
                <ul class="list-unstyled fs-24">
                    <li>Email: info@maffetbaylodge.com</li>
                    <li>Phone: +1 (555) 123-4567</li>
                    <li>Address:<br>420 Moffat Bay Road<br>Joviedsa Island, Washington 98250</li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="text-light pt-4 pb-2">
        <div class="row width-80">
            <!-- Footer logo and description -->
            <div class="col-md-4 mb-3 ps-5">
                <img src="images/logo.png" alt="Maffet Bay Lodge" class="footer-logo mb-2">
                <small class="d-block mb-3">&copy; 2024 Maffet Bay Lodge. All rights reserved.</small>
            </div>

            <!-- Footer navigation -->
            <div class="col-md-4 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="aboutus.html">About</a></li>
                    <li><a href="attractions.html">Attractions</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                </ul>
            </div>

            <!-- Additional footer content -->
            <div class="col-md-4 mb-3">
                <h5>Contact Information</h5>
                <ul class="list-unstyled text-small">
                    <li>Phone: (555) 123-4567</li>
                    <li>Email: info@maffetbaylodge.com</li>
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