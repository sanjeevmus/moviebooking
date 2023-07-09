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
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];

    //inserting
    $sql = " INSERT INTO user(uname, email, password, phone) VALUES('$uname', '$email', '$password','$phone')";
if(!$password == $cpassword)
{
    echo"password is not same";
}elseif ($conn->query($sql) === true) {
        header ('location:login.php');
} else {
        echo "Error: " .$conn->error;
}
}
?>
