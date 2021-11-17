<?php
    include 'db_connect.php';

    $file = file_get_contents('./User.sql', FILE_USE_INCLUDE_PATH);

        if($conn->query($file) === true){
            echo "user table created";
            header("refresh:2;url=index.php");
            exit;
        }
        else {
        echo "user table already exist <br>";
        header("refresh:2;url=index.php");
        }

?>