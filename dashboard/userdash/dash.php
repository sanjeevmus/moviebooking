<?php include('header.php'); ?>

<?php
session_start();
if(!isset( $_SESSION['uid']))
{
    header("location:../../login.php");
}

?>


<style>
    h2{
        text-align: center;
        font-weight: 500;
        /* font-family: cursive; */
    }
.dashboard-container {
  max-width: 800px;
  margin: 0 auto;
}

.horizontal-menu {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.horizontal-menu a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-right: 10px;
}

.search {
  display: flex;
}

#search-input {
  padding: 6px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

#search-button {
  padding: 6px 10px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 10px;
}

.movies-container {
 width: 25%;
 display: flex;
}

.movie-card {
  border: 3px solid #ccc;
  padding: 10px;
  width: 250px;
  margin: 25px;


}

.movie-details {
  margin-top: 10px;
}

.movie-name {
  font-weight: bold;
  margin-bottom: 5px;
}

.movie-description {
  margin-bottom: 20px;
  /* font-family: cursive; */
}

.movie-price {
  margin-bottom: 20px;
  /* font-family: cursive; */
}
.movie-card img{
  height:200px;
  width: 250px;
}
.book{
  background-color: #4caf50;
}
</style>








<div class="dashboard-container">
  <div class="horizontal-menu">
    <a href="dash.php" id="now-showing-link">Now Showing</a>
    <div class="search">
      <input type="text" id="search-input" name="search" placeholder="Search Movies">
      <button type="button" id="search-button">Search</button>
    </div>
  </div>
  <h2><u>Now Showing</u></h2>

            <?php
     $servername = "localhost";
     $username = "root";
     $dbname = "moviebooking";
     $conn = new mysqli($servername, $username, "", $dbname);
     if($conn->connect_error)
         die ("Connection failed ".$conn->connect_error);

         $sql="select * from movie";
         $r=$conn->query($sql);
       if($r)
{
      while($row=$r->fetch_assoc()){
        $mid=$row['id'];
        $name=$row['name'];
        $description=$row['description'];
        $price=$row['price'];
        $time=$row['time'];
        $image=$row['image'];




        echo"
        
        <div class=movies-container>
    <div class=movie-card>
    
      <img src='../../images/$image' alt=Movie Poster>
      <div class=movie-details>
        movie title:<h5 class=movie-name>'$name'</h5>
       Description: <p class=movie-description>$description</p>
       PRice: <p class=movie-price>$price</p>
       Show Time <p class=movie-price>$time</p>
        <form action='test.php'  method='post'>
    <input type='hidden' name='time' id='' value='$time'>
    <input type='hidden' name='mid' id='' value='$mid'>
    <input type='hidden' name='mname' id='' value='$name'>
    <input type='submit' name='book_now' id=' ' value='Book Now'>
</form>
      </div>
    </div>  
    


        ";
      }
 
}
?>





    <!-- Add more movie cards here -->
  </div> 

