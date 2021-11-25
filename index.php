<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>
      Login
    </title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/dcda13a2c7.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="nav">
      <div class="inline">
        <i class="fas fa-database fa-2x"></i>
        <h1>COMP 440 Phase 2 Team#20</h1>
        <a href="UserTable.php" class="Right">Create User database</a>
      </div>
    </nav>
          <div class="box">
          <h2>Login Here</h2>
          <?php require_once 'messages.php'; ?>
          <form name="login" action="process.php" method="POST">
            <table>
            <tr>
              <td>Username:</td>
              <td>
                <input type="text" id="Username" name="Username" placeholder="Enter Username" required/>
              </td>
            </tr>
            <tr>
              <td>Password:</td>
              <td>
                <input type="password" id="Password" name="Password" placeholder="Enter Password" required/>
              </td>
            </tr>
          </table>
                <button type="submit" id="btn" name="submit" class="login">Login</button>
          </form>
          <br />
          New User?
          <a href="Register.php">Register</a>
          </div>
  </body>
</html>

