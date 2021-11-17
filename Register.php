<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>
      Registration Page
    </title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/dcda13a2c7.js" crossorigin="anonymous"></script>
  </head>
  <body class="width">
  <nav>
      <div class="inline">
        <i class="fas fa-database fa-2x"></i>
        <h1>COMP 440 Phase 1 Team#20</h1>
      </div>
    </nav>
    <div class="boxRegister">
        <h2>Register Here</h2>
          <?php require_once 'messages.php'; ?>
        <form name="register" action="RegisterProcess.php" method="POST">
          <table>
            <tr>
              <td>First Name:</td>
              <td>
                <input type="text" id="Firstname" name="Firstname" placeholder="Enter your First name" required/>
              </td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td>
                <input type="text" id="Lastname" name="Lastname" placeholder="Enter your Last name" required/>
              </td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>
                <input type="text" id="Email" name="Email" placeholder="Enter your Email" required/>
              </td>
            </tr>
            <tr>
              <td>Username:</td>
              <td>
                <input type="text" id="Username" name="Username" placeholder="Enter your Username" required/>
              </td>
            </tr>
            <tr>
              <td>Password:</td>
              <td>
                <input type="text" id="Password" name="Password" placeholder="Enter your Password" required/>
              </td>
            </tr>
            <tr>
              <td>Confirm Password:</td>
              <td>
                <input type="text" id="ConfirmPassword" name="ConfirmPassword" placeholder="Re-Enter your Password" required/>
              </td>
            </tr>
            </table>
                <button type="submit" id="btn" name="submit" class="login">Submit</button>
          </form>
          <br />
          Already a user?
          <a href="index.php">Login here</a>
    </div>
  </body>
</html>

