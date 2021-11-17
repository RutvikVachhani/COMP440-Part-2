<?php

  session_start();

  $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
  $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
  $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  $data = $_POST;

  if (empty($data['Firstname']) ||
      empty($data['Lastname'])  ||
      empty($data['Username'])  ||
      empty($data['Password'])  ||
      empty($data['Email'])     ||
      empty($data['ConfirmPassword'])) {
      $_SESSION['messages'][] = 'Please fill all required fields';
      header('Location:Register.php');
      exit;
  }

  if(!preg_match('/[a-zA-Z0-9]+$/',$data['Username'])) {
    $_SESSION['messages'][] = 'Username can only contain letters and numbers';
    header('Location:Register.php');
    exit;
  }

  if(!preg_match('/[a-zA-Z0-9._@]+$/',$data['Email'])) {
    $_SESSION['messages'][] = 'Invalid Email';
    header('Location:Register.php');
    exit;
  }

  if(strlen($data['Password']) < 7 ) {
    $_SESSION['messages'][] = 'Password is too short';
    header('Location:Register.php');
    exit;
  }
  
  if ($data['Password'] !== $data['ConfirmPassword']) {
    $_SESSION['messages'][] = 'Password and Confirm password did not match. Try again';
    header('Location:Register.php');
    exit; 
  }

  //connect to server
  include 'db_connect.php';
  
  //Prevent SQL Injection
  $Firstname = mysqli_real_escape_string($conn, $Firstname);
  $Lastname = mysqli_real_escape_string($conn, $Lastname);
  $Email = mysqli_real_escape_string($conn, $Email);
  $Username = mysqli_real_escape_string($conn, $Username);
  $Password = mysqli_real_escape_string($conn, $Password);

  //Email already used
  $sql = "SELECT Email FROM UserLoginDetails WHERE Email = '$Email'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1){
    $_SESSION['messages'][] = 'The Email is already registered with an account. Try a different Email';
    header("Location:Register.php");
    exit;
  }

  //Username already used
  $sql = "SELECT Username FROM UserLoginDetails WHERE Username = '$Username'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1){
    $_SESSION['messages'][] = 'The Username is already registered with an account. Try a different Username';
    header("Location:Register.php");
    exit;
  }

  //query
  $stmt = $conn->prepare("INSERT INTO UserLoginDetails(Firstname, Lastname, Email, Username, Password) VALUES (?,?,?,?,?)");

  $stmt->bind_param("sssss", $Firstname, $Lastname, $Email, $Username, $Password);

  if ($stmt->execute() === TRUE) {
    echo "Registered Successfully. Redirecting to Login page";
  } else {
    echo "Error: " . $conn->error;
  }
  
  $stmt->close();
  $conn->close();
  

  header("refresh:5;url=index.php");
?>
