<?php

session_start();
//db connect
include 'db_connect.php';
//get blogid from viewblog.php
$blogid = $_SESSION['blogid'];

    if(isset($_POST['submit'])){
        if(!empty($_POST['sentiment'])) {
            $selected = $_POST['sentiment'];
        } else {
            echo 'Please select the value.';
        }
        if(!empty($_POST['comment'])){
            $comment = $_POST['comment'];
        } else {
            $_SESSION['messages'][] = 'Please type your comment';
            header('Location:postComment.php');
        }
    }

    $cdate = date("Y-m-d");
    $postedby = $_SESSION['User'];

    $sql = "INSERT INTO `comments`(`sentiment`, `description`, `cdate`, `blogid`, `posted_by`) VALUES ('$selected', '$comment', '$cdate', '$blogid', '$postedby');" ;
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['messages'][] = 'Comment posted';
        header('Location:postComment.php');
    } else {
        echo mysqli_error($conn);
    }
?>