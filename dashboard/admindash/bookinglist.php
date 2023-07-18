<?php
include('../admindash/aheader.php');

?>
<?php
session_start();
if(!isset(  $_SESSION['aemail'] ))
{
    header("location:../../admin/alogin.php");
}

?>
<style>
  .h2 {
    text-align: center;
    font-weight: bold;
    font-family: cursive;
  }

  .edit-delete-table {
    width: 100%;
    margin-bottom: 20px;
    margin-top: 20px;
    height: 23rem;
  }

  .edit-delete-table th,
  .edit-delete-table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .edit-delete-table th {
    background-color: #f2f2f2;
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
    <th>Duration</th>
  </tr>

  <?php
  $conn = new mysqli("localhost", "root", "", "moviebooking");
  if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
  }

  $sql = "SELECT bookings.bid AS bid, movie.id AS mid, movie.name AS mname, 
          user.uid AS uid, user.uname AS uname, bookings.tname, bookings.duration
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
      $duration = $row['duration'];
      $sn++;

      echo "
      <tr>
        <td>$sn</td>
        <td>$mname</td>
        <td>$tname</td>
        <td>$uid</td>
        <td>$uname</td>
        <td>$duration</td>
        <td>
        </td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='5'>No booking list found</td></tr>";
  }

  $conn->close();
  ?>
</table>
<?php include('../../footer.php'); ?>
