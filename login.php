<style>
/* styles.css */

.custom-nav {
background-color: #333;
color: #fff;
font-weight: bold;
padding-left: 1rem;
}

.container {
max-width: 1200px;
margin: 0 auto;
padding: 1rem;
}

.logo {
text-decoration: none;
font-size: 24px;
color: #fff;
}

.menu {
list-style: none;
margin: 0;
padding: 0;
display: flex;
}

.menu-item {
margin-right: 1rem;
position: relative;
}

.menu-link {
padding: 10px;
text-decoration: none;
color: #fff;
}

.sub-menu {

width: 9rem;
display: none;
position: absolute;
top: 100%;
left: 0;
background-color: #333;
list-style: none;
margin: 0;
padding: 0;
}

.sub-menu-item {
font-size: 20px;
}

.menu-item:hover .sub-menu {
display: block;
}

</style>
</head>
<body>
<!-- Header section -->
<div class="custom-nav">
<div class="container">
<div class="flex justify-between items-center">
    <a href="index.php" class="logo">MOVIE WORLD</a>
    <!-- Navigation menu -->
    <ul class="menu">
        <li class="menu-item">
            <a href="#" class="menu-link" id="movies-link">Movies</a>
            <!-- Dropdown menu for movies -->
            <ul class="sub-menu" id="movies-dropdown">
                <li><a href="#" class="sub-menu-item">Now Showing</a></li>
                <li><a href="comingsoon.php" class="sub-menu-item">Coming Soon</a></li>
            </ul>
        </li>

        
        <?php
        session_start();
        if (isset($_SESSION['email'])) {
            echo '<li class="menu-item">
                    <a href="logout.php" class="menu-link">Logout</a>
                  </li>';
        } else {
            
            echo '<li class="menu-item">
                    <a href="register.php" class="menu-link">Register</a>
                  </li>';
        }
        ?>
    </ul>
</div>
</div>
</div>
<?php


if(isset($_POST['signinBtn'])) {
    // Get the username and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $dbname = "moviebooking";
    $conn = new mysqli($servername, $username, "", $dbname);
    if($conn->connect_error) {
        die ("Connection failed ".$conn->connect_error);
    }
    $hashedNewPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Retrieve the user's record based on their email
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error in query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verify the provided plain-text password with the stored hashed password
        if (password_verify($password, $storedPassword)) {
            $_SESSION['id'] = $row['uid']; // Store the user's ID in the session
            $_SESSION['email'] = $email;
            header('location: index.php');

        
        exit();
    }
    else {
        echo "email or password invalid";
    }
}
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add Tailwind CSS CDN link here -->
    <style>
        .form-box {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="">
    <div class="">
        <div class="">
            <h1 class="">Sign In</h1>
            <h2 class="">WELCOME TO MOVIE WORLD</h2>
            <form method="POST" action="login.php">
                <div class="input-group">
                    <div class="input-field mb-4">
                        <input type="text" placeholder="Enter Your email" name="email" required
                            class="">
                    </div>
                    <div class="input-field mb-4">
                        <input type="password" placeholder="Password" name="password" required
                            class="">
                    </div>
                    <div class="SignUp-link mb-4">
                        <button type="submit" name="signinBtn"
                            class="">
                            Sign In
                        </button>
                    </div>
                    <p class="text-center">Don't have an account? <a href="register.php"
                            class="">Register</a></p>
                </div>
            </form>
            <a href="forgotPassword/forgot_password.php">Forgot Password?</a>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>
