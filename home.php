<?php 
session_start();
?>

<!DOCTYPE html>   
<html>
<head>
    <meta charset="utf-8" />
    <title>
      Home
    </title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/dcda13a2c7.js" crossorigin="anonymous"></script>
  </head>
	<body>
  <nav>
      <div class="inline">
        <i class="fas fa-database fa-2x"></i>
        <h1>COMP 440 Phase 1 Team#20</h1>
        <div class="Right">
        <form action="initializeButton.php" method="POST">
          <button type="submit" name="initialize" class="btn" >
            Initialize Project Database
          </button>
        </form>
        <form action="logout.php" method="POST">
          <button type="submit" name="initialize" class="btn" >
            Logout
          </button>
        </form>
         </div>
      </div>
    </nav>
    <div class="center">
  	  <h1>Hello <?php echo $_SESSION['User']; ?> <h1>
    </div>
    <a href="postBlog.php">Post a new blog</a>
    <div class="boxElements">
      hello my trial of this box.
    </div>
  </body>
</html>