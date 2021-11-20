<?php 
session_start();

//connect db
include 'db_connect.php';

$createdBy = $_SESSION['User'];
$pdate = date("Y-m-d");

//Blog count
$bCount = "SELECT * from blogs WHERE created_by = '$createdBy' AND pdate = '$pdate';" ;
$c = mysqli_query($conn, $bCount);
if($c){
  $Brow = mysqli_num_rows($c);
}

//list of blogs
$list = "SELECT * FROM blogs WHERE created_by = '$createdBy';" ;
$blist = mysqli_query($conn, $list);

//comment count
$cCount = "SELECT COUNT(*) FROM comments WHERE posted_by = '$createdBy' AND cdate = '$pdate' ;" ;
$resultcCount = mysqli_query($conn, $cCount);
$rowCCount = mysqli_fetch_array($resultcCount);
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
        <a class="active" href="home.php">Home</a>
        <a class="hover" href="initializeButton.php">Initialize University database</a>
        <a class="hover" href="logout.php">Logout</a>
         </div>
      </div>
    </nav>
    <div class="center">
  	  <h1 class="color">Hello <?php echo $_SESSION['User']; ?> <h1>
    </div>
    <br><br>
    <div class="displayInline">
      <div class="boxElements">
        <div class="centerText">
        <a href="postBlog.php">
          <div class="center">
            <span class="dot"><i id="b" class="fas fa-blog fa-4x"></i></span>
          </div>
          <h2>Post New Blog</h2>
          <p>Blog Posted Today: <?php echo $Brow ?></p>
          </a>
          <h3> Your Blogs (subject)</h3>
        </div>
          <ul>
          <?php while($rblist = mysqli_fetch_array($blist)){
                  echo "<li>" . $rblist['subject'] . "</li>";
                }
          ?>
          </ul>
      </div>
      <div class="boxElements centerText">
        <a href="postComment.php">
          <div class="center">
            <span class="dot"><i id="b" class="fas fa-comment fa-4x"></i></span>
          </div>
          <h2>Comment On Blogs</h2>
          <p>Comments Posted Today: <?php echo $rowCCount['COUNT(*)'] ?></p>
        </a>
      </div>
    </div>
  </body>
</html>