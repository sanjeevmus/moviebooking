<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.forgot-password-container {
    max-width: 400px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.forgot-password-container h2 {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.forgot-password-container p {
    text-align: center;
    margin-bottom: 20px;
}

.forgot-password-container form {
    display: flex;
    flex-direction: column;
}

.forgot-password-container label {
    font-weight: bold;
    margin-bottom: 5px;
}

.forgot-password-container input[type="email"] {
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.forgot-password-container button {
    padding: 8px 16px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.forgot-password-container button:hover {
    background-color: #45a049;
}
  
    </style>
    <?php include('header.php'); ?>
<body>
    <div class="forgot-password-container">
        <h2>Forgot Your Password?</h2>
        <p>Enter your email address below to reset your password.</p>
        <form action="#" method="post">
            <label for="email">Email:</label>
            <input type="email" id="aemail" name="aemail" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
