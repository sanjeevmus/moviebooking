<!DOCTYPE html>
<html>
<head>
    <title>Booking Success</title>
    <style>
        .container {
            text-align: center;
            margin-top: 100px;
        }

        h2 {
            font-size: 24px;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
        }
        .bill {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .bill p {
            margin: 5px 0;
        }

        .bill strong {
            display: inline-block;
            width: 120px;
        }

        .download-link {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Successful</h2>
        <p>Thank you for booking your seats!</p>
        <p>Your seats have been reserved successfully.</p>
        <p>Enjoy the movie!</p>
        <a href="dash.php">Home</a>
        <a class="download-link" href="downloadbill.php?fname=<?php echo $fname; ?>&movieName=<?php echo $movieName; ?>&selectedDate=<?php echo $selectedDate; ?>&booking_date=<?php echo $booking_date; ?>&booking_time=<?php echo $booking_time; ?>&selectedShowTime=<?php echo $selectedShowTime; ?>&bookingDate=<?php echo $bookingDate; ?>&bookedSeats=<?php echo $bookedSeats; ?>&totalBookedSeats=<?php echo $totalBookedSeats; ?>&totalAmount=<?php echo $totalAmount; ?>">Download Bill</a>
    </div>
</body>
</html>