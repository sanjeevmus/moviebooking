<?php
include ('header.php');
?>
<style>
.container-1 {
    align-items: center;
    padding-top: 6.5rem;
    padding-bottom: 1.5rem;
    
  }
  
  .form-box {
    width: 50vh;
    margin: -74px auto;
    background-color: #fff;
    border-radius: 5px;
    height: 60vh;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  
  .form-box h1, .form-box h2 {
    text-align: center;
    color:tomato;
    font-family: cursive;
  }
  
  .input-group {
    margin-bottom: 50px;
    margin: 4px;
    font-family: cursive;

  }
  .input-field{
    width:87% !important;
    height: 3.5rem;
  }
  
  .input-field input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px;
    font-family: cursive;
  }
  
  .SignUp-link button {
    width: 50%;
    padding: 10px;
    margin: 5px 100px 1px 100px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-family: cursive;
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
    <div class="container-1">
        <div class="form-box">
           <h1 id="Title">Sign Up</h1>
    <h2> LET'S ENJOY MOVIE WORLD</h2>
    <form action="registerbackend.php" method="POST">
    <div class="input-group">
            <div class="input-field">
                <input type="text" placeholder="Enter Your Name" id="uname" name="uname" required><br>
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
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>