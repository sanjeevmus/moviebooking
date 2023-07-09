<?php

session_start();
// Check if the user is already logged in
if(isset($_SESSION['email'])) {
    // Redirect the user to the home page or any other authenticated page
    header("Location:../dashboard.php");
    exit;
}

if(isset($_POST['signinBtn'])) {
    // Get the username and password from the form
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $dbname = "moviebooking";
    $conn = new mysqli($servername, $username, "", $dbname);
    if($conn->connect_error)
        die ("Connection failed ".$conn->connect_error);
    $sql = "SELECT * FROM user WHERE uname = '$uname' and password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)    {
        // Start the session and store the user's email
        $row = $result->fetch_assoc();
        $_SESSION['uname'] = $row['uname'];
        $_SESSION['uid'] = $row['uid'];
        
        // Redirect the user to the home page
        header("Location:dashboard/userdash/dash.php");
        }
    else
        echo "username or password invalid";
}
/*
session_start();

// Check if the user is already logged in
if(isset($_SESSION['email'])) {
    // Redirect the user to the home page or any other authenticated page
    header("Location: ../dashboard.php");
    exit;
}

$servername = "localhost";
$username = "root";
$dbname = "poptime";

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the username and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    //creating connection with data base
    $conn = new mysqli($servername, $username, "", $dbname);

    //checking connection
    if($conn->connect_error)
        die ("Connection failed ".$conn->connect_error);
        
        // Prepare the SQL statement to fetch the user record based on the provided username
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    
        // Get the result of the query
        $result = $stmt->get_result();
    
        // Check if a record with the provided username exists
        if($result->num_rows === 1) {
            // Fetch the user record
            $row = $result->fetch_assoc();
    
            // Verify the password
            if(password_verify($password, $row['password'])) {
                // Store the username/email in the session
                $_SESSION['email'] = $email;
    
                // Redirect the user to the home page or any other authenticated page
                header("Location: ../dashboard.php");
                exit;
            }
        }
    
        // Display an error message
        $error = "Invalid username or password";
    
        // Close the database connection
        $stmt->close();
        $conn->close();
    }*/

    // Validate the username and password (you can add more validation if needed)
    /*if($email === 'admin@gmail.com' && $password === 'password') {
        // Store the username in the session
        $_SESSION['username'] = $username;

        // Redirect the user to the home page or any other authenticated page
        header("Location: ../dashboard.php");
        exit;
    } else {
        // Display an error message
        $error = "Invalid username or password";
    }*/


?>





