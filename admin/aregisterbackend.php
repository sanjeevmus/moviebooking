<?php
$servername = "localhost";
$username = "root";
$dbname = "moviebooking";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);

// Checking connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    echo 'Connection failed';
}

// Process of submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from the form
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $apassword = $_POST['apassword'];
    $aphone = $_POST['aphone'];

    // Perform validation
    $errors = [];

    // Name validation
    if (empty($aname)) {
        $errors["aname"] = "Name is required.";
    }

    // Email validation
    if (empty($aemail)) {
        $errors["aemail"] = "Email is required.";
    } elseif (!filter_var($aemail, FILTER_VALIDATE_EMAIL)) {
        $errors["aemail"] = "Invalid email format.";
    }

    // Password validation
    if (empty($apassword)) {
        $errors["apassword"] = "Password is required.";
    }

    // Phone validation
    if (empty($aphone)) {
        $errors["aphone"] = "Phone number is required.";
    } elseif (!preg_match('/^\+9779[0-9]{9}$/', $aphone)) {
        $errors["aphone"] = "Invalid phone number format. Phone number should start with +9779 and have 8 additional digits.";
    }

    // If there are validation errors, display them on the form
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Validation passed, proceed with email exists check

        // Sanitize user inputs
        $aname = mysqli_real_escape_string($conn, $aname);
        $aemail = mysqli_real_escape_string($conn, $aemail);
        // Hash the password for security (consider using password_hash() function)
        $apassword = mysqli_real_escape_string($conn, $apassword);
        $aphone = mysqli_real_escape_string($conn, $aphone);

        // Checking if email exists
        $check_email_query = "SELECT aemail FROM admin WHERE aemail = '$aemail' LIMIT 1";
        $result = mysqli_query($conn, $check_email_query);

        if (mysqli_num_rows($result) > 0) {
            echo '<script type="text/javascript"> alert("Error: Email already registered ' . $conn->error . '"); </script>';
        } else {
            // Email doesn't exist, proceed with registration

            // Insert user data into the database
            $sql = "INSERT INTO admin (aname, aemail, apassword, aphone) VALUES ('$aname', '$aemail', '$apassword', '$aphone')";
            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
                // Redirect the user to the login page after successful registration
                header("Location: alogin.php");
                exit(); // Make sure to exit after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$conn->close();
?>
