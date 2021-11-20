<?php 
session_start();

include 'db_connect.php';
$createdBy = $_SESSION['User'];
$pdate = date("Y-m-d");
$bCount = "SELECT * from blogs WHERE created_by = '$createdBy' AND pdate = '$pdate';" ;
$c = mysqli_query($conn, $bCount);
if($c){
  $row = mysqli_num_rows($c);
}

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
    <br><br>
    <a href="postBlog.php">
      <div class="boxElements centerText">
        <div class="center">
          <span class="dot"><i id="b" class="fas fa-blog fa-4x"></i></span>
        </div>
        <h2>Post New Blog</h2>
        <p>Blog Posted Today: <?php echo $row ?></p>
      </div>
    </a>
  </body>
</html>