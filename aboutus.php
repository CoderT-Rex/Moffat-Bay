<!DOCTYPE html>
<!--CSD460 - Red Team
Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
Professor Sue Sampson 
This page displays information about Moffat Lodge and how to contact
-->
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
	<div class="bg-light container">
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
				<h1 class="color-primary underline-secondary">What We Offer</h1>
			</div>
		</div>
		<div class="row pt-3 width-80">
			<div class="col-md-6 d-flex flex-column mt-auto mb-auto">
				<p class="fs-24">
					Our lodge offers a variety of cabins to suit your needs. Whether
					you are looking for a cozy cabin for two or a larger cabin for a
					family, we have you covered. Our cabins are equipped with modern
					amenities, including a kitchen, living room, and a private deck
					with a view of the bay. We also offer a variety of room types,
					including standard rooms, suites, and deluxe rooms. Our rooms are
					designed to provide you with the utmost comfort and relaxation
					during your stay. 
				</p>
			</div>
			<div class="col-md-6">
				<img src="images/cabins-about-us.jpeg" alt="Cabins at Moffat Bay Lodge"
					class="img-fluid rounded">
					<!-- 
						Src: https://stock.adobe.com/search/images?filters%5Bcontent_type%3Aphoto%5D=1&hide_panel=true&k=bay+lodge+cabins&search_type=recentsearch&asset_id=754073270
					 -->
			</div>
		</div>

		<div class="row pt-3 width-80 mt-5">
			<div class="col-md-6">
				<img src="images/scenic-view.jpeg" alt="Mountain View at Moffat Bay Lodge"
					class="img-fluid rounded">
					<!-- 
						Src: https://stock.adobe.com/search/images?filters%5Bcontent_type%3Aphoto%5D=1&filters%5Bcontent_type%3Aimage%5D=1&k=scenic+mountain+view&order=relevance&safe_search=1&limit=100&search_page=1&search_type=usertyped&acp=&aco=scenic+mountain+view&get_facets=0&asset_id=697336176					 
					-->
			</div>
			<div class="col-md-6 d-flex flex-column mt-auto mb-auto">
				<p class="fs-24">
					Our cabins are surrounded by scenic mountain views, providing a
					peaceful and tranquil setting for your stay. You can enjoy
					breathtaking sunsets from your private deck or take a leisurely
					stroll through our lush gardens. For those looking to explore the
					area, we offer a variety of outdoor activities, including hiking,
					biking, and fishing. Our lodge is also home to a variety of
					wildlife, including deer, eagles, and otters, making it the perfect
					destination for nature lovers. Whether you are looking for a
					relaxing getaway or an adventure-filled vacation, Moffat Bay Lodge
					has something for everyone.
				</p>
			</div>
		</div>

		<div class="row spacer">
			<div class="col-12 px-5 text-center">
				<h1 class="color-primary underline-secondary">Our Team</h1>
			</div>
		</div>
		<div class="row pt-3 width-80">
			<div class="col-md-3">
				<img src="images/Joshua.png" alt="Team Member 1"
				class="img-fluid rounded">
				<!-- 
					Src: From Joshua Rex on Discord
				 -->
			</div>
			<div class="col-md-9">
				<h3 class="fs-24">Joshua Rex</h3>
				<p class="fs-24">General Manager</p>
				<p>
					Joshua is the General Manager of Moffat Bay Lodge. He has over 20 years of experience in the hospitality industry and is dedicated to providing guests with an exceptional experience. Benjamin oversees all operations at the lodge and ensures that guests receive the highest level of service. He is passionate about creating a welcoming and relaxing environment for guests to enjoy.
				</p>
			</div>
		</div>

		<div class="row pt-3 width-80">
			<div class="col-md-3">
				<img src="images/Benjamin.jpg" alt="Team Member 2"
					class="img-fluid rounded">
				<!--
					Src: From Benjamin Andrew on Discord
				 -->
			</div>
			<div class="col-md-9">
				<h3 class="fs-24">Benjamin Andrew</h3>
				<p class="fs-24">Sales Manager</p>
				<p>
					Benjamin is the Sales Manager at Moffat Bay Lodge, where he brings over two decades of expertise in the hospitality industry to his role. Tasked with driving the lodge's sales efforts, Benjamin develops and implements strategies to enhance guest acquisition and retention. He is committed to ensuring that every visitor experiences top-tier service, and his passion for fostering a warm and inviting atmosphere is evident in his approach to guest relations. Under his leadership, the sales team is motivated to achieve excellence and exceed targets, further establishing the lodge as a premier destination.					
				</p>
			</div>
		</div>

		<div class="row pt-3 width-80">
			<div class="col-md-3">
				<img src="images/wyatt.jpg" alt="Team Member 3"
					class="img-fluid rounded">
				<!--
					Src: From Wyatt Hudgins on LinkedIn
				 -->
			</div>
			<div class="col-md-9">
				<h3 class="fs-24">Wyatt Hudgins</h3>
				<p class="fs-24">Team Member</p>
				<p>
					Wyatt is a key team member at Moffat Bay Lodge, boasting ten years of experience in maintaining the pristine condition of the lodge’s grounds. His role is crucial in managing the various landscapes that enhance the beauty and appeal of the property. Dedicated to upholding the highest standards of outdoor aesthetics, Wyatt ensures that all areas are well-kept and welcoming for guests. His expertise in groundskeeping contributes significantly to the overall guest experience, making Moffat Bay Lodge a visually enchanting retreat.
				</p>
			</div>
		</div>

		<div class="row pt-3 width-80">
			<div class="col-md-3">
				<img src="images/taylor.jpg" alt="Team Member 3"
					class="img-fluid rounded">
				<!--
					Src: From Taylor Nairn on Discord
				 -->
			</div>
			<div class="col-md-9">
				<h3 class="fs-24">Taylor Nairn</h3>
				<p class="fs-24">Head Chef</p>
				<p>
					Taylor is the Head Chef at the Moffat Bay Lodge restaurant, where he brings a decade of culinary expertise to the table. With ten years of experience in creating exquisite dishes, he is pivotal in defining the dining experience at the lodge. Taylor’s passion for gastronomy shines through in his innovative menus that highlight local ingredients and flavors. His leadership in the kitchen ensures that each meal is not just nourishing but a memorable part of the guests' stay at Moffat Bay. Taylor's commitment to culinary excellence helps set the lodge apart as a destination for both outstanding hospitality and exceptional dining.				</p>
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