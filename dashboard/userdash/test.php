<?php
session_start();
$uid = $_SESSION['uid'];

if (isset($_POST['book_now'])) {
    $servername = "localhost";
    $username = "root";
    $dbname = "moviebooking";

    $conn = new mysqli($servername, $username, "", $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $mid = $_POST['mid'];
    $name = $_POST['mname'];
    $time = $_POST['time'];

    // Prepare the SQL statement
    $sql = "INSERT INTO bookings (mid, uid, time) VALUES ('$mid', '$uid','$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error in booking: " . $conn->error;
    }

    $conn->close();
}
?>
