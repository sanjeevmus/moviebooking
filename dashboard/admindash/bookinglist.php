<?php include('../admindash/aheader.php'); ?>

<?php
session_start();
if(!isset(  $_SESSION['aemail'] ))
{
    header("location:../../admin/alogin.php");
}
?>
<link rel="stylesheet" href="c.css">
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
    <th>S.N</th>
    <th>Movie Name</th>
    <th>Theater Name</th>
    <th>User Id</th>
    <th>User Name</th>
    <th>Show Date</th>
    <th>Show Time</th>
  </tr>

  <?php
  $conn = new mysqli("localhost", "root", "", "moviebooking");
  if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
  }

  $sql = "SELECT bookings.bid AS bid, movie.id AS mid, movie.name AS mname,
          user.uid AS uid, user.uname AS uname, bookings.tname, bookings.show_time, bookings.show_date
          FROM bookings
          INNER JOIN movie ON bookings.mid = movie.id
          INNER JOIN user ON bookings.uid = user.uid";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    $sn = 0; // Initialize serial number
    while ($row = $result->fetch_assoc()) {
      $bid = $row['bid'];
      $mid = $row['mid'];
      $uname = $row['uname'];
      $tname = $row['tname'];
      $mname = $row['mname'];
      $uid = $row['uid'];
      $show_date = $row['show_date'];
      $show_time = $row['show_time'];
      $sn++;

      echo "
      <tr>
        <td>$sn</td>
        <td>$mname</td>
        <td>$tname</td>
        <td>$uid</td>
        <td>$uname</td>
        <td>$show_date</td>
        <td>$show_time</td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='7'>No booking list found</td></tr>";
  }

  $conn->close();
  ?>
</table>

<?php include('../../footer.php'); ?>
