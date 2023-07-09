<?php

$servername = "localhost";
$username = "root";
$dbname = "moviebooking";

//create connection
$conn = new mysqli($servername, $username, "", $dbname);

//checking
if($conn->connect_error){
    die('connection failed ' .$conn->connect_error);
}else{
    echo 'connection success';
}

//process of submission
if(isset($_POST['signupBtn'])) {

    //get data
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $apassword = $_POST['apassword'];
    $acpassword = $_POST['acpassword'];
    $aphone = $_POST['aphone'];

    //inserting
    $sql = " INSERT INTO admin(aname, aemail, apassword, aphone) VALUES('$aname', '$aemail', '$apassword','$aphone')";
if(!$apassword == $acpassword)
{
    echo"password is not same";
}elseif ($conn->query($sql) === true) {
        header ('location:alogin.php');
} else {
        echo "Error: " .$conn->error;
}
}
?>
