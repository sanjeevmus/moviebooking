<?php
session_start();
if (!isset($_SESSION['aemail'])) {
    header("location:../../admin/alogin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .content {
            margin: 20px;
            padding: 20px;
            height: 32rem;
            background-color:cadetblue;
        }
        
        .content p {
            margin-bottom: 10px;
        }

        .content p:first-child {
            font-size: 30px;
            font-weight: bold;
        }

        .content p:nth-child(2) {
            font-style: italic;
        }

        .content p:nth-child(3) {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php include('aheader.php'); ?>
<div class="content">
    <p>Hello Admin!</p><br>
    <p>Welcome to the admin dashboard. Here, you can manage various aspects of the movie ticket booking system.</p><br>
    <p>Let's Start to Manage the Admin Dashboard</p><br>
    <br>
</div>

</body>
</html>
