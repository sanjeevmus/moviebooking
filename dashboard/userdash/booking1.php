<!-- <!DOCTYPE html>
<head>
    <title>Movie Booking</title>
    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <?php
    //session_start();
    //echo $_SESSION['uid'];

    //include('header.php');
    //$servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "moviebooking";
//
    //// Create connection
    //$conn = new mysqli($servername, $username, $password, $dbname);
//
    //// Check connection
    //if ($conn->connect_error) {
    //    die("Connection failed: " . $conn->connect_error);
    //}
//
    //if (isset($_POST['book_now'])) {
    //    if (empty($_POST['id'])) {
    //        echo "Movie ID not provided.";
    //        exit;
    //    }
    //    $id = $_POST['id'];
    //}
//
    //// Retrieve movie details from the database using the provided ID
    //$mid = isset($_POST['id']) ? $_POST['id'] : null;
    //$sql = "SELECT * FROM movie WHERE id = $id";
    //$result = $conn->query($sql);
//
    //if ($result && $result->num_rows > 0) {
    //    while ($row = $result->fetch_assoc()) {
    //        $name = $row['name'];
    //        $duration = $row['duration'];
    //        $relyear = $row['relyear'];
    //        $director = $row['director'];
    //        $actor = $row['actor'];
    //        $image = $row['image'];
    //        $fdate = $row['fdate'];
    //        $sdate = $row['sdate'];
    //        $fshow = $row['fshow']; // Set a default value for $fshow
//
    //        $fdate = date('Y-m-d', strtotime($row['fdate']));
    //        $sdate = date('Y-m-d', strtotime($row['sdate']));
    //        $fshow = date('H:i:s', strtotime($row['fshow']));
//
    //        // Display the movie details in HTML
    //        echo "
    //            <div class='movie-card'>
    //                <img src='images/$image' alt='Movie Poster'>
    //                <div class='movie-details'>
    //                    <h1 class='movie-name'>$name</h1>
    //                    <p><span>Duration:</span> $duration</p>
    //                    <p><span>Release Date:</span> $reldate</p>
    //                    <p><span>Director:</span> $director</p>
    //                    <p><span>Actor:</span> $actor</p>
    //                </div>
    //            </div>";
    //    }
    //} else {
    //    echo "Movie not found.";
    //}
//
    //// Process the form submission when booking seats
    //if (isset($_POST['bookSeats'])) {
    //    // Get the selected seats, movie ID, and show date from the form submission
    //    $seats = isset($_POST['seats']) ? $_POST['seats'] : array();
    //    $movieId = isset($_POST['mid']) ? $_POST['mid'] : null;
    //    $showDate = isset($_POST['selected_date']) ? $_POST['selected_date'] : null;
    //    $showTime = $fshow; // Use the default show time for now (you can enhance this later)
//
    //    // Validate if seats were selected
    //    if (empty($seats)) {
    //        echo "<script> alert('Please select at least one seat.'); window.history.back(); </script>";
    //        exit;
    //    }
//
    //    // Fetch booked seat IDs from the database
    //    $sqlBookedSeats = "SELECT seat_id FROM booking WHERE movie_id = $movieId AND show_date = '$showDate' AND show_time = '$showTime'";
    //    $resultBookedSeats = $conn->query($sqlBookedSeats);
//
    //    // Initialize the $bookedSeatIds array
    //    $bookedSeatIds = [];
    //    if ($resultBookedSeats && $resultBookedSeats->num_rows > 0) {
    //        while ($row = $resultBookedSeats->fetch_assoc()) {
    //            $bookedSeatIds[] = $row['seat_id'];
    //        }
    //    }
//
    //    // Check if any of the selected seats are already booked
    //    $unavailableSeats = array_intersect($seats, $bookedSeatIds);
    //    if (!empty($unavailableSeats)) {
    //        echo "<script> alert('The selected seats are no longer available. Please select other seats.');
    //        window.location.href = 'index.php '
    //        </script>";
    //        
    //        exit;
    //    }
//
    //    // Format the date and time values
    //    $showDateTime = date("Y-m-d H:i:s", strtotime("$showDate $showTime"));
//
    //    // Insert the booking details into the database for each selected seat
    //    foreach ($seats as $seat) {
    //        $sqlBooking = "INSERT INTO booking (movie_id, show_date, show_time, seat_id) VALUES ($movieId, '$showDate', '$showTime', $seat)";
    //        if ($conn->query($sqlBooking) !== TRUE) {
    //            echo "<script> alert('Booking Failed: " . $conn->error . "');</script>";
    //            // You may want to handle the error gracefully and allow the user to retry or show an error message
    //            exit;
    //        }
    //    }
//
    //    // Redirect to a success page after successful booking using the PRG pattern
    //    header("Location: booking-success.php");
    //    exit;
    //}
    //?>
//
    //<div class="booking-form">
    //    <h2>Select Date and Time</h2>
    //    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    //        <label for="selected_date">Select Date:</label>
    //        <select name="selected_date">
    //            <?php
    //            // Display available show dates for the selected movie
    //            if (!empty($fdate)) {
    //                echo "<option value=\"$fdate\">$fdate</option>";
    //            }
    //            if (!empty($sdate)) {
    //                echo "<option value=\"$sdate\">$sdate</option>";
    //            }
    //            ?>
    //        </select>
    //        Show: <span><?php echo $fshow; ?></span>
    //        <input type="hidden" name="mid" value="<?php echo $mid; ?>">
    //        <br>
//
    //        <!-- Seat selection checkboxes -->
          <!-- <label>Select Seats:</label><br> -->
     <?php
    //        $Seatid = 1;
    //        for ($i = 1; $i <= 5; $i++) {
    //            for ($j = 1; $j <= 6; $j++) {
    //                echo "<div class='seat' value='$Seatid'>$Seatid</div>";
    //                $Seatid++;
    //            }
    //            echo '<br>';
    //        }
 ?>
//
    <!-- //        <br> -->
    <!-- //        <input type="submit" name="bookSeats" value="Book Seats"> -->
    <!-- //    </form> -->
    <!-- //</div> -->
//
    <!-- //<?php include('footer.php'); ?> -->
<!-- </bo//dy> -->
<!-- </ht//ml> --> -->