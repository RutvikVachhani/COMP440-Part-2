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

    //Cannot post of count > 3
    $cCount = "SELECT COUNT(*) from comments WHERE cdate = '$cdate' AND posted_by = '$postedby';" ;
    $count = mysqli_query($conn, $cCount);
        
    while($row = mysqli_fetch_array($count)) {
        if($row['COUNT(*)'] >= 3){
         $_SESSION['messages'][] = 'You cannot comment as you have exceeded the daily limit';
         header('Location:postComment.php');
         exit();
        }
    }

    //Cannot post more than one comment for each blog 
    $bComment = "SELECT COUNT(*) from comments INNER JOIN blogs ON comments.blogid = blogs.blogid WHERE comments.posted_by = '$postedby' and blogs.blogid = '$blogid'; ";
    $bComCount = mysqli_query($conn, $bComment);

    while($row = mysqli_fetch_array($bComCount)) {
        if($row['COUNT(*)'] >= 1){
         $_SESSION['messages'][] = 'You cannot comment as you have already commented on this blog';
         header('Location:postComment.php');
         exit();
        }
    }

    $sql = "INSERT INTO `comments`(`sentiment`, `description`, `cdate`, `blogid`, `posted_by`) VALUES ('$selected', '$comment', '$cdate', '$blogid', '$postedby');" ;
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['messages'][] = 'Comment posted';
        header('Location:postComment.php');
    } else {
        echo mysqli_error($conn);
    }
?>