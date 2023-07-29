<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 40rem;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .seat-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .seat {
            margin: 5px;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .seat.selected {
            background-color: #4CAF50;
            color: #fff;
        }

        input[type="submit"] {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<?php
// Start a session if not already started (required for using $_SESSION)
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moviebooking";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$movieId = $_POST['mid'];
$selectedDate = $_POST['selected_date'];
$showTime = $_POST['fshow'];

// Retrieve booked seat IDs from the database
$sqlBookedSeats = "SELECT seat_id FROM bookings WHERE movie_id = $movieId AND show_date = '$selectedDate' AND show_time = '$showTime'";
$resultBookedSeats = $conn->query($sqlBookedSeats);
$bookedSeatIds = [];
if ($resultBookedSeats && $resultBookedSeats->num_rows > 0) {
    while ($row = $resultBookedSeats->fetch_assoc()) {
        $bookedSeatIds[] = $row['seat_id'];
    }
}

// Check if the user is logged in and the email address is available in the session
//if (!isset($_SESSION['email'])) {
    // Redirect the user to the login page or display an error message
   // header('Location: login.php');
   // exit;
//}

// Get the email address of the logged-in user
//$email = $_SESSION['email'];

if (isset($_POST['bookSeats'])) {
    // Fetch the ticket price for the selected movie from the database
    $sqlMoviePrice = "SELECT price FROM movie WHERE id = $movieId";
    $resultMoviePrice = $conn->query($sqlMoviePrice);
    if ($resultMoviePrice && $resultMoviePrice->num_rows > 0) {
        $row = $resultMoviePrice->fetch_assoc();
        $ticketPrice = floatval($row['price']);
    } else {
        echo "<p>Error fetching ticket price.</p>";
        // You may handle this error as per your requirement
        exit;
    }

    // Ensure $_POST data is present and correct
    if (isset($_POST['seats']) && is_array($_POST['seats']) && isset($_POST['fname'])) {
        $selectedSeats = $_POST['seats'];
        $fname = $_POST['fname'];
        $availableSeats = array_diff($selectedSeats, $bookedSeatIds);

        // Check if any seats are available to book
        if (count($availableSeats) > 0) {
            $totalPrice = count($availableSeats) * $ticketPrice; // Calculate the total price

            // Start a transaction to ensure consistency in the database
            $conn->begin_transaction();

            try {
                foreach ($availableSeats as $seatId) {
                    // Insert the booking details along with the user's name and email
                    $sqlInsertBooking = "INSERT INTO bookings (movie_id, show_date, show_time, seat_id, total_price, fname, email) 
                                        VALUES ($movieId, '$selectedDate', '$showTime', $seatId, $totalPrice, '$fname', '$email')";
                    if ($conn->query($sqlInsertBooking) !== TRUE) {
                        throw new Exception("Error booking Seat $seatId: " . $conn->error);
                    }
                }

                // Commit the transaction if all insertions are successful
                $conn->commit();

                echo "<p>Seats booked successfully!</p>";
                header('location: booking-sucess.php');
                exit;
            } catch (Exception $e) {
                // Rollback the transaction in case of any error during insertions
                $conn->rollback();
                echo "<p>Booking failed: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>All selected seats are already booked.</p>";
        }
    } else {
        echo "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seat Booking Form</title>
    <link rel="stylesheet" href="seats.css">
</head>
<body>
    <div class="container">
        <h1>Seat Booking Form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p>Ticket Price: Rs.<span id="ticketPrice"><?php echo $ticketPrice; ?></span></p>
            <p>Total Price: Rs.<span id="totalPrice">0.00</span></p>
            <input type="hidden" name="mid" value="<?php echo $movieId; ?>">
            <input type="hidden" name="selected_date" value="<?php echo $selectedDate; ?>">
            <input type="hidden" name="fshow" value="<?php echo $showTime; ?>">
            <label>Enter the name you want to book for:
            <input type="text" name="fname" required></label>
            
            <label>Select Seats:</label>
            <div class="seat-row">
                <?php
                $Seatid = 1;
                for ($i = 1; $i <= 30; $i++) {
                    $isBooked = in_array($Seatid, $bookedSeatIds);
                    $disabled = $isBooked ? "disabled" : "";
                    $selectedClass = $isBooked ? "selected" : "";
                    echo "
                        <div class='seat $selectedClass'>
                            <input type='checkbox' name='seats[]' value='$Seatid' $disabled>
                            Seat $Seatid
                        </div>
                    ";
                    $Seatid++;
                }
                ?>
            </div>
            <input type="submit" name="bookSeats" value="Book Seats">
            <a href="index.php">Cancel Booking</a>
        </form>
    </div>
</body>
<script>
    const seatElements = document.querySelectorAll('.seat');
    const totalPriceElement = document.getElementById('totalPrice');
    const ticketPrice = parseFloat(document.getElementById('ticketPrice').textContent);

    function updateTotalPrice() {
        let totalPrice = 0;
        const selectedSeats = [];
        seatElements.forEach(seat => {
            const checkbox = seat.querySelector('input[type="checkbox"]');
            if (checkbox.checked) {
                totalPrice += ticketPrice;
                selectedSeats.push(checkbox.value);
            }
        });
        totalPriceElement.textContent = totalPrice.toFixed(2);

        // Add/remove 'selected-real-time' class to indicate the selected seats
        seatElements.forEach(seat => {
            const checkbox = seat.querySelector('input[type="checkbox"]');
            if (selectedSeats.includes(checkbox.value)) {
                seat.classList.add('selected-real-time');
            } else {
                seat.classList.remove('selected-real-time');
            }
        });
    }

    seatElements.forEach(seat => {
        const checkbox = seat.querySelector('input[type="checkbox"]');
        checkbox.addEventListener('change', updateTotalPrice);
    });
</script>
</html>