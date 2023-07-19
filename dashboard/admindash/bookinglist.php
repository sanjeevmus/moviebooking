<?php include('aheader.php'); ?>
<?php
session_start();
if(!isset(  $_SESSION['aemail'] ))
{
    header("location:../../admin/alogin.php");
}
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

// Fetch all the bookings
$sql = "SELECT bookings.*, movie.name AS movie_name FROM bookings JOIN movie ON bookings.mid = mid";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<div class='booking-list'>";
    echo "<h2>Booking List</h2>";

    echo "<table>";
    echo "<tr>
            <th>Movie Name</th>
            <th>Show Date</th>
            <th>Show Time</th>
            <th>Seats</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
       
        $movieName = $row['movie_name'];
        $showDate = $row['show_date'];
        $showTime = $row['show_time'];
        $seats = $row['seats'];

        echo "<tr>
                
                <td>$movieName</td>
                <td>$showDate</td>
                <td>$showTime</td>
                <td>$seats</td>
              </tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
    echo "No bookings found.";
}

$conn->close();
?>