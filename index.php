<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Maffet Bay Lodge</title>
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
    <div class="container bg-light">
        <div class="row spacer">
            <div class="col-md-7 d-flex flex-column mt-auto mb-auto px-5">
                <h1 class="color-primary">Experience the Charm of Wilderness at Moffat Bay Lodge.</h1>

                <p class="intro-paragraph">Welcome to Moffat Bay Lodge, a serene haven nestled amidst the lush wilderness where the sky meets the sea, offering
                    a perfect blend of tranquility and adventure. Our exclusive lodge invites you to immerse yourself in the beauty of
                    nature, where each cabin promises a breathtaking view and a whisper of the ocean breeze. Here, every day is an
                    opportunity to explore pristine hiking trails, indulge in kayaking on crystal-clear waters, or simply relax and
                    rejuvenate in the comfort of our eco-friendly accommodations. Experience the warmth of our hospitality, savor the
                    local flavors at our on-site dining, and create memories that will last a lifetime. Moffat Bay Lodge is not just a
                    getaway; it's where your dream vacation becomes reality.</p>

                <div class="d-flex justify-content-center pt-2">
                    <form action="book.php" method="get">
    					<button type="submit" class="btn btn-lg btn-light mx-4">Book Now</button>
					</form>
                    <form action="target_page.php" method="get">
                    	<button class="btn btn-lg btn-light ">Learn More</button>
                    </form>
                </div>
            </div>

            <div class="col-md px-5">
                <img class="img-fluid" src="images/logo.png" alt="Maffet Bay Lodge">
            </div>
        </div>

        <div class="row spacer">
            <div class="col-12 px-5">
                <div class="quote-paragraph">
                    "From the moment we arrived at Moffat Bay Lodge, we were captivated by the breathtaking beauty of its surroundings. The
                    lodge itself is a masterpiece, blending seamlessly with the natural landscape, and our cabin was a haven of tranquility
                    with stunning views that seemed to change with the passing of each hour"
                </div>
            </div>
        </div>
        <div class="row spacer">
            <div class="col-12 px-5 text-center">
                <h2 class="color-primary underline-secondary">Our Accommodations</h2>
            </div>
        </div>
        <div class="row pt-3 width-80">
            <div class="col-md d-flex flex-column justify-content-center border-right-secondary">
                <h3 class="color-primary">Rustic Elegance Cabins</h3>
                <p class="fs-24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam quibusdam fuga porro vel maiores
                    ad praesentium laborum. Non sint sequi esse, doloremque placeat laboriosam eligendi ullam nobis illo quas
                    tempore.</p>
            </div>
            <div class="col-md">
                <div class="accomodations-img-wrapper">
                    <img src="images/lodge.png" alt="Cabin 1">
                </div>
            </div>
        </div>
        <div class="row pt-3 width-80">
            <div class="col-md d-flex flex-column justify-content-center order-2">
                <h3 class="color-primary">Mountain View Lodges</h3>
                <p class="fs-24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam quibusdam fuga porro vel
                    maiores
                    ad praesentium laborum. Non sint sequi esse, doloremque placeat laboriosam eligendi ullam nobis illo quas
                    tempore.</p>
            </div>
            <div class="col-md order-1">
                <div class="accomodations-img-wrapper">
                    <img src="images/lodge.png" alt="Cabin 1">
                </div>
            </div>
        </div>
        <div class="row pt-3 width-80">
            <div class="col-md d-flex flex-column justify-content-center border-right-secondary">
                <h3 class="color-primary">Lakeside Retreats</h3>
                <p class="fs-24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam quibusdam fuga porro vel
                    maiores
                    ad praesentium laborum. Non sint sequi esse, doloremque placeat laboriosam eligendi ullam nobis illo quas
                    tempore.</p>
            </div>
            <div class="col-md">
                <div class="accomodations-img-wrapper">
                    <img src="images/lodge.png" alt="Cabin 1">
                </div>
            </div>
        </div>
        <div class="row pt-3 width-80">
            <div class="col-md d-flex flex-column justify-content-center order-2">
                <h3 class="color-primary">Forest Hideaways</h3>
                <p class="fs-24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam quibusdam fuga porro vel
                    maiores
                    ad praesentium laborum. Non sint sequi esse, doloremque placeat laboriosam eligendi ullam nobis illo quas
                    tempore.</p>
            </div>
            <div class="col-md order-1">
                <div class="accomodations-img-wrapper">
                    <img src="images/lodge.png" alt="Cabin 1">
                </div>
            </div>
        </div>

        <div class="row spacer">
            <div class="col-12 px-5 text-center">
                <h2 class="color-primary underline-secondary">Our Attractions</h2>
            </div>
        </div>
        <div class="row pt-3">
            <div class="cold-md px-5">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Images/hero.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Luxurious Lodges</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, nemo minima aut molestias, qui dolor veniam ea magnam, magni sapiente dolorum praesentium exercitationem esse minus facilis? Quod, vel. Non, perspiciatis.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="Images/hero.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="Images/hero.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
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
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
     
</body>
</html>