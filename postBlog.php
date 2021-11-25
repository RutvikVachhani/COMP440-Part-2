<?php 
    session_start();
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
            <a class="active" href="postBlog.php">Post Blog</a>
            <a class="hover" href="postComment.php"> Comment</a>
            <a class="hover" href="logout.php">Logout</a>
          </div>
        </div>
    </nav>
    <h1 class="color centerText"> Post your Blog </h2>
    <?php require_once 'messages.php'; ?>
    <form name="blog" action="postBlogProcess.php" method="POST">
        <table class="center">
            <tr>
                <td>
                    <h2 class="color">Subject: </h2>
                    <textarea class="textarea" rows="1" cols="100" name="Subject" placeholder="Enter your blog subject here"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <h2 class="color">Description: </h2>
                    <textarea class="textarea" rows="15" cols="100" name="Description" placeholder="Enter you blog description here"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                     <h2 class="color">Tags: </h2>
                     <textarea class="textarea" rows="2" cols="100" name="Tags" placeholder="Put your tags here"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" id="btn" name="submitBlog" class="btn">Post Blog</button>
                </td>
            </tr>
        </table>  
    </form>
</body>
</html>