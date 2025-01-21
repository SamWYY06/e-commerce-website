<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reach out</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
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
            height: 120vh;
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
            z-index: 1;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            z-index: 2;
            padding: 1rem;
        }

        .hero-content h1 {
            color: #e67e22;
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

        .container {
            margin-top: 150px; /* Adjust this value to match the height of your navigation bar */
            text-align: center; /* Center-align the text */
            background-color: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .feedback-form {
            margin: 2rem auto;
            max-width: 600px;
        }

        .feedback-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }

        .feedback-form input, .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .feedback-form button {
            background-color: #e67e22;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .feedback-form button:hover {
            background-color: #d35400;
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
            <div class="container">
                <h1>Sweet Crumbs Bakery | Feedback</h1>
            </div>

            <div class="container feedback-form">
                <form action="#" method="post">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>

                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>

                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>

                    <button type="submit">Submit Feedback</button>
                </form>
            </div>
        </div>
    </header>
</body>
</html>
