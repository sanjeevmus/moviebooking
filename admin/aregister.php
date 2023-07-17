<?php
include('header.php');
?>
<div class="container">
    <div class="form-box">
        <h1 id="Title">Register</h1>
        <form action="aregisterbackend.php" method="POST">
            <div class="input-group">
                <div class="input-field">
                    <input type="text" placeholder="Enter Your Name" id="aname" name="aname" required><br>
                </div>
                <div class="input-field">
                    <input type="email" placeholder=" Enter your Email" id="aemail" name="aemail" required><br>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Enter Your Password" id="apassword" name="apassword" required><br>
                </div>
                <div class="input-field">
                    <input type="contact" placeholder="Enter Your Phone Number" id="aphone" name="aphone" required><br>
                </div>
                <div class="SignUp-link">
                    <button type="submit" name="signupBtn">Sign Up</button>
                    <br>
                </div>
                <p>Already have an account.....? <a href="alogin.php">Sign in</a></p>
            </div>
        </form>
    </div>
</div>
<?php
include('../footer.php');
?>
</body>
</html>
