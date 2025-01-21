<?php
session_start();

$id=$_POST['id'];
$feedback=$_POST['feedback'];
$rating=$_POST['rating'];
$name=$_SESSION['name'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";

# Create connection
$con = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
} else {
  $stmt = $con->prepare('SELECT nickname FROM accounts where username=? ');
  $stmt->bind_param('s',$name);
  $stmt->execute();
  $stmt->bind_result($name);
  $stmt->fetch();
  $stmt->close();
  // We don't have the password or email info stored in sessions so instead we can get the results from the database.
  $stmt = $con->prepare('INSERT INTO `feedback`(`productid`, `username`, `description`, `rating`) VALUES (?,?,?,?)');
  $stmt->bind_param('issi', $id, $name, $feedback, $rating);
  $stmt->execute();
  $stmt->close();
  echo("<script LANGUAGE='JavaScript'>
  window.alert('Succesfully give feedback, thank you.');
  window.location.href='home.php';
  </script>");
}



 ?>
