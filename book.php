tml
Copy code
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<title>Lodge Reservation - Moffat Bay Lodge</title>
</head>
<body>
<?php
    session_start(); // Start the session
    // Check if the user is not logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page
        header("Location: login.php");
        exit; // Stop further execution of the script
    }
?>
<div class="navbar d-flex justify-content-between bg-light sticky-top py-3">
    <div class="container">
        <div class="d-flex">
            <img class="main-logo" src="images/logo.png" alt="Moffat Bay Lodge">
        </div>

        <div class="main-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="attractions.php">Attractions</a></li>
                <li><a href="book.php">Reservations</a></li>
                <?php
                if (isset($_SESSION['user_id'])) {
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
            <h1 class="color-primary underline-secondary">Book Your Vacation</h1>
        </div>
    </div>
    <div class="row pt-3 width-80">
        <div class="col-12">
            <form action="bookingconfirmation.php" method="post">
                <div class="mb-3">
                    <label for="room_size" class="form-label">Room Size:</label>
                    <select id="room_size" name="room_size" class="form-select" required>
                        <option value="double full beds">Double Full Beds</option>
                        <option value="queen bed">Queen</option>
                        <option value="double queen beds">Double Queen Beds</option>
                        <option value="king bed">King</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="guests" class="form-label">Number of Guests:</label>
                    <input type="number" id="guests" name="guests" class="form-control" min="1" max="5" required>
                </div>
                <div class="mb-3">
                    <label for="checkin" class="form-label">Check-in Date:</label>
                    <input type="date" id="checkin" name="checkin" class="form-control" min="<?php echo date('Y-m-d'); ?>" required onchange="toggleCheckout()">
                </div>
                <div class="mb-3" id="checkoutDiv" style="display: none;">
                    <label for="checkout" class="form-label">Check-out Date:</label>
                    <input type="date" id="checkout" name="checkout" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-light">Make Reservation</button>
            </form>
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

<script>
    function toggleCheckout() {
        var checkinDate = document.getElementById('checkin').value;
        var checkoutDiv = document.getElementById('checkoutDiv');
        var checkoutInput = document.getElementById('checkout');
        if (checkinDate !== "") {
            checkoutDiv.style.display = 'block';
            checkoutInput.setAttribute('min', checkinDate);
        } else {
            checkoutDiv.style.display = 'none';
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>