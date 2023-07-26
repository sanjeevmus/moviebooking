<?php include('header.php'); ?>

<?php
session_start();
if(!isset( $_SESSION['uid']))
{
    header("location:../../login.php");
}

?>
<style>
.dashboard-container {
  max-width: 800px;
  margin: 0 auto;
}

.horizontal-menu {
  display: flex;
  justify-content: end;
  align-items:flex-end;
  margin-bottom: 20px;
}

.horizontal-menu a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-right: 10px;
  width: 100%;
}

.movies-container {
  width: 25%;
  display: inline-table;
}

.movie-card {
  border: 3px solid #ccc;
  padding: 10px;
  width: 250px;
  margin: 25px;
}

.movie-details {
  margin-top: 10px;
  font-family: cursive;
  font-style: oblique;
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

.movie-card img {
  height: 200px;
  width: 250px;
}

.book {
  background-color: #4caf50;
}

.nowshowing {
  font-size: larger;
  text-align: center;
}
</style>

<div class="dashboard-container">
  <div class="horizontal-menu">
    <a href="dash.php" id="now-showing-link" class="nowshowing">Now Showing</a>
  </div>
  
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
        $duration=$row['duration'];
        $director=$row['director'];
        $image=$row['image'];




        echo"
        
  <div class=movies-container>
      <div class=movie-card>
    
        <img src='../../images/$image' alt=Movie Poster>
          <div class=movie-details>
             Movie Title:<h5 class=movie-name>'$name'</h5>
            Description: <p class=movie-description>$description</p>
            Price: <p class=movie-price>$price</p>
            Movie Duration <p class=movie-duration>$duration</p>
            Directed By: <p class=movie-duration>$director</p>

            <form action='booking.php'  method='post'>
              <input type='hidden' name='duration' id='' value='$duration'>
              <input type='hidden' name='mid' id='' value='$mid'>
              <input type='hidden' name='mname' id='' value='$name'>
              <input type='submit' name='book_now' id=' ' value='Book A Show'>
            </form>

        </div>
      </div> 
  </div>
  
        ";
      }
}
?>
</div>
  
  <?php include('../../footer.php'); ?>


