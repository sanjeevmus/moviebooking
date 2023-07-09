<?php
include('../admindash/aheader.php');
$conn = new mysqli("localhost", "root", "", "moviebooking");
if ($conn->connect_error) {
  die("Connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];

  // Fetch the movie details from the database
  $sql = "SELECT * FROM movie WHERE id = $id";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $time = $row ['time'];
    $image = $row['image'];
  } else {
    echo "No movie found with ID: $id";
    exit();
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
  $id = $_POST["id"];
  $name = $_POST["name"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $time = $_POST["time"];

  // Update the movie details in the database
  $sql = "UPDATE movie SET name='$name', description='$description', price='$price', time='$time' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Movie updated successfully!";
  } else {
    echo "Error updating movie: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Movie</title>
  <style>
    .h2 {
      text-align: center;
      font-weight: bold;
      font-family: cursive;
    }

    .edit-form {
      width: 50%;
      margin: 0 auto;
    }

    .edit-form label {
      display: block;
      margin-bottom: 10px;
    }

    .edit-form input[type="text"],
    .edit-form input[type="time"],
    .edit-form textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }

    .edit-form input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2 class="h2">Edit Movie</h2>

  <div class="edit-form">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <label for="name">Movie Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
      <label for="description">Description:</label>
      <textarea name="description" id="description" required><?php echo $description; ?></textarea>
      <label for="price">Price:</label>
      <input type="text" name="price" id="price" value="<?php echo $price; ?>" required>
      <label for="time">Time</label>
      <input type="time" name="time" id="time" value="<?php echo $time; ?>" required><br><br>
      <input type="submit" name="update" value="Update">
    </form>
  </div>
</body>
</html>

<?php
$conn->close();
?>
