<?php
if(isset($_POST['signinBtn'])) {
    // Get the username and password from the form
    $aname = $_POST['aname'];
    $apassword = $_POST['apassword'];

    $servername = "localhost";
    $username = "root";
    $dbname = "moviebooking";
    $conn = new mysqli($servername, $username, "", $dbname);
    if($conn->connect_error)
        die ("Connection failed ".$conn->connect_error);
    $sql = "SELECT * FROM admin WHERE aname = '$aname' and apassword = '$apassword'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)    {
        session_start();
        // Start the session and store the user's email
        $_SESSION['aname'] = $aname;
        // Redirect the user to the home page
        header("Location:../dashboard/admindash/adash.php");
        }
    else
        echo "username or password invalid";
}

?>





