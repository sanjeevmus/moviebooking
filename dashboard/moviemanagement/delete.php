<?php
$conn = new mysqli("localhost", "root", "", "moviebooking");
if ($conn->connect_error) {
  die("Connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];

  // Delete the movie from the database
  $sql = "DELETE FROM movie WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    header("location:../moviemanagement/movielist.php");
  } else {
    echo "Error deleting movie: " . $conn->error;
  }
}
?>

<a href="../moviemanagement/movielist.php">