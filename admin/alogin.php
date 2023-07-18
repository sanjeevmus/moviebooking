<?php
include('../admin/header.php');
?>
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

