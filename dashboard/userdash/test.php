<?php
session_start();
$uid = $_SESSION['uid'];

if (isset($_POST['book_now'])) {
    if (
        isset($_POST['mid']) && !empty($_POST['mid']) &&
        isset($_POST['mname']) && !empty($_POST['mname']) &&
        isset($_POST['duration']) && !empty($_POST['duration'])
    ) {
        $servername = "localhost";
        $username = "root";
        $password = ""; // Add your database password here
        $dbname = "moviebooking";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $mid = $_POST['mid'];
        $name = $_POST['mname'];
        $duration = $_POST['duration'];

        // Prepare and bind the SQL statement using prepared statement
        $stmt = $conn->prepare("INSERT INTO bookings (mid, uid, duration) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $mid, $uid, $duration);

        if ($stmt->execute()) {
            echo "Booking successful!";
        } else {
            echo "Error in booking: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        header('location: booking-sucess.php');
    }
}
?>
