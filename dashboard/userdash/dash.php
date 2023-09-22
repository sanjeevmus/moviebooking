<?php include('header.php'); ?>

<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location: ../../login.php");
}
?>
<style>
  .dashboard-container {
  max-width: 90%;
  margin: 0 auto;
}

.horizontal-menu {
  display: flex;
  justify-content: end;
  align-items:flex-end;
  margin-bottom: 20px;
}

.horizontal-menu a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-right: 10px;
  width: 100%;
}

.movies-container {
  width: 25%;
  display: inline-table;
}

.movie-card {
  border: 3px solid #ccc;
  padding: 10px;
  width: 250px;
  margin: 25px;
}

.movie-details {
  margin-top: 10px;
  font-family: cursive;
  font-style: oblique;
}

.movie-name {
  font-weight: bold;
  margin-bottom: 5px;
}

.movie-description {
  margin-bottom: 20px;
  /* font-family: cursive; */
}

.movie-price {
  margin-bottom: 20px;
  /* font-family: cursive; */
}

.movie-card img {
  height: 200px;
  width: 250px;
}

.book {
  background-color: #4caf50;
}

.nowshowing {
  font-size: larger;
  text-align: center;
}
  </style>

<div class="dashboard-container">
    <h2 style='text-align:center; background-color:white'>Now Showing</h2>
    <div class="horizontal-menu">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "moviebooking";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed " . $conn->connect_error);
        }

        $sql = "select * from movie";
        $r = $conn->query($sql);
        if ($r) {
            while ($row = $r->fetch_assoc()) {
                $mid = $row['id'];
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price'];
                $duration = $row['duration'];
                $director = $row['director'];
                $image = $row['image'];

                echo "
                <div class='movies-container'>
                    <div class='movie-card'>
                        <img src='../../images/$image' alt='Movie Poster'>
                        <div class='movie-details'>
                        <h5 class='movie-name'>$name</h5>
                            <form action='booking.php' method='post'>
                                <input type='hidden' name='duration' value='$duration'>
                                <input type='hidden' name='mid' value='$mid'>
                                <input type='hidden' name='mname' value='$name'>
                                <input type='submit' name='book_now' value='Book A Show'>
                            </form>
                        </div>
                    </div>
                </div>
                ";
            }
        }
        ?>
    </div>
</div>

<div class="dashboard-container">
    <h2 style='text-align:center;background-color:white;'>Coming Soon</h2>
    <div class="horizontal-menu">
        <?php
        // Establish a connection to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "moviebooking";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve coming soon movies from the database
        $sql = "SELECT * FROM coming_soon";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mid = $row['id'];
                $name = $row['name'];
                $image = $row['image'];

                echo "
                <div class='movies-container'>
                    <div class='movie-card'>
                        <img src='../../images/$image' alt='Movie Poster'>
                        <div class='movie-details'>
                            <h5 class='movie-name'>$name</h5>";
                            
                // Add more details if needed
                if (isset($_SESSION['email'])) {
                    echo "<form action='showdetails.php' method='post'>
                            <input type='hidden' name='mid' value='$mid'>
                            <input type='hidden' name='mname' value='$name'>
                            <input type='submit' name='book_now' value='Show Details' class='book bg-green-500'>
                          </form>";
                }
                echo "</div>
                    </div>
                </div>";
            }
        } else {
            echo "No coming soon movies found.";
        }
        $conn->close();
        ?>
    </div>
</div>

<?php include('../../footer.php'); ?>
