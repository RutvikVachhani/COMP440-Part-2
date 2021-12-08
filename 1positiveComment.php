<?php
session_start();

//connect db
include 'db_connect.php';

//list of blogs
$blogs = "SELECT `subject`, `created_by`  FROM blogs WHERE created_by IN (SELECT posted_by FROM comments WHERE sentiment = 'positive');" ;
$bloglist = mysqli_query($conn, $blogs);
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
<h1 class="color">List all the blogs with positive comments.</h1>
<div class="blogListBox">
        <ul class='list'>
            <?php
                while($row = mysqli_fetch_array($bloglist)){
                    echo "<li class='list'><b> Subject: </b>" . $row['subject'] . "<b> posted by </b>" . $row['created_by'] . "</li>";
                } 
            ?>
        </ul>
    </div>
</body>
</html>
?>