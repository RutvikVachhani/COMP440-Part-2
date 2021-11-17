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
    
?>
