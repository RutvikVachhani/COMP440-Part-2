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
            <form action="home.php" method="POST">
                <button type="submit" name="home" class="btn" >
                  Home
                </button>
            <form action="logout.php" method="POST">
                <button type="submit" name="logout" class="btn" >
                Logout
                </button>
            </form>
          </div>
        </div>
    </nav>
    <h1> Post your Blog </h2>
    <?php require_once 'messages.php'; ?>
    <form name="blog" action="postBlogProcess.php" method="POST">
        <table>
            <tr>
                <td>
                    <h2>Subject: </h2>
                    <textarea rows="1" cols="100" name="Subject" placeholder="Enter your blog subject here"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Description: </h2>
                    <textarea rows="15" cols="100" name="Description" placeholder="Enter you blog description here"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                     <h2>Tags: </h2>
                     <textarea rows="2" cols="100" name="Tags" placeholder="Put your tags here"></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" id="btn" name="submitBlog" class="btn">Post Blog</button>
    </form>
</body>
</html>