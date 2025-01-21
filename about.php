<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-color: #fff8ec;
        }

        body {
            margin: 0;
            min-height: 100vh;
            width: 100%;
        }

        h1, h2 {
            font-family: 'Playfair Display', serif;
        }

        a {
            text-decoration: none;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 3rem;
            background: rgba(255, 255, 255, 0.8);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin: 0 0.5rem;
        }

        .nav-links a {
            color: #d35400;
            font-weight: 600;
            transition: color 0.3s, background-color 0.3s;
            padding: 0.25rem 0.75rem;
            border-radius: 5px;
        }

        .nav-links a:hover {
            color: white;
            background-color: #d35400;
        }

        .signup-btn {
            color: #ff4e50;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: 600;
            transition: background 0.3s, color 0.3s;
        }

        .signup-btn:hover {
            background: #ff4e50;
            color: white;
        }

        /* Hero Section */
        .hero-section {
            background: url('https://png.pngtree.com/thumb_back/fh260/background/20231230/pngtree-instagram-post-rustic-hand-drawn-texture-for-a-charming-bakery-shop-image_13883000.png') center/cover no-repeat;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .hero-content {
            z-index: 2;
            padding: 1rem;
        }

        .hero-content h1 {
            font-size: 3.5em;
            color: #e67e22;
            text-align: center;
        }

        .hero-content h2 {
            font-size: 2.5rem;
            margin: 0.5rem 0;
            color: #f39c12;
            font-style: italic;
        }

        .hero-content p {
            color: black;
            font-family: Times New Roman, serif;
            text-align: justify;
            margin: 1rem 0;
            font-size: 1.2rem;
        }

        .cta-button {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #e67e22;
            color: white;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            transition: background 0.3s;
        }

        .cta-button:hover {
            background: #d35400;
        }

        .logo {
            font-size: 1.5em;
            padding: 0 0 0 30px;
            color: #e67e22;
            font-weight: bold;
            font-style: italic;
            font-family: 'Playfair Display', serif;
            transition: transform .3s;
        }

        .logo a {
            color: inherit;
            text-decoration: none;
        }

        .logo:hover {
            transform: scale(1.2);
        }

        /* Product Boxes Section */
        .products-section {
            padding: 3rem 2rem;
            background-color: #fff;
            text-align: center;
            transition: ease-in;
        }

        .products-section h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #d35400;
        }

        .products-section h4 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            font-family: Times New Roman, serif;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }

        .product-box {
            background: #fff8ec;
            border: 2px solid #e67e22;
            border-radius: 10px;
            padding: 1.5rem;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .product-box.show {
            opacity: 1;
            transform: translateY(0);
        }

        .product-box:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product-box img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .product-box h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #d35400;
        }

        .product-box p {
            font-size: 1rem;
            color: #555;
        }

        .container {
            background-color: rgba(255, 253, 244, 0.85);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const boxes = document.querySelectorAll(".product-box");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        });

        boxes.forEach(box => observer.observe(box));
    });
</script>

</head>
<body>
<header class="hero-section">
        <nav class="navbar">
            <div class="logo"><a href="home.php">Sweet Crumbs Bakery</a></div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="reachout.php">Reach Out</a></li>
                <li><a href="login.php" class="signup-btn">Login</a></li>
                <li><a href="signup.php" class="signup-btn">Signup</a></li>
            </ul>
        </nav>
    <header class = "container">
        <div class = "hero-content">
        <h1>About Us</h1>
        <p>Sweet Crumbs Bakery was established in 2010 by Jane and Michael Carter, a husband-and-wife team with a shared passion for baking. Inspired by cherished family recipes passed down through generations, they turned their love for baking into a community staple. What started as a small, cozy bakery in the heart of town has grown into a beloved gathering place for friends and families.</p>
        <p>At Sweet Crumbs Bakery, we specialize in crafting a wide variety of breads, pastries, and cakes made from the finest, locally-sourced ingredients. From Jane’s delicate pastries to Michael’s hearty sourdough loaves, every creation is a blend of tradition, artistry, and innovative flavors. </p>
        <p>Our signature treats, like indulgent chocolate croissants and rustic sourdough bread, reflect our commitment to quality and freshness. Whether you’re celebrating a special occasion or simply treating yourself, Sweet Crumbs Bakery is here to make every moment delicious. </p>
        <p>Stop by and experience the warmth and joy of homemade goodness—straight from our ovens to your heart!</p>
        </div> 
    </header> 
</header>

    <section class="products-section">
        <h2>Our Offerings</h2>
        <div class="product-container">
            <div class="product-box">
                <img src="https://thumbs.dreamstime.com/b/bread-6894025.jpg" alt="Bread">
                <h3>Breads</h3>
                <p>Freshly baked artisan breads, sourdough loaves, and more.</p>
            </div>
            <div class="product-box">
                <img src="https://insanelygoodrecipes.com/wp-content/uploads/2022/08/Mixed-Breads-in-Basket-and-Wooden-Cutting-Board.jpg" alt="Cakes">
                <h3>Cakes</h3>
                <p>Delicious custom cakes for every occasion.</p>
            </div>
            <div class="product-box">
                <img src="https://media.istockphoto.com/id/469380314/photo/selection-of-french-danish-pastries-on-a-wicker-basket.jpg?s=612x612&w=0&k=20&c=9lSuMSLu1GpHv5pXSxmBeeEwXmJCV2FOsnq-2_69oOc=" alt="Pastries">
                <h3>Pastries</h3>
                <p>Flaky, buttery pastries that melt in your mouth.</p>
            </div>
            <div class="product-box">
                <img src="https://t4.ftcdn.net/jpg/00/96/25/47/360_F_96254713_5tNAaUXMLKRUwk5XpYzYKWSqWUFXUcfP.jpg" alt="Cookies">
                <h3>Cookies</h3>
                <p>Crunchy, chewy, and absolutely irresistible.</p>
            </div>
        </div>
    </section>

    <section class="products-section">
        <h2>Meet Our Team</h2>
        <h4>We're Highly Skilled Experts In Our Craft.</h4>
        <div class="product-container">
            <div class="product-box">
                <img src="https://static.vecteezy.com/system/resources/previews/039/939/860/non_2x/ai-generated-cheerful-male-pastry-chef-standing-with-arms-crossed-in-bakery-shop-photo.jpg" alt="Chef1">
                <h3>Name</h3>
                <p>Designation</p>
            </div>
            <div class="product-box">
                <img src="https://static.vecteezy.com/system/resources/previews/042/392/143/non_2x/ai-generated-young-professional-male-baker-holding-tray-with-buns-in-large-modern-bakery-photo.jpg" alt="Chef2">
                <h3>Name</h3>
                <p>Designation</p>
            </div>
            <div class="product-box">
                <img src="https://t3.ftcdn.net/jpg/06/12/10/12/360_F_612101268_tdgxpLPS3tNullZYWI7CbL9KeezwQaDB.jpg" alt="Chef3">
                <h3>Name</h3>
                <p>Designation</p>
            </div>
            <div class="product-box">
                <img src="https://t4.ftcdn.net/jpg/06/91/42/63/360_F_691426372_cor752LNzSpBgWQUggyJdZkM4pSRcN47.jpg" alt="Chef4">
                <h3>Name</h3>
                <p>Designation</p>
            </div>
        </div>
    </section>
</body>
</html>
