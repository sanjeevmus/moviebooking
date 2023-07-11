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
  position: relative;
  left: 0;
  height: 100%;
  display: flex;
  font-family: cursive;
  justify-content: center;
}

.vertical-menu a {
  color: #fff;
  display: flex;
  position: relative;
  text-decoration: none;
  margin-left: 50px;
  margin-right: 50px;
}
.admin-login-info {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .admin-login-info i {
        margin: 0 10px;
        cursor: pointer;
    }

    .admin-login-info img {
        margin-left: 10px;
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
            <div class="vertical-menu">
        
        <a href="../admindash/addmovies.php">Add Movies</a>
        <a href="../moviemanagement/movielist.php">Movie List</a>
        <a href="../moviemanagement/bookinglist.php">Booking List</a>
        <a href="../moviemanagement/usermanagement.php">Users</a>
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
