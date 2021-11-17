<?php 
session_start();
?>

<!DOCTYPE html>   
<html>
<head>
    <meta charset="utf-8" />
    <title>
      Login
    </title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/dcda13a2c7.js" crossorigin="anonymous"></script>
  </head>
	<body>
  <nav>
      <div class="inline">
        <i class="fas fa-database fa-2x"></i>
        <h1>COMP 440 Phase 1 Team#20</h1>
        <a name="logout" href="logout.php" class="Right">Logout</a>
      </div>
    </nav>
    <div class="center">
  	  <h1>Hello<h1>
      <br>

    <form action="initializeButton.php" method="POST">
      <button type="submit" name="initialize" class="btn">
        Initialize University Database
      </button>
    </form>
    </div>

  </body>
</html>