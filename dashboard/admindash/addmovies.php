<?php
include ('../admindash/aheader.php')
?>
<style>
   form {
  width: 500px;
  height: max-content;
  margin-top: 20px;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
  margin-left: 30%;
  margin-right: 30%;
  /* display: grid; */
  /* align-items: start; */
}

h2 {
  text-align: center;
}

label {
  display: flex;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="date"],
input[type="time"],
textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
}

textarea {
  height: 100px;
}

input[type="submit"] {
  background-color: #4caf50;
  color: white;
  padding: 10px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}


</style>
<form action="addmovies.php" method="POST">
  <h2><u>Add Movie</u></h2>

  <label for="title">Movie Name:</label>
  <input type="text" id="name" name="name" required><br>
  
  <label for="description">Description:</label>
  <textarea id="description" name="description" required></textarea><br>
  
  <label for="price">Ticket Price:</label>
  <input type="number" id="price" name="price" required><br>
  
  <label for="image">Movie Poster Image:</label>
  <input type="file" id="image" name="image" ><br>

  <label for="time">Time</label>
  <input type="time" id="time" name="time" required><br>


  <input type="submit" value="Add Movie" name="add">
</form>
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Provide a valid password here if required
$dbname = "moviebooking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Process form submission
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $time =$_POST['time'];

    // Sanitize input (optional but recommended)
    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);
    $price = mysqli_real_escape_string($conn, $price);
    $image = mysqli_real_escape_string($conn, $image);

    // Insert data into the database
    $sql = "INSERT INTO movie (name, description, price, image, time) VALUES ('$name', '$description', '$price', '$image', '$time')";
    $result = $conn->query($sql);
    if ($result) {
        header("Location:../moviemanagement/movielist.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
