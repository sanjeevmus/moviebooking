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
    border-collapse: collapse;
    margin-bottom: 20px;
    margin-top: 20px;
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

  .edit-delete-table td button {
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .edit-delete-table .edit-button {
    background-color: #4caf50;
    color: white;
    margin-right: 5px;
  }

  .edit-delete-table .delete-button {
    background-color: #f44336;
    color: white;
  }
  
</style>

<h2 class="h2">Movie List</h2>

<table class="edit-delete-table">
  <tr>
    <th>ID</th>
    <th>Movie Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Duration</th>
    <th>Release Year</th>
    <th>Director</th>
    <th>Actor</th>
    <th>First Show</th>
    <th>Second Show</th>
    <th>Third Show</th>
    <th>Image</th>
    <th>Action</th>
  </tr>

  <?php
  $conn = new mysqli("localhost", "root", "", "moviebooking");
  if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM movie";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $name = $row['name'];
      $description = $row['description'];
      $price = $row['price'];
      $image = $row['image'];
      $duration = $row['duration'];
      $relyear = $row['relyear'];
      $director = $row['director'];
      $actor = $row['actor'];
      $fshow = $row['fshow'];
      $sshow = $row['sshow'];
      $tshow = $row['tshow'];


      echo "
      <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$description</td>
        <td>$price</td>
        <td>$duration</td>
        <td>$relyear</td>
        <td>$director</td>
        <td>$actor</td>
        <td>$fshow</td>
        <td>$sshow</td>
        <td>$tshow</td>
        <td ><img src='../../images/$image' style='width: 110px; height: 50px' alt='Movie Poster'></td>
        <td>
          <form action='edit.php' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit' class='edit-button' value='Edit'>
          </form>
          <form action='delete.php' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit'   class='delete-button' value='Delete'>
          </form>
        </td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='13'>No movies found</td></tr>";
  }

  $conn->close();
  ?>
</table>
