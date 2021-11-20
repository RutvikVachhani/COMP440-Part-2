<?php
session_start();

    $Subject = isset($_POST['Subject']) ? $_POST['Subject'] : '';
    $Description = isset($_POST['Description']) ? $_POST['Description'] : '';
    $Tags = isset($_POST['Tags']) ? $_POST['Tags'] : '';
    //store each tag in array
    $newtags = explode(",", $Tags);
    $TagArray = array_map('trim',$newtags);

    $pdate = date("Y-m-d");
    $createdBy = $_SESSION['User'];

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

    //Cannot post of count > 2
    $blogCount = "SELECT COUNT(*) from blogs WHERE created_by = '$createdBy' AND pdate = '$pdate';" ;
    $count = mysqli_query($conn, $blogCount);
        
    while($row = mysqli_fetch_array($count)) {
        if($row['COUNT(*)'] >= 2){
         $_SESSION['messages'][] = 'You cannot post a blog as you have exceeded the daily limit';
         header('Location:postBlog.php');
         exit();
        }
    }

    //Insert 
    //insert into blogs
    $insertBlog = "INSERT INTO blogs (`subject`, `description`, `pdate`, `created_by`) VALUES ('$Subject', '$Description', '$pdate', '$createdBy');";
    $result = mysqli_query($conn, $insertBlog);

    if(!$result)
    {
        echo mysqli_error();
    }
    else
    {
         //get blogid
        $insertedBlogId = mysqli_insert_id($conn);
        //insert tags        
        for($i = 0; $i <= count($TagArray)-1; $i++ ){
            $insertTags = "INSERT INTO blogstags(`blogid`, `tag`) VALUES ('$insertedBlogId', '$TagArray[$i]');" ;
            $tagResult = mysqli_query($conn, $insertTags);
            if(!$tagResult){
                echo mysqli_error();
            }
        }
        $_SESSION['messages'][] = 'Blog posted';
        header('Location:postBlog.php');
    }

    $conn->close();
?>
