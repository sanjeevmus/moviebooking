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
       .form{
      padding-top: 130px;
      padding-bottom: 130px;
    }
    
  .form-box {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 5px;
    height: 100%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  
  .form-box h1, .form-box h2 {
    text-align: center;
    color:tomato;
    font-family: cursive;
  }
  
  .input-group {
    margin-bottom: 20px;
    margin: 20px;
    font-family: cursive;

  }
  
  .input-field input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px;
    font-family: cursive;
  }
   p,p a{
    font-size: small ;
    text-align: center;

  }
  .SignUp-link button {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-family: cursive;
    align-items: center;
  }
  
  .SignUp-link button:hover {
    background-color: #555;
  }
  .vertical-menu {
    background-color: #f1f1f1;
    width: 100%;
    position: relative;
    left: 0;
    height: 100%;
    display: flex;
    font-family: cursive;
    justify-content: center;
  }
  
  .vertical-menu a {
    background-color: #ddd;
    color: #333;
    display: flex;
    position: relative;
    text-decoration: none;
    padding-left: 85px;
    padding-right: 85px;
  }
  .error {
    border-color: red;
}

.error-message {
    color: red;
    font-size: 12px;
}
  /* Responsive Styles */
  @media (max-width: 300px) {
    .container {
      padding: 0 10px;
    }
  }
  
</style>
</head>

<body>
    <div class="form">
        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <form method="post" action="login.php">
                <div class="input-group">
                    <div class="input-field">
                    <label for="email">
                        Email
                    </label>
                    <input id="email" type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="input-field">
                    <label for="password">
                        Password
                    </label>
                    <input id="password" type="password" placeholder="Enter your password" name="password" required>
                </div>
                    <p>
                        <a href="forgot.html">Forgot Password?</a>
                    </p>
                    <div class="SignUp-link">
                    <button type="submit" name="signinBtn">
                        Sign In
                    </button>
                </div>
                    <p>Don't have an account.....? <br><a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>

</html>