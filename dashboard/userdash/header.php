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
    font-family: cursive;
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
                <li><a href="#">My Bookings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="logoutbackend.php">Logout</a></li>
            </ul>
            <!-- MOBILE MENU TOGGLE -->

            </div>
        </div>
    </div>
</div>
