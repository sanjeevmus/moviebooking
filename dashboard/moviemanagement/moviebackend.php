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
if(isset($_POST['add'])) {

    //get data
    $movie_name = $_POST['movie_name'];
    $movie_desc = $_POST['movie_desc'];
    $movie_price = $_POST['movie_price'];
    $movie_img = $_POST['movie_img'];

    //inserting
    $sql = " INSERT INTO movie(movie_name, movie_desc, movie_price, movie_img) VALUES('$movie_name', '$movie_desc', '$movie_price','$movie_img')";
}
echo("inserted sucessfully");
?>