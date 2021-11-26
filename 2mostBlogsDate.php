<?php
session_star();

//connect db
include 'db_connect.php';

//list of users
$blogCount = "SELECT COUNT(*), posted_by from blogs WHERE pdate = '2021-11-25' GROUP BY posted_by; LIMIT 1;" ;
$count = mysqli_query($conn, $blogCount);
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
<h1>List of Users Posted Most Blogs on 10/10/2021</h1>
<div class="blogListBox">
        <ul class='list'>
            <?php
                while($row = mysqli_fetch_array($count)){
                    echo "<li class='list'>" . $row['posted_by'] . "</li>";
                } 
            ?>
        </ul>
    </div>
</body>
</html>