<?php
$serverName= "localhost";
$unmae= "root";
$password = "";
$db_name = "COMP440";

$conn = new mysqli($serverName, $unmae, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}

?>