<!DOCTYPE html>
<!--CSD460 - Red Team
Joshua Rex, Taylor Nairn, Benjamin Andrew, Wyatt Hudgins
Professor Sue Sampson 
This code displays the landing page for the user
-->
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	<title>Moffat Bay Lodge</title>
</head>

<body>
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

	<main>
		<div class="banner">
			<img src="images/landing_header.jpg" alt="Image">
			<div class="banner-overlay">
				<div class="banner-text">
					<h1>Adventure Starts Here</h1>
				</div>
			</div>
		</div>
		<div class="container bg-light">
			<div class="row spacer">
				<div class="col-md-7 d-flex flex-column mt-auto mb-auto px-5">
					<h1 class="color-primary">Experience the Charm of Wilderness at
						Moffat Bay Lodge.</h1>

					<p class="intro-paragraph">Welcome to Moffat Bay Lodge, a serene
						haven nestled amidst the lush wilderness where the sky meets the
						sea, offering a perfect blend of tranquility and adventure. Our
						exclusive lodge invites you to immerse yourself in the beauty of
						nature, where each cabin promises a breathtaking view and a
						whisper of the ocean breeze. Here, every day is an opportunity to
						explore pristine hiking trails, indulge in kayaking on
						crystal-clear waters, or simply relax and rejuvenate in the
						comfort of our eco-friendly accommodations. Experience the warmth
						of our hospitality, savor the local flavors at our on-site dining,
						and create memories that will last a lifetime. Moffat Bay Lodge is
						not just a getaway; it's where your dream vacation becomes
						reality.</p>

					<div class="d-flex justify-content-center pt-2">
						<a href="book.php" class="btn btn-lg btn-light mx-4">Book Now</a>
						<a href="aboutus.php" class="btn btn-lg btn-light">Learn More</a>
					</div>
				</div>

				<div class="col-md px-5">
					<img class="img-fluid border-radius" src="images/san-juan.jpg" alt="Cabin by the Lake">
					<!-- Massello, B. (2021, June 13). a light house sitting on top of a cliff next to the ocean. Unsplash. 
					   https://unsplash.com/photos/a-light-house-sitting-on-top-of-a-cliff-next-to-the-ocean-EVEtQ2H5Vk8 -->
				</div>
			</div>

			<div class="row spacer">
				<div class="col-12 px-5">
					<div class="quote-paragraph">"From the moment we arrived at Moffat
						Bay Lodge, we were captivated by the breathtaking beauty of its
						surroundings. The lodge itself is a masterpiece, blending
						seamlessly with the natural landscape, and our cabin was a haven
						of tranquility with stunning views that seemed to change with the
						passing of each hour"</div>
				</div>
			</div>
			<div class="row spacer">
				<div class="col-12 px-5 text-center">
					<h2 class="color-primary underline-secondary">Our Attractions</h2>
				</div>
			</div>
			<div class="row pt-3 width-80">
				<div class="col-md d-flex flex-column justify-content-center border-right-secondary">
					<h3 class="color-primary">Rustic, Elegant Cabins</h3>
					<p class="fs-24">Inside the Rustic Elegance Cabins, a world of
						warm, inviting comfort awaits. Each cabin is a masterpiece of
						design, where traditional log walls and exposed wooden beams meet
						modern luxuries. Plush furnishings nestle against the glow of a
						stone fireplace, casting a cozy ambiance over the open living
						space. The kitchens are fully equipped with state-of-the-art
						appliances, seamlessly blending functionality with rustic charm.
						In the bedrooms, soft linens drape over comfortable beds, offering
						views of the surrounding wilderness through large, picturesque
						windows. Every detail, from the handcrafted decor to the subtle
						integration of modern conveniences, has been thoughtfully curated
						to ensure guests enjoy a serene and luxurious retreat amidst the
						beauty of nature.</p>
				</div>
				<div class="col-md">
					<div class="accomodations-img-wrapper">
						<img src="images/lodge.png" alt="mountain-lodge">
						<!-- 
							Image by: ChatGPT
							Source: ChatGPT
							Prompt: Create a serene image of a mountain lodge, nestled in the woods. The lodge should be surrounded by tall trees and have a cozy, inviting feel. The image should evoke a sense of peace and tranquility.
							Date: 2024-04-01
						 -->
					</div>
				</div>
			</div>
			<div class="row pt-3 width-80">
				<div class="col-md d-flex flex-column justify-content-center order-2">
					<h3 class="color-primary">Mountain View Lodges</h3>
					<p class="fs-24">Nestled amidst the serene beauty of mountain
						landscapes, the Moffat Bat Lodge offers a unique retreat for
						nature enthusiasts and adventurers alike. This charming sanctuary,
						renowned for its proximity to the enchanting bat caves, blends
						rustic elegance with the tranquility of its natural surroundings.</p>
				</div>
				<div class="col-md order-1">
					<div class="accomodations-img-wrapper">
						<img src="images/mountaincabin.jpg" alt="mountain view lodge">
						<!-- 
							Dean, A. (2023, February 21). Download the Beautiful Log Cabin Exterior 16431702 royalty-free Stock Photo 
								from Vecteezy for your project an. . . Vecteezy. https://www.vecteezy.com/photo/16431702-beautiful-log-cabin-exterior
						 -->
					</div>
				</div>
			</div>
			<div class="row pt-3 width-80">
				<div class="col-md d-flex flex-column justify-content-center border-right-secondary">
					<h3 class="color-primary">Lakeside Retreats</h3>
					<p class="fs-24">Perched at the water's edge with a majestic
						mountain backdrop, the Bayview Seafood Restaurant presents an
						unparalleled dining experience for culinary explorers and nature
						lovers. This exquisite haven, celebrated for its fresh ocean
						bounty, marries the simplicity of the sea with the grandeur of the
						mountains. Its discreet elegance and peaceful setting provide a
						sanctuary where the rhythm of the waves complements the gourmet
						delights, inviting diners into a world where every meal is a
						journey through the richness of nature's offerings.</p>
				</div>
				<div class="col-md">
					<div class="accomodations-img-wrapper">
						<img src="images/restaurant.png" alt="restaurant">
						<!-- 
							Image by: ChatGPT
							Source: ChatGPT
							Prompt: Create an image of a lakeside retreat, with a restaurant overlooking a serene lake. The restaurant should have a cozy, inviting feel and evoke a sense of peace and tranquility.
							Date: 2024-04-01
						 -->
					</div>
				</div>
			</div>
			<div class="row pt-3 width-80">
				<div class="col-md d-flex flex-column justify-content-center order-2">
					<h3 class="color-primary">Hiking Trails</h3>
					<p class="fs-24">Immersed in the vibrant hues of mountain greenery,
						the Trailblazer's Path provides an idyllic setting for hikers and
						nature lovers. This inviting trail, celebrated for its lush
						forests and gentle slopes, marries the thrill of exploration with
						the peace of the great outdoors. As hikers navigate the winding
						paths, they are enveloped in the beauty of nature, creating a
						perfect harmony between adventure and serenity.</p>
				</div>
				<div class="col-md order-1">
					<div class="accomodations-img-wrapper">
						<img src="images/hiking.jpg" alt="mountain hike">
						<!-- 
						  Førestbird, J. &. J. (2018, August 2). person hiking above mountain overlooking river. Unsplash. 
							https://unsplash.com/photos/person-hiking-above-mountain-overlooking-river-znoL1m6MD_k
						 -->
					</div>
				</div>
			</div>

			<div class="row spacer">
				<div class="col-12 px-5 text-center">
					<h2 class="color-primary underline-secondary">Our Rooms</h2>
				</div>
				<div class="row pt-3">
					<div class="cold-md px-5 pb-5">
						<div id="carouselExampleCaptions" class="carousel slide">
							<div class="carousel-indicators">
								<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
									class="active" aria-current="true" aria-label="Slide 1"></button>
								<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
									aria-label="Slide 2"></button>
								<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
									aria-label="Slide 3"></button>
							</div>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="images/queen-bed.png" class="d-block w-100" alt="...">
									<!-- Image by: ChatGPT 
									Source: ChatGPT 
									Prompt: Create an image of a queen bed, framed with rich, natural wood and topped with luxurious, plush bedding. The bed should be set against a serene, elegant backdrop and evoke a sense of comfort and relaxation. 
									Date: 2024-04-01-->

									<div class="carousel-caption d-none d-md-block">
										<div class="caption-background">
    										<h5 class="text-shadow-lg">Queen Beds</h5>
    										<p class="text-shadow-lg">Our Queen bed rooms come equipped satelite TV,
    											microwave, mini fridge, free Starlink internet, complimentary warm towels,
    											and toiletries.</p>
    									</div>
									</div>
								</div>
								<div class="carousel-item">
									<img src="images/kingbed.png" class="d-block w-100" alt="...">
									<!-- Image by: Openart.ai
									 Prompt: king bed in a luxury cabin 
									 Date/Time: 4/12/2024 at 1500 EST
									  -->
									<div class="carousel-caption d-none d-md-block">
										<div class="caption-background">
											<h5 class="text-shadow-lg">King Beds</h5>
    										<p class="text-shadow-lg">Experience the ultimate in comfort and luxury with our
    											spacious king sized suites. Each suite comes equipped with a full kitchen,
    											satelite TV, free Starlink internet, complimentary warm towels, and
    											toiletries.</p>
    									</div>
									</div>
								</div>
								<div class="carousel-item">
									<img src="images/twinbed.png" class="d-block w-100" alt="...">
									<!--Staton, D. (2022, January 29). a bed in a bedroom next to a window. Unsplash. 
									   https://unsplash.com/photos/a-bed-in-a-bedroom-next-to-a-window-WZ_stj4GWoU -->
									<div class="carousel-caption d-none d-md-block">
										<div class="caption-background">
    										<h5 class="text-shadow-lg">Twin Beds</h5>
    										<p class="text-shadow-lg">Our cozy twin bed lofts offer all the necessities
    											while you explore the outdoors. Each room has a microwave, free Starlink
    											internet, towels, and toiletries.</p>
    									</div>
									</div>
								</div>
								<button class="carousel-control-prev" type="button"
									data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button"
									data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="text-light pb-2">
			<div class="row width-80">
				<!-- Footer logo and description -->
				<div class="col-md-4 mb-3 ps-5">
					<img src="images/logo.png" alt="Moffat Bay Lodge" class="footer-logo mb-2">
					<!-- 
						Image by: ChatGPT
						Source: ChatGPT
						Prompt: Create a logo for a lodge named "moffat Bay Lodge." The logo should feature a serene, nature-inspired design with a color palette that evokes tranquility and elegance.
						Date: 2024-04-01
					-->
					<small class="d-block mb-3">&copy; 2024 Moffat Bay Lodge. All
						rights reserved.</small>
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
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>

</body>

</html>