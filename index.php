<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complete responsive tour and travel agency website</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- header section start  -->
  <?php session_start(); ?>
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>Global</span>Getaways</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">Book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <!-- <i class="fas fa-user" id="login-btn"></i> -->
       <?php
        // Show user name + logout if logged in
        if(isset($_SESSION['user_name'])) {
            echo '<span class="user-name">Hello, ' . htmlspecialchars($_SESSION['user_name']) . '</span>';
            echo ' <a href="logout.php" class="logout-link">Logout</a>';
        } else {
            echo '<i class="fas fa-user" id="login-btn"></i>';
        }
        ?>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here..." />
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>

    <!-- header section ends -->

    <!-- login form container  -->

    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>

        <form id="login-form" action="login.php" method="POST">
            <!--cng  -->
            <h3>login</h3>
            <input type="email" name="email" class="box" placeholder="enter your email" />
            <!--cng  -->
            <input type="password" name="password" class="box" placeholder="enter your password" />
            <!--cng  -->
            <input type="submit" value="login now" class="btn" />
            <input type="checkbox" id="remember" />
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>
                don't have an account? <a href="#" id="show-register">register now</a>
            </p>
        </form>

        <form id="register-form" action="register.php" method="POST" style="display: none">
            <h3>Register</h3>
            <input type="text" name="name" class="box" placeholder="Enter your name" required />
            <input type="email" name="email" class="box" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            <input type="password" name="password" class="box" placeholder="Enter your password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$"  title="Password must be at least 8 characters long, include uppercase, lowercase, number and special character.">

            <input type="submit" value="Register now" class="btn" />
            <p>
                Already have an account? <a href="#" id="show-login">Login now</a>
            </p>
        </form>
    </div>


    <div>
        <!-- home section starts -->
        <section class="home" id="home">
            <div class="content">
                <h3>Explore Beyond Horizons</h3>
                <p>
                    Wander the world, embrace the sky,<br />
                    Chase the sunsets as days pass by.<br />
                    Mountains call and rivers flow,<br />
                    Everywhere you go, new stories grow.
                </p>
                <a href="#packages" class="btn">Discover More</a>
            </div>
            <div class="controls">
                <span class="vid-btn active" data-src="images/video-8.mp4"></span>
                <span class="vid-btn" data-src="images/video-2.mp4"></span>
                <span class="vid-btn" data-src="images/video-7.mp4"></span>
                <span class="vid-btn" data-src="images/video-6.mp4"></span>
                <span class="vid-btn" data-src="images/video-4.mp4"></span>
            </div>

            <div class="video-container">
                <video src="images/video-8.mp4" id="video-slider" loop autoplay muted></video>
            </div>
        </section>

        <!-- home section ends-->

        <!-- book session starts -->
        <section class="book" id="book">
            <h1 class="heading">
                <span>b</span>
                <span>o</span>
                <span>o</span>
                <span>k</span>
                <span class="space"></span>
                <span>n</span>
                <span>o</span>
                <span>w</span>
            </h1>

            <div class="row">
                <div class="image">
                    <img src="images/logo2.jpg" alt="" />
                </div>
                <!-- form starts -->
                <form id="bookingForm">
                    <div class="inputBox">
                        <h3>where to</h3>
                        <input type="text" placeholder="place name" name="placename" />
                    </div>
                    <div class="inputBox">
                        <h3>how many</h3>
                        <input type="number" placeholder="number of guests" name="guests" />
                    </div>
                    <div class="inputBox">
                        <h3>arrivals</h3>
                        <input type="date" name="arrDate" />
                    </div>
                    <div class="inputBox">
                        <h3>leavings</h3>
                        <input type="date" name="deptDate" />
                    </div>
                    <input type="submit" class="btn" value="book now" />
                             
                </form>
                <!-- form ends -->
            </div>
        </section>
        <!-- book session ends -->
        <!-- package section starts -->
        <section class="packages" id="packages">
            <h1 class="heading">
                <span>p</span>
                <span>a</span>
                <span>c</span>
                <span>k</span>
                <span>a</span>
                <span>g</span>
                <span>e</span>
                <span>s</span>
            </h1>

            <div class="box-container">
                <div class="box" id="bali">
                    <img src="images/Bali.webp" alt="" />
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"> Bali,Indonesia</i></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                            omnis.
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$90.00<span>$120.00</span></div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>

                <div class="box" id="agra">
                    <img src="images/Agra.jpg" alt="" />
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"> Lal-kila ,Agra</i></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                            omnis.
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$90.00<span>$120.00</span></div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>

                <div class="box" id="saint-martin">
                    <img src="images/saint-martin.webp" alt="" />
                    <div class="content">
                        <h3>
                            <i class="fas fa-map-marker-alt"> Saint Martin , Cox's Bazar</i>
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                            omnis.
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$90.00<span>$120.00</span></div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>

                <div class="box" id="brazil">
                    <img src="images/Amazon.avif" alt="" />
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"> Brazil</i></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                            omnis.
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$90.00<span>$120.00</span></div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>

                <div class="box" id="egypt">
                    <img src="images/Giza.jpg" alt="" />
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"> Egypt</i></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                            omnis.
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$90.00<span>$120.00</span></div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>

                <div class="box" id="venice">
                    <img src="images/Venice.jpeg" alt="" />
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"> Venice, Italy</i></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
                            omnis.
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">$90.00<span>$120.00</span></div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- package section ends -->

        <!-- service section starts -->
        <section class="services" id="services">
            <h1 class="heading">
                <span>s</span>
                <span>e</span>
                <span>r</span>
                <span>v</span>
                <span>i</span>
                <span>c</span>
                <span>e</span>
                <span>s</span>
            </h1>

            <div class="box-container">
                <div class="box">
                    <i class="fas fa-hotel"></i>
                    <h3>affordable hotels</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        nobis totam incidunt omnis officiis, at officia?
                    </p>
                </div>
                <div class="box">
                    <i class="fas fa-utensils"></i>
                    <h3>food and drinks</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        nobis totam incidunt omnis officiis, at officia?
                    </p>
                </div>
                <div class="box">
                    <i class="fas fa-bullhorn"></i>
                    <h3>safety guide</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        nobis totam incidunt omnis officiis, at officia?
                    </p>
                </div>
                <div class="box">
                    <i class="fas fa-globe-asia"></i>
                    <h3>around the world</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        nobis totam incidunt omnis officiis, at officia?
                    </p>
                </div>
                <div class="box">
                    <i class="fas fa-plane"></i>
                    <h3>fastest travels</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        nobis totam incidunt omnis officiis, at officia?
                    </p>
                </div>
                <div class="box">
                    <i class="fas fa-hiking"></i>
                    <h3>adventures</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        nobis totam incidunt omnis officiis, at officia?
                    </p>
                </div>
            </div>
        </section>
        <!-- service section ends -->

        <!-- gallery section starts -->
        <section class="gallery" id="gallery">
            <h1 class="heading">
                <span>g</span>
                <span>a</span>
                <span>l</span>
                <span>l</span>
                <span>e</span>
                <span>r</span>
                <span>y</span>
            </h1>
            <div class="box-container">
                <div class="box">
                    <img src="images/g1.jpg" alt="" />
                    <div class="content">
                        <h3>Alpine Paradise</h3>
                        <p>
                            Stunning snow-capped mountains, crystal-clear lakes, and
                            charming villages make Switzerland a dream destination for
                            nature lovers.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g2.jpg" alt="" />
                    <div class="content">
                        <h3>Cultural Crossroads</h3>
                        <p>
                            A blend of East and West, Turkey offers historic mosques,
                            bustling bazaars, and breathtaking coastal landscapes.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g3.jpg" alt="" />
                    <div class="content">
                        <h3>Tropical Escape</h3>
                        <p>
                            White sandy beaches, turquoise waters, and luxurious overwater
                            villas create a serene getaway for relaxation.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g4.jpeg" alt="" />
                    <div class="content">
                        <h3>Arctic Wonder</h3>
                        <p>
                            Towering icebergs, vast glaciers, and unique Inuit culture
                            highlight the beauty of this untouched wilderness.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g5.jpg" alt="" />
                    <div class="content">
                        <h3>Imperial Grandeur</h3>
                        <p>
                            Famous for the Kremlin, Red Square, and vibrant culture, Moscow
                            reflects Russia’s rich history and modern spirit.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g6.jpg" alt="" />
                    <div class="content">
                        <h3>Romantic Charm</h3>
                        <p>
                            The Eiffel Tower, world-class art, and cozy cafés make Paris the
                            city of love and style.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g7.jpg" alt="" />
                    <div class="content">
                        <h3>Diverse Heritage</h3>
                        <p>
                            From the Taj Mahal to colorful festivals, India offers spiritual
                            depth, cultural richness, and endless variety.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g8.jpg" alt="" />
                    <div class="content">
                        <h3>Hill Tranquility</h3>
                        <p>
                            Nestled in lush hills of Bangladesh, Bandarban captivates with
                            waterfalls, tribal culture, and peaceful natural beauty.
                        </p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/g9.jpg" alt="" />
                    <div class="content">
                        <h3>Comfortable Journey</h3>
                        <p>Experienced a smooth,calm journey of 16 hours!</p>
                        <a href="#" class="btn">See More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- gallery section ends -->

        <!-- review section starts -->
        <section class="review" id="review">
            <h1 class="heading">
                <span>r</span>
                <span>e</span>
                <span>v</span>
                <span>i</span>
                <span>e</span>
                <span>w</span>
            </h1>
            <div class="swiper review-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="box">
                            <img src="images/pc1.jpg" alt="" />
                            <h3>Ahnaf Hossain</h3>
                            <p>
                                The website made planning effortless! Clear itineraries, great
                                discounts, and reliable recommendations turned our trip into
                                one of the best experiences we’ve ever had.
                            </p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="box">
                            <img src="images/pc2.webp" alt="" />
                            <h3>Armin Rahman</h3>
                            <p>
                                Outstanding platform for travelers! From flight deals to hotel
                                bookings, everything worked smoothly. I especially appreciated
                                the quick customer support and detailed travel guides
                                provided.
                            </p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <img src="images/pc3.jpg" alt="" />
                            <h3>Richard Mikes</h3>
                            <p>
                                I loved using this website—it’s simple, affordable, and packed
                                with amazing packages. Our family vacation became memorable
                                because everything was perfectly organized and stress-free.
                            </p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <img src="images/pc4.jpg" alt="" />
                            <h3>Faria Nowrin</h3>
                            <p>
                                Great experience overall! The interface was user-friendly, and
                                the suggestions for hidden gems made our journey
                                unforgettable. I’ll definitely recommend this website to all
                                travelers.
                            </p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- review section ends -->

        <!-- contact section starts  -->
        <section class="contact" id="contact">
            <h1 class="heading">
                <span>c</span>
                <span>o</span>
                <span>n</span>
                <span>t</span>
                <span>a</span>
                <span>c</span>
                <span>t</span>
            </h1>
            <div class="row">
                <div class="image">
                    <img src="images/pg1.jpg" alt="" />
                </div>

                <form action="contact_process.php" method="POST">
    <div class="inputBox">
        <input type="text" name="name" placeholder="name" required />
        <input type="email" name="email" placeholder="email" required />
    </div>

    <div class="inputBox">
        <input type="number" name="number" placeholder="number" required />
        <input type="text" name="subject" placeholder="subject" required />
    </div>

    <textarea name="message" placeholder="message" cols="30" rows="10" required></textarea>

    <input type="submit" class="btn" value="send message" />
</form>
            </div>
        </section>
        <!-- contact section ends  -->

        <!-- brand section  -->
        <section class="brand-container">
            <div class="swiper brand-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="images/c1.png" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c2.jpg" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c3.avif" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c4.png" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c6.png" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c7.png" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c8.png" alt="" /></div>
                    <div class="swiper-slide"><img src="images/c9.png" alt="" /></div>
                </div>
            </div>
        </section>

        <!-- footer section -->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>About us</h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Obcaecati voluptate rerum, maxime fugiat impedit quasi ea.
                        Blanditiis, tempore veniam? Asperiores.
                    </p>
                </div>

                <div class="box">
                    <h3>Branch locations</h3>
                    <a href="#">India</a>
                    <a href="#">USA</a>
                    <a href="#">Japan</a>
                    <a href="#">France</a>
                </div>

                <div class="box">
                    <h3>Quick links</h3>
                    <a href="#">home</a>
                    <a href="#">book</a>
                    <a href="#">packages</a>
                    <a href="#">services</a>
                    <a href="#">gallery</a>
                    <a href="#">review</a>
                    <a href="#">contact</a>
                </div>

                <div class="box">
                    <h3>Follow us</h3>
                    <a href="#">facebook</a>
                    <a href="#">instagram</a>
                    <a href="#">twitter</a>
                    <a href="#">linkedin</a>
                </div>
            </div>

            <h1 class="credit">
                created by <span>Aafifa, Priota and Zarin</span> | all rights reserved!
            </h1>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>
</body>

</html>