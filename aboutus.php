<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
	crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<title>About Us - moffat Bay Lodge</title>
</head>
<body>
	<div
		class="navbar d-flex justify-content-between bg-light sticky-top py-3">
		<div class="container">
			<div class="d-flex">
				<img class="main-logo" src="images/logo.png" alt="Moffet Bay Lodge">
			</div>

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
				<h1 class="color-primary underline-secondary">About Us</h1>
			</div>
		</div>
		<div class="row pt-3 width-80">
			<div class="col-12">
				<p class="fs-24">Moffat Bay Lodge is a stunning resort located in
					Joviedsa, one of the many beautiful San Juan Islands located in
					northern Washington. Built in 2023, expect the latest amenities
					while being surrounded by breathtaking views and unforgettable
					experiences. Our lodge provides the perfect blend of modern luxury
					and timeless nature, providing fine dining restaurants in view of
					our bay and famous lighthouse. Embrace your adventurous side with
					hiking, swimming, diving, whale watching, and kayaking in our
					picturesque piece of paradise. It is an ideal destination for
					couples, families, nature enthusiasts, and those who just want to
					get away from the humdrum of everyday life.</p>
				<p class="fs-24">Moffat Bay can be reached by taking the Orca
					Islands Ferry from the Anacortes terminal. If flying into Seattle,
					the terminal is about a 2-hour drive north by car or bus. You can
					also take a train to Mt. Vernon Washington and travel by bus from
					there. For those wanting an expedited experience, you can also fly
					directly into the San Juan Islands via Roche Harbor (RCE) or Friday
					Harbor (FRD).</p>
			</div>
		</div>

		<div class="row spacer">
			<div class="col-12 px-5 text-center">
				<h1 class="color-primary underline-secondary">Contact Us</h1>
			</div>
		</div>
		<div class="row pt-3 width-80">
			<div class="col-12">
				<p class="fs-24">Get in touch with Moffat Bay Lodge for inquiries,
					reservations, or any assistance you need.</p>
				<ul class="list-unstyled fs-24">
					<li>Email: info@moffatbaylodge.com</li>
					<li>Phone: +1 (555) 123-4567</li>
					<li>Address:<br>420 Moffat Bay Road<br>Joviedsa Island, Washington
						98250
					</li>
				</ul>
			</div>
		</div>
	</div>

	<footer class="text-light pt-4 pb-2">
		<div class="row width-80">
			<!-- Footer logo and description -->
			<div class="col-md-4 mb-3 ps-5">
				<img src="images/logo.png" alt="moffat Bay Lodge"
					class="footer-logo mb-2"> <small class="d-block mb-3">&copy; 2024
					Moffat Bay Lodge. All rights reserved.</small>
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

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
</body>
</html>