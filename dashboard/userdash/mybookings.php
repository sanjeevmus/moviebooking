<?php include('header.php'); ?>

<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location: ../../login.php");
}
$uid = $_SESSION['useremail'];
?>
<style>
  .booking-list {
    margin-top: 50px;
  }

  .booking-list h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .booking-list table {
    width: 100%;
    border-collapse: collapse;
  }

  .booking-list th,
  .booking-list td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .booking-list th {
    background-color: #f2f2f2;
  }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moviebooking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function cancelBooking($conn, $bookingId) {
    // Get the booking date and time for the booking being canceled
    $sql_get_booking = "SELECT booking_date, booking_time FROM booking WHERE id = $bookingId";
    $result = $conn->query($sql_get_booking);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookingDate = $row['booking_date'];
        $bookingTime = $row['booking_time'];

        $sql_delete_bookings = "DELETE FROM booking WHERE booking_date = '$bookingDate' AND booking_time = '$bookingTime'";
        if ($conn->query($sql_delete_bookings) === TRUE) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
if (isset($_POST['cancel_booking'])) {
    $bookingIdToCancel = $_POST['booking_id'];
    if (cancelBooking($conn, $bookingIdToCancel)) {
        echo "Booking canceled successfully.";
    } else {
        echo "Failed to cancel booking.";
    }
}

$currentDate = date('Y-m-d');
$sql_remove_old_bookings = "DELETE FROM bookings WHERE show_date < '$currentDate'";
$conn->query($sql_remove_old_bookings);

$sql = "SELECT bookings.*, movie.id AS id, COUNT(*) AS num_seats_booked FROM bookings JOIN movie ON bookings.movie_id = movie.id WHERE bookings.email = '$uid' GROUP BY bookings.booking_date, bookings.booking_time ORDER BY bookings.booking_date DESC, bookings.booking_time DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<div class='booking-list'>";
    echo "<h2>My Booking List</h2>";

    echo "<table>";
    echo "<tr>
            <th>Name</th>
            <th>Movie Name</th>
            <th>Show Date</th>
            <th>Show Time</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            <th>Seats Booked</th>
            <th>Cancel</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        $bookingId = $row['id'];
        $fname = $row['fname'];
        $movieName = $row['movie_name'];
        $showDate = date('F j, Y', strtotime($row['show_date'])); // Format the date
        $showTime = date('h:i A', strtotime($row['show_time'])); // Format the time
        $bookingDate = date('F j, Y', strtotime($row['booking_date'])); // Format the booking date
        $bookingTime = date('h:i A', strtotime($row['booking_time'])); // Format the booking time
        $seatid = $row['seat_id'];
        $numSeatsBooked = $row['num_seats_booked'];

        echo "<tr>
                <td>$fname</td>
                <td>$movieName</td>
                <td>$showDate</td>
                <td>$showTime</td>
                <td>$bookingDate</td>
                <td>$bookingTime</td>
                <td>$numSeatsBooked</td>
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='booking_id' value='$bookingId'>
                        <button type='submit' name='cancel_booking'>Cancel Bookings</button>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
    echo "No bookings found.";
}

$conn->close();
?>