<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            overflow-x: hidden; /* Prevent horizontal scrolling */
            margin: 0;
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-color: #fff8ec;
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
            font-size: 4rem;
            margin: 0;
        }

        .hero-content h2 {
            font-size: 2.5rem;
            margin: 0.5rem 0;
            color: #f39c12;
            font-style: italic;
        }

        .hero-content p {
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

        .moving-text {
            white-space: nowrap;
            overflow: hidden; /* Prevent overflow */
            position: relative;
            max-width: 100%;
        }

        .moving-text h3 {
            animation: moveLeft 10s linear infinite;
            display: inline-block;
        }

        @keyframes moveLeft {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        h3, h4 {
            font-family: Times New Roman, serif;
        }
    </style>
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
        <div class="hero-content">
            <h1>The Finest Bakes, Every Day</h1>
            <h2>Crafting Baked Perfection</h2>
            <p>Freshly baked delights made with care, just for you.</p>
            <a href="about.php" class="cta-button">Read More</a>

            <div class="moving-text">
                <h3>"It's all about a balancing act between time, temperature, and ingredients: That's the art of baking." -Peter Reinhart</h3>
            </div>
        </div>
    </header>

</body>
</html>
