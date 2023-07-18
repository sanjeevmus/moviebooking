<?php include('header.php'); ?>

<div class="success-page">
    <h2>Booking Successful!</h2>
    <p>Thank you for booking your tickets.</p>
    <p>Your booking details:</p>

    <?php
    // Retrieve and display the booking details
    $seats = isset($_POST['seats']) ? $_POST['seats'] : null;
    $mid = isset($_POST['mid']) ? $_POST['mid'] : null;
    $fdate = isset($_POST['fdate']) ? $_POST['fdate'] : null;
    $fshow = isset($_POST['fshow']) ? $_POST['fshow'] : null;

    // Create a new database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moviebooking";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query
    $sql = "INSERT INTO booking (seats, movie_id, show_date, show_time) VALUES ('$seats', '$mid', '$fdate', '$fshow')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<p>Booking saved successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Retrieve and display the movie details
    $sql = "SELECT * FROM movie WHERE id = $mid";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $duration = $row['duration'];
            $relyear = $row['relyear'];
            $director = $row['director'];
            $actor = $row['actor'];
            $image = $row['image'];

            echo "
            <div class='movie-details'>
                <h3 class='movie-name'>$name</h3>
                <p><span>Duration:</span> $duration</p>
                <p><span>Release Date:</span> $relyear</p>
                <p><span>Director:</span> $director</p>
                <p><span>Actor:</span> $actor</p>
                <p><span>Show Date:</span> $fdate</p>
                <p><span>Show Time:</span> $fshow</p>
                <p><span>Number of Seats:</span> $seats</p>
            </div>
            <div class='movie-poster'>
                <img src='../../images/$image' alt='Movie Poster'>
            </div>";
        }
    } else {
        echo "Movie not found.";
    }

    $conn->close();
    ?>

    <p>Enjoy the movie!</p>
</div>

<?php include('footer.php'); ?>