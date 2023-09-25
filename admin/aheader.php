<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style> 
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background:cadetblue;
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
  
    </style>
</style>
<body>
<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="index.php" class="logo">
                MOVIE WORLD
            </a>
        </div>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="addmovies.php">Add Movies</a></li>
                <li><a href="movielist.php">Movie List</a></li>
                <li><a href="booking.php">Bookings</a></li>
                <li><a href="user.php">Users</a></li>
                <li><a href="addcomingsoon.php">Add Upcoming Movies</a></li>
                <li><a href="comingsoonlist.php">Upcoming Movies List</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
            <!-- MOBILE MENU TOGGLE -->

            </div>
        </div>
    </div>
</div>
</body>
</html>