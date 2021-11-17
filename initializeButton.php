<?php 

    include 'db_connect.php';

    if (isset($_POST["initialize"]))
    {   
    
    $file = file_get_contents('./university.sql', FILE_USE_INCLUDE_PATH);
    $array = explode(';', $file);
    foreach($array as $array){
        $sql = $array. ";";
        $conn->query($sql);  
        echo "executed <br>";
    header("refresh:3;url=home.php");
    }
}
?>