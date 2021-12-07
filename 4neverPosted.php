<?php
    session_start();

    //connect db
    include 'db_connect.php';
    
    //list of users
    $neverPosted = "SELECT username FROM users
                    LEFT JOIN blogs
                    ON users.username = blogs.created_by
                    WHERE blogs.blogid is NULL;" ;
    $result = mysqli_query($conn, $neverPosted);
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
<h1 class="color">Users Who Never Posted Blog</h1>
<div class="blogListBox">
        <ul class='list'>
            <?php
                while($row = mysqli_fetch_array($result)){
                    echo "<li class='list'>" . $row['username'] . "</li>";
                } 
            ?>
        </ul>
    </div>
</body>
</html>