<?php
include ('../admindash/aheader.php');
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

<h2 class="h2">Coming Soon Movie List</h2>

<table class="edit-delete-table">
  <tr>
    <th>ID</th>
    <th>Movie Name</th>
    <th>descriptiin</th>
        <th>Reldate</th>
        <th>Director</th>
    <th>Image</th>
    <th>Action</th>
  </tr>

  <?php
  $conn = new mysqli("localhost", "root", "", "moviebooking");
  if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM coming_soon";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $name = $row['name'];
      $description = $row['description'];
    $reldate = $row['reldate'];
    $director = $row['director'];
   
      $image = $row['image'];
     

      echo "
      <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$description</td>
        <td>$reldate</td>
        <td>$director</td>
       
        
        <td ><img src='../../images/$image' style='width: 110px; height: 50px' alt='Movie Poster'></td>
        <td>
          <form action='comingsoonedit.php' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit' class='edit-button' value='Edit'>
          </form>
          <form action='comingsoondel.php' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit'   class='delete-button' value='Delete'>
          </form>
        </td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='6'>No movies found</td></tr>";
  }

  $conn->close();
  ?>
</table>