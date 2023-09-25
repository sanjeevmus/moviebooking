<?php
session_start();
include('header.php');
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

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verify the provided plain-text password with the stored hashed password
        if (password_verify($password, $storedPassword)) {
        // Start the session and store the user's email
        $_SESSION['email'] = $email;
        // Redirect the user to the home page
        header ('location: index.php');
        // echo "<script>window.location.href = 'index.php';</script>";
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
            <form method="post" action="login.php">
                <div class="mb-4">
                    <label class="" for="email">
                        Email
                    </label>
                    <input class="" id="email" type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="">
                    <label class="" for="password">
                        Password
                    </label>
                    <input class="" id="password" type="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="">
                    <p class="">
                        <a class="" href="forgot.html">Forgot Password?</a>
                    </p>
                    <button class="" type="submit" name="signinBtn">
                        Sign In
                    </button>
                    
                </div>
                    <p>Don't have an account.....? <br><a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>

</html>