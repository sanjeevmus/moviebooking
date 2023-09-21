<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="" type="text/css">
    <title></title>
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
    background-color:#6752ee;
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
  
        .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

        </style>
</head>
<body>
<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="#" class="logo">
                MOVIE WORLD
            </a>
        </div>
        <ul class="nav-menu" id="nav-menu">
        <div class="dropdown">
  <span>Movies</span>
  <div class="dropdown-content">
    <a href="">Now Showing</a>
    <a href="">Upcoming Movies</a>
  </div>
</div>
                
                
                <li><a href="#">My Bookings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="logoutbackend.php">Logout</a></li>
            </ul>
            <!-- MOBILE MENU TOGGLE -->

            </div>
        </div>
    </div>
</div>
