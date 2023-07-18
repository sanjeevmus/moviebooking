<?php

$servername = "localhost";
$username = "root";
$dbname = "moviebooking";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);

// Checking connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    echo 'Connection success';
}

// Process of submission
if (isset($_POST['signupBtn'])) {
    // Get data from the form
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $apassword = $_POST['apassword'];
    $aphone = $_POST['aphone'];

    // Inserting data into the database
    $sql = "INSERT INTO admin (aname, aemail, apassword, aphone) VALUES ('$aname', '$aemail', '$apassword', '$aphone')";

    if ($conn->query($sql) === true) {
        // Redirect to the login page after successful registration
        header('Location: alogin.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

