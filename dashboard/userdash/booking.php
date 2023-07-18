<!DOCTYPE html>
<html>
<head>
    <title>Movie Booking</title>

    <style>
    .movie-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    .movie-card {
        display: flex;
        background-color: #f2f2f2;
        border-radius: 8px;
        margin: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .movie-card img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 8px 0 0 8px;
    }

    .movie-details {
        padding: 20px;
    }

    .movie-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .movie-details p {
        margin-bottom: 8px;
    }

    .movie-details span {
        font-weight: bold;
    }

    .booking-form {
        margin-top: 50px;
    }

    .booking-form h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .booking-form label {
        display: block;
        margin-bottom: 10px;
    }

    .booking-form input[type="date"] {
        padding: 8px;
        width: 100%;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .booking-form select {
        padding: 8px;
        width: 100%;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .booking-form button {
        padding: 8px 16px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <?php
    include('header.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moviebooking";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the movie ID from the form submission
    $mid = $_POST['mid'] ?? null;

    if ($mid === null) {
        echo "Movie ID not provided.";
        exit;
    }

    // Retrieve movie details from the database using the provided ID
    $sql = "SELECT * FROM movie WHERE id = $mid";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Extract movie details from the fetched row
            $name = $row['name'];
            $duration = $row['duration'];
            $relyear = $row['relyear'];
            $director = $row['director'];
            $actor = $row['actor'];
            $image = $row['image'];
            $fdate = $row['fdate'];
            $sdate = $row['sdate'];
            $fshow = $row['fshow'];
            $sshow = $row['sshow'];
            $tshow = $row['tshow'];


            // Display the movie details in HTML
            echo "
            <div class='movie-card'>
                <img src='../../images/$image' alt='Movie Poster'>
                <div class='movie-details'>
                    <h1 class='movie-name'>$name</h1>
                    <p><span>Duration:</span> $duration</p>
                    <p><span>Release Date:</span> $relyear</p>
                    <p><span>Director:</span> $director</p>
                    <p><span>Actor:</span> $actor</p>
                </div>
            </div>";
        }
    } else {
        echo "Movie not found.";
    }

    // Process the form submission when booking seats
    if (isset($_POST['bookSeats'])) {
        // Get the selected number of seats, movie ID, and show date from the form submission
        $seats = $_POST['seats'];
        $mid = $_POST['mid'];
        $showDate = $_POST['selected_date'];
        $showTime = $fshow; // Set the default value for showTime
       

        // Format the date and time values
        $showDateTime = date("Y-m-d H:i:s", strtotime("$showDate $showTime"));

        // Insert the booking details into the database
        $sqlSeats = "INSERT INTO bookings (seats, mid, show_date, show_time) VALUES ($seats, $mid, '$showDate', '$showTime')";

        if ($conn->query($sqlSeats) === TRUE) {
            // Redirect to a success page after successful booking
            header("Location: booking-sucess.php");
            exit;
        } else {
            echo "<script> alert('Booking Failed: " . $conn->error . "');</script>";
        }
    }
    ?>

    <div class="booking-form">
        <h2>Select Date and Time</h2>

        <form action="" method="post">
            <!-- Display the fetched show dates in a dropdown list -->
            Select Date:
            <select name="selected_date">
                <option value="<?php echo $fdate; ?>"><?php echo $fdate; ?></option>
                <option value="<?php echo $sdate; ?>"><?php echo $sdate; ?></option>
            </select>
            Show: 
            <select name="selected_date">
                <option value="<?php echo $fshow; ?>"><?php echo $fshow; ?></option>
                <option value="<?php echo $sshow; ?>"><?php echo $sshow; ?></option>
                <option value="<?php echo $tshow; ?>"><?php echo $tshow; ?></option>
            </select>
            <input type="hidden" name="mid" value="<?php echo $mid; ?>">

            <!-- Add hidden input fields for show date and time -->
            <input type="hidden" name="showdate" value="">
            <input type="hidden" name="showtime" value="">

            <br>
            Number of Seats: <input type="number" name="seats" id="seats" required>
            <input type="submit" name="bookSeats" value="Book Seats">
        </form>
    </div>

    <?php include('../../footer.php'); ?>
</body>
</html>