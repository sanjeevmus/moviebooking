<?php
include ('header.php');
?>
    <div class="container">
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
</body>
</html>