<!DOCTYPE html>
<!--CSD460 - Red Team
Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
Professor Sue Sampson 
This code handles displaying user information when they are logged in-->
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	<title>Profile - Moffat Bay Lodge</title>
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
							// If logged in, display profile link
							echo '<li><a href="profile.php">' . $_SESSION['user_id'] . '</a></li>';
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
					<h1 class="color-primary underline-secondary">Your Profile</h1>
				</div>
			</div>
			<div class="row pt-3 width-80">
				<div class="col-12">
					<?php
					$host = "localhost"; // Database host
					$dbname = "MoffatBay"; // Database name
					$user = "LodgeAdmin"; // Database username
					$pass = "password"; // Database password
					
					$conn = new mysqli($host, $user, $pass, $dbname);

					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					// Get user's first name from Session
					$cusID = $_SESSION['custID'];

					// Prepare and execute the SQL query to retrieve user information
					$stmt = $conn->prepare("SELECT * FROM Customer WHERE customerID = ?");
					$stmt->bind_param("i", $cusID);
					$stmt->execute();
					$result = $stmt->get_result();

					// Prepare and execute the SQL query to retrieve reservation numbers
					$stmt1 = $conn->prepare("SELECT reservationID FROM Reservation WHERE customerID = ?");
					$stmt1->bind_param("i", $cusID);
					$stmt1->execute();
					$result1 = $stmt1->get_result();

					// Check if any rows were returned
					if ($result->num_rows > 0) {
						// Start table with centering and spacing styles
						echo "<table class='table table-striped' style='margin: auto; width: 90%;'>";
						// Output the user's profile information
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<th scope='row'>" . "First Name" . "</th><td>" . $row['first_name'] . "</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th scope='row'>" . "Last Name" . "</th><td>" . $row['last_name'] . "</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th scope='row'>" . "Email" . "</th><td>" . $row['email'] . "</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th scope='row'>" . "Phone" . "</th><td>" . $row['phone'] . "</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th scope='row'>" . "Reservation IDs" . "</th><td>";
							// Fetch and concatenate reservationIDs
							$reservationIDs = "";
							while ($row1 = $result1->fetch_assoc()) {
								$reservationIDs .= $row1['reservationID'] . ", ";
							}
							// Remove trailing comma and space
							$reservationIDs = rtrim($reservationIDs, ", ");
							echo $reservationIDs;
							echo "</td>";
							echo "</tr>";
						}
						// End table
						echo "</table>";
						echo "<br>";
					} else {
						echo "No user found with the provided name.";
					}

					// Close the database connections
					$stmt->close();
					$stmt1->close();
					$conn->close();
					?>
					<a href="lookup.php" class="btn btn-light">Reservation Lookup</a>
					<a href="logout.php" class="btn btn-logout">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<footer class="text-light pt-4 pb-2">
		<div class="row width-80">
			<!-- Footer logo and description -->
			<div class="col-md-4 mb-3 ps-5">
				<img src="images/logo.png" alt="moffat Bay Lodge" class="footer-logo mb-2"> <small
					class="d-block mb-3">&copy; 2024
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

	<script>
		// Function to check if the user is logged in (dummy function)
		function isLoggedIn() {
			if ($_SESSION['user_id'] != 'NULL') {
				return true; // Assuming the user is not logged in by default
			} else {
				return false;
			}
		}

		// Function to dynamically update the navigation menu
		function updateMenu() {
			const menuItems = document.getElementById('menuItems');
			if (isLoggedIn()) {
				// If user is logged in, display their username in the menu
				const username = $_SESSION['']; // Replace with actual username
				const listItem = document.createElement('li');
				const link = document.createElement('a');
				link.href = '#'; // Replace '#' with profile page link
				link.textContent = username;
				listItem.appendChild(link);
				menuItems.appendChild(listItem);
			} else {
				// If user is not logged in, display the login link
				const listItem = document.createElement('li');
				const link = document.createElement('a');
				link.href = 'login.html';
				link.textContent = 'Login';
				listItem.appendChild(link);
				menuItems.appendChild(listItem);
			}
		}

		// Call the function to update the menu when the page loads
		window.onload = updateMenu;
	</script>
</body>

</html>