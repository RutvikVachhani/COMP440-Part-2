<?php
session_start();

//connect db
include 'db_connect.php';

//list of users
/*procedure - 
CREATE Procedure maxBlog()
BEGIN
set @maxi = (select count(*) from blogs group by created_by order by count(*) desc limit 1);
select created_by from blogs GROUP BY created_by HAVING COUNT(*) = @maxi;
END*/

$blogCount = "CALL maxBlog()" ;
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
<h1 class="color">List of Users Posted Most Blogs on 11/25/2021</h1>
<div class="blogListBox">
        <ul class='list'>
            <?php
                while($row = mysqli_fetch_array($count)){
                    echo "<li class='list'>" . $row['created_by'] . "</li>";
                } 
            ?>
        </ul>
    </div>
</body>
</html>