<?php
if(isset($_POST['signinBtn'])) {
    // Get the username and password from the form
    $aemail = $_POST['aemail'];
    $apassword = $_POST['apassword'];

    $servername = "localhost";
    $username = "root";
    $dbname = "moviebooking";
    $conn = new mysqli($servername, $username, "", $dbname);
    if($conn->connect_error)
        die ("Connection failed ".$conn->connect_error);
    $sql = "SELECT * FROM admin WHERE aemail = '$aemail' and apassword = '$apassword'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)    {
        session_start();
        // Start the session and store the user's email
        $_SESSION['aemail'] = $aemail;
        // Redirect the user to the home page
        header("Location:../dashboard/admindash/adash.php");
        }
    else
        echo "username or password invalid";
}

?>





