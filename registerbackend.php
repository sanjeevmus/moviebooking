<?php

$servername = "localhost";
$username = "root";
$password = ""; // Provide your database password here
$dbname = "moviebooking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    echo 'Connection failed';
}

// Process form submission
if (isset($_POST['signupBtn'])) {
    // Get data from the form
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];

    // Checking if email exists or not
    $check_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
    $result = $conn->query($check_email_query);
    if ($result->num_rows > 0) {
        echo '<script type="text/javascript"> alert("Error: Email already registered."); </script>';
    } else {
        // Email doesn't exist, proceed with registration

        // Check if passwords match
        if ($password !== $cpassword) {
            echo "Error: Passwords do not match.";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO user (uname, email, password, phone) VALUES ('$uname', '$email', '$hashed_password', '$phone')";
            if ($conn->query($sql) === true) {
                header('location: login.php');
                exit(); // Make sure to exit after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
