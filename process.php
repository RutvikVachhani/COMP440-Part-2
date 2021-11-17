

<?php
session_start();

    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
 
    //connect to server
    include 'db_connect.php';

    //Prevent SQL Injection
    $Username = mysqli_real_escape_string($conn, $Username);
    $Password = mysqli_real_escape_string($conn, $Password);

    //query
    $sql = "SELECT * FROM UserLoginDetails WHERE Username = '$Username' AND Password = '$Password'";

    $result = mysqli_query($conn, $sql)
                or die("Failed to query Database".mysqli_error($conn));

    if(mysqli_num_rows($result) === 1){
        echo "Login Successful";
        header("Location: home.php");
            exit();
    }
    else{
        $_SESSION['messages'][] = 'The username or password is invalid';
        header("Location:index.php");
        exit;
    }

?>
