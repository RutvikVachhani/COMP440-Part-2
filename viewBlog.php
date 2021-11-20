<?php 

session_start();
//connect db
include 'db_connect.php';
//got blog id
$blogid =  $_GET['bid'];
$_SESSION['blogid'] = $blogid;

$sql = "SELECT * FROM blogs WHERE blogid = '$blogid';" ;
$viewBlogs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($viewBlogs);

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
          <h1>COMP 440 Phase 1 Team#20</h1>
          <div class="Right">
            <a class="hover" href="home.php">Home</a>
            <a class="hover" href="postBlog.php">Post Blog</a>
            <a class="hover" href="postComment.php"> Comment</a>
            <a class="hover" href="logout.php">Logout</a>
          </div>
        </div>
    </nav>
    <div class="displayInline" style="margin-top: 30px;">
      <div class="viewBlog">
        <h1> Blog posted by <?php echo $row['created_by']; ?> on <?php echo $row['pdate']; ?> </h2>
        <h2> Subject </h2>
        <p> <?php echo $row['subject']; ?> </p>
        <h2> Description </h2>
        <p> <?php echo $row['description']; ?> </p>
      </div>
    </div>
    <div class="displayInline">
      <div class="commentBox">
        <h1>Comment</h1>
        <form action="postCommentProcess.php" method="POST">
          <select name="sentiment" required>
            <option value="" disabled selected hidden>Choose a sentiment</option>
            <option value="Positive">Positive</option>
            <option value="Negative">Negative</option>
          </select>
          <textarea class="textarea" name="comment" rows="2" cols="72" placeholder="Type your comment here" required></textarea>
          <button class="commentbtn" type="submit" name="submit" value="choose sentiment">Post Comment</button>
        </form>
      </div>
    </div>
</body>
</html>

<?php

  

?>