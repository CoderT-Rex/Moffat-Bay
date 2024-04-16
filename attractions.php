<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Attractions at Moffat Bay Lodge</title>
</head>
<body>
    <div class="navbar d-flex justify-content-between bg-light sticky-top py-3">
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
    <div class="container bg-light">
        <div class="row spacer">
            <div class="col-12 px-5 text-center">
                <h1 class="color-primary underline-secondary">Attractions</h1>
            </div>
        </div>
        <div class="row pt-3 width-80">
            <section>
                <h2 class="color-primary">Hiking</h2>
                <p class="fs-24">Explore the stunning trails and scenic routes around Moffat Bay Lodge. Discover hidden waterfalls, lush forests, and breathtaking views. Book one of our guides for a tour that expounds on our Island's history in the Pig War of 1859, a border dispute between America and Great Britain. See herds of Alpacas and spot Black Tailed deer, or disconnect in the fragrance of one of our many lavender fields. Whether you want to ascend a small mountain or find an off the beaten path grove to meditate, you will find your needs fulfilled on Jovesida Island.</p>
            </section>
            <section>
                <h2 class="color-primary">Kayaking</h2>
                <p class="fs-24">Embark on a kayaking adventure and navigate through the serene waters surrounding Joviedsa Island. Enjoy the tranquility and beauty of the bay, and the wonder of the many creatures that surround you. You may spot Orcas, Harbor Seals, Bald Eagles, or River Otters while out on your journey! Paddle into one of the neighboring Islands for a drink and bite to eat at one of the many Island bars. Feel the relaxing rhythm of the water and wind in the air rock you into tranquility.</p>
            </section>
            <section>
                <h2 class="color-primary">Whale Watching</h2>
                <p class="fs-24">Witness the majestic whales in their natural habitat. Join our guided whale watching tours and create unforgettable memories. Our humpback whales migrate from Hawaii to enjoy our nutrient rich waters. There is nothing like seeing one of these 50 foot majestic creatures emerge proudly from the waves. Orcas have also been known to inhabit our waters. Our Sunset cruise features delicious cocktails and a tropical dinner menu.</p>
            </section>
            <section>
                <h2 class="color-primary">Scuba Diving</h2>
                <p class="fs-24">Dive into the crystal-clear waters and explore the vibrant marine life. Moffat Bay offers excellent scuba diving opportunities for beginners and experienced divers alike. Come see the vibrant patterns of Rockfish among our Island's reefs. Witness mysterious wolf eels weaving in and out in the ocean below, sometimes growing to be up to 7 feet long. Gaze at beautiful, flower-like Metridium Anemones and playful seals. Experience Octopuses and King Crabs up close. Whether this is your hundredth dive or your first, our guides and instructors will have something to offer you and give you the best possible experience.</p>
            </section>
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