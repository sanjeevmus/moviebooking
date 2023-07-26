<?php
include('../admindash/aheader.php')
?>
<style>
  .h2 {
    text-align: center;
    font-weight: bold;
    font-family: cursive;
  }

  .edit-delete-table {
    width: 100%;
    height: 100%;
    margin-bottom: 250px;
    margin-top: 20px;
    font-family: cursive;
    border-spacing: 7px;
  }

  .edit-delete-table th,
  .edit-delete-table td {
    padding: 8px;
    text-align: left;
    padding-bottom: 30px;
    border-bottom: 1px solid black;
   
  }

  .edit-delete-table th {
    background-color: aquamarine;
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
    <th>User ID</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Password</th>
  </tr>
  <?php
  $conn = new mysqli("localhost", "root", "", "moviebooking");
  if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM user";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $uid = $row['uid'];
      $uname = $row['uname'];
      $email = $row['email'];
      $phone = $row['phone'];
      $password = $row['password'];
      
      echo "
      <tr>
        <td>$uid</td>
        <td>$uname</td>
        <td>$email</td>
        <td>$phone</td>
        <td>$password</td>
        </td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='6'>No user found</td></tr>";
  }

  $conn->close();
  ?>
  </table>
  <?php
session_start();
if(!isset(  $_SESSION['aemail'] ))
{
    header("location:../../admin/alogin.php");
}

?>


<?php include('../../footer.php'); ?>
</body>
</html>

