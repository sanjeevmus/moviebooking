<?php include('header.php'); ?>
<style>
  .form{
      padding-top: 4.8rem;
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
            <h2>WELCOME TO MOVIES WORLD</h2>
            <form method="POST" action="loginbackend.php">
                <div class="input-group">
                        <div class="input-field">
                            <input type="text" placeholder="Enter Your Name" name="uname" required><br>
                        </div>
                    <div class="input-field">
                    <input type="password" placeholder="Password" name="password" required><br>
                    </div>
                    <br>
                    <div class="SignUp-link">
                        <button type="submit" name="signinBtn">Sign In</button>
                    </div>
                    <p> Don't have a account..<a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
</body>
</html>

