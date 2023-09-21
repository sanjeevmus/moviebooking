<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style> 
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: cadetblue;
}
  
  .container {
    justify-content: space-between;
    display: flex;
    align-items: center;
    padding: 20px;

  }
  
  /* Navigation */
  .nav-wrapper {
    background-color:black;
    color: #fff;
  
  }
  
  .nav {
    display: flex;
    justify-content: space-between;
    align-items:center ;
    padding: 10px 20px;

    
  }
  
  .nav a.logo {
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    text-decoration: none;
  }
  
  .nav-menu {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  .nav-menu li {
    display: inline-block;
    margin-right: 10px;
  }
  .nav-menu li a {
    color: #fff;
    text-decoration: none;
  }
  
  .vertical-menu{
    width :70%;
    text-align: center;
  }
  .vertical-menu a{
    text-decoration:none !important;
    color: #fff;
    padding: 30px;
  }
</style>
</head>
<body>
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="adash.php" class="logo">
                    MOVIE WORLD
                </a>
</div>
            <div class="vertical-menu">
        <a href="../admindash/addmovies.php">Add Movies</a>
        <a href="../admindash/movielist.php">Movie List</a>
        <a href="../admindash/bookinglist.php">Booking List</a>
        <a href="addcoming.php">Upcoming Movies</a>
        <a href="comingsoonlist.php">Upcoming Movies List</a>

        <a href="../admindash/usermanagement.php">Users</a>
    </div>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="../../admin/logoutbackend.php">Logout</a></li>
            </ul>
            <!-- MOBILE MENU TOGGLE -->
        </div>
    </div>
    

    
    <!-- Rest of your HTML content -->
</body>
</html>