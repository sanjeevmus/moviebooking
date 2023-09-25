<?php

$servername = "localhost";
$username = "root";
$dbname = "moviebooking";

//create connection
$conn = new mysqli($servername, $username, "", $dbname);

//checking
if($conn->connect_error){
    die('connection failed ' .$conn->connect_error);
}else{
    echo '';
}

//process of submission
if(isset($_POST['signupBtn'])) {

    //get data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];

    $hashedNewPassword = password_hash($password, PASSWORD_DEFAULT);
    //inserting
    $sql = " INSERT INTO admin(name, email, password, phone) VALUES('$name', '$email', '$hashedNewPassword','$phone')";
if(!$password == $cpassword)
{
    echo"password is not same";
}elseif ($conn->query($sql) === true) {
        header ('location: login.php');
} else {
        echo "Error: " .$conn->error;
}
}
?>

<?php
include('header.php');

?>
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
  .input-field{
    margin-right: 40px;
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
  .SignUp-link{
    text-decoration: none !important;
    margin: 0px 50px 10px 50px;
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
    <div class="form">
        <div class="form-box">
           <h1 id="Title">Register</h1>
    <form action="register.php" method="POST">
    <div class="input-group">
            <div class="input-field">
                <input type="text" placeholder="Enter Your Name" id="name" name="name" required><br>
            </div>
            <div class="input-field">
            <input type="email" placeholder=" Enter your Email" id="email" name="email" required><br>
        </div>
        <div class="input-field">
            <input type="password" placeholder="Enter Your Password" id="password" name="password" required><br>
        </div>
        <div class="input-field">
            <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" required><br>
        </div>
        <div class="input-field">
            <input type="contact" placeholder="Enter Your Phone Number" id="phone" name="phone" required><br>
        </div>
        <div class="SignUp-link">
                    <button type="submit" name="signupBtn">Sign Up</button>
                    <br>
                    </div>
                   <p>Already have an account.....? <a href="login.php">Sign in</a></p>
        </div>
    </form>
</body>
</html>