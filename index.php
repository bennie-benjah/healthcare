<?php
session_start();

// Function to check if user is authenticated
function isAuthenticated()
{
    return isset($_SESSION["authenticated"]);
}

// Function to log out the user
function logout()
{
    unset($_SESSION["authenticated"]);
}

// Check if the logout action is triggered
if (isset($_GET["logout"])) {
    logout();
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTH PLATFORM</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            max-width: 100px;
            /* Adjust as needed */
            height: auto;
        }

        nav ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-right: 20px;
        }

        .hero {
            text-align: center;
        }

        .about {
            text-align: center;
        }

        .about h2 {
            color: green;
        }

        .services {
            text-align: center;
        }

        .services h2 {
            margin-bottom: 20px;
        }

        .product-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product {
            text-align: center;
            margin: 20px;
        }

        footer {
            text-align: center;
        }

        .service form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .service form input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .service form button {
            padding: 10px 20px;

            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .search {
            margin-right: 20px;
        }

        .search form {
            display: flex;
            align-items: center;
        }

        .search input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .search button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .search button:hover {
            background-color: #45a049;
        }

        .crowd-sourcing {
            justify-content: center;
        }

        .crowd-sourcing p {
            text-align: center;
        }

        /* Style for contribution options, moderation tools, and rating review system */
        /* Center the contribution options, moderation tools, and rating review system */
        .contribution-options,
        .moderation-tools,
        .rating-review-system {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Style for contribution options, moderation tools, and rating review system forms */
        .contribution-options form,
        .moderation-tools form,
        .rating-review-system form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            width: 70%;
            /* Adjust width as needed */
        }

        /* Style for form inputs and textareas */
        .contribution-options input[type="text"],
        .contribution-options textarea,
        .moderation-tools input[type="text"],
        .moderation-tools textarea,
        .rating-review-system input[type="text"],
        .rating-review-system textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style for buttons */
        .contribution-options button,
        .moderation-tools button,
        .rating-review-system button {
            padding: 10px 20px;

            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .accessibility-inclusivity {
            text-align: center;
            padding: 50px 0;
        }

        .accessibility-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;

        }

        .accessibility-feature,
        .inclusivity-content,
        .localization-content {
            width: calc(100% / 3);
            padding: 20px;
        }

        .accessibility-feature,
        .inclusivity-content,
        .localization-content h3 {
            color: #4CAF50;
        }

        .accessibility-feature p,
        .inclusivity-content p,
        .localization-content p {
            font-size: 16px;
        }

        /* Additional styles can be added based on your design preferences */
    </style>
</head>

<body>

    <header>
        <div class="container">
            <div class="logo">
                <img src="Images\BENNIE.png" alt="Health Platform Logo">
            </div>

            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contacts">Contact</a></li>
                    <li><a href="<?php echo isAuthenticated() ? 'index.php?logout' : 'sign-in.html'; ?>"><?php echo isAuthenticated() ? 'Sign out' : 'Sign in'; ?></a></li>


                </ul>
            </nav>
            <div class="search">
                <input type="text" id="searchInput" placeholder="Search...">
                <button onclick="searchContent()">Search</button>
            </div>
            <div class="get-in-touch">
                <a href="mailto:mutisob78@gmail.com" class="cta-button">Get in Touch</a>

            </div>
        </div>
    </header>

    <section class="hero">
        <h1>Welcome to our Health Platform</h1>
        <p>Empowering you with sexual and reproductive health education and products.</p>
        <a href="sign-in.html" class="cta-button">Get Started</a>
    </section>
    <section id="about" class="about">
        <h2>About Us</h2>
        <h3>Mission</h3>
        <p>To deliver quality healthcare education and products</p>
        <h3>Vision</h3>
        <p>Our vision is to revolutionize access to comprehensive sexual and reproductive
            health services, empowering individuals to make informed choices, seek expert guidance, and access quality
            products conveniently.</p>
    </section>
    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="service">
            <h3>Consultation</h3>
            <p>Professional consultations for your health concerns.</p>
            <?php if (isAuthenticated()) : ?>
                <form action="PHP/consulation.php" method="POST">
                    <input type="text" name="consultation_text" placeholder="Consultation Text">
                    <input type="text" name="consultation_id" placeholder="Consultation ID">
                    <button type="submit" class="cta-button">Book Consultation</button>
                </form>

            <?php endif; ?>
        </div>
        <div class="service">
            <h3>Product Delivery</h3>
            <p>Convenient delivery of health products to your doorstep.</p>
            <?php if (isAuthenticated()) : ?>
                <form action="PHP/products.php" method="POST">
                    <input type="text" name="product_name" placeholder="Product Name">
                    <input type="text" name="product_id" placeholder="Product ID">
                    <button type="submit" class="cta-button">Order a Product</button>
                </form>

            <?php endif; ?>
        </div>
        <div class="service">
            <h3>Education</h3>
            <p>Access to informative resources on sexual and reproductive health.</p>
            <?php if (isAuthenticated()) : ?>
                <form action="PHP/education.php" method="POST">
                    <input type="text" name="material_id" placeholder="Material ID">
                    <input type="text" name="material_name" placeholder="Material Name">
                    <button type="submit" class="cta-button">Get Education Materials</button>
                </form>

            <?php endif; ?>
        </div>
    </section>

    <section id="products" class="products">
        <h2>Featured Products</h2>
        <div class="product-row">
            <div class="product">
                <img src="Images/periods.jpg" alt="Product 1">
                <h3>Period Pads</h3>
                <p style="text-align: justify">Our period pads offer superior comfort and protection during your menstrual cycle. With advanced absorbency technology, they keep you feeling fresh and confident all day long.</p>
            </div>
            <div class="product">
                <img src="Images/latex-condom.png" alt="Product 2">
                <h3>Latex Condoms</h3>
                <p style="text-align: justify">Experience safe and pleasurable intimacy with our high-quality latex condoms. Designed for reliability and comfort, they provide peace of mind without compromising sensation.</p>
            </div>
            <div class="product">
                <img src="Images/pregnancy-test.jpg" alt="Product 3">
                <h3>Pregnancy Test Kit</h3>
                <p style="text-align: justify">Quick and accurate, our pregnancy test delivers results you can trust in the comfort of your own home. With easy-to-follow instructions, you can gain clarity when you need it most.</p>
            </div>
            <div class="product">
                <img src="Images/disinfectant.jpg" alt="Product 4">
                <h3>Disifectant</h3>
                <p style="text-align: justify">Keep your surroundings clean and germ-free with our powerful disinfectant. From surfaces to objects, it effectively eliminates harmful bacteria and viruses, ensuring a healthy environment for you and your loved ones.</p>
            </div>
        </div>
    </section>
    <!-- Main Page Sections -->
    <?php if (isAuthenticated()) : ?>
    <!-- Crowd-Sourcing Mechanism Section -->
    <section id="crowd-sourcing" class="crowd-sourcing">
        <h2>Crowd-Sourcing Mechanism</h2>
        <p>Contribute and Share Sexual and Reproductive Health Information</p>

        <div class="contribution-options">
            <h3>Contribution Options</h3>

            <form action="submit_experience.php" method="POST">
                <textarea name="personal_experience" placeholder="Share your personal experience..." rows="4" cols="50"></textarea><br><br>
                <button type="submit" class="cta-button">Submit Experience</button>
            </form>
            <form action="submit_resource.php" method="POST">
                <input type="text" name="resource_title" placeholder="Resource Title">
                <textarea name="resource_description" placeholder="Description of the resource..." rows="4" cols="50"></textarea><br><br>
                <button type="submit" class="cta-button">Submit Resource</button>
            </form>
        </div>

        <div class="moderation-tools">
            <h3>Moderation Tools</h3>
            <p>Utilize moderation tools to ensure content accuracy and reliability.</p>
            <form action="moderation.php" method="POST">
                <input type="text" name="report_reason" placeholder="Reason for report">
                <textarea name="report_description" placeholder="Description of the issue..." rows="4" cols="50"></textarea><br><br>
                <button type="submit" class="cta-button">Report Content</button>
            </form>
        </div>

        <div class="rating-review-system">
            <h3>Rating and Review System</h3>
            <p>Participate in a rating and review system to evaluate products and services.</p>
            <form action="rate_product.php" method="POST">
                <input type="text" name="product_name" placeholder="Product Name">
                <textarea name="review_comment" placeholder="Your review..." rows="4" cols="50"></textarea><br><br>
                <input type="number" name="rating" placeholder="Rating (1-5)">
                <button type="submit" class="cta-button">Submit Review</button>
            </form>
        </div>
    </section>
    <?php endif; ?>

    
    <footer>

        <p>&copy; 2024 Health Platform. All rights reserved.</p>
    </footer>
    <script>
        function searchContent() {
            var input, filter, sections, section, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            sections = document.getElementsByTagName('section');

            for (i = 0; i < sections.length; i++) {
                section = sections[i];
                txtValue = section.textContent || section.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    section.style.display = "";
                } else {
                    section.style.display = "none";
                }
            }
        }
    </script>
</body>

</html>