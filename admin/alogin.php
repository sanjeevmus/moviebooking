<?php
include('../admin/header.php');
?>
<style>
  .form{
      padding-top: 4.7rem;
    
      
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
<div class="form">
    <div class="form-box">
        <h1 id="Title">Sign In</h1>
        <form method="post" action="aloginbackend.php">
            <div class="input-group">
                <div class="input-field">
                    <input type="text" placeholder="Enter Your email" name="aemail" required><br>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Password" name="apassword" required><br>
                </div>
                <p>Forgot Password? <a href="aforgot.php">Click here!</a></p>
                <br>
                <div class="SignUp-link">
                    <button type="submit" name="signinBtn">Sign In</button>
                </div>
                <p> Don't have an account..<a href="aregister.php">Register</a></p>
            </div>
        </form>
    </div>
</div>

<?php
include('../footer.php');
?>
</body>
</html>

