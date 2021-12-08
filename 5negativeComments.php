
<?php
session_start();

//connect db
include 'db_connect.php';

//list of blogs
$users = "SELECT username FROM users JOIN comments ON users.username = comments.posted_by WHERE posted_by NOT IN (SELECT posted_by FROM comments where sentiment = 'positive');" ;
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
<h1 class="color">List all the users who posted only negative comments.</h1>
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