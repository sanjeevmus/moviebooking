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
  form {
  width: 30%;
  height: max-content;
  margin-top: 20px;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 15px;
  margin-left: 30%;
  margin-right: 30%;
  margin-bottom: 20px;
  font-family: cursive;
  font-size:x-small;
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
<form action="addmovies.php" method="POST" enctype="multipart/form-data">
  <h2><u>Add Movie</u></h2>

  <label for="title">Movie Name:</label>
  <input type="text" id="name" name="name" required><br>
  
  <label for="description">Description:</label>
  <textarea id="description" name="description" required></textarea><br>
  
  <label for="price">Ticket Price:</label>
  <input type="number" id="price" name="price" required><br>
  <br>


  <label for="image">Movie Poster Image:</label>
  <input type="file" id="image" name="image" ><br>
<br>


  <label for="duration"> Movie Duration</label>
  <input type="text" id="duration" name="duration" required><br>
<br>


  <label for="relyear"> Release Date</label>
  <input type="text" id="relyear" name="relyear" required><br>
<br>


<label for="director">Director:</label>
    <input type="text" id="director" name="director" required>
<br>
<br>
    <label for="actor">Actors:</label>
    <input type="text" id="actor" name="actor" required>
    <br>
<br>
    <label for="time">First Show</label>
    <input type="time" id="fshow" name="fshow" required>
    <br>
<br>
    <label for="time">Second Show</label>
    <input type="time" id="sshow" name="sshow" required>
    <br>
<br>
    <label for="time">Third Show</label>
    <input type="time" id="tshow" name="tshow" required>
    <br>
<br>
  <input type="submit" value="Add Movie" name="add">
</form>
<?php
include ('../../footer.php');
?>
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Provide a valid password here if required
$dbname = "moviebooking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $relyear = $_POST['relyear'];
    $director = $_POST['director'];
    $actor = $_POST['actor'];
    $fshow = $_POST['fshow'];
    $sshow = $_POST['sshow'];
    $tshow = $_POST['tshow'];

    if ($_FILES["image"]["name"]) {
        $file_name = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed_extensions = array("jpg", "jpeg", "png"); // Add any additional allowed extensions here

        if (in_array($file_ext, $allowed_extensions)) {
            if ($file_size < 5242880) { // Max file size: 5MB (you can adjust this value)
                $destination = "../../images/" . $file_name;

                if (move_uploaded_file($file_tmp, $destination)) {
                    $image = mysqli_real_escape_string($conn, $destination);

                    // Insert data into the database
                    $sql = "INSERT INTO movie (name, description, price, image, duration, relyear , director , actor, fshow, sshow, tshow) VALUES ('$name', '$description', '$price', '$file_name', '$duration', '$relyear', '$director', '$actor', '$fshow', '$sshow', '$tshow')";
                    $result = $conn->query($sql);

                    if ($result) {
                        echo '<script type="text/javascript"> alert("Movie added successfully."); </script>';
                        header("Location: ../admindash/movielist.php");

                    } else {
                        echo '<script type="text/javascript"> alert("Error: ' . $conn->error . '"); </script>';
                    }
                } else {
                    echo '<script type="text/javascript"> alert("Error moving uploaded file."); </script>';
                }
            } else {
                echo '<script type="text/javascript"> alert("File size exceeds the maximum limit."); </script>';
            }
        } else {
            echo '<script type="text/javascript"> alert("Invalid file format. Only JPG, JPEG, and PNG files are allowed."); </script>';
        }
    } else {
        // Insert data into the database without an image
        $sql = "INSERT INTO movie (name, description, price, duration, relyear, director, Actor, fshow, sshow, tshow) VALUES ('$name', '$description', '$price', '$duration, '$relyear', '$director', '$Actor', '$fshow', '$sshow', '$tshow')";
        $result = $conn->query($sql);

        if ($result) {
            echo '<script type="text/javascript"> alert("Movie added successfully."); </script>';
        } else {
            echo '<script type="text/javascript"> alert("Error: ' . $conn->error . '"); </script>';
          }
    }
}
?>