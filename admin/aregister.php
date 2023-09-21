<?php include('header.php'); ?>
<style> 
  .container-1 {
    padding: 7rem;
    align-items: center;

  }
.form{
      padding-top: 130px;
    
      
    }
  
  
  .form-box {
    width: 40vh;
    margin: -52px auto;
    background-color: #fff;
    border-radius: 5px;
    height: 45vh;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  
  .form-box h1, .form-box h2 {
    text-align: center;
    color:tomato;
    font-family: cursive;
  }
  
  .input-group {
    margin-bottom: 50px;
    margin: 30px;
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
    width: 100%;
    padding: 10px;
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
        <h1 id="Title">Register</h1>
        <form action="aregisterbackend.php" method="POST">
            <div class="input-group">
                <div class="input-field">
                    <input type="text" placeholder="Enter Your Name" id="aname" name="aname" required><br>
                </div>
                <div class="input-field">
                    <input type="email" placeholder="Enter your Email" id="aemail" name="aemail" required><br>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Enter Your Password" id="apassword" name="apassword" required><br>
                </div>
                <div class="input-field">
                    <input type="contact" placeholder="Enter Your Phone Number" id="aphone" name="aphone" required><br>
                </div>
                <div class="SignUp-link">
                    <button type="submit" name="signupBtn">Sign Up</button><br>
                </div>
                <p>Already have an account? <a href="alogin.php">Sign in</a></p>
            </div>
        </form>
    </div>
</div>

<?php include('../footer.php'); ?>
</body>
</html>
