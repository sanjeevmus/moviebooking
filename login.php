<?php
include('header.php');
?>
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
                    <p>Forgot Password? <a href="Forgot.php">Click here!</a></p>
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
</body>
</html>
