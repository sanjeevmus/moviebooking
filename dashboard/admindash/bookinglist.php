<?php include('../admindash/aheader.php'); ?>

<?php
session_start();
if(!isset(  $_SESSION['aemail'] ))
{
    header("location:../../admin/alogin.php");
}
?>
<!-- <link rel="stylesheet" href="c.css"> -->
 <style>
   .h2 { 
    text-align: center;
    font-weight: bold;
    font-family: cursive;
  }

  .edit-delete-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    margin-top: 20px;
    border-spacing: 7px;
    height: 508px;
  }

  .edit-delete-table th,
  .edit-delete-table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid black;
  }

  .edit-delete-table th {
    background-color: aquamarine;
  }  
</style> 

<h2 class="h2">Booking List</h2>

<table class="edit-delete-table">
  <tr>
    <th>Name</th>
    <th>Movie Name</th>
    <th>Show Date</th>
    <th>Show Time</th>
    <th>Booking Date</th>
    <th>Booking Time</th>
    <th>Seats Booked</th>
    <th>Seat Numbers</th>
  </tr>

  <?php
  $conn = new mysqli("localhost", "root", "", "moviebooking");
  if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
  }

  $sql = "SELECT bookings.*, movie.name AS movie_name, GROUP_CONCAT(seat_id ORDER BY seat_id) AS seat_numbers, COUNT(*) AS num_seats_booked FROM bookings JOIN movie ON bookings.movie_id = movie.id GROUP BY booking_date, booking_time";
$result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    $sn = 0; // Initialize serial number
    while ($row = $result->fetch_assoc()) {
      $fname = $row['fname'];
      $movieName = $row['movie_name'];
      $showDate = date('F j, Y', strtotime($row['showdate'])); // Format the date
      $showTime = date('h:i A', strtotime($row['show_time'])); // Format the time
      $bookingDate = date('F j, Y', strtotime($row['booking_date'])); // Format the booking date
      $bookingTime = date('h:i A', strtotime($row['booking_time'])); // Format the booking time
      $seatNumbers = $row['seat_numbers'];
      $numSeatsBooked = $row['num_seats_booked'];
      $sn++;

      echo "
      <tr>
      <td>$fname</td>
      <td>$movieName</td>
      <td>$showDate</td>
      <td>$showTime</td>
      <td>$bookingDate</td>
      <td>$bookingTime</td>
      <td>$numSeatsBooked</td>
      <td>$seatNumbers</td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='8'>No booking list found</td></tr>";
  }

  $conn->close();
  ?>
</table>

