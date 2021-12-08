<?php
session_star();

$YUsername = isset($_POST['YUsername']) ? $_POST['YUsername'] : '';
$XUsername = isset($_POST['XUsername']) ? $_POST['XUsername'] : '';

//connect db
include 'db_connect.php';

//list of blogs
$users = "SELECT username  FROM users WHERE users.username = follows.leadername IN (SELECT leadername FROM follows WHERE followername= '$XUsername' UNION SELECT leadername FROM follows WHERE followername = '$YUsername');" ;
$userlist = mysqli_query($conn, $users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post your Blog</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/dcda13a2c7.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
    <div class="inline">
        <i class="fas fa-database fa-2x"></i>
        <h1>COMP 440 Phase 2 Team#20</h1>
        <div class="Right">
        <a class="hover" href="home.php">Home</a>
        <a class="hover" href="postBlog.php">Post Blog</a>
        <a class="hover" href="postComment.php"> Comment</a>
        <a class="hover" href="logout.php">Logout</a>
        </div>
    </div>
</nav>
<h1 class="color">List the users who are followed by both X and Y.</h1>
<div class="blogListBox">
        <ul class='list'>
            <?php
                while($row = mysqli_fetch_array($userlist)){
                    echo "<li class='list'><b> Username: </b>" . $row['username'] . "</li>";
                } 
            ?>
        </ul>
    </div>
</body>
</html>
?>