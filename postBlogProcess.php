<?php
session_start();

    $Subject = isset($_POST['Subject']) ? $_POST['Subject'] : '';
    $Description = isset($_POST['Description']) ? $_POST['Description'] : '';
    $Tags = isset($_POST['Tags']) ? $_POST['Tags'] : '';
   
    $data = $_POST;

    if (empty($data['Subject']) ||
        empty($data['Description'])  ||
        empty($data['Tags'])) {
        $_SESSION['messages'][] = 'Please fill all required fields';
        header('Location:postBlog.php');
        exit;
    }
    //connect to server
    include 'db_connect.php';

    //Insert 
    /*$sql = "INSERT INTO blogs (`subject`, `description`, `pdate`, `created_by`)
            VALUES ('" + $Subject + "', '" + $Description + "', " + CURDATE() + ", '" + $_SESSION['User'] +"');";

    if ($conn->query($sql) === TRUE) {
        echo "Blog Posted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   

$conn->close();*/
?>
