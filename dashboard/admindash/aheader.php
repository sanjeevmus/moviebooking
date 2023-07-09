<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../admindash/style.css">
    <style>
.vertical-menu {
  background-color: #f1f1f1;
  width: 100%;
  position: relative;
  left: 0;
  height: 100%;
  display: flex;
  font-family: cursive;
  justify-content: center;
}

.vertical-menu a {
  background-color: #ddd;
  color: #333;
  display: flex;
  position: relative;
  text-decoration: none;
  padding-left: 85px;
  padding-right: 85px;
}

    </style>
    <link rel="stylesheet" href="style.css" type="text/css">
    
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
                <li><a href="#">Profile</a></li>
                <li><a href="../../admin/logoutbackend.php">Logout</a></li>
            </ul>
            <!-- MOBILE MENU TOGGLE -->
        </div>
    </div>
    <div class="vertical-menu">
        <a href="../admindash/adash.php">Dashboard</a>
        <a href="../admindash/addmovies.php">Add Movies</a>
        <a href="../moviemanagement/movielist.php">Movie List</a>
        <a href="../moviemanagement/bookinglist.php">Booking List</a>
        <a href="../moviemanagement/usermanagement.php">Users</a>
    </div>

    
    <!-- Rest of your HTML content -->
</body>
</html>
