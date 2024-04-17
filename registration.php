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
<title>Registration - Moffat Bay Lodge</title>
<style>
.password-requirements-popup {
	display: none;
	position: absolute;
	top: 100%;
	left: 0;
	width: 100%;
	padding: 10px;
	background-color: #fff;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	z-index: 999;
}

.password-requirements-popup p {
	margin: 0;
	font-size: 14px;
	color: #333;
}
</style>
</head>
<body>
	<div
		class="navbar d-flex justify-content-between bg-light sticky-top py-3">
		<div class="container">
			<div class="d-flex">
				<img class="main-logo" src="images/logo.png" alt="moffat Bay Lodge">
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
				<h1 class="color-primary underline-secondary">Registration</h1>
			</div>
		</div>
		<div class="row pt-3 width-80">
			<div class="col-12">
				<form id="registrationForm" action="register.php" method="post">
					<div class="mb-3">
						<label for="email" class="form-label">Email:</label> <input
							type="email" id="email" name="email" class="form-control"
							required>
					</div>
					<div class="mb-3">
						<label for="firstname" class="form-label">First Name:</label> <input
							type="text" id="firstname" name="firstname" class="form-control"
							required>
					</div>
					<div class="mb-3">
						<label for="lastname" class="form-label">Last Name:</label> <input
							type="text" id="lastname" name="lastname" class="form-control"
							required>
					</div>
					<div class="mb-3">
						<label for="telephone" class="form-label">10-Digit Telephone Number:</label> <input
							type="tel" id="telephone" name="telephone" class="form-control"
							pattern="[0-9]{10}" required>
					</div>
					<div class="mb-3 position-relative">
						<label for="password" class="form-label">Password:</label>
						<div id="errorMessage"></div>
						<input type="password" id="password" name="password"
							class="form-control" required>
						<div id="passwordRequirementsPopup"
							class="password-requirements-popup">
							<p>Passwords should be at least 8 characters in length and
								include one uppercase and one lowercase letter.</p>
						</div>
					</div>
					<div class="mb-3">
						<label for="confirm_password">Confirm Password:</label> <input
							type="password" id="confirm_password" name="confirm_password"
							class="form-control" required>
					</div>
					<button type="submit" class="btn btn-light">Register</button>
					<a href="login.php" class="btn btn-light">Already Registered?</a>
				</form>
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
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var telephone = document.getElementById('telephone').value;
            var messageDiv = document.getElementById('errorMessage');

            if (!password.match(/(?=.*[a-z])(?=.*[A-Z]).{8,}/)) {
                e.preventDefault();
                messageDiv.textContent = 'Password Must contain at least one uppercase and lowercase letter, and be 8 or more characters long.';
                messageDiv.style.color = 'red';
            } else if (password !== confirmPassword) {
                e.preventDefault();
                messageDiv.textContent = 'Passwords do not match.';
                messageDiv.style.color = 'red';
            } else if (!telephone.match(/^[0-9]{10}$/)) {
                e.preventDefault();
                messageDiv.textContent = 'Please enter a valid 10-digit phone number.';
                messageDiv.style.color = 'red';
            } else {
                messageDiv.textContent = '';

                e.preventDefault();

                var form = this;
                var formData = new FormData(form);

                fetch('register.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'email_exists') {
                        // Display the popup box for email already exists
                        alert('The email is already registered. Please use a different email.');
                    } else if (data.status === 'success') {
                        // Registration and authentication successful, redirect to success page
                        window.location.href = 'success.php';
                    } else {
                        // Handle other error scenarios
                        alert('An error occurred during registration. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during registration. Please try again.');
                });
            }
        });

        var passwordInput = document.getElementById('password');
        var passwordRequirementsPopup = document.getElementById('passwordRequirementsPopup');

        passwordInput.addEventListener('focus', function() {
            passwordRequirementsPopup.style.display = 'block';
        });

		passwordInput.addEventListener('blur', function() {
			passwordRequirementsPopup.style.display = 'none';
		});
    </script>
</body>
</html>