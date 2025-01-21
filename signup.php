<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = "";
$username_value = "";
$email_value = "";
$phonenum_value = "";
$address_value = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenum = mysqli_real_escape_string($conn, $_POST['phonenum']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //Store values to repopulate the form
    $username_value = $username;
    $email_value = $email;
    $phonenum_value = $phonenum;
    $address_value = $address;

    //Validation
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $error = "Username can only contain letters, numbers, and underscores!";
    }
    else if (!preg_match("/^\d{10}$/", $phonenum)) {
        $error = "Invalid phone number format!";
    }
    /*(else if (!preg_match("/^\d{5},\s?[A-Za-z\s]+,\s?[A-Za-z\s]+,\s?\d{5}$/", $address)) {
    //    $error = "Address must be in the format of (XX, Street Name, City Name, XXXXX)";
    }*/
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    }
    else if (strlen($password) < 8 || strlen($password) > 16) {
        $error = "Password must be between 8 and 16 characters!";
    }
    else if ($password !== $cpassword) {
        $error = "Passwords do not match! Please try again.";
    }
    else {
        //Check for existing username
        $check_username = "SELECT username FROM users where username = ?";
        $stmt = mysqli_prepare($conn, $check_username);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                $error = "Username already exists";
            }
            else {
                //Insert new user
                $sql = "INSERT into users (username, email, phonenum, address, password) VALUES (?, ?, ?, ?, ?)";
                $insert_stmt = mysqli_prepare($conn, $sql);

                if ($insert_stmt) {
                    mysqli_stmt_bind_param($insert_stmt, "sssss", $username, $email, $phonenum, $address, $password);
                
                    if (mysqli_stmt_execute($insert_stmt)) {
                        $_SESSION['registration_success'] = true;
                        header("Location: login.php");
                        exit();
                    }
                    else {
                        $error = "Error creating account: " . mysqli_error($conn);
                    }
                }
                else {
                    $erorr = "Error preparing statement: " . mysqli_error($conn);
                }
            }
        }
        else {
            $error = "Error checking username: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Sweet Crumbs Bakery</title>

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Times New Roman, serif;
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://png.pngtree.com/thumb_back/fh260/background/20231230/pngtree-instagram-post-rustic-hand-drawn-texture-for-a-charming-bakery-shop-image_13883000.png') center/cover no-repeat;
    background-size: cover;
    margin: 0;
    padding: 0;
}

.page-container {
    display: flex;
    min-height: 100vh;
    justify-content: flex-end;
    align-items: center;
    padding: 40px;
}

.welcome-text {
    position: absolute;
    left: 5%;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    max-width: 500px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.welcome-text h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
}

.welcome-text p {
    font-size: 1.2rem;
    line-height: 1.6;
    opacity: 0.9;
}

.login-container {
    background-color: rgba(255, 255, 255, 0.95);
    padding: 60px;
    margin: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 500px;
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
            from {
                transform: translateX(100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

h2 {
    color: #333;
    margin-bottom: 10px;
    text-align: center;
    font-size: 2rem;
    font-weight: 600;
}

.form-group {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
}

input {
    width: 100%;
    padding: 12px;
    border: 2px solid #e1e1e1;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
    outline: none;
}

input:focus {
    border-color: #d35400;
}

button {
    width: 100%;
    padding: 14px;
    background-color: #d35400;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #dc3545;
}

.error {
    color: #dc3545;
    background-color: #ffe6e6;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 20px;
    text-align: center;
    font-size: 0.9rem;
}

.signup-link {
    text-align: center;
    margin-top: 1rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: #666;
}

.signup-link a {
    color: #d35400;
    text-decoration: none;
    font-weight: 500;
}

.signup-link a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .page-container {
        justify-content: center;
        padding: 20px;
    }

    .welcome-text {
        display: none;
    }

    .login-container {
        padding: 30px;
    }

    h2 {
        font-size: 1.75rem;
    }
}

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
    font-family: 'Poppins', sans-serif;
    color: #d35400;
    font-weight: 600;
    padding: 0.25rem 0.75rem;
    border-radius: 5px;
    text-decoration: none;
}

.nav-links a:hover {
    color: white;
    background-color: #d35400;
}

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
    color: #EAA636;
    text-align: center;
}

.hero-content h2 {
    font-size: 2.5rem;
    margin: 0.5rem 0;
    color: #f39c12;
    font-style: italic;
}

.hero-content p {
    font-family: Times New Roman, serif;
    text-align: justify;
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
        
    </style>
</head>

<body>
<nav class="navbar">
    <div class="logo"><a href="home.php">Sweet Crumbs Bakery</a></div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="reachout.php">Reach Out</a></li>
    </ul>
</nav>

<div class="page-container">
    <div class="welcome-text">
        <h1>Your happiness is our favourite ingredient</h1>
        <p>From tracking your orders to saving your favourite treats, we're here to make every visit as delightful as our baked goods</p>
    </div>

    <div class="login-container">
        <h2>Welcome to Sweet Crumbs Bakery</h2>
        <p>Join us today and savor the sweetness—exclusive rewards and delightful treats await!</p>

        <?php if ($error) echo "<div class='error'>$error</div>"; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="signupForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    required
                    value="<?php echo htmlspecialchars($username_value); ?>"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                    value="<?php echo htmlspecialchars($email_value); ?>"
                >
            </div>

            <div class="form-group">
                <label for="phonenum">Phone Number</label>
                <input 
                    type="tel"
                    id="phonenum"
                    name="phonenum"
                    placeholder="Enter your phone number (Hyphen not required)"
                    required
                    value="<?php echo htmlspecialchars($phonenum_value); ?>"
                >
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input 
                    type="text"
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                    required
                    value="<?php echo htmlspecialchars($address_value); ?>"
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password (8-16 characters)" 
                    required 
                    minlength="8" 
                    maxlength="16"
                >
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input 
                    type="password" 
                    id="cpassword" 
                    name="cpassword" 
                    placeholder="Confirm your password" 
                    required 
                    minlength="8" 
                    maxlength="16"
                >
                <div id="passwordMatchMessage" class="password-match-message"></div>
            </div>

            <div class = "signup-link">
                Already have an account? <a href = "login.php">Log in here</a>
            </div>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signupForm');
    const password = document.getElementById('password');
    const cpassword = document.getElementById('cpassword');
    const message = document.getElementById('passwordMatchMessage');

    function validatePasswords() {
        if (cpassword.value === '') {
            message.style.display = 'none';
            return true;
        }

        if (password.value === cpassword.value) {
            message.className = 'password-match-message success';
            message.textContent = 'Passwords match!';
            return true;
        } else {
            message.className = 'password-match-message error';
            message.textContent = 'Passwords do not match!';
            return false;
        }
    }

    password.addEventListener('input', validatePasswords);
    cpassword.addEventListener('input', validatePasswords);

    form.addEventListener('submit', function(e) {
        if (!validatePasswords()) {
            e.preventDefault();
            alert('Please make sure your passwords match!');
        }
    });
});
</script>

</body>
</html>